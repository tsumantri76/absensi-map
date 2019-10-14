<?php

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
    if (! Auth::check()) {
    	return view('auth.login');
    } else {
    	return redirect('home');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// SELECT2
Route::group(['prefix' => 'admin'], function() {
    Route::get('roles', 'Select2Controller@roleSelect')->name('admin.select2.roles');
    Route::get('pegawai', 'Select2Controller@pegawaiSelect')->name('admin.select2.pegawai');
});

// DATA MASTER
Route::group(['prefix' => 'admin'], function() {
	// USERS
    Route::get('user', 'UsersController@index')->name('admin.user.index');
    Route::get('user/create', 'UsersController@create')->name('admin.user.create');
    Route::post('user/store', 'UsersController@store')->name('admin.user.store');
    Route::get('user/edit/{id}', 'UsersController@edit')->name('admin.user.edit');
    Route::put('user/update/{id}', 'UsersController@update')->name('admin.user.update');
    Route::delete('user/destroy/{id}', 'UsersController@destroy')->name('admin.user.destroy');
    Route::get('user/password/reset/{id}', 'UsersController@passwordReset')->name('admin.user.passwordReset');
    Route::get('user/allData', 'UsersController@allData')->name('admin.user.allData');

    // ROLES
    Route::get('role', 'RoleController@index')->name('admin.role.index');
    Route::get('role/create', 'RoleController@create')->name('admin.role.create');
    Route::post('role/store', 'RoleController@store')->name('admin.role.store');
    Route::get('role/edit/{id}', 'RoleController@edit')->name('admin.role.edit');
    Route::put('role/update/{id}', 'RoleController@update')->name('admin.role.update');
    Route::delete('role/destroy/{id}', 'RoleController@destroy')->name('admin.role.destroy');
    Route::get('role/allData', 'RoleController@allData')->name('admin.role.allData');

    // MAPS
    Route::get('map', 'MapController@index')->name('admin.map.index');
    Route::get('map/create', 'MapController@create')->name('admin.map.create');
    Route::post('map/store', 'MapController@store')->name('admin.map.store');
    Route::get('map/edit/{id}', 'MapController@edit')->name('admin.map.edit');
    Route::put('map/update/{id}', 'MapController@update')->name('admin.map.update');
    Route::delete('map/destroy/{id}', 'MapController@destroy')->name('admin.map.destroy');
    Route::get('map/allData', 'MapController@allData')->name('admin.map.allData');

    // ABSENSI
    Route::get('absen', 'AbsensiController@index')->name('admin.absen.index');
    Route::get('absen/create', 'AbsensiController@create')->name('admin.absen.create');
    Route::post('absen/store', 'AbsensiController@store')->name('admin.absen.store');
    Route::get('absen/edit/{id}', 'AbsensiController@edit')->name('admin.absen.edit');
    Route::put('absen/update/{id}', 'AbsensiController@update')->name('admin.absen.update');
    Route::delete('absen/destroy/{id}', 'AbsensiController@destroy')->name('admin.absen.destroy');
    Route::get('absen/allData', 'AbsensiController@allData')->name('admin.absen.allData');
});

Route::group(['prefix' => 'admin'], function() {
    // USERS
    Route::get('report', 'ReportController@index')->name('admin.report.index');
    Route::get('report/allData', 'ReportController@allData')->name('admin.report.allData');
});
