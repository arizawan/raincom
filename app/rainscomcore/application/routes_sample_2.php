<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
Route::post('admin/uploaddealimages', function()
{

	$input 	= Input::all();
    $image 	= Input::file('file');
	$name  	= Input::get('name');
    $layer 	= PHPImageWorkshop\ImageWorkshop::initFromPath($image['tmp_name']);
    $dirPath = path('storage').'/uploads/';
	$ext = strrpos($name, '.');
	$filename = substr($name, 0, $ext).'.jpg';
    $createFolders = true;
    $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
    $imageQuality = 85; // useless for GIF, usefull for PNG and JPEG (0 to 100%)
    $layer->cropMaximumInPixel(0, 0, "MM");
    $layer->resizeInPixel(700, 700, true, 0, 0, 'MM');
    $layer->applyFilter(IMG_FILTER_CONTRAST, -2, null, null, null, true); // constrast
	$layer->applyFilter(IMG_FILTER_BRIGHTNESS, 2, null, null, null, true); // brightness
    $layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);


    return $filename;
	//return View::make('home.index');
});

// Return Image By Request
Route::get('images/(:any)/(:num)/(:num)/(:num)', function($imagefilename, $height, $width, $quality)
{
	$filePath = path('storage').'/uploads/'.$imagefilename;
	
	if(File::exists($filePath)){
	
		$type 			= 	File::mime(File::extension($filePath));
		$imageQuality 	= 	$quality;
		$createFolders 	= 	true;
		$backgroundColor= 	null;
		$dirPath		=	path('storage').'/uploads/tempimgs/';
		$tempfilename	=	uniqid(md5(rand()), true).'.jpg';
		$tempfilloc		=	$dirPath.$tempfilename;
		
		$layer 	= PHPImageWorkshop\ImageWorkshop::initFromPath($filePath);
		$layer->cropMaximumInPixel(0, 0, "MM");
		$layer->resizeInPixel($height, $width, false, 0, 0, 'MM');	
		$layer->save($dirPath, $tempfilename, $createFolders, $backgroundColor, $imageQuality);
		$image = $layer->getResult();
		Response::make('', 200, 
					array(
					'Content-Type'              => $type,
					'Content-Transfer-Encoding' => 'binary',
					'Content-Disposition'       => 'inline',
					'Expires'                   => 0,
					'Cache-Control'             => 'must-revalidate, post-check=0, pre-check=0',
					'Pragma'                    => 'public',
					))->send_headers();

		$imagefile	=	readfile($tempfilloc);
		File::delete($tempfilloc);
		dd($imagefile);
		
	}else{
		return Event::first('404');
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