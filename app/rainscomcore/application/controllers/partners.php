<?php

class Partners_Controller extends Base_Controller {    

	public function action_create()
    {
        // User info Injection
        $user           =   Sentry::user();
        $categorys      =   Category::all();
        return View::make('oscore.partner.create')
            ->with('usernamefull',$user->metadata['name'])
            ->with('userid',$user->id)
            ->with('useremail',$user->email)
            ->with('userphone',$user->metadata['phone'])
            ->with('userphoto',$user->metadata['image'])
            ->with('useraddress',$user->metadata['address'])
            ->with('userdob',Date::forge($user->metadata['dob'])->format('%B %d, %Y'))
            ->with('userjod',Date::forge($user->metadata['jod'])->format('%B %d, %Y | %I.%M.%S %p'));
    }   

    public function action_createnew()
    {
        // User info Injection
        $user       = Sentry::user();
        $input      = Input::get();
        $picture    = Input::file('imagefile');
        $partners   = new Partner;
        $partners->name         = Input::get('name');
        $partners->address      = Input::get('address');
        $partners->details      = Input::get('editor');
        $partners->email        = Input::get('email');
        $partners->phone        = Input::get('phone');
        $partners->latitude     = Input::get('lalitute');
        $partners->longitude    = Input::get('longtituted');
        $partners->isvisible    = Input::get('isvisibe');
        $partners->pincode      = Input::get('pincode');
        $partners->activestate  = '1';
        $partners->password     = Input::get('password');
        if(($picture['name'])!=''){
            $partners->image    = OsCore::imageupload($picture,700,700);
        }
        if($partners->save()){
            return Redirect::to('/admin/partner/show');
        }
    } 
	public function action_show()
    {
        // User info Injection
        $user           =   Sentry::user();
        $partner        =   Partner::all();
        return View::make('oscore.partner.show')
            ->with('usernamefull',$user->metadata['name'])
            ->with('userid',$user->id)
            ->with('useremail',$user->email)
            ->with('userphone',$user->metadata['phone'])
            ->with('userphoto',$user->metadata['image'])
            ->with('useraddress',$user->metadata['address'])
            ->with('userdob',Date::forge($user->metadata['dob'])->format('%B %d, %Y'))
            ->with('userjod',Date::forge($user->metadata['jod'])->format('%B %d, %Y | %I.%M.%S %p'))
            ->with('partners',$partner);
    }    

	public function action_editpartners($partnerid)
    {
        // User info Injection
        $user           =   Sentry::user();
        $partner        =   Partner::all();
        $partnertoedit   =   Partner::find($partnerid);
        return View::make('oscore.partner.edit')
            ->with('usernamefull',$user->metadata['name'])
            ->with('userid',$user->id)
            ->with('useremail',$user->email)
            ->with('userphone',$user->metadata['phone'])
            ->with('userphoto',$user->metadata['image'])
            ->with('useraddress',$user->metadata['address'])
            ->with('userdob',Date::forge($user->metadata['dob'])->format('%B %d, %Y'))
            ->with('userjod',Date::forge($user->metadata['jod'])->format('%B %d, %Y | %I.%M.%S %p'))
            ->with('partners',$partner)
            ->with('partnertoedit',$partnertoedit);
    }    
    public function action_saveeditpartners($partnerid)
    {
        // User info Injection
        $user           =   Sentry::user();
        $partner        =   Partner::all();
        $input          =   Input::get();
        $picture        =   Input::file('imagefile');
        $partnertoedit              = Partner::find($partnerid);
        $partnertoedit->name        = Input::get('name');
        $partnertoedit->address     = Input::get('address');
        $partnertoedit->details     = Input::get('editor');
        $partnertoedit->email       = Input::get('email');
        $partnertoedit->phone       = Input::get('phone');
        $partnertoedit->latitude    = Input::get('lalitute');
        $partnertoedit->longitude   = Input::get('longtituted');
        $partnertoedit->isvisible   = Input::get('isvisibe');
        $partnertoedit->pincode     = Input::get('pincode');
        $partnertoedit->password    = Input::get('password');

        if(($picture['name'])!=''){
            $partnertoedit->image   = OsCore::imageupload($picture,700,700);
        }
        if($partnertoedit->save()){
            return Redirect::to('/admin/partner/show');
        }
    }    

	public function action_delete()
    {
        $input      =   Input::get();
        $daletedata =   DB::table('partners')->delete(Input::get('catid'));
        if($daletedata){
            return true;
        }else{
            return false;
        }

    }  

    public function action_active()
    {
        $input =   Input::get();
        $partner = Partner::find(Input::get('catid'));
        $partner->activestate = 'yes';
        if($partner->save()){
            return true;
        }else{
            return false;
        }
    }  
    public function action_inactive()
    {
        $input =   Input::get();
        $partner = Partner::find(Input::get('catid'));
        $partner->activestate = 'no';
        if($partner->save()){
            return true;
        }else{
            return false;
        }
    }  

	public function action_rearrange()
    {

    }

}