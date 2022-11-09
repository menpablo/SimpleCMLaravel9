<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\VideoPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('posts')->group(function () {
    Route::get('{post}/comments', [BlogPostController::class, 'listComments']);
    Route::post('{post}/comments', [BlogPostController::class, 'addComment']);
});
Route::resource('posts', BlogPostController::class);

Route::prefix('videos')->group(function () {
    Route::get('{video}/comments', [VideoPostController::class, 'listComments']);
    Route::post('{video}/comments', [VideoPostController::class, 'addComment']);
});
Route::resource('videos', VideoPostController::class);
