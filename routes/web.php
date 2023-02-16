<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::redirect('/', '/posts/index');

Route::get('/posts/index', [PostsController::class, 'index']);

Route::get('/posts/view/{post_id}', [PostsController::class, 'view']);

Route::get('/posts/update/{post_id}', [PostsController::class, 'updateForm']);
Route::post('/posts/update/{post_id}', [PostsController::class, 'update']);

Route::get('/posts/create', [PostsController::class, 'createForm']);
Route::post('/posts/create', [PostsController::class, 'create']);

Route::post('/posts/delete', [PostsController::class, 'delete']);

Route::get('/comments/update/{comment_id}', [CommentsController::class, 'updateForm']);
Route::post('/comments/update/{comment_id}', [CommentsController::class, 'update']);

Route::get('/comments/add_for/{post_id}', [CommentsController::class, 'addForm']);
Route::post('/comments/add_for/{post_id}', [CommentsController::class, 'add']);

Route::post('/comments/delete', [CommentsController::class, 'delete']);
Route::post('/comments/delete_multiple_from/{post_id}', [CommentsController::class, 'deleteMultipleFrom']);
