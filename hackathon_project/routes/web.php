<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('/projects', ProjectController::class);
Route::resource('/categories', CategoryController::class);

Route::get('/search/{category}', [SearchController::class, 'index']);
Route::get('/search/api/{category}', [SearchController::class, 'search']);

Route::get('/all/projects', [ProjectController::class, 'all']);
Route::get('/all/api/projects', [ProjectController::class, 'all_api']);

Route::get('/join/projects/{id}', [ProjectController::class, 'join'])->name('join_project');
Route::post('/api/join', [ProjectController::class, 'join_post']);

Auth::routes();
