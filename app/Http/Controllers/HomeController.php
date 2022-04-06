<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Photo, User
};

use App\Services\PhotoService;
use Cache, Auth;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Request $request)
    {
        $sort = request()->query('sort', null);
        $query = Photo::query()->with('album.user.photos');

        $currentPage = http_build_query(request()->query());
        $photo = Cache::rememberForever('photos_'.$currentPage, fn() => (new PhotoService())->getAll($query, $sort));

        $data = [
            'title' => $title = 'Photos libres de droit - '.config('app.name'),
            'description' => 'Application web de '.$title.' : '.config('app.name'),
            'heading' => config('app.name'),
            'photos' => $photo,
        ];

        return view('home.index', $data);
    }
}
