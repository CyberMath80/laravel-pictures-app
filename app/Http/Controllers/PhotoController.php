<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Photo, Album, User, Source, Tag};
use App\Http\Requests\PhotoRequest;
use DB, Image, Storage, Str, Mail;

class PhotoController extends Controller
{
    public function create(Album $album) { // Formulaire d'ajout de photo à l'album
        abort_if($album->user_id != auth()->id(), 403);

        $data = [
            'title' => $description = 'Ajouter des photos à '.$album->title,
            'description' => $description,
            'album' => $album,
            'heading' => $album->title,
        ];

        return view('photo.create', $data);
    }

    public function store(PhotoRequest $request, Album $album) { // Enregistrement de la photo
        abort_if($album->user_id != auth()->id(), 403);

        DB::beginTransaction();
        try {
            $photo = $album->photos()->create($request->validated());

            $tags = explode(',',$request->tags);
            $tags = collect($tags)->filter(function($value, $key){
                return $value != '' && $value != ' ';
            })->all();

            //dd($tags);
            foreach($tags as $t) {
                $tag = Tag::firstOrCreate(['name' => ucfirst(trim($t))]);
                $photo->tags()->attach($tag->id);
            }

            if($request->file('photo')->isValid()) {
                $ext = $request->file('photo')->extension();
                $filename = Str::uuid().'.'.$ext;

                $originalPath = $request->file('photo')->storeAs('photos/'.$photo->album_id, $filename);
                $originalWidth = (int) Image::make($request->file('photo'))->width();
                $originalHeight = (int) Image::make($request->file('photo'))->height();

                $originalSource = $photo->sources()->create([
                    'path' => $originalPath,
                    'url' => Storage::url($originalPath),
                    'size' => Storage::size($originalPath),
                    'width' => $originalWidth,
                    'height' => $originalHeight,
                ]);

                $thumbnailImage = Image::make(Storage::get($originalSource->path))->fit(350, 233, function($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode($ext, 50);

                $thumbnailPath = 'photos/'.$photo->album_id.'/thumbnails/'.$filename;
                Storage::put($thumbnailPath, $thumbnailImage);
                $photo->thumbnail_path = $thumbnailPath;
                $photo->thumbnail_url = Storage::url($thumbnailPath);
                $photo->save();

                for($i = 2; $i <= 6; $i++) {
                    $width = (int) round($originalSource->width / $i);
                    $height = (int) round($originalSource->height / $i);

                    $img = Image::make(Storage::get($originalSource->path))->fit($width, $height, function($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->encode($ext);
                }
            }
        }
        catch(ValidationException $e) {
            db::Rollback();
            dd($e->getErrors());
        }

        DB::commit();

        $success = 'Photo enregistrée';
        $redirect = route('photos.create', [$album->slug]);
        return redirect($redirect)->withSuccess($success);
    }
}
