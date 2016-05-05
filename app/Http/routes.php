<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/admin/album/create', 'AlbumController@create');
    Route::post('/admin/album/store', 'AlbumController@store');


    Route::get('/', 'CommonController@home');
    Route::post('/search', 'CommonController@search_push');
    Route::get('/search/{word}', 'CommonController@search');

    Route::get('/register', 'UserController@register');
    Route::get('/login', 'UserController@login');
    Route::post('/register', 'UserController@_register');
    Route::post('/login', 'UserController@_login');
    Route::get('/logout', 'UserController@logout');

    Route::get('/categories', 'InfoController@index');
    Route::get('/info/{id}', 'InfoController@info');
    Route::get('/infos/category/{category}', 'InfoController@category');


    Route::group(['middleware' => 'auth'], function () {

        Route::get('/user/info/create_category', 'UserenterController@create_category');
        Route::get('/user/info/create/category/{id}', 'UserCenterController@create');
        Route::post('/user/info/create', 'UserCenterController@_create');
        Route::post('/user/info/update/{id}', 'UserCenterController@update');
        Route::get('/user/info/delete/{id}', 'UserCenterController@destroy');

        Route::post('/upload/thumbnail', 'CommonController@thumbnail');
        Route::get('/delete/page/{page}/thumbnail/{id}', 'CommonController@thumbnail_');
        Route::post('/upload/photos/{id}', 'CommonController@photos');
        Route::get('/delete/page/{page}/photos/{id}', 'CommonController@photos_');

        Route::group(['middleware' => 'role'], function () {

             Route::get('/admin/pageinfo/{id}', 'PageinfoController@index');
             Route::get('/admin/pageinfo/create/{page}', 'PageinfoController@create');
             Route::post('/admin/pageinfo/create/{page}', 'PageinfoController@_create');
             Route::get('/admin/pageinfo/edit/{page}', 'PageinfoController@edit');
             Route::post('/admin/pageinfo/update/{page}', 'PageinfoController@update');
             Route::get('/admin/pageinfo/delete/{id}', 'PageinfoController@destroy');

             Route::group(['middleware' => 'admin'], function () {

                 Route::get('/admin/users', 'AdminuserController@index');
                 Route::get('/admin/user/edit/{id}', 'AdminuserController@edit');
                 Route::post('/admin/user/update/{id}', 'AdminuserController@update');
                 Route::get('/admin/user/delete/{id}', 'AdminuserController@destroy');
                 Route::get('/admin/categories', 'CategoryController@index');
                 Route::post('/admin/category/create', 'CategoryController@create');
                 Route::get('/admin/category/edit/{id}', 'CategoryController@edit');
                 Route::post('/admin/category/update/{id}', 'CategoryController@update');
                 Route::get('/admin/category/delete/{id}', 'CategoryController@destroy');
                 Route::get('/admin/pages', 'PageController@index');
                 Route::post('/admin/page/create', 'PageController@create');
                 Route::get('/admin/page/edit/{id}', 'PageController@edit');
                 Route::post('/admin/page/update/{id}', 'PageController@update');
                 Route::get('/admin/page/delete/{id}', 'PageController@destroy');

             });
         });
    });
});
