<?php

use Illuminate\Support\Facades\Route;

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


//auth for both
Route::group(['middleware'=>['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/', function () {
        return view('dashboard');
    });
});


//auth for user
Route::group(['middleware'=>['auth','role:student']], function () {
    Route::get('/dashboard/Student', 'App\Http\Controllers\DashboardController@Studentprofile')->name('dashboard.Studentprofile');
});

//auth for teacher
Route::group(['middleware'=>['auth','role:teacher']], function () {
    Route::get('/dashboard/Teacher', 'App\Http\Controllers\DashboardController@Teacherprofile')->name('dashboard.Teacherprofile');
    Route::get('/dashboard/ManageTest', 'App\Http\Controllers\DashboardController@ManageTest')->name('dashboard.managetest');
});

//auth for admin
Route::group(['middleware'=>['auth','role:admin']], function () {
    Route::get('/dashboard/ManageUser', 'App\Http\Controllers\AdminController@index')->name('dashboard.ManageUser');
    Route::resource('admin', 'AdminController');
    /* Route::resource('permission', 'PermissionController');
    Route::resource('roles', 'RolesController'); */
});



require __DIR__.'/auth.php';
