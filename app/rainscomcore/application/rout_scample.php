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
	/*
	// Creating a User
	try
	{
		$time = new DateTime; 
	    // Prepare the user data
	    $vars = array(
	        'email'    => 'ahm.rizawan@gmail.com',
	        'password' => 'thunder32',
	        'username' => 'ahm.rizawan',
	        'activated' => '0',
	        'metadata' => array(
	            'name' 		=> 'Ahmed Rizawan',
	            'phone'  	=> '+8801756170159',
	            'company'  	=> 'OScom',
	            'address'  	=> 'Gazipur, Dhaka, Simultoli',
	            'city'  	=> 'Dhaka',
	            'country'  	=> 'Bangladesh',
	            'zip'  		=> '1703',
	            'dob'  		=> $time,
	            'jod'  		=> $time,
	            'newsstate' => 'no',
	     
	        )
	    );

	    // Create the user , activated (by default true:1)
	    if ($user_id = Sentry::user()->create($vars,true))
	    {
	        // the user was created - send email notifying user account was created
	        echo('Yep!');
	    }
	    else
	    {
	        // something went wrong - shouldn't really happen
	        echo('Nope!');
	    }
	}
	catch (Sentry\SentryException $e)
	{
	    $errors = $e->getMessage();
	}
	*/
	
	/*
	// Chk a users existence
	if (Sentry::user_exists('ahm.rizawan@gmail.com'))
	{
	    echo('Yep!');
	}else{
		echo('Nope!');
	}
	*/

	/*
	// Create Groups
	try
	{
	    // Create SuperUser Group
	    $group_id = Sentry::group()->create(array(
	        'name'  => 'superuser',
	    ));
	    // Create Admin Group
	    $group_id = Sentry::group()->create(array(
	        'name'  => 'admin',
	    ));
	    // Create Modarator Group
	    $group_id = Sentry::group()->create(array(
	        'name'  => 'modaretor',
	    ));
	    // Create User Group
	    $group_id = Sentry::group()->create(array(
	        'name'  => 'user',
	    ));
	}
	catch (Sentry\SentryException $e)
	{
	    $errors = $e->getMessage();
	}
	*/

	/*
	// Set Group Permissions
	try
	{
		// Update superuser group permissions
		$permissions = array(
			'superuser'  => 1, 	// Access to Everything,
			'is_admin'   => 1, 	// Administrative Privileges,
		    'create'   	 => 1, 	// Creating Things,
		    'update'   	 => 1, 	// Updating Things,
		    'delete'   	 => 1, 	// Deleting things,
		    'is_partner' => 1, 	// Partner Access,
		    'is_user'    => 1, 	// User Access,
		);

		if(Sentry::group('superuser')->update_permissions($permissions))
		{
		    // Group permissions were updated
		    echo ("Yep!");
		}
		else
		{
			// Group permissions were not updated
			echo ("Nope!");
		}

		// Update Admin group permissions
		$permissions = array(
			'superuser'  => 0, 	// Access to Everything,
			'is_admin'   => 1, 	// Administrative Privileges,
		    'create'   	 => 1, 	// Creating Things,
		    'update'   	 => 1, 	// Updating Things,
		    'delete'   	 => 1, 	// Deleting things,
		    'is_partner' => 1, 	// Partner Access,
		    'is_user'    => 0, 	// User Access,
		);

		if(Sentry::group('admin')->update_permissions($permissions))
		{
		    // Group permissions were updated
		    echo ("Yep!");
		}
		else
		{
			// Group permissions were not updated
			echo ("Nope!");
		}

		// Update Partner group permissions
		$permissions = array(
			'superuser'  => 0, 	// Access to Everything,
			'is_admin'   => 0, 	// Administrative Privileges,
		    'create'   	 => 0, 	// Creating Things,
		    'update'   	 => 1, 	// Updating Things,
		    'delete'   	 => 0, 	// Deleting things,
		    'is_partner' => 1, 	// Partner Access,
		    'is_user'    => 0, 	// User Access,
		);

		if(Sentry::group('partner')->update_permissions($permissions))
		{
		    // Group permissions were updated
		    echo ("Yep!");
		}
		else
		{
			// Group permissions were not updated
			echo ("Nope!");
		}

		// Update User group permissions
		$permissions = array(
			'superuser'  => 0, 	// Access to Everything,
			'is_admin'   => 0, 	// Administrative Privileges,
		    'create'   	 => 0, 	// Creating Things,
		    'update'   	 => 1, 	// Updating Things,
		    'delete'   	 => 0, 	// Deleting things,
		    'is_partner' => 0, 	// Partner Access,
		    'is_user'    => 1, 	// User Access,
		);

		if(Sentry::group('user')->update_permissions($permissions))
		{
		    // Group permissions were updated
		    echo ("Yep!");
		}
		else
		{
			// Group permissions were not updated
			echo ("Nope!");
		}

		// Update SmallAdmin group permissions
		$permissions = array(
			'superuser'  => 0, 	// Access to Everything,
			'is_admin'   => 1, 	// Administrative Privileges,
		    'create'   	 => 1, 	// Creating Things,
		    'update'   	 => 1, 	// Updating Things,
		    'delete'   	 => 0, 	// Deleting things,
		    'is_partner' => 0, 	// Partner Access,
		    'is_user'    => 0, 	// User Access,
		);

		if(Sentry::group('smalladmin')->update_permissions($permissions))
		{
		    // Group permissions were updated
		    echo ("Yep!");
		}
		else
		{
			// Group permissions were not updated
			echo ("Nope!");
		}


	}
	catch (Sentry\SentryException $e)
	{
	$errors = $e->getMessage();
	}
	*/

	/*
	// add user to group
	$data = Cache::get('loggedinuser');

	if (Sentry::user_exists($data))
	{
	    echo('Yep!');
	}else{
		echo('Nope!');
	}
	if (Sentry::check())
	{
		echo('Wallah!!');
	}
	$users = DB::table('users')->where('email', '=', $data)->only('id');
	try
	{
	    // Find the user using the user id
	    $user = Sentry::user($users);
	    $user->add_to_group('admin');
	}
	catch (Sentry\SentryException $e)
	{
	    $errors = $e->getMessage();
	}
	*/

	/*
	// Chk if user is in the group
	try
	{
	    // check to see if the current user is in the editors(id:2) group
	    if (Sentry::user()->in_group('superuser')) // or in_group('editors');
	    {
	        // user is in the group
	        echo 'Yep!';
	    }
	    else
	    {
	        // user is not in the group
	        echo 'Nope!';
	    }
	}
	catch (Sentry\SentryException $e)
	{
	    $errors = $e->getMessage(); // catch errors such as user does not exist.
	}
	*/
	
	/*
	// Set user persmissions
	
	$permissions = array(
			'superuser'  => 1, 	// Access to Everything,
			'is_admin'   => 1, 	// Administrative Privileges,
		    'create'   	 => 1, 	// Creating Things,
		    'update'   	 => 1, 	// Updating Things,
		    'delete'   	 => 1, 	// Deleting things,
		    'is_partner' => 1, 	// Partner Access,
		    'is_user'    => 0, 	// User Access,
		);

		if(Sentry::user()->update_permissions($permissions))
		{
		    // Group permissions were updated
		    echo ("Yep!");
		}
		else
		{
			// Group permissions were not updated
			echo ("Nope!");
		}
	
	// Chk user permissions
	 $permissions = Sentry::user()->permissions();
	 var_dump($permissions);

	 if (Sentry::user()->has_access('is_partner'))
    {
        // user has admin access
        echo ("woolala!");
    }
    else
    {
        // user does not have admin access
        echo ("noooooo!");
    }
    */

    // Login attempts
    Sentry::attempts('ahm.rizawan@gmail.com', '127.0.0.1')->add();
    $attempts = Sentry::attempts('ahm.rizawan@gmail.com', '127.0.0.1');
    $attempts = Sentry::attempts()->get_limit();
    dd($attempts);
	//return View::make('home.index');
});
Route::get('logout', function()
{
	// log the user out
	Sentry::logout();
});
Route::get('login', function()
{
	// Clear attempts for all users
	Sentry::attempts()->clear();
	// Logging in a user , remember me
	try
	{
	    if (Sentry::login('ahm.rizawan@gmail.com', 'thunder322', false))
	    {
	    	$data = 'ahm.rizawan@gmail.com';
			Cache::put('loggedinuser', $data, 10);
	        echo('Yep!');
	    }
	    else
	    {
	        echo('Nope!');
	    }
	}
	catch (Sentry\SentryException $e)
	{
	    $errors = $e->getMessage();
	}
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
Route::get('htmlpdfs', function(){

	$qr = new QR();
    $qr->url("www.laravel.com");
    $imgfile	=	$qr->draw(50);
    $content = "
	<page>
	    <h1>Test Header</h1>
	    <br>
	    Ceci est un <b>exemple d'utilisation</b>
	    de <a href='http://html2pdf.fr/'>HTML2PDF</a>.<br>
	    <img src=".$imgfile."/>
	</page>";

    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    return Response::make($html2pdf->Output(), 200, array('Content-type' => 'application/pdf'));

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


Route::get('makeuser', function()
{
	try
	{
	    // Prepare the user data
	    $vars = array(
	        'email'    => 'ahm.rizawan@gmail.com',
	        'password' => 'thunder32',
	        'metadata' => array(
	            'name' => 'Ahmed Rizawan'
	            // add any other fields you want in your metadata here. ( must add to db table first )
	        )
	    );

	    // Create the user
	    if ($user_id = Sentry::user()->create($vars))
	    {
	        // the user was created - send email notifying user account was created
	        echo "Cool! All Set!";
	    }
	    else
	    {
	        // something went wrong - shouldn't really happen
	        echo "Ah! Snapp! something is wrong!";
	    }
	}
	catch (Sentry\SentryException $e)
	{
	    $errors = $e->getMessage();
	}
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