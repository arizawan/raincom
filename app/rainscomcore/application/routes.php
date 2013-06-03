<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function()
{
	// log the user out
	return View::make('home.index');
	//return Date::forge()->format('%B %d, %Y | %I.%M.%S %p');
});

# Admin login Route
Route::get('/admin/login', 'oscore@login');
Route::get('/admin/logout', 'oscore@logout');
Route::post('/admin/loginuser', 'oscore@loginuser');
Route::post('/admin/resetpass', 'oscore@resetpass');
Route::post('/admin/register', 'oscore@register');
Route::get('/admin', 'oscore@index');
Route::get('/activateadmin/(:any)/(:any)', 'oscore@activatecoreuser');
/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function($exception)
{
	return Response::error('500');
});


Route::filter('sentry', function()
{
	if (!Sentry::check()) return Redirect::to('login');
});