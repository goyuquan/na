<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'PageController@home');
    Route::get('/register', 'UserController@register');
    Route::post('/register', 'UserController@_register');
    Route::get('/login', 'UserController@login');
    Route::post('/login', 'UserController@_login');
    Route::get('/logout', 'UserController@logout');

    Route::get('/admin', 'AdminController@index');


    Route::get('/infos', 'InfoController@index');
    Route::get('/infos/category/{category}', 'InfoController@category');

    Route::get('/admin/users/{id?}', 'AdminuserController@index');
    Route::get('/admin/user/edit/{id}', 'AdminuserController@edit');
    Route::post('/admin/user/update/{id}', 'AdminuserController@update');
    Route::get('/admin/user/delete/{id}', 'AdminuserController@destroy');

    Route::get('/admin/categories', 'CategoryController@index');
    Route::post('/admin/category/create', 'CategoryController@create');
    Route::get('/admin/category/edit/{id}', 'CategoryController@edit');
    Route::post('/admin/category/update/{id}', 'CategoryController@update');
    Route::get('/admin/category/delete/{id}', 'CategoryController@destroy');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/user/index', 'UserCenterController@index');
        Route::get('/user/infos', 'UserCenterController@infos');
        Route::get('/user/info/create_category', 'UserCenterController@create_category');
        Route::get('/user/info/create/category/{id}', 'UserCenterController@create');
        Route::post('/user/info/create', 'UserCenterController@create_save');
        Route::get('/user/info/edit/{id}', 'UserCenterController@edit');
        Route::post('/user/info/update/{id}', 'UserCenterController@update');
        Route::get('/user/info/delete/{id}', 'UserCenterController@destroy');

        Route::get('/admin','AdminController@index');
        Route::post('/admin/thumbnail','AdminController@thumbnail');
        Route::post('/admin/thumbnail2','AdminController@thumbnail2');

        Route::get('/admin/articles/{id?}', 'ArticleController@article_list');
        Route::get('/admin/article/create', 'ArticleController@create');
        Route::post('/admin/article/store', 'ArticleController@store');
        Route::get('/admin/article/{id}/edit', 'ArticleController@edit');
        Route::post('/admin/article/{id}/update', 'ArticleController@update');
        Route::get('/admin/article/{id}/destroy', 'ArticleController@destroy');

        Route::get('/admin/display', 'DisplayController@index');
        Route::post('/admin/display/store', 'DisplayController@store');
        Route::get('/admin/display/banner/{id?}', 'DisplayController@banner');

        Route::get('/admin/album/{id?}/show', 'AlbumController@show');
        Route::get('/admin/album/create', 'AlbumController@create');
        Route::post('/admin/album/store', 'AlbumController@store');
        Route::get('/admin/album/{id}/edit', 'AlbumController@edit');
        Route::post('/admin/album/{id}/update', 'AlbumController@update');
        Route::get('/admin/album/upload/{id?}', 'AlbumController@upload');
        Route::post('/admin/album/upload/uploadstore','AlbumController@uploadstore');
        Route::get('/admin/album/{id}/destroy', 'AlbumController@destroy');
        Route::get('/admin/albums/{id?}', 'AlbumController@index');


        Route::get('/admin/users/', 'UserController@index');
        Route::get('/admin/user/create', 'UserController@create');
        Route::get('/admin/user/{id}/edit', 'UserController@edit');
        Route::post('/admin/user/{id}/update', 'UserController@update');
        Route::post('/admin/user/store', 'UserController@store');
        Route::get('/admin/user/{id}/destroy', 'UserController@destroy');

    });


});
