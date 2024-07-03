<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\StudentController;

use App\Http\Controllers\CoursesController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// route::get('/home', [HomeController::class, 'index']);
route::get('/dashboard', [StudentController::class, 'index']);
route::get('/dashboard', [CoursesController::class, 'courses']);
route::get('/students', [StudentController::class, 'students']);
