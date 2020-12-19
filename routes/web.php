<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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


Route::group(['middleware'=>['role:superadministrator']], function(){
    Route::get('/Home', 'SummaryController@container')->name('summary.container');
    Route::get('/summary', 'SummaryController@index')->name('summary.index');
    Route::get('/Error', 'SummaryController@getError')->name('summary.error');
    Route::get('/summary/index/details/{id}', 'SummaryController@getDetails')->name('summary.index.details');
    Route::get('/summary/data/details/{id}/{month}/{year}', 'SummaryController@getDataDetails')->name('summary.data');
    Route::post('/summary/reports', 'SummaryController@getReports')->name('summary.reports');
});
