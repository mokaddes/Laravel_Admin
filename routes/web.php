<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home', function () {
    return view('home');
})->middleware(['admin'])->name('home');

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::resource('users', UserController::class);
    Route::resource('profiles', ProfileController::class);
});
Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class)->except(['create', 'update', 'edit', 'destroy']);
    Route::resource('profiles', ProfileController::class);
});

