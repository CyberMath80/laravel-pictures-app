<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Services\PhotoService;
use Cache, Str;

class SearchController extends Controller
{
    public function search() {
        $search = request()->query('search', null);
        if(!$search) return back();

        $term = '%'.$search.'%';
        $query = Photo::query()->where('title', 'like', $term)
                               ->orWhereHas('album.user', fn($query) => $query->where('name', 'like', $term))
                               ->orWhereHas('tags', fn($query) => $query->where('name', 'like', $term))
                               ->orWhereHas('album', fn($query) => $query->where('title', 'like', $term)->orWhere('description', 'like', $term))
                               ->orWhereHas('album.categories', fn($query) => $query->where('name', 'like', $term))
                               ->orWhereHas('album.tags', fn($query) => $query->where('name', 'like', $term))
                               ->with('album.user.photos');

        $sort = request()->query('sort', null);
        //$photos = (new PhotoService())->getAll($query, $sort);
        //dd($photos);
        $currentPage = http_build_query(request()->query());
        $photos = Cache::rememberForever('photos_search_'.$search.'_'.$currentPage, fn() =>(new PhotoService())->getAll($query, $sort));

        $data = [
            'title' => $description = 'Résultat de recherche pour le terme '.$search.' - '.config('app.name'),
            'description' => $description,
            'heading' => $photos->count().' '.Str::plural('Photo', $photos->count()).' avec le terme '.$search,
            'photos' => $photos,
            'search' => $search,
        ];

        return view('search.search', $data);
    }
}
