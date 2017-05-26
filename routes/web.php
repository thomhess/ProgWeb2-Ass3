<?php

Route::get('/', 'PostController@index');

Route::get('/posts/{post}', 'PostController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/newpost', 'PostController@create')->name('create');

Route::get('/home/messages', 'MessageController@index');

Route::get('/home/newmessage', 'MessageController@create')->name('createMessage');

Route::post('/posts', 'PostController@store');

Route::post('/messages', 'MessageController@store');

Route::get('/makeJSON', 'PostController@makeJSON');

Route::get('/makeJSON/{catId}', 'PostController@makeJSON');
