<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;

Route::get('/',[ArticleController::class, 'home']);
Route::get('/detail/{id}', [ArticleController::class, 'detail']);

Route::get('/addBlog',[AdminController::class, 'addBlog']);
Route::post('/store_blog',[AdminController::class, 'store_blog']);