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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [PostsController::class, 'index']);

Route::get('/posts/index', [PostsController::class, 'index']);

Route::get('/posts/create', [PostsController::class, 'createForm']);
Route::post('/posts/create', [PostsController::class, 'create']);
