<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Http\Controllers\EventController;
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



Route::get('/', function () {
    $posts = Post::all();
    return view('dashboard', compact('posts'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::resource('users', UserController::class);
    Route::get('gallery', [UserController::class, 'photos'])->name('photos');
    Route::resource('profiles', ProfileController::class);
    Route::resource('posts', PostController::class);
    Route::get('fullcalendar', [EventController::class, 'index'])->name('fullcalendar');
    Route::post('fullcalenderAjax', [EventController::class, 'ajax']);
});
Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class)->except(['create', 'update', 'edit', 'destroy']);
    Route::resource('posts', PostController::class)->except(['create', 'update', 'edit', 'destroy']);
    Route::resource('profiles', ProfileController::class);
    Route::get('gallery', [UserController::class, 'photos'])->name('photos');
    Route::get('fullcalendar', [EventController::class, 'index'])->name('fullcalendar');
    Route::post('fullcalenderAjax', [EventController::class, 'ajax']);
});


