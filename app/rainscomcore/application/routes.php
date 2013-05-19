<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{
	return View::make('home.index');
});
Route::get('about', function()
{
	return View::make('home.about');
});
Route::get('generateqr', function(){

    $qr = new QR();
    $qr->url("www.laravel.com");
    $qr->draw(200);

});
Route::get('formatcsv', function(){

        $path = path('public')."export".DS;
        if(!is_dir($path)) mkdir($path);
        $filename = $path.'xlsfile_'.date('d_m_Y_h_m_s').'.xls';
        $excel = new ExportExcel('file');
        $excel->filename = $filename;
        $excel->initialize();

        $row = array(
        		'Customers last Name',
        		'first name',
        		'address',
        		'city',
        		'state',
        		'zip_code',
        		'country',
        		'email',
        		'phone',
        		'created',
        		'updated',		
        		);

        $excel->addRow($row);

        $row = array(
        		'Ahmed',
        		'Rizawan',
        		'gazipur simultoli',
        		'dhaka',
        		'gazipur',
        		'1703',
        		'bangladesh',
        		'ahm.rizawan@gmail.com',
        		'+8801756170159',
        		'12/0/12',
        		'12/1/12',		
        		);

        $excel->addRow($row);

        $excel->finalize();

        return Response::download($filename);

});
Route::get('sendmail', function(){

    // Get the Swift Mailer instance
	$mailer = IoC::resolve('mailer');
	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')->setUsername('ahm.rizawan@gmail.com')->setPassword('strongp455w0rd');
	$message = Swift_Message::newInstance($transport);

	// Construct the message
	$message = Swift_Message::newInstance('Message From Website')
		->attach(Swift_Attachment::fromPath(path('public').'favicon.ico'))
	    ->setFrom(array('ratuladm@gmail.com'=>'Mr Example'))
	    ->setTo(array('ahm.rizawan@gmail.com'=>'Mr Example'))
	    ->addPart('My Plain Text Message','text/plain')
	    ->setBody('<p>My HTML Message</p>','text/html');

	// Send the email
	$mailer->send($message);

});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application. The exception object
| that is captured during execution is then passed to the 500 listener.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function($exception)
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});