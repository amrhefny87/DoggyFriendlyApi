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

Route::post('/register', [UserController::class, "register"]);
Route::post('/login', [UserController::class, "login"]);

Route::get('/postdogs', [PostDogController::class, "index"]);
Route::get('/postsitters', [PostSitterController::class, "index"]);




//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/users', [UserController::class, "index"]);
    Route::get('/user/{id}', [UserController::class, "show"]);
    Route::put('/users/{id}', [UserController::class, "edit_profile"]);
    
    Route::post('/postdogs', [PostDogController::class, "create"]);
    Route::delete('/postdogs/{id}', [PostDogController::class, "destroy"]);
    Route::patch('/postdogs/{id}', [PostDogController::class, "edit"]);

    Route::post('/postsitters', [PostSitterController::class, "create"]);
    Route::delete('/postsitters/{id}', [PostSitterController::class, "destroy"]);
    Route::patch('/postsitters/{id}', [PostSitterController::class, "edit"]);
    
    Route::post('/logout', [UserController::class, "logout"]);
});


