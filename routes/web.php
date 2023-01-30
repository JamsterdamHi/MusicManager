<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaylistController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('home', [HomeController::class, 'index'])->name('home');

Route::prefix('playlist')->middleware(['auth'])->group(function(){
    Route::get('/{id}', [PlaylistController::class, 'show'])->name('playlist.show');
    Route::post('/{id}/write', [PlaylistController::class, 'write'])->name('playlist.write');
    Route::post('/store', [PlaylistController::class, 'store'])->name('playlist.store');
    Route::get('/{id}/edit', [PlaylistController::class, 'edit'])->name('playlist.edit');
    Route::post('/{id}/destroy', [playlistController::class,'destroy'])->name('playlist.destroy');
});


Route::prefix('songs')->middleware(['auth'])->name('songs.')->group(function () {
    Route::get('/', [SongController::class, 'index'])->name('index');
    Route::get('/create', [SongController::class, 'create'])->name('create');
    Route::post('/store', [SongController::class, 'store'])->name('store');
    Route::post('/add_songs', [SongController::class, 'add_songs'])->name('add_songs');
    Route::post('/remove_song', [SongController::class, 'remove_song'])->name('remove_song');

    Route::get('/{id}/edit', [SongController::class, 'edit'])->name('edit');
    Route::post('/{id}', [SongController::class, 'update'])->name('update');
    Route::post('/{id}/destroy', [SongController::class,'destroy'])->name('destroy');


    // need to login
    // Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    // Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});
