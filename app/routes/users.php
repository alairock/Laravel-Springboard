<?php
// Login/Registration
Route::get('login', 'UserController@login');
Route::post('user/login', 'UserController@do_login');
Route::get('logout', 'UserController@logout');
Route::get('register', 'UserController@create');
Route::get('user/confirm/{code}', 'UserController@confirm');
Route::get('user/forgot_password', 'UserController@forgot_password');
Route::post('user/forgot_password', 'UserController@do_forgot_password');
Route::get('user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password', 'UserController@do_reset_password');
Route::get('admin/switch_user/{id}', 'UserController@switch_user');
Route::get('switch_back', 'UserController@switch_back');

Route::get('admin/users', 'UserController@index');
Route::get('admin/users/edit/{id}', 'UserController@edit');
Route::post('admin/users/edit/{id}', 'UserController@edit');
Route::get('admin/users/attach_role/{id}', 'UserController@attach_role');
Route::post('admin/users/attach_role/{id}', 'UserController@attach_role');
Route::get('admin/users/revoke_role/{user_id}/{role_id}', 'UserController@revoke_role');

// Users
Route::post('user', 'UserController@store');
