<?php
// Roles


//Admin
Route::get('admin/permissions', 'PermissionsController@index');
Route::get('admin/permissions/create', 'PermissionsController@create');
Route::get('admin/permissions/delete/{id}', 'PermissionsController@destroy');

Route::post('admin/permissions/store', 'PermissionsController@store');
