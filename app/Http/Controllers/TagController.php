<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ { Photo, Tag };
use App\Services\PhotoService;
use Cache, Str;

class TagController extends Controller
{
    public function photos(Tag $tag) {
        //dd($tag);
        $tag->load('photos');
        $sort = request()->query('sort', null);
        $query = Photo::query()->whereHas('tags', fn($query) => $query->where('slug', $tag->slug))
                               ->orWhereHas('album.tags', fn($query) => $query->where('slug', $tag->slug))
                               ->with('album.user.photos');
        $currentPage = http_build_query(request()->query());
        $photos = Cache::rememberForever('photos_tag_'.$tag->id.'_'.$currentPage, fn() => (new PhotoService())->getAll($query, $sort));
        //dd($photos);

        $data = [
            'title' => $description = 'Les photos avec le tag '.$tag->name.' - '.config('app.name'),
            'description' => $description,
            'heading' => $photos->count().' '.Str::plural('photo', $photos->count()).' avec le tag '.$tag->name,
            'photos' => $photos,
        ];

        return view('tag.photos', $data);
    }
}
