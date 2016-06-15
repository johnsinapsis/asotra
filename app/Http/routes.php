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
	 	foreach ($data as $v) {
	 		$result[] =  array('value' => $v->nomcargo, 'id' => $v->id);
	 	}
	 	return Response::json($result);
	 });

	Route::any('entidad/autocomplete', function(){  
	 	// $term = "med";
	 	$term = Input::get('term');
	 	$data = DB::table('nmentidades')->select('id','nombre')->where('nombre','LIKE','%'.$term.'%')
	 	->get();
	 	foreach ($data as $v) {
	 		$result[] =  array('value' => $v->nombre, 'id' => $v->id);
	 	}
	 	return Response::json($result);
	 });

	Route::any('prof/autocomplete', function(){  
	 	// $term = "med";
	 	$term = Input::get('term');
	 	$data = DB::table('par_profesion')->select('id','prof_nom')->where('prof_nom','LIKE','%'.$term.'%')
	 	->get();
	 	foreach ($data as $v) {
	 		$result[] =  array('value' => $v->prof_nom, 'id' => $v->id);
	 	}
	 	return Response::json($result);
	 });

	Route::any('ocupa/autocomplete', function(){  
	 	// $term = "med";
	 	$term = Input::get('term');
	 	$data = DB::table('par_ocupacion')->select('id','nombre')->where('nombre','LIKE','%'.$term.'%')
	 	->get();
	 	foreach ($data as $v) {
	 		$result[] =  array('value' => $v->nombre, 'id' => $v->id);
	 	}
	 	return Response::json($result);
	 });

	Route::any('emple/autocomplete', function(){  
	 	// $term = "med";
	 	$term = Input::get('term');
	 	$nombre = DB::raw("CONCAT(nom1_emp,' ',trim(nom2_emp),' ',ape1_emp,' ',trim(ape2_emp)) as nombre");
	 	$data = DB::table('empleados')->select('id',$nombre)->where('nom1_emp','LIKE','%'.$term.'%')->orWhere('nom2_emp','LIKE','%'.$term.'%')->orWhere('ape1_emp','LIKE','%'.$term.'%')->orWhere('ape2_emp','LIKE','%'.$term.'%')
	 	->get();
	 	foreach ($data as $v) {
	 		$result[] =  array('value' => $v->nombre, 'id' => $v->id);
	 	}
	 	return Response::json($result);
	 });

	Route::any('cuadro/autocomplete', function(){  
	 	// $term = "med";
	 	$term = Input::get('term');
	 	$data = DB::table('nmcturnos_cab')->select('id','nomcuadro')->where('nomcuadro','LIKE','%'.$term.'%')
	 	->get();
	 	foreach ($data as $v) {
	 		$result[] =  array('value' => $v->nomcuadro, 'id' => $v->id);
	 	}
	 	return Response::json($result);
	 });

	Route::any('user/autocomplete', function(){  
	 	// $term = "med";
	 	$term = Input::get('term');
	 	$data = DB::table('users')->select('id','name')->where('name','LIKE','%'.$term.'%')
	 	->get();
	 	foreach ($data as $v) {
	 		$result[] =  array('value' => $v->name, 'id' => $v->id);
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

	Route::get('editnomenti/{id}', 'EntiNominaController@edit');

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

	Route::get('salmin',[
		'uses' => 'SalminController@index',
		'as' => 'salmin'
		]); 

	Route::post('salmin',[
		'uses' => 'SalminController@store',
		'as' => 'salmin'
		]); 

	Route::post('editsalmin/{id}',[
		'uses' => 'SalminController@edit',
		'as' => 'editsalmin'
		]); 

	Route::post('upsalmin',[
		'uses' => 'SalminController@update',
		'as' => 'upsalmin'
		]); 

	Route::get('emple',[
		'uses' => 'EmpleadoController@index',
		'as' => 'emple'
		]); 

	Route::post('emple',[
		'uses' => 'EmpleadoController@store',
		'as' => 'emple'
		]); 

	Route::post('editemple/{id}',[
		'uses' => 'EmpleadoController@edit',
		'as' => 'editemple'
		]); 

	Route::post('upemple/{id}',[
		'uses' => 'EmpleadoController@update',
		'as' => 'upemple'
		]);

	Route::any('depto','UbiController@list_depto');
	
	
	Route::any('ciudad','UbiController@list_ciudad');

	Route::post('browemple',[
		'uses' => 'EmpleadoController@browse',
		'as' => 'browemple'
		]);

	Route::get('listemple',[
		'uses' => 'EmpleadoController@index2',
		'as' => 'listemple'
		]);

	Route::get('cturno',[
		'uses' => 'CturnoController@index',
		'as' => 'cturno'
		]); 

	Route::post('cturno',[
		'uses' => 'CturnoController@store',
		'as' => 'cturno'
		]); 

	Route::post('browcuadro',[
		'uses' => 'CturnoController@browse',
		'as' => 'browcuadro'
		]);

	Route::get('editcturno/{id}', 'CturnoController@edit');

	Route::post('editcturno/{id}',[
		'uses' => 'CturnoController@edit',
		'as' => 'editcturno'
		]); 

	Route::post('upcturno/{id}',[
		'uses' => 'CturnoController@update',
		'as' => 'upcturno'
		]);

/*************************Roles en los cuadros de turno**************************************/	
	Route::get('cturnorol',[
		'uses' => 'CturnoRolController@index',
		'as' => 'cturnorol'
		]); 

	Route::post('cturnorol',[
		'uses' => 'CturnoRolController@store',
		'as' => 'cturnorol'
		]); 

	Route::get('editcturnorol/{id}', 'CturnoRolController@edit');

	Route::post('editcturnorol/{id}',[
		'uses' => 'CturnoRolController@edit',
		'as' => 'editcturnorol'
		]); 

	Route::post('upcturnorol/{id}',[
		'uses' => 'CturnoRolController@update',
		'as' => 'upcturnorol'
		]);

	Route::any('erase_usucuadro','CturnoRolController@delete');

	Route::post('browcuadrorol',[
		'uses' => 'CturnoRolController@browse',
		'as' => 'browcuadrorol'
		]);
/***************************************************************************/

Route::get('cturnoemp',[
		'uses' => 'CturnoEmpController@index',
		'as' => 'cturnoemp'
		]); 

	Route::post('cturnoemp',[
		'uses' => 'CturnoEmpController@store',
		'as' => 'cturnoemp'
		]); 

	Route::get('editcturnoemp/{id}', 'CturnoEmpController@edit');

	Route::post('editcturnoemp/{id}',[
		'uses' => 'CturnoEmpController@edit',
		'as' => 'editcturnoemp'
		]); 

	Route::post('upcturnoemp/{id}',[
		'uses' => 'CturnoEmpController@update',
		'as' => 'upcturnoemp'
		]);

	Route::any('erase_empcuadro','CturnoEmpController@delete');

	Route::post('browcuadroemp',[
		'uses' => 'CturnoEmpController@browse',
		'as' => 'browcuadroemp'
		]);
/**********************************************************************/

/**********************Rutas días Festivos*********************************/

    Route::get('festivo',[
		'uses' => 'FestivoController@index',
		'as' => 'festivo'
		]); 

	Route::post('festivo',[
		'uses' => 'FestivoController@store',
		'as' => 'festivo'
		]); 

	Route::get('editfestivo/{id}', 'FestivoController@edit');

	Route::post('editfestivo/{id}',[
		'uses' => 'FestivoController@edit',
		'as' => 'editfestivo'
		]); 

	Route::post('upfestivo/{id}',[
		'uses' => 'FestivoController@update',
		'as' => 'upfestivo'
		]);

	Route::any('erase_festivo','FestivoController@delete');

	Route::post('browfestivo',[
		'uses' => 'FestivoController@browse',
		'as' => 'browfestivo'
		]);


/************************************************************************/


/***********************Rutas Horarios**************************************/

    Route::get('horario',[
		'uses' => 'HorarioCabController@index',
		'as' => 'horario'
		]); 

	Route::post('horario',[
		'uses' => 'HorarioCabController@store',
		'as' => 'horario'
		]); 
	Route::get('edithorario/{id}', 'HorarioCabController@edit');

	Route::post('edithorario/{id}',[
		'uses' => 'HorarioCabController@edit',
		'as' => 'edithorario'
		]);

	Route::post('uphorario/{id}',[
		'uses' => 'HorarioCabController@update',
		'as' => 'uphorario'
		]);

	Route::get('listhorario',[
		'uses' => 'HorarioCabController@index2',
		'as' => 'listhorario'
		]);


/****************************************************************/

/**********************Rutas Cuadro de turno***************************/
	
	Route::get('cuadrotur',[
		'uses' => 'CuadroTurCabController@index',
		'as' => 'cuadrotur'
		]); 

	Route::post('cuadrotur',[
		'uses' => 'CuadroTurCabController@store',
		'as' => 'cuadrotur'
		]); 

	Route::get('detacuadro',[
		'uses' => 'CuadroTurDetController@index',
		'as' => 'detacuadro'
		]); 

	Route::get('detaelim',[
		'uses' => 'CuadroTurDetController@index3',
		'as' => 'detaelim'
		]); 

	Route::get('detarevi',[
		'uses' => 'CuadroTurCabController@index3',
		'as' => 'detarevi'
		]); 

	Route::get('detaapru',[
		'uses' => 'CuadroTurCabController@index4',
		'as' => 'detaapru'
		]); 

	Route::get('detaimp',[
		'uses' => 'CuadroTurCabController@index5',
		'as' => 'detaimp'
		]); 

	

	Route::any('cuadroturdet/{id}', 'CuadroTurDetController@index2');
	Route::any('cuadroturrev/{id}', 'CuadroTurDetController@index5');
	Route::any('cuadroturapro/{id}', 'CuadroTurDetController@index6');
	Route::any('cuadroturrecha/{id}', 'CuadroTurCabController@reprobar');
	Route::any('cuadroturimp/{id}', 'CuadroTurCabController@imprimir');
	Route::any('turdetelim/{id}', 'CuadroTurDetController@index4');
	Route::any('cuadroturela/{id}', 'CuadroTurCabController@index2');
	Route::any('ccambio/{id}', 'CuadroCambioController@index2');

	Route::any('erase_turnoemp','CuadroTurDetController@delete');


	Route::any('horemp','HorarioCabController@list_hor_jor_emp');
	Route::any('diaemp','HorarioCabController@list_hor_jor');
	Route::any('horades','HorarioCabController@show_ajax');

	Route::any('diaturno','CuadroTurDetController@list_dias_turno');
	Route::any('diahorario','CuadroTurDetController@list_turno_horario');

	Route::post('detacuadro',[
		'uses' => 'CuadroTurDetController@store',
		'as' => 'detacuadro'
		]); 
	Route::post('detaelim',[
		'uses' => 'CuadroTurDetController@cuadro_emp',
		'as' => 'detaelim'
		]); 

	Route::post('cuadroturela',[
		'uses' => 'CuadroTurCabController@cerrar',
		'as' => 'cuadroturela'
		]); 

	Route::post('detarevi',[
		'uses' => 'CuadroTurCabController@revisar',
		'as' => 'detarevi'
		]); 

	Route::post('detaapru',[
		'uses' => 'CuadroTurCabController@aprobar',
		'as' => 'detaapru'
		]); 
	Route::post('detacambio',[
		'uses' => 'CuadroCambioController@store',
		'as' => 'detacambio'
		]); 



/*******************************************************************/


/***********************Cambios de turno***************************/

Route::get('detacambio',[
		'uses' => 'CuadroCambioController@index',
		'as' => 'detacambio'
		]);

Route::get('listcambio',[
		'uses' => 'CuadroCambioController@index3',
		'as' => 'listcambio'
		]);


Route::post('browcambio',[
		'uses' => 'CuadroCambioController@browse',
		'as' => 'browcambio'
		]);

/*****************************************************************/



/*********************Rutas para los permisos***************************/

Route::get('permisos',[
		'uses' => 'PermisosController@index',
		'as' => 'permisos'
		]);

Route::post('permisos',[
		'uses' => 'PermisosController@create',
		'as' => 'permisos'
		]);

Route::post('creapermiso/{id}',[
		'uses' => 'PermisosController@store',
		'as' => 'creapermiso'
		]);

Route::any('erase_permiso','PermisosController@delete');
/***********************************************************/

/**********************Rutas Soporte*********************************/

    Route::get('caso',[
		'uses' => 'CasoController@index',
		'as' => 'caso'
		]); 

	Route::post('caso',[
		'uses' => 'CasoController@store',
		'as' => 'caso'
		]); 

	Route::post('archicaso',[
		'uses' => 'ArchicasoController@store',
		'as' => 'archicaso'
		]); 

	Route::get('editfestivo/{id}', 'FestivoController@edit');

	Route::post('editfestivo/{id}',[
		'uses' => 'FestivoController@edit',
		'as' => 'editfestivo'
		]); 

	Route::post('upfestivo/{id}',[
		'uses' => 'FestivoController@update',
		'as' => 'upfestivo'
		]);

	Route::any('erase_festivo','FestivoController@delete');

	Route::post('browfestivo',[
		'uses' => 'FestivoController@browse',
		'as' => 'browfestivo'
		]);


/************************************************************************/

}); 



