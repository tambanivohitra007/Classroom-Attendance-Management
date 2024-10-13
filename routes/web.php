<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\StudentController;

use App\Http\Controllers\TeachersController;

use App\Http\Controllers\SemestersController;

use App\Http\Controllers\CoursesController;

use App\Http\Controllers\ClassroomsController;

use App\Http\Controllers\RoleController;

use App\Http\Controllers\PermissionsController;

use App\Http\Controllers\UserController;

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

route::post('/dashboard/addteacher', [TeachersController::class, 'addteacher'])->name('addteacher');
route::post('/dashboard/editteacher/{teacher_id}', [TeachersController::class, 'updateteacher'])->name('updateteacher');
route::get('/dashboard/deleteteacher/{teacher_id}', [TeachersController::class, 'deleteteacher'])->name('deleteteacher');

route::post('/dashboard/addsemester', [SemestersController::class, 'addsemester'])->name('addsemester');
route::post('/dashboard/editsemester/{semester_id}', [SemestersController::class, 'updatesemester'])->name('updatesemester');
route::get('/dashboard/deletesemester/{semester_id}', [SemestersController::class, 'deletesemester'])->name('deletesemester');

route::post('/dashboard/addcourse', [CoursesController::class, 'addcourse'])->name('addcourse');
route::post('/dashboard/editcourse/{course_id}', [CoursesController::class, 'updatecourse'])->name('updatecourse');
route::get('/dashboard/deletecourse/{course_id}', [CoursesController::class, 'deletecourse'])->name('deletecourse');
Route::put('/admin/courses/{course_id}', [CoursesController::class, 'updatecourse'])->name('updatecourse');


route::get('/dashboard/roles', [RoleController::class, 'list'])->name('listrolesandpermissions');
route::post('/dashboard/roles', [RoleController::class, 'add'])->name('addrole');
route::post('/dashboard/roles/{role_id}', [RoleController::class, 'updaterole'])->name('updaterole');
route::get('/dashboard/roles/{role_id}', [RoleController::class, 'deleterole'])->name('deleterole');

route::get('/dashboard/users', [UserController::class, 'list'])->name('listusers');
route::post('/dashboard/adduser', [UserController::class, 'adduser'])->name('adduser');
route::post('/dashboard/edituser/{id}', [UserController::class, 'updateuser'])->name('updateuser');
route::get('/dashboard/deleteuser/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');
