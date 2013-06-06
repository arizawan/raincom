<?php

class Categories_Controller extends Base_Controller {    

	public function action_index()
    {
		// User info Injection
		$user 		=	Sentry::user();
		$categorys	=   Category::all();
		return View::make('oscore.category.index')
			->with('usernamefull',$user->metadata['name'])
            ->with('userid',$user->id)
            ->with('useremail',$user->email)
            ->with('userphone',$user->metadata['phone'])
            ->with('userphoto',$user->metadata['image'])
            ->with('useraddress',$user->metadata['address'])
            ->with('userdob',Date::forge($user->metadata['dob'])->format('%B %d, %Y'))
            ->with('userjod',Date::forge($user->metadata['jod'])->format('%B %d, %Y | %I.%M.%S %p'))
            ->with('categorys',$categorys);
	}    

	public function action_new()
    {
    		// User info Injection
			$user 		=	Sentry::user();
			

			$input 		= Input::get();
			$picture 	= Input::file('imagefile');
			$category = new Category;
			$category->title 		= Input::get('title');
			$category->parent 		= Input::get('parent');
			$category->isspecial 	= Input::get('isspecial');
			if(($picture['name'])!=''){
				$category->linkicon 	= OsCore::imageupload($picture,20,20);
			}
			$category->priority 	= '0';
			$category->linkslug 	= OsCore::genuniqslug(Str::slug(Input::get('link')));

			

			if($category->save()){
				return Redirect::to('/admin/category');
				/*
				// Render success view
				$categorys	=   Category::all();
				$categorylist	=	'';
				foreach ($categorys as $category) {
					if($categorylist==""){
		 				$categorylist = '"'.$category->title.'"';
					}else{
						 $categorylist = $categorylist.',"'.$category->title.'"';
					}
				}
				return View::make('oscore.category.show')
					->with('usernamefull',$user->metadata['name'])
		            ->with('userid',$user->id)
		            ->with('useremail',$user->email)
		            ->with('userphone',$user->metadata['phone'])
		            ->with('userphoto',$user->metadata['image'])
		            ->with('useraddress',$user->metadata['address'])
		            ->with('userdob',Date::forge($user->metadata['dob'])->format('%B %d, %Y'))
		            ->with('userjod',Date::forge($user->metadata['jod'])->format('%B %d, %Y | %I.%M.%S %p'))
		            ->with('categorys',$categorys)
		            ->with('categorlist',$categorylist);
		        */
			}

    }    

	public function action_show()
    {
    	// User info Injection
		$user 			=	Sentry::user();
		$categorys		=   Category::order_by('priority', 'asc')->get();
		//dd($categorys);

		$categorylist	=	'';
		foreach ($categorys as $category) {
			if($categorylist==""){
 				$categorylist = '"'.$category->title.'"';
			}else{
				 $categorylist = $categorylist.',"'.$category->title.'"';
			}
		}
		
    	return View::make('oscore.category.show')
					->with('usernamefull',$user->metadata['name'])
		            ->with('userid',$user->id)
		            ->with('useremail',$user->email)
		            ->with('userphone',$user->metadata['phone'])
		            ->with('userphoto',$user->metadata['image'])
		            ->with('useraddress',$user->metadata['address'])
		            ->with('userdob',Date::forge($user->metadata['dob'])->format('%B %d, %Y'))
		            ->with('userjod',Date::forge($user->metadata['jod'])->format('%B %d, %Y | %I.%M.%S %p'))
		            ->with('categorys',$categorys)
		            ->with('categorlist',$categorylist);
    }

