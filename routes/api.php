<?php

// Product Routes
Route::any('add', 'ProductController@add');
Route::any('update', 'ProductController@update');
Route::any('delete', 'ProductController@delete');
Route::any('show', 'ProductController@show');


// User

Route::any('register', 'userController@register');
Route::any('login', 'userController@login');

