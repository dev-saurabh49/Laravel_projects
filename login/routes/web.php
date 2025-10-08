<?php

use App\Http\Controllers\mycontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup',[mycontroller::class,'signup'])->name('signup');
Route::post('signupcode',[mycontroller::class,'signupcode'])->name('signupcode');
Route::get('/login',[mycontroller::class,'login'])->name('login');
Route::post('logincode',[mycontroller::class,'logincode'])->name('logincode');
Route::get('/dashboard',[mycontroller::class,'dashboard'])->name('dashboard');
Route::get('/changepassword',[mycontroller::class,'changepassword'])->name('changepassword');
Route::post('/changepasswordcode',[mycontroller::class,'changepasswordcode'])->name('changepasswordcode');
Route::get('/logout',[mycontroller::class,'logout'])->name('logout');