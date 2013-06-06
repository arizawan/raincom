<?php

class Deals_Controller extends Base_Controller {    

	public function action_create()
    {
        // User info Injection
        $user           =   Sentry::user();
        $categorys      =   Category::all();
        return View::make('oscore.deal.create')
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
        $user               =   Sentry::user();
        $categorys          =   Category::all();
        $input              =   Input::get();
        $paymenttypes       =   json_encode((Input::get('paymenttype')));
        $specificationname  =   Input::get('dealspecname');
        $specificationval   =   Input::get('dealspecval');
        $specification      =   json_encode(array_combine($specificationname, $specificationval));
        $unique_key         =   strtoupper(substr(md5(rand(0, 1000000)), 0, 10));

        //var_dump($specification);

        
        $deal                   = new Deal;
        $deal->dealid           = OsCore::genuniqsku($unique_key);
        $deal->title            = Input::get('title');
        $deal->innertitle       = Input::get('innertitle');
        $deal->type             = Input::get('type');
        $deal->preorder         = Input::get('preorder');
        $deal->isfeatured         = Input::get('featured');
        $deal->category         = Input::get('category');
        $deal->startdate        = Date::forge(Input::get('fromdate'))->format('datetime');
        $deal->enddate          = Date::forge(Input::get('todate'))->format('datetime');
        $deal->circulationstate = Input::get('circulate');
        $deal->circulationoffset= Input::get('circulationoffset');
        $deal->description      = Input::get('description');
        $deal->terms            = Input::get('terms');
        $deal->specification    = $specification;
        $deal->paymenttypes     = $paymenttypes;
        $deal->couponinfo       = Input::get('couponinfo');
        $deal->linkslug         = Input::get('linkslug');
        if($deal->save()){
            return Redirect::to('/admin/partner/show');
        }
        
        /*
        $paymenttypesarr    =   json_decode($paymenttypes, true);
        foreach ($paymenttypesarr  as $paymenttype) {
            echo $paymenttype;
        }
        */

        /*
        return View::make('oscore.deal.create')
            ->with('usernamefull',$user->metadata['name'])
            ->with('userid',$user->id)
            ->with('useremail',$user->email)
            ->with('userphone',$user->metadata['phone'])
            ->with('userphoto',$user->metadata['image'])
            ->with('useraddress',$user->metadata['address'])
            ->with('userdob',Date::forge($user->metadata['dob'])->format('%B %d, %Y'))
            ->with('userjod',Date::forge($user->metadata['jod'])->format('%B %d, %Y | %I.%M.%S %p'));
        */
    }    

	public function action_edit()
    {

    }    

	public function action_delete()
    {

    }    

	public function action_show()
    {
        $user           =   Sentry::user();
        $deal        =   Deal::all();
        return View::make('oscore.deal.show')
            ->with('usernamefull',$user->metadata['name'])
            ->with('userid',$user->id)
            ->with('useremail',$user->email)
            ->with('userphone',$user->metadata['phone'])
            ->with('userphoto',$user->metadata['image'])
            ->with('useraddress',$user->metadata['address'])
            ->with('userdob',Date::forge($user->metadata['dob'])->format('%B %d, %Y'))
            ->with('userjod',Date::forge($user->metadata['jod'])->format('%B %d, %Y | %I.%M.%S %p'))
            ->with('deals',$deal);
    }    

	public function action_related()
    {

    }    

	public function action_dealimage()
    {

    }    

	public function action_createchild()
    {

    }

}