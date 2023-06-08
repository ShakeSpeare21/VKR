<?php
use App\Http\Controllers;

use App\Http\Controllers\MusicController;
use App\Models\Music;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoritesController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/music', [MusicController::class, 'fetch'])->name('music');
Route::post('/insert_music', [MusicController::class, 'insert'])->name('insert.file');
Route::post('/music', [MusicController::class, 'insert'])->name('insert.file');

// Route::get('/music', [CommentController::class, 'display'])->name('comment');
Route::post('/insert_comment', [CommentController::class, 'insert'])->name('insert.comment');
Route::post('/insert_favorite', [FavoriteController::class, 'favorites'])->name('favorite');

// Route::get('/dashboard', [MusicController::class, 'create']);
// Route::post('/upload_music', [MusicController::class, 'store'])->name('insert.file');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/favorites', [FavoritesController::class, 'fetch'])->name('favorites');



// Route::get('/upload', function () {
//     return view('upload');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