    public function action_showsearch()
    {
    	$input 		= Input::get();

    	// User info Injection
		$user 			=	Sentry::user();
		$categorys		=   Category::all();

			// Is it root? or others?
			if(Input::get('searchcat')=="Root"){
				$getchildforid	=	0;	
				$resultcats 	= 	DB::table('category')->where('parent', '=', $getchildforid)->get();
			}else{
				$getchildforid	=	Input::get('searchcat');
				$resultcatid 	= 	DB::table('category')->where('title', 'LIKE', '%'.$getchildforid.'%')->only('id');
				$resultcats 	= 	DB::table('category')->where('parent', '=', $resultcatid)->get();
			}

			// Generate Category list for autocompleate
			$categorylist	=	'';
			foreach ($categorys as $category) {
				if($categorylist==""){
	 				$categorylist = '"Root","'.$category->title.'"';
				}else{
					 $categorylist = $categorylist.',"'.$category->title.'"';
				}
			}
		
    	return View::make('oscore.category.show')
					->with('usernamefull',$user->metadata['name'])
		            ->with('userid',$user->id)
		            ->with('useremail',$user->email)
		            ->with('userphone',$user->metadata['phone'])
		            ->with('userphoto',$user->metadata['image'])
		            ->with('useraddress',$user->metadata['address'])
		            ->with('userdob',Date::forge($user->metadata['dob'])->format('%B %d, %Y'))
		            ->with('userjod',Date::forge($user->metadata['jod'])->format('%B %d, %Y | %I.%M.%S %p'))
		            ->with('categorys',$resultcats)
		            ->with('categorlist',$categorylist);
    }

    public function action_rearrange()
    {
    	// User info Injection
		$categorys	=   DB::table('category')->order_by('priority', 'asc')->get();
		$orders 	= 	Input::get('reorder');
		$getorderarr 	= explode(",", $orders);
		$numberofimages = count($getorderarr);
		$icount=0;
		foreach ($categorys as $rowi)
		{
			$getorderitemx	=	substr($getorderarr[$icount], -1, 1);
			
			$catre = Category::find($getorderitemx);
			$catre->priority = $icount;
			$catre->save();

			$icount++;
		}
		return true;
    }

    public function action_delete()
    {
    	$input 		= 	Input::get();
		$daletedata = 	DB::table('category')->delete(Input::get('catid'));
		if($daletedata){
			return true;
		}else{
			return false;
		}
		
    }

    public function action_editcategory($categoryid)
    {
		// User info Injection
		$user 			=	Sentry::user();
		$categorys		=   Category::all();
		$categoryedit	=   Category::find($categoryid);
		return View::make('oscore.category.edit')
			->with('usernamefull',$user->metadata['name'])
            ->with('userid',$user->id)
            ->with('useremail',$user->email)
            ->with('userphone',$user->metadata['phone'])
            ->with('userphoto',$user->metadata['image'])
            ->with('useraddress',$user->metadata['address'])
            ->with('userdob',Date::forge($user->metadata['dob'])->format('%B %d, %Y'))
            ->with('userjod',Date::forge($user->metadata['jod'])->format('%B %d, %Y | %I.%M.%S %p'))
            ->with('categorys',$categorys)
            ->with('categorytoedit',$categoryedit);
    }

    public function action_updatecategory($categoryid)
    {
		// User info Injection
		$user 			=	Sentry::user();
		$categorys		=   Category::all();
		$input 			= 	Input::get();
		$picture 		= 	Input::file('imagefile');

		$categoryedit				= Category::find($categoryid);
		$categoryedit->title 		= Input::get('title');
		$categoryedit->parent 		= Input::get('parent');
		$categoryedit->isspecial 	= Input::get('isspecial');
		if(($picture['name'])!=''){
			$categoryedit->linkicon = OsCore::imageupload($picture,20,20);
		}
		$categoryedit->linkslug 	= OsCore::genuniqslug(Str::slug(Input::get('link')));
		

		if($categoryedit->save()){
				return Redirect::to('/admin/category');
			/*
				// Render success view
				$categorys	=   Category::all();
				$categorylist	=	'';
				foreach ($categorys as $category) {
					if($categorylist==""){
		 				$categorylist = '"'.$category->title.'"';
					}else{
						 $categorylist = $categorylist.',"'.$category->title.'"';
					}
				}
				return View::make('oscore.category.show')
					->with('usernamefull',$user->metadata['name'])
		            ->with('userid',$user->id)
		            ->with('useremail',$user->email)
		            ->with('userphone',$user->metadata['phone'])
		            ->with('userphoto',$user->metadata['image'])
		            ->with('useraddress',$user->metadata['address'])
		            ->with('userdob',Date::forge($user->metadata['dob'])->format('%B %d, %Y'))
		            ->with('userjod',Date::forge($user->metadata['jod'])->format('%B %d, %Y | %I.%M.%S %p'))
		            ->with('categorys',$categorys)
		            ->with('categorlist',$categorylist);
		    */
		}
    }

    

}