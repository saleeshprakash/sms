<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class,'index'])->name('login.check');
Route::post('/', [LoginController::class,'loginCheck'])->name('login.check');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/students', [StudentController::class,'index'])->name('students');
    Route::post('/student/register', [StudentController::class,'register'])->name('student.register');
    Route::post('/student/delete', [StudentController::class,'delete'])->name('student.delete');
    Route::get('/student/details', [StudentController::class,'details'])->name('student.details');
    Route::post('/student/update', [StudentController::class,'update'])->name('student.update');
});