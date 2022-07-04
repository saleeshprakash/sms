<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class,'index'])->name('login.check');
Route::post('/', [LoginController::class,'loginCheck'])->name('login.check');