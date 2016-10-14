<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*****************************************************************************
 * Rutas de los controladores dentro del Namespace App\Http\Controllers\Admin*
 *																			 *
 * IMPORTANTE: Si no las tuviera agrupadas estarían afuera de la siguiente	 *
 * manera :  Route::get('admin', 'Admin\HomeController@index');				 *
 *****************************************************************************/
Route::group(['namespace' => 'Admin'], function(){

	Route::get('admin', 'HomeController@index');
	Route::get('admin/test', 'TestController@index');
	
	// Rutas de autenticación(Laravel)...
	Route::get('login', 'Auth\AuthController@showLoginForm');
	Route::post('login', 'Auth\AuthController@login');
	Route::get('logout', 'Auth\AuthController@logout');

	// Rutas de registro(Laravel)...
	Route::get('register', 'Auth\AuthController@showRegistrationForm');
	Route::post('register', 'Auth\AuthController@register');

	// Rutas de reseteo de contraseñas(Laravel)...
	Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'Auth\PasswordController@reset');
	
	// Rutas para gestión de usuarios a través del administrador(mantenedor)...
	Route::get('admin/users', 'UserController@usersList');
	Route::get('admin/users/edit', 'UserController@userForm');
	Route::post('admin/users/store', 'UserController@userStore');
	Route::get('admin/users/view/{id}', 'UserController@userView');
	Route::get('admin/users/edit/{id}', 'UserController@userForm');
	Route::get('admin/users/delete/{id}', 'UserController@userDelete');

	// Rutas para gestión de perfiles
	Route::get('admin/profiles','ProfileController@profilesList');
});

/****************************************
 * Bloque de rutas de la página cliente.*
 ****************************************/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index');


// Este es el envio de mensaje por el servicio de mailgun y a traves del formulario de contacto desde el cliente
Route::get('contact', ['as' => 'contact', 'uses' => 'MailController@index'] );
Route::post('send', ['as' => 'send', 'uses' => 'MailController@send'] );


// Este es un mensaje de prueba desde mailtrap.io desde el admin
Route::get('admin/enviar', ['as' => 'enviar', function(){
	$data = ['link' => 'http://styde.net'];

	\Mail::send('admin.emails.notification', $data, function($message){
		$message->from('email@styde.net', 'Styde.Net');
		$message->to('user@example.com')->subject('Notificacion');
	});

	return 'Se envio el email';
}]);

