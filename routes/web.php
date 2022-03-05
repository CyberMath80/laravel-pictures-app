<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AlbumController,
    HomeController
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('test', function() {
    return 'test';
})->middleware(['auth', 'verified']);
*/

Route::get('/', HomeController::class)->name('home');

Route::resource('albums', AlbumController::class);
Route::middleware(['auth', 'verified'])->group(function() {
    // user authentifié et vérifié
    /*Route::get('user', function() {
        return auth()->user()->email_verified_at->diffForHumans();
    });*/
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
