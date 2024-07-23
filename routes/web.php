<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\StudentController;

use App\Http\Controllers\TeachersController;

use App\Http\Controllers\SemestersController;

use App\Http\Controllers\CoursesController;

use App\Http\Controllers\ClassroomsController;

use App\Http\Controllers\RoleController;

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

route::get('/dashboard', [HomeController::class, 'index']);
route::get('/students', [StudentController::class, 'students']);
route::get('/teachers', [TeachersController::class, 'teachers']);
route::get('/semesters', [SemestersController::class, 'semesters']);
route::get('/courses', [CoursesController::class, 'courses']);
route::get('/classrooms', [ClassroomsController::class, 'classrooms']);

route::post('/dashboard/addstudent', [StudentController::class, 'addstudent'])->name('addstudent');
route::post('/dashboard/editstudent/{student_id}', [StudentController::class, 'updatestudent'])->name('updatestudent');
route::get('/dashboard/deletestudent/{student_id}', [StudentController::class, 'deletestudent'])->name('deletestudent');

route::get('/dashboard/roles', [RoleController::class, 'list'])->name('listroles');
route::post('/dashboard/roles', [RoleController::class, 'add'])->name('addrole');
route::post('/dashboard/roles/{role_id}', [RoleController::class, 'updaterole'])->name('updaterole');
route::get('/dashboard/roles/{role_id}', [RoleController::class, 'deleterole'])->name('deleterole');
