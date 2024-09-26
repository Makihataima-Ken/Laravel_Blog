<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'homepage']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/post_page',[AdminController::class,'post_page']);
Route::post('/add_post',[AdminController::class,'add_post']);
Route::get('/show_post',[AdminController::class,'show_post']);
Route::get('/delete_post/{id}',[AdminController::class,'delete_post']);
Route::get('/edit_post/{id}',[AdminController::class,'edit_post']);

Route::get('/post_details/{id}',[HomeController::class,'post_details']);
Route::post('/update_post/{id}',[AdminController::class,'update_post']);

Route::get('/create_post',[HomeController::class,'create_post'])->middleware('auth');
Route::post('/user_post',[HomeController::class,'user_post'])->middleware('auth');
Route::get('/my_post',[HomeController::class,'my_post'])->middleware('auth');
Route::get('/user_delete_post/{id}',[HomeController::class,'user_delete_post'])->middleware('auth');
Route::get('/user_edit_post/{id}',[HomeController::class,'user_edit_post'])->middleware('auth');
Route::post('/user_update_post/{id}',[HomeController::class,'user_update_post'])->middleware('auth');

Route::get('/approve_post/{id}',[AdminController::class,'approve_post']);
Route::get('/reject_post/{id}',[AdminController::class,'reject_post']);

