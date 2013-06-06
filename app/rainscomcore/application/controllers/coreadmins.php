<?php

class Coreadmins_Controller extends Base_Controller {    

	public function action_index()
    {
    	// User info Injection
    	$user 		=	Sentry::user();
    	$activity 	= 	Users::find($user->id)->activities()->order_by('time', 'desc')->get();
    	return View::make('oscore.userprofile')
    			->with('usernamefull',$user->metadata['name'])
    			->with('userid',$user->id)
    			->with('useremail',$user->email)
    			->with('userphone',$user->metadata['phone'])
    			->with('userphoto',$user->metadata['image'])
    			->with('useraddress',$user->metadata['address'])
    			->with('userdob',Date::forge($user->metadata['dob'])->format('%B %d, %Y'))
    			->with('userjod',Date::forge($user->metadata['jod'])->format('%B %d, %Y | %I.%M.%S %p'))
    			->with('activities',$activity)
    			;
    }   

	public function action_edit()
    {

    }    

	public function action_delete()
    {

    }

}