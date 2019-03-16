<?php
Route::get('memberarea/login_admin', ['as' => 'login', 'uses' => 'LoginController@index']);
// Route::get('/memberarea/login_admin','LoginController@index');
Route::get('/memberarea/dashboard','AuthController@getRoot');

Route::post('/postLogin','LoginController@postLogin');
// Route::get('/logout','LogoutController@Logout');

//route super admin
Route::get('/memberarea/home','HomeController@index');
Route::get('/memberarea/workinggroup',function(){return view('workinggroup');});
Route::get('/memberarea/users','ManageAdminController@index');
Route::POST('/memberarea/addPost','ManageAdminController@addPost');
Route::POST('/memberarea/editPost','ManageAdminController@editPost');
Route::POST('/memberarea/deletePost','ManageAdminController@deletePost');

Route::get('user/json', 'ManageAdminController@userdatatb')->name('user/json');
Route::get('role/json', 'RolesController@manageroletb')->name('role/json');

Route::get('/logout','LogoutController@Logout');
//route admin
Route::get('/memberarea/workinggroup/tax','TaxController@showDocument');

Route::get('/memberarea/roles','RolesController@index');
Route::POST('/memberarea/editPostRoles','RolesController@editPost');

Route::post('/memberarea/upload','TaxController@upload');
?>
