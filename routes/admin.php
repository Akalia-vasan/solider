<?php
// Auth::guard('admin');


Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('admin.login');
Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::group(['prefix' => 'product'], function ($route) {
        $route->get('/','ProductController@index')->name('product.index');
        $route->get('/create','ProductController@create')->name('product.create');
        $route->post('/create','ProductController@store')->name('product.store');

        Route::group(['prefix' => '{product}'], function ($route) {
            $route->get('/edit','ProductController@edit')->name('product.edit');
            $route->get('/delete','ProductController@delete')->name('product.delete');
            $route->get('/active','ProductController@status')->name('product.status');
            $route->post('/active','ProductController@disable')->name('product.disable');
        });
    });
});
