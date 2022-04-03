<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AlbumController,
    PhotoController,
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
Route::get('photo/{photo}', [PhotoController::class, 'show'])->name('photo.show');
Route::post('download', [PhotoController::class, 'download'])->name('photo.download')->middleware('auth', 'verified');
Route::get('read-all', [PhotoController::class, 'readAll'])->name('notifications.read')->middleware('auth', 'verified');
Route::middleware(['auth', 'verified'])->group(function() {
    // user authentifié et vérifié
    Route::get('photo/create/{album}', [PhotoController::class, 'create'])->name('photo.create');
    Route::post('photo/store/{album}', [PhotoController::class, 'store'])->name('photo.store');
    /*Route::get('user', function() {
        return auth()->user()->email_verified_at->diffForHumans();
    });*/
});
Route::get('vote/{photo}/{vote}/{token}', [PhotoController::class, 'vote'])->name('photo.vote');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
