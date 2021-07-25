<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostDogController;
use App\Http\Controllers\Api\PostSitterController;
use App\Http\Controllers\Api\UserController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Public routes

Route::post('/register', [UserController::class, "register"])->name('register');
Route::post('/login', [UserController::class, "login"])->name('login');

Route::get('/postdogs', [PostDogController::class, "index"])->name('postdogs');
Route::get('/postsitters', [PostSitterController::class, "index"])->name('postsitters');




//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/users', [UserController::class, "index"])->name('users');
    Route::get('/user/{id}', [UserController::class, "show"])->name('user');
    Route::patch('/users/{id}', [UserController::class, "edit_profile"])->name('edit_profile');
    
    Route::post('/postdogs', [PostDogController::class, "create"])->name('create_postdogs');
    Route::delete('/postdogs/{id}', [PostDogController::class, "destroy"])->name('delete_postdogs');
    Route::patch('/postdogs/{id}', [PostDogController::class, "edit"])->name('update_postdogs');

    Route::post('/postsitters', [PostSitterController::class, "create"])->name('create_postsitters');
    Route::delete('/postsitters/{id}', [PostSitterController::class, "destroy"])->name('delete_postsitters');
    Route::patch('/postsitters/{id}', [PostSitterController::class, "edit"])->name('update_postsitters');
    
    Route::post('/logout', [UserController::class, "logout"])->name('logout');
});


