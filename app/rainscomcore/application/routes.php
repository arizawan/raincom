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
Route::get('/admin/login', array('before' => 'alreadycoreloggedin', 'uses' => 'oscore@login'));
Route::get('/admin/logout', 'oscore@logout');
Route::post('/admin/loginuser', 'oscore@loginuser');
Route::post('/admin/resetpass', 'oscore@resetpass');
Route::post('/admin/register', 'oscore@register');
Route::get('/activateadmin/(:any)/(:any)', 'oscore@activatecoreuser');
Route::get('/admin', array('before' => 'corelogin', 'uses' => 'oscore@index'));

Route::get('sendmail', function(){

	/*
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
	*/



	$transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
                ->setUsername('ahm.rizawan@gmail.com')
                ->setPassword('strongp455w0rd');

    $mailer = Swift_Mailer::newInstance($transporter);

	// To use the ArrayLogger
   	$logger = new Swift_Plugins_Loggers_ArrayLogger();
   	$mailer->registerPlugin(new Swift_Plugins_LoggerPlugin($logger));

	$message = Swift_Message::newInstance('Password Recovery')
	                        ->setFrom(array('info@example.com' => 'example.net'))
	                        ->setTo(array('ahm.rizawan@gmail.com' => 'Mr. Test'))
	                        ->addPart('Password: 222', 'text/plain')
	                        ->setBody('My HTML Message', 'text/html');

	$numSent = $mailer->send($message, $failures);
	if ($numSent <1 ) dd($logger->dump()); //see logs

});
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
/*
|--------------------------------------------------------------------------
| Application Filters
|--------------------------------------------------------------------------
*/

Route::filter('corelogin', function()
{
    if (!Sentry::check()) return Redirect::to('/admin/login');
});
Route::filter('alreadycoreloggedin', function()
{
    if (Sentry::check()) return Redirect::to('/admin');
});