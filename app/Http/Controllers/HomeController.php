<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Photo, User
};
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
        //Cache::flush();
        $user = auth()->user();
        //Auth::logout();
        //Auth::login(User::first());
        //Photo::latest()->first()->replicate()->save();
        //$photo = Photo::find(31);
        //$photo->title = 'Super Titre';
        //$photo->save();
        //$photo->delete();
        $currentPage = request()->query('page', 1);
        //dd($currentPage);
        $photos = Cache::RememberForever('photos_'.$currentPage, function() {
            return Photo::with('album.user')->orderbyDesc('created_at')->paginate();
        });
        /*$photo = Photo::with('album.user')
            //->withoutGlobalScope('active')
            ->orderbyDesc('created_at')->paginate();*/
        //dd($photo);

        $data = [
            'title' => $title = 'Photos libres de droit - '.config('app.name'),
            'description' => 'Application web de '.$title.' : '.config('app.name'),
            'heading' => config('app.name'),
            'photos' => $photos,
            'user' => $user,
        ];

        return view('home.index', $data);
    }
}
