<?php

class OsCore {

    public static function imageupload($image,$height,$width)
    {
		$name  	 	= uniqid(md5(rand()), true);
	    $layer 	 	= PHPImageWorkshop\ImageWorkshop::initFromPath($image['tmp_name']);
	    $dirPath 	= path('storage').'/uploads/';
		$ext 	 	= strrpos($name, '.');
		$filename 	= substr($name, 0, $ext).'.jpg';
	    $createFolders 	 = true;
	    $backgroundColor = null;
	    $imageQuality 	 = 95;
	    $expectedWidth 	 = $width;
		$expectedHeight  = $height;

		($expectedWidth > $expectedHeight) ? $largestSide = $expectedWidth : $largestSide = $expectedHeight;
		
		$layer->cropMaximumInPixel(0, 0, "MM");
		$layer->resizeInPixel($largestSide, $largestSide);
		$layer->cropInPixel($expectedWidth, $expectedHeight, 0, 0, 'MM');
	    $layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
	    return $filename;
    }

    public static function genuniqslug($link)
    {
    	$shortened  = rand(100,999);
    	$chklink 	= Category::where_linkslug($link)->first();
    	$genlink	= strtolower($shortened.'-'.$link);
		if ( $chklink ) {
			return static::genuniqslug($genlink);
		}
		return $link;
    }

    public static function genuniqsku($dealid)
    {
    	$unique_key =   strtoupper(substr(md5(rand(0, 1000000)), 0, 10));
    	$chklink 	= 	Deal::where_dealid($dealid)->first();
		if ( $chklink ) {
			return static::genuniqslug($unique_key);
		}
		return $dealid;
    }
}