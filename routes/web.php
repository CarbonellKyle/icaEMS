<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserBorrowController;
use App\Http\Controllers\SystemUserController;
use App\Http\Controllers\EquipmentController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/user', 'UserController@index')->name('user');
Route::resource('admin', 'AdminController');


Route::resource('equipment', 'EquipmentController');


Route::group(['middleware'=>['role:superadministrator']], function(){
    Route::get('/Home', 'SummaryController@container')->name('summary.container');
    Route::get('/summary', 'SummaryController@index')->name('summary.index');
    Route::get('/Error', 'SummaryController@getError')->name('summary.errors');
    Route::get('/summary/index/details/{id}/{name}', 'SummaryController@getDetails')->name('summary.index.details');
    Route::get('/summary/data/details/{id}/{month}/{year}', 'SummaryController@getDataDetails')->name('summary.data');
    Route::post('/summary/reports', 'SummaryController@getReports')->name('summary.reports');

    // route for system users
    Route::get('/system/users',[SystemUserController::class ,'getSystemUser'])->name('system.user');
    Route::post('/system/user',[SystemUserController::class ,'searchUser'])->name('search.user');
    Route::get('/system/users/delete/{id}/{name}',[SystemUserController::class ,'removeSystemUser'])->name('user.delete');
    Route::get('/system/users/details/{name}',[SystemUserController::class ,'getSystemUserDetails'])->name('system.user.details');
    Route::get('system/user/views/borrow-report/{id}/{name}',[SystemUserController::class ,'getSystemUserDetailsReport'])->name('system.user.details.report');
    // ROUTE FOR EQUIPMENTS
    Route::post('/add/equipment',[EquipmentController::class ,'addEquipment'])->name('equipment.add');
    Route::get('/update/equipment/{id}',[EquipmentController::class ,'updateEquipment'])->name('equipment.edit');
    Route::post('/update/equipment/submit/{id}',[EquipmentController::class ,'submitUpdate'])->name('equipment.update');
    Route::get('/Remove/equipment/{id}/{name}',[EquipmentController::class ,'removeEquipments'])->name('equipment.remove');
});

// route for borrow
Route::get('/User/borrow', [UserBorrowController::class, 'indexBorrow'])->name('borrow');
Route::get('/Error', [UserBorrowController::class, 'errorHandler'])->name('history.error');
Route::get('/User/borrow/history', [UserBorrowController::class, 'borrowHistory'])->name('borrow.history');
Route::get('/User/borrow/history/details/{id}', [UserBorrowController::class, 'borrowHistoryDetails'])->name('borrow.history.details');
Route::post('/User/borrow/submit', [UserBorrowController::class, 'borrowSubmit'])->name('borrow.submit');