<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'Auth_login']);
Route::get('/logout', [AuthController::class, 'Auth_logout']);
Route::get('forgot/password', [AuthController::class, 'forgot_password']);
Route::post('forgot/password', [AuthController::class, 'post_forgot_password']);
Route::get('reset', [AuthController::class, 'reset']);

// Admin Routess
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::put('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);
});
// Students Routes
Route::get('admin/student/list', [StudentController::class, 'list']);
 Route::get('admin/student/add', [StudentController::class, 'add']);
 Route::post('admin/student/add', [StudentController::class, 'insert']);
 Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
 Route::put('admin/student/edit/{id}', [StudentController::class,'update']);
 Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);
// Teacher Routes
Route::get('admin/teacher/list', [TeacherController::class, 'list']);
 Route::get('admin/teacher/add', [TeacherController::class, 'add']);
 Route::post('admin/teacher/add', [TeacherController::class, 'insert']);
 Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
 Route::put('admin/teacher/edit/{id}', [TeacherController::class,'update']);
 Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);
 Route::get('admin/teacher/my-student/{id}', [TeacherController::class, 'myStudent']);
 Route::get('admin/teacher/assign_student_teacher/{student_id}/{teacher_id}', [TeacherController::class, 'assignStudentTeacher']);
 Route::get(' admin/teacher/assign_student_teacher_delete/{student_id}', [TeacherController::class, 'assignStudentTeacherDelete']);

 
//class Routes
Route::get('/admin/class/list', [ClassController::class, 'studentlist']);
Route::get('admin/class/add', [ClassController::class, 'add']);
Route::post('admin/class/add', [ClassController::class, 'insert']);
Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']); 
Route::put('admin/class/edit/{id}', [ClassController::class, 'update']);
Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);

// Change Password
Route::get('admin/change_password', [UserController::class, 'change_password']);
Route::post('admin/change_password', [UserController::class, 'update_change_password']);

// Supervisor routes
Route::group(['middleware' => 'supervisor'], function () {
    Route::get('supervisor/dashboard', [DashboardController::class, 'dashboard']);
});
Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);
});
