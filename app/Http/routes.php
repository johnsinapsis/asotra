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

Route::get('/',[
	'uses' => 'MainController@menu',
	'as' => 'main'
	 
	]); 


// Authentication routes...
Route::get('login', [
	'uses' => 'Auth\AuthController@getLogin',
	'as'   => 'login'
	]);
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as'   => 'logout'
]);
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');



Route::group(['middleware' => ['auth']], function () {
	
	Route::get('inciadm',[
		'uses' => 'IncidenteController@index',
		'as' => 'inciadm'
		]); 
	Route::post('inciadm',[
		'uses' => 'IncidenteController@store',
		'as' => 'inciadm'
		]); 

	Route::get('rinciadm',[
		'uses' => 'IncidenteController@link_repor',
		'as' => 'rinciadm'
		]); 

	Route::post('rinciadm',[
		'uses' => 'IncidenteController@list_incidentes',
		'as' => 'rinciadm'
		]); 

	Route::get('resetpass', [
	'uses' => 'AccountController@getPassword',
	'as' => 'resetpass'
	]);

	Route::post('resetpass', [
	'uses' => 'AccountController@postPassword',
	'as' => 'resetpass'
	]);

	//Route::get('account/password', 'AccountController@getPassword');
    //Route::post('account/password', 'AccountController@postPassword');

    /*Route::get('account/edit-profile', 'AccountController@editProfile');
    Route::put('account/edit-profile', 'AccountController@updateProfile');*/

		// Registration routes...
	Route::get('register', [
	'uses' => 'Auth\AuthController@getRegister',
	'as' => 'register'
	]);
		Route::post('register', [
	 'uses' => 'Auth\AuthController@postRegister',
	 'as' => 'register'
	]);

	Route::any('uni/autocomplete', function(){  
	 	// $term = "med";
	 	$term = Input::get('term');
	 	$data = DB::table('c_costo')->select('id','NOMBRE')->where('NOMBRE','LIKE',$term.'%')
	 	->get();
	 	//$result[0] = array('value' => 'Medicadiz', 'id' => '2');
	 	foreach ($data as $v) {
	 		$result[] =  array('value' => $v->NOMBRE, 'id' => $v->id);
	 	}
	 	return Response::json($result);
	 });

	Route::any('cargo/autocomplete', function(){  
	 	// $term = "med";
	 	$term = Input::get('term');
	 	$data = DB::table('nmcargos')->select('id','nomcargo')->where('nomcargo','LIKE',$term.'%')
	 	->get();
	 	//$result[0] = array('value' => 'Medicadiz', 'id' => '2');
	 	foreach ($data as $v) {
	 		$result[] =  array('value' => $v->nomcargo, 'id' => $v->id);
	 	}
	 	return Response::json($result);
	 });

	Route::any('entidad/autocomplete', function(){  
	 	// $term = "med";
	 	$term = Input::get('term');
	 	$data = DB::table('nmentidades')->select('id','nombre')->where('nombre','LIKE',$term.'%')
	 	->get();
	 	//$result[0] = array('value' => 'Medicadiz', 'id' => '2');
	 	foreach ($data as $v) {
	 		$result[] =  array('value' => $v->nombre, 'id' => $v->id);
	 	}
	 	return Response::json($result);
	 });


	
	
	Route::get('calidad-dc',[
		'uses' => 'MenuController@link_dc',
		'as' => 'calidad-dc'
		]); 

	Route::get('areasopor',[
		'uses' => 'AreaSoporController@index',
		'as' => 'areasopor'
		]); 

	Route::post('areasopor',[
		'uses' => 'AreaSoporController@store',
		'as' => 'areasopor'
		]); 

	Route::get('cargo',[
		'uses' => 'CargoController@index',
		'as' => 'cargo'
		]); 

	Route::post('cargo',[
		'uses' => 'CargoController@store',
		'as' => 'cargo'
		]); 
	Route::post('editcargo/{id}',[
		'uses' => 'CargoController@edit',
		'as' => 'editcargo'
		]); 

	Route::post('upcargo',[
		'uses' => 'CargoController@update',
		'as' => 'upcargo'
		]); 

	Route::post('browcargo',[
		'uses' => 'CargoController@browse',
		'as' => 'browcargo'
		]);

	Route::get('entinom',[
		'uses' => 'EntiNominaController@index',
		'as' => 'entinom'
		]); 

	Route::post('entinom',[
		'uses' => 'EntiNominaController@store',
		'as' => 'entinom'
		]); 

	Route::post('editnomenti/{id}',[
		'uses' => 'EntiNominaController@edit',
		'as' => 'editnomenti'
		]); 

	Route::post('upentinom',[
		'uses' => 'EntinominaController@update',
		'as' => 'upentinom'
		]);

	Route::post('brownomenti',[
		'uses' => 'EntiNominaController@browse',
		'as' => 'brownomenti'
		]);


}); 
