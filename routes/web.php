<?php

Route::get('/', 'PostController@index');

Route::get('/posts/{post}', 'PostController@show');

Auth::routes();

Route::post('/posts', 'PostController@store')->name('posts');


//// Logged in ////

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/newpost', 'PostController@create')->name('create');

// Messages

Route::get('/home/messages', 'MessageController@index')->name('messages');

Route::get('/home/messages/newmessage', 'MessageController@create')->name('createMessage');

Route::post('/messages', 'MessageController@store');


//// API's ////

Route::get('/api/posts', 'PostController@postAPI');

Route::get('/api/posts/{catId}', 'PostController@postAPIcat');

Route::get('/api/messages/from/{user}', 'MessageController@messageAPIfrom');

Route::get('/api/messages/to/{user}', 'MessageController@messageAPIto');

Route::get('/api/users/{id}', 'HomeController@userAPI');
