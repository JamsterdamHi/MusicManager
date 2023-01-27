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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('playlist')->middleware(['auth'])->group(function(){
    Route::get('/{id}', [App\Http\Controllers\PlaylistController::class, 'show'])->name('playlist.show');
    Route::post('/{id}/write', [App\Http\Controllers\PlaylistController::class, 'write'])->name('playlist.write');
    Route::post('/store', [App\Http\Controllers\PlaylistController::class, 'store'])->name('playlist.store');
    Route::get('/{id}/edit', [App\Http\Controllers\PlaylistController::class, 'edit'])->name('playlist.edit');
    Route::post('/{id}/destroy', [App\Http\Controllers\playlistController::class,'destroy'])->name('playlist.destroy');
});


Route::prefix('songs')->middleware(['auth'])->name('songs.')->group(function () {
    Route::get('/', [App\Http\Controllers\SongController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\SongController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\SongController::class, 'store'])->name('store');
    Route::post('/add_songs', [App\Http\Controllers\SongController::class, 'add_songs'])->name('add_songs');

    Route::get('/{id}/edit', [App\Http\Controllers\SongController::class, 'edit'])->name('edit');
    Route::post('/{id}', [App\Http\Controllers\SongController::class, 'update'])->name('update');
    Route::post('/{id}/destroy', [App\Http\Controllers\SongController::class,'destroy'])->name('destroy');


    // need to login
    // Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    // Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});
