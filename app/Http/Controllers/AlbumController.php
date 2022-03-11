<?php

namespace App\Http\Controllers;

use App\Models\{ Album, Category, Tag };
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;
use DB, Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware(['auth', 'verified'])->except('show');
    }

    public function index() { // liste des albums de l'user connecté
        //dd(auth()->user()->name);
        $albums = auth()->user()->albums()->with('photos', fn($query) => $query->withoutGlobalScope('active')->orderByDesc('created_at'))->orderByDesc('updated_at')->paginate();

        //dd($albums);

        $data = [
            'title' => $description = 'Mes albums',
            'description' => $description,
            'albums' => $albums,
            'heading' => $description,
        ];

        return view('album.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $description = $heading = 'Ajouter un nouvel album - '.config('app.name');
        return view('album.create', compact('title', 'description', 'heading'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        DB::beginTransaction();
        try {
            $album = Auth::user()->albums()->create($request->validated());
            //dd($request->categories);
            $categories = explode(',',$request->categories);
            $categories = collect($categories)->filter(function($value, $key){
                return $value != '' && $value != ' ';
            })->all();

            //dd($categories);
            foreach($categories as $cat) {
                $category = Category::firstOrCreate(['name' => ucfirst(trim($cat))]);
                $album->categories()->attach($category->id);
            }

            $tags = explode(',',$request->tags);
            $tags = collect($tags)->filter(function($value, $key){
                return $value != '' && $value != ' ';
            })->all();

            //dd($tags);
            foreach($tags as $t) {
                $tag = Tag::firstOrCreate(['name' => ucfirst(trim($t))]);
                $album->tags()->attach($tag->id);
            }
        }
        catch(ValidationException $e) {
            DB::rollBack();
            dd($e->getErrors());
        }

        DB::commit();

        $redirect = route('photos.create', [$album->slug]);
        $success = 'Album ajouté';
        return $request->ajax() ?
            response()->json(['success' => $success, 'redirect' => $redirect]) :
            redirect($redirect)->withSuccess($success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}
