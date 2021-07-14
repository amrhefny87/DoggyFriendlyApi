<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostDogController;
use App\Http\Controllers\Api\PostSitterController;



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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/postdogs', [PostDogController::class, "index"]);
Route::post('/postdogs', [PostDogController::class, "create"]);
Route::delete('/postdogs/{id}', [PostDogController::class, "destroy"]);
Route::patch('/postdogs/{id}', [PostDogController::class, "edit"]);

Route::get('/postsitters', [PostSitterController::class, "index"]);
Route::post('/postsitters', [PostSitterController::class, "create"]);
Route::delete('/postsitters/{id}', [PostSitterController::class, "destroy"]);
Route::patch('/postsitters/{id}', [PostSitterController::class, "edit"]);



