<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CreateController;
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

// 記事一覧（全て）（トップ）
Route::get('/', [PostController::class, 'list']);
// 記事一覧（カテゴリでフィルタリング）
Route::get('categories/{category:slug}', [PostController::class, 'listInCategory']);
// 記事一覧（著者でフィルタリング）
Route::get('authors/{author:username}', [PostController::class, 'listInUser']);

// 記事詳細
Route::get('posts/{post:slug}', [PostController::class, 'read']);

// 記事投稿
Route::get('create', [PostController::class, 'create']);
Route::post('create', [PostController::class, 'publish']);

// 記事編集
Route::get('edit/{post:slug}', [PostController::class, 'edit']);
Route::post('edit/{post:slug}', [PostController::class, 'update']);

// 記事削除
Route::get('delete/{post:slug}', [PostController::class, 'delete']);



// ユーザー認証
// Route::get('register', [UserController::class, 'register']);