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

// Route::group(['prefix' => 'ui/dashboard/mitra'], function () {
//     Route::view('/', 'ui/dashboard/modules/mitra/index');
//     Route::view('/budidaya', 'ui/dashboard/modules/mitra/budidaya/index');
//     Route::view('/budidaya/create', 'ui/dashboard/modules/mitra/budidaya/create');
//     Route::view('/budidaya/edit', 'ui/dashboard/modules/mitra/budidaya/edit');
//     Route::view('/budidaya/show', 'ui/dashboard/modules/mitra/budidaya/show');
// });

// Route::group(['prefix' => 'ui/dashboard/admin'], function () {
//     Route::view('/', 'ui/dashboard/modules/admin/index');
//     Route::view('/users', 'ui/dashboard/modules/admin/users/index');
//     Route::view('/users/create', 'ui/dashboard/modules/admin/users/create');
//     Route::view('/users/show', 'ui/dashboard/modules/admin/users/show');
//     Route::view('/users/edit', 'ui/dashboard/modules/admin/users/edit');
// });

// Route::group(['prefix' => 'ui'], function () {
//     Route::view('/login', 'ui/auth/login');
//     Route::view('/register', 'ui/auth/register');
//     Route::view('/verify', 'ui/auth/verify');
//     Route::view('/passwords/confirm', 'ui/auth/passwords/confirm');
//     Route::view('/passwords/email', 'ui/auth/passwords/email');
//     Route::view('/passwords/reset', 'ui/auth/passwords/reset');
// });




Auth::routes();

Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'dashboard/admin', 'namespace' => 'Dashboard\Admin', 'as' => 'dashboard.admin.'], function() {
    Route::get('/', 'DashboardController@index')->name('index');
    
    Route::resource('users', 'UserController');

    Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax', 'as' => 'ajax.'], function () {
        Route::get('users', 'AdminController@getUsers')->name('users');
    });
});


Route::group(['middleware' => ['auth', 'role:mitra'], 'prefix' => 'dashboard/mitra', 'namespace' => 'Dashboard\Mitra', 'as' => 'dashboard.mitra.'], function() {
    Route::get('/', 'DashboardController@index')->name('index');
    
    // Modules : budidaya
    Route::delete('budidaya/{maintener}', 'BudidayaController@destroyBudidaya')->name('budidaya.maintener.destroy');
    Route::resource('budidaya', 'BudidayaController');

    // Modules : productions
    Route::resource('productions', 'ProductionController');

    // Ajax
    Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax', 'as' => 'ajax.'], function () {
        Route::get('users/{user?}', 'BudidayaController@getUserById')->name('users.show');
        Route::get('kebutuhans/{kebutuhan?}', 'ProductionController@getKebutuhanTypeById')->name('getKebutuhanTypeById');
    });
});




// Route::get('test', 'Dashboard\Admin\DashboardController@test');

