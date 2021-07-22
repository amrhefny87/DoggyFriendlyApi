<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home');

Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('create');

Route::post('/create', [App\Http\Controllers\PostController::class, 'store'])->name('store');

Route::get('/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('delete');

Route::get('/users', [UserController::class, "index"]);
Route::get('/user/{id}', [UserController::class, "show"]);

