<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\ParentController;
use App\Http\Controllers\Api\ClassController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\DashboardController;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/register-parent', [AuthController::class, 'registerParent']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::post('/students', [StudentController::class, 'store']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);
Route::get('/students/class/{id}', [StudentController::class, 'studentsByClass']);

Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/teachers/{id}', [TeacherController::class, 'show']);
Route::post('/teachers', [TeacherController::class, 'store']);
Route::put('/teachers/{id}', [TeacherController::class, 'update']);
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy']);

Route::get('/parents', [ParentController::class, 'index']);
Route::get('/parents/{id}', [ParentController::class, 'show']);
Route::put('/parents/{id}', [ParentController::class, 'update']);
Route::get('/parents/{id}/children', [ParentController::class, 'children']);

Route::get('/classes', [ClassController::class, 'index']);
Route::post('/classes', [ClassController::class, 'store']);
Route::put('/classes/{id}', [ClassController::class, 'update']);
Route::delete('/classes/{id}', [ClassController::class, 'destroy']);
Route::get('/classes/{id}/students', [ClassController::class, 'students']);

Route::post('/attendance/start', [AttendanceController::class, 'startSession']);
Route::post('/attendance/submit', [AttendanceController::class, 'submitAttendance']);
Route::get('/attendance/session/{id}', [AttendanceController::class, 'session']);
Route::get('/attendance/student/{id}', [AttendanceController::class, 'studentAttendance']);
Route::get('/attendance/report', [AttendanceController::class, 'report']);

Route::get('/dashboard/admin', [DashboardController::class, 'admin']);
Route::get('/dashboard/teacher', [DashboardController::class, 'teacher']);
Route::get('/dashboard/parent', [DashboardController::class, 'parent']);
Route::get('/dashboard/attendance', [DashboardController::class, 'attendanceStats']);
Route::get('/dashboard/students', [DashboardController::class, 'studentCount']);

Route::get('/test', function () {
    return response()->json([
        'message' => 'API OK'
    ]);
});