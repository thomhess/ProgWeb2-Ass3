<?php

Route::get('/', 'PostController@index');

Route::get('/posts/{post}', 'PostController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/newpost', 'PostController@create')->name('create');

Route::get('/home/messages', 'MessageController@index')->name('messages');

Route::get('/home/messages/newmessage', 'MessageController@create')->name('createMessage');

Route::post('/posts', 'PostController@store');

Route::post('/messages', 'MessageController@store');

Route::get('/api/posts', 'PostController@postAPI');

Route::get('/api/posts/{catId}', 'PostController@postAPIcat');

Route::get('/api/messages/{user}/from', 'MessageController@messageAPIfrom');
