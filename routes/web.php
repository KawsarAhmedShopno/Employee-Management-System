<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::group(['middleware' => ['auth', 'has.permission']], function () {
    Route::resource('department', 'App\Http\Controllers\DepartmentController');
    Route::resource('role', 'App\Http\Controllers\RoleController');
    Route::resource('user', 'App\Http\Controllers\UserController');
    Route::resource('permission', 'App\Http\Controllers\PermissionController');
    Route::resource('leave', 'App\Http\Controllers\LeaveController');
    Route::resource('notice', 'App\Http\Controllers\NoticeController');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/mail', 'App\Http\Controllers\MailController@create');
    Route::post('/mail/store', 'App\Http\Controllers\MailController@store')->name('mail.store');
    Route::get('/', function () {
        return view('welcome');
    });
});
