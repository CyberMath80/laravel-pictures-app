<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Photo
};
use Cache;

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
        $currentPage = request()->query('page', 1);
        //dd($currentPage);
        $photos = Cache::RememberForever('photos_'.$currentPage, function() {
            return Photo::with('album.user')->orderbyDesc('created_at')->paginate();
        });
        /*$photos = Photo::with('album.user')
            //->withoutGlobalScope('active')
            ->orderbyDesc('created_at')->paginate();*/
        //dd($photos);

        $data = [
            'title' => $title = 'Photos libres de droit - '.config('app.name'),
            'description' => 'Application web de '.$title.' : '.config('app.name'),
            'heading' => config('app.name'),
            'photos' => $photos,
        ];

        return view('home.index', $data);
    }
}
