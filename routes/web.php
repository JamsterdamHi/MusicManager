<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;

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
Route::get('playlist', [App\Http\Controllers\HomeController::class, 'show'])->name('playlist');

Route::prefix('songs')->middleware(['auth'])->name('songs.')->group(function () {
    Route::get('/', [App\Http\Controllers\SongController::class, 'index'])->name('songs');
    Route::get('/create', [App\Http\Controllers\SongController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\SongController::class, 'store'])->name('store');

    // need to login
    // Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    // Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});
