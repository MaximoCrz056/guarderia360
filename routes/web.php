<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/indexService', function () {
    return view('services');
});

Route::get('/indexProgram', function () {
    return view('program');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('employees', EmployeeController::class);
Route::resource('family', FamilyController::class);
Route::resource('services', ServiceController::class);
Route::resource('posts', PostController::class);
