<?php

Route::group(['middleware' => ['web']], function () {

    Route::auth();

    Route::get('/', 'PageController@homepage');

    Route::get('/loginm','UserController@loginm');
    Route::post('/loginm_post','UserController@loginm_post');

    Route::get('/price', 'PageController@price');
    Route::get('/albums/{id?}', 'AlbumController@albums');
    Route::get('/videoss/{id?}', 'VideoController@videos');
    Route::get('/album/{id?}', 'AlbumController@album');

    Route::group(['middleware' => ['auth','member']], function () {
        Route::post('/album/img', 'AlbumController@img');
        Route::get('/album/{album?}/page/{page?}', 'AlbumController@page');
        Route::get('/videoss/page/{id?}', 'VideoController@page');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/pay/{price}','PageController@pay');
    });

    Route::group(['middleware' => ['auth','authuser']], function () {

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

        Route::get('/admin/video/create', 'VideoController@create');
        Route::post('/admin/video/store', 'VideoController@store');
        Route::get('/admin/video/{id}/edit', 'VideoController@edit');
        Route::post('/admin/video/{id}/update', 'VideoController@update');
        Route::post('/admin/video/upload/uploadstore','VideoController@uploadstore');
        Route::get('/admin/video/{id}/destroy', 'VideoController@destroy');
        Route::get('/admin/videos/{id?}/', 'VideoController@index');

        Route::get('/admin/users/', 'UserController@index');
        Route::get('/admin/user/create', 'UserController@create');
        Route::get('/admin/user/{id}/edit', 'UserController@edit');
        Route::post('/admin/user/{id}/update', 'UserController@update');
        Route::post('/admin/user/store', 'UserController@store');
        Route::get('/admin/user/{id}/destroy', 'UserController@destroy');

        Route::post('/admin/mobile/search', 'UserController@mobile_search_post');
        Route::get('/admin/users/mobile/search', 'UserController@mobile_search');
        Route::get('/admin/users/mobile/{id?}', 'UserController@index_mobile');
        Route::get('/admin/user/mobile/{id?}/edit', 'UserController@mobile_edit');
        Route::post('/admin/user/mobile/{id?}/update', 'UserController@mobile_update');
    });


});
