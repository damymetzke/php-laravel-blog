<?php

use App\Http\Controllers\WebPostsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [WebPostsController::class, 'indexRoot']);
Route::get('/posts', [WebPostsController::class, 'indexPosts']);
Route::get('/post/{slugOrId}', [WebPostsController::class, 'showWeb']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [WebPostsController::class, 'indexAdmin'])->middleware('auth:web');
    Route::get('/post/{id}/edit', [WebPostsController::class, 'edit'])->middleware('auth:web');
    Route::get('/create', [WebPostsController::class, 'create'])->middleware('auth:web');

    Route::patch('/post/{id}', [WebPostsController::class, 'updateWeb'])->middleware('auth:web');
    Route::delete('/post/{id}', [WebPostsController::class, 'destroyWeb'])->middleware('auth:web');
    Route::post('/post', [WebPostsController::class, 'storeWeb'])->middleware('auth:web');

    Auth::routes(['register' => false]);
});
