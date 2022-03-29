<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/home',[HomeController::class,'home'])->name('home');
    Route::get('/create',[HomeController::class,'create'])->name('create');
    Route::post('/store',[HomeController::class,'store'])->name('store');
    Route::get('/edit/{id}',[HomeController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[HomeController::class,'update'])->name('update');
    Route::delete('/delete/{id}',[HomeController::class,'destroy'])->name('delete');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::get('/',[AuthController::class,'index'])->name('login');
    Route::get('/register',[AuthController::class,'register'])->name('register');
});

Route::post('user/store',[AuthController::class,'store'])->name('user.store');
Route::post('user/access',[AuthController::class,'access'])->name('access');

