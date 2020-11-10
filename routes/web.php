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
Route::get('/admin', [WebPostsController::class, 'indexAdmin']);
Route::get('/admin/post/{id}/edit', [WebPostsController::class, 'edit']);
Route::get('/admin/create', [WebPostsController::class, 'create']);

Auth::routes();
