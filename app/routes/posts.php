<?php

// Posts
Route::resource('posts', 'PostsController');


//Admin
Route::get('admin/posts/create', 'PostsController@create');
Route::get('admin/posts', 'PostsController@index');
