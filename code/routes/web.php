<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;


Route::get('/', [BlogController::class,'showpost'])->name('home');
Route::get('/addblog',[BlogController::class,'add'])->middleware('auth.check')->name('addblog');

Route::post('/regester',[AuthController::class,'register'])->name('register.handle');
Route::get('/login.show', [AuthController::class, 'showlogin'])->name('showlogin');
Route::get('/signup', [AuthController::class, 'showsignup'])->name('showsignup');
Route::post('',[AuthController::class,'login'])->name('login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::post('/submit.post',[BlogController::class,'postsubmit'])->name('post.submit');
Route::get('/posts/{slug}', [BlogController::class, 'postshow'])->name('posts.show');
Route::post('/posts/{postId}/comments', [BlogController::class, 'storeComment'])->middleware('auth.check')->name('posts.comments.store');
Route::post('/posts/{commentId}/delete', [BlogController::class, 'deleteComment'])->middleware('auth.check')->name('posts.comments.delete');