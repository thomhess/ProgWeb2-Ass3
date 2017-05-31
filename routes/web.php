<?php

Route::get('/', 'PostController@index');

Route::get('/posts/{post}', 'PostController@show');

Auth::routes();

Route::post('/posts', 'PostController@store')->name('posts');

Route::delete('/posts', 'PostController@delete');



//// Logged in ////

Route::get('/home', 'HomeController@index')->name('home');

// Messages

Route::get('/home/messages', 'MessageController@index')->name('messages');

Route::get('/home/messages/newmessage', 'MessageController@create')->name('createMessage');

Route::post('/messages', 'MessageController@store');

// Posts

Route::get('/home/newpost', 'PostController@create')->name('create');

Route::get('/home/myposts', 'PostController@personal')->name('myposts');



//// API's ////

Route::get('/api/posts', 'PostController@postAPI');

Route::get('/api/posts/{id}', 'PostController@postAPIid');

Route::get('/api/posts/cat/{catId}', 'PostController@postAPIcat');

Route::get('/api/posts/user/{userID}', 'PostController@postAPIuser');

Route::get('/api/messages/from/{user}', 'MessageController@messageAPIfrom');

Route::get('/api/messages/to/{user}', 'MessageController@messageAPIto');

Route::get('/api/users/{id}', 'HomeController@userAPI');
