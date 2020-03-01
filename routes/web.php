<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/not-enabled', function(){
	return view('errors.disable_account');
});

Route::get('/activate-email/{user}', function (Request $request) {
    // if (!$request->hasValidSignature()) {
    //     abort(401, 'This link is not valid.');
    // }

    $request->user()->update([
        'is_activated' => true
    ]);

    return 'Your account is now activated!';
})->name('activate-email');

Route::group( ['middleware' => ['auth', 'active', 'has_permission']], function() {
	
	Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('edit-profile', 'UserController@editProfile')->name('edit.profile');
    Route::post('update-profile', 'UserController@updateProfile')->name('update.profile');
    Route::resource('users', 'UserController');
    
    Route::resource('roles', 'RoleController');
	
	Route::resource('permissions','PermissionController');
});
