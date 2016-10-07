<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
//Route::admin();

Route::get('/home', 'HomeController@index');
