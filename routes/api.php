<?php

use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

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

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/post/{id}', [PostsController::class, 'show']);
Route::get('/slug/post/{slug}', [PostsController::class, 'showSlug']);

Route::post('/post', [PostsController::class, 'store'])->middleware('auth:api');

Route::patch('/post/{id}', [PostsController::class, 'update'])->middleware('auth:api');

Route::delete('/post/{id}', [PostsController::class, 'destroy'])->middleware('auth:api');
