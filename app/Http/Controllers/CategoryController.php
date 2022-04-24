<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ { Category, Photo };
use App\Services\PhotoService;
use Cache, Str;

class CategoryController extends Controller
{
    public function photos(Category $category) {
        //dd($category);
        $category->load('albums.photos');
        $sort = request()->query('sort', null);
        $query = Photo::query()->whereHas('album.categories', fn($query) => $query->where('slug', $category->slug))->with('album.user.photos');

        $currentPage = http_build_query(request()->query());
        $photos = Cache::rememberForever('photos_category_'.$category->id.'_'.$currentPage, fn() => (new PhotoService())->getAll($query, $sort));

        $data = [
            'title' => $description = 'Les photos dans la catégorie '.$category->name.' - '.config('app.name'),
            'description' => $description,
            'heading' => $photos->count().' '.Str::plural('photo', $photos->count()).' dans la catégorie '.$category->name,
            'photos' => $photos,
        ];

        return view('category.photos', $data);
    }
}
