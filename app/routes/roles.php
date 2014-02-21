<?php
// Roles


//Admin
Route::get('admin/roles', 'RolesController@index');
Route::get('admin/roles/create', 'RolesController@create');
Route::get('admin/roles/delete/{id}', 'RolesController@destroy');
Route::get('admin/roles/attach_permission/{id}', 'RolesController@attach_permission');
Route::post('admin/roles/attach_permission/{id}', 'RolesController@attach_permission');
Route::get('admin/roles/revoke_permission/{role_id}/{permission_id}', 'RolesController@revoke_permission');
Route::post('admin/roles/store', 'RolesController@store');
