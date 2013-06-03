<?php

class Oscore_Controller extends Base_Controller
{
    public function action_index()
    {
        $loggedinem     =   Cache::get('coreuser');
        var_dump(Sentry::user()->in_group('superuser'));
        var_dump(Sentry::user());
    }
    
    /*
    |--------------------------------------------------------------------------
    | Admin user Activation
    |--------------------------------------------------------------------------
    */
    public function action_activatecoreuser($codehash,$salthash)
    {
        try
        {
            // Link Usage :: activateadmin/YWhtLnJpemF3YW5AZ21haWwuY29t/JgKi9f11ORrvDsRYI9hWH4s2
            $activate_user = Sentry::activate_user($codehash, $salthash, true);
            if ($activate_user)
            {
                // User was successfully activated
                return Redirect::to('/admin/login');
            }
            else
            {
                // There was a problem activating the user
                return Redirect::to('/admin/login');
            }
        }
        catch (Sentry\SentryException $e)
        {
            $errors = $e->getMessage();
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Admin user Login
    |--------------------------------------------------------------------------
    */
    public function action_logout()
    {
        $usergroups =   Groups::all();
        Sentry::logout();
        Cache::forget('coreuser');  // Erase User catch
        return View::make('oscore.login')->with('usergroups',$usergroups)->with('notificationermsg', '')->with('notificationsucmsg', '');
    }
    public function action_login()
    {
        $usergroups =   Groups::all();
        if (Sentry::check())
        {
            // User is logged in
            return Redirect::to('/admin');
        }
        return View::make('oscore.login')->with('usergroups',$usergroups)->with('notificationermsg', '')->with('notificationsucmsg', '');
    }
    public function action_resetpass()
    {
        $usergroups =   Groups::all();
        $input = Input::get();
        try
        {
            // Reset the password
            if ($reset = Sentry::reset_password(Input::get('useremail'), md5(Input::get('usernewpass'))))
            {
                $email = $reset['email'];
                $link = $email.'/'.$reset['link'];
                //dd($link);
                // Send the activation $link through email
            }
            else
            {
                // There was a problem resetting the user password
            }
        }
        catch (Sentry\SentryException $e)
        {
            $errors = $e->getMessage();
        }
        return View::make('oscore.login')->with('usergroups',$usergroups)->with('notificationermsg', '')->with('notificationsucmsg', '');
    }
    public function action_loginuser()
    {
        $usergroups =   Groups::all();
        $input = Input::get();
        Cache::forget('coreuser');  // Erase User catch

        // Chk user is active or not
        $userid     =   Users::where_email(Input::get('username'))->first();
        if(!is_null($userid)){
            if($userid->activated!='1'){
                 return View::make('oscore.login')->with('notificationermsg',"User is not activeated yet! Contact Admin!")->with('notificationsucmsg', '')->with('usergroups',$usergroups);
            }
        }

        // If active the try to login
        try
        {
            if (Sentry::user_exists(Input::get('username')))
            {

                // the user exists * md5 hash passwords
                $user   = Sentry::login(Input::get('username'), md5(Input::get('password')), Input::get('remember'));
                if ($user)
                {
                    // The user is now logged in
                    Cache::forever('coreuser', Input::get('username'));    // Cache User name
                    //return $name;
                    return Redirect::to('/admin');
                }
                else
                {
                    // Could not log the user in
                    return View::make('oscore.login')->with('notificationermsg',"User ID or password did not matched! Try something else!")->with('notificationsucmsg', '')->with('usergroups',$usergroups);
                }
            }
            else
            {
                // the user does not exist
                return View::make('oscore.login')->with('notificationermsg',"Snap! User not found! Try something else!")->with('notificationsucmsg', '')->with('usergroups',$usergroups);
            }
            
        }
        catch (Sentry\SentryException $e)
        {
            $errors = $e->getMessage();
        }


        return View::make('oscore.login')->with('usergroups',$usergroups)->with('notificationermsg', '')->with('notificationsucmsg', '');
    }
    /*
    |--------------------------------------------------------------------------
    | Admin user Registration
    |--------------------------------------------------------------------------
    */
    public function action_register()
    {
        $input = Input::get();
        try
        {
            // Chk if user exist
                $usergroups =   Groups::all();
                $userid     =   Users::where_email(Input::get('useremail'))->first();
                if(is_null($userid)){
                    // Do nothing, User Do not exist
                }else{
                    $useremail  =   $userid->email;
                    if (Sentry::user_exists($useremail))
                    {
                        return View::make('oscore.login')->with('notificationermsg',"Snap! User already Exists! Try something else!")->with('notificationsucmsg', '')->with('usergroups',$usergroups);
                    }
                }

            // If not then create
                $time = new DateTime;
                $vars = array(
                    'email'    => Input::get('useremail'),
                    'password' => md5(Input::get('userpassword')),
                    'username' => Input::get('useremail'),
                    'activated' => '1',
                    'metadata' => array(
                        'name'      => Input::get('username'),
                        'phone'     => '',
                        'company'   => '',
                        'address'   => '',
                        'city'      => '',
                        'country'   => '',
                        'zip'       => '',
                        'dob'       => $time,
                        'jod'       => $time,
                        'newsstate' => 'no',
                 
                    )
                );

            // Create the user
            $user = Sentry::user()->register($vars);
            if ($user)
            {
                // Set User perm & genarate Activation Hash
                $activationhashcode =   $user['hash'];
                $userg              =   Sentry::user($user['id']);
                $userg->add_to_group(intval(Input::get('userrole')));

                // Store Activation Hash
                $useract_hash = array(
                    'metadata' => array(
                        'activationhash' => $activationhashcode
                    ),
                );
                $userg->update($useract_hash);
                
                // Return
                return View::make('oscore.login')->with('notificationsucmsg',"Done! Account created, wait for approval!")->with('notificationermsg', '')->with('usergroups',$usergroups);
            }
            else
            {
                // Error responce
                 return View::make('oscore.login')->with('notificationermsg',"Something's wrong, try again!")->with('notificationsucmsg', '')->with('usergroups',$usergroups);
            }
        }
        catch (Sentry\SentryException $e)
        {
            $errors = $e->getMessage();
        }
    }
}