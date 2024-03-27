<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ControllerClassSubject;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'AuthLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('/forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);


Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'save']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);


    //student
    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'insert']);


    //class url
    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'insert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'save']);
    Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);

    //subject url
    Route::get('admin/subject/list', [SubjectController::class, 'list']);
    Route::get('admin/subject/add', [SubjectController::class, 'add']);
    Route::post('admin/subject/add', [SubjectController::class, 'insert']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'save']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);

    //assign_subject

    Route::get('admin/assign_subject/list', [ControllerClassSubject::class, 'list']);
    Route::get('admin/assign_subject/add', [ControllerClassSubject::class, 'add']);
    Route::post('admin/assign_subject/add', [ControllerClassSubject::class, 'insert']);
    Route::get('admin/assign_subject/edit/{id}', [ControllerClassSubject::class, 'edit']);
    Route::post('admin/assign_subject/edit/{id}', [ControllerClassSubject::class, 'save']);
    Route::get('admin/assign_subject/delete/{id}', [ControllerClassSubject::class, 'delete']);
    Route::get('admin/assign_subject/edit_single/{id}', [ControllerClassSubject::class, 'edit_single']);
    Route::post('admin/assign_subject/edit_single/{id}', [ControllerClassSubject::class, 'save_single']);

    Route::get('admin/change_password', [UserController::class, 'change_password']);
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);


});

Route::group(['middleware' => 'teacher'], function(){
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);
});

Route::group(['middleware' => 'student'], function(){
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']); 

    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);

});

Route::group(['middleware' => 'parent'], function(){
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);  

    Route::get('parent/change_password', [UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password']);
});