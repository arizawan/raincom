@layout('master')

@section('headerinc')

	{{ HTML::script('oscore/js/plugins/charts/excanvas.min.js') }}
	{{ HTML::script('oscore/js/plugins/charts/jquery.flot.js') }}
	{{ HTML::script('oscore/js/plugins/charts/jquery.flot.resize.js') }}
	{{ HTML::script('oscore/js/plugins/charts/jquery.sparkline.min.js') }}


	{{ HTML::script('oscore/js/plugins/ui/jquery.easytabs.min.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.collapsible.min.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.mousewheel.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.bootbox.min.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.colorpicker.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.timepicker.min.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.jgrowl.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.fancybox.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.fullcalendar.min.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.elfinder.js') }}

	{{ HTML::script('oscore/js/plugins/forms/jquery.uniform.min.js') }}
	{{ HTML::script('oscore/js/plugins/forms/jquery.autosize.js') }}
	{{ HTML::script('oscore/js/plugins/forms/jquery.inputlimiter.min.js') }}
	{{ HTML::script('oscore/js/plugins/forms/jquery.tagsinput.min.js') }}
	{{ HTML::script('oscore/js/plugins/forms/jquery.inputmask.js') }}
	{{ HTML::script('oscore/js/plugins/forms/jquery.select2.min.js') }}
	{{ HTML::script('oscore/js/plugins/forms/jquery.listbox.js') }}
	{{ HTML::script('oscore/js/plugins/forms/jquery.validation.js') }}
	{{ HTML::script('oscore/js/plugins/forms/jquery.validationEngine-en.js') }}
	{{ HTML::script('oscore/js/plugins/forms/jquery.form.wizard.js') }}
	{{ HTML::script('oscore/js/plugins/forms/jquery.form.js') }}

	{{ HTML::script('oscore/js/plugins/tables/jquery.dataTables.min.js') }}

@endsection

@section('adminimage')
	@if (!$userphoto)
		{{HTML::image('oscore/img/userpic.png', "Avatar");}}
	@else
		{{HTML::image('/images/'.$userphoto.'.jpg/22/22/90', "Admin Photo");}}
	@endif
@endsection

@section('username')
	{{$usernamefull}}
@endsection

@section('userid')
	{{$userid}}
@endsection

@section('commonuserimage')
	@if (!$userphoto)
		<img src="http://placehold.it/210x110" alt="" />
	@else
		{{HTML::image('/images/'.$userphoto.'.jpg/110/210/90', "Admin Photo");}}
	@endif
@endsection




@section('bodycontent')
			<!-- Content wrapper -->
		    <div class="wrapper">

			    <!-- Breadcrumbs line -->
			    <div class="crumbs">
		            <ul id="breadcrumbs" class="breadcrumb"> 
		                <li><a href="./">OSCORE</a></li>
		                <li class="active"><a href="/oscore/controlboard" title="">Category Customizetion</a></li>
		            </ul>
			    </div>
			    <!-- /breadcrumbs line -->

			    <!-- Page header -->
			    <div class="page-header">
			    	<div class="page-title">
				    	<h5>Category Customizetion</h5>
				    	<span>Modify and Rearrange Categorys</span>
			    	</div>
					<ul class="page-stats">
			    		<li>
			    			<div class="showcase">
			    				<span>Total Users</span>
			    				<h2>22.504</h2>
			    			</div>
			    			<div id="total-users" class="chart">10,14,8,45,23,41,22,31,19,12, 28, 21, 24, 20</div>
			    		</li>
			    		<li>
			    			<div class="showcase">
			    				<span>Total Active Orders</span>
			    				<h2>6.290</h2>
			    			</div>
			    			<div id="total-active-orders" class="chart">10,14,8,45,23,41,22,31,19,12, 28, 21, 24, 20</div>
			    		</li>
						<li>
			    			<div class="showcase">
			    				<span>Total Transections</span>
			    				<h2>16.290</h2>
			    			</div>
			    			<div id="total-transections" class="chart">10,14,8,45,23,41,22,31,19,12, 28, 21, 24, 20</div>
			    		</li>
			    	</ul>
			    </div>
			    <!-- /page header -->

				<h5 class="widget-name"><i class="icon-th"></i>Customize Category</h5>
				<form class="search widget" action="/admin/category" method="post">
		    		<div class="typeahead-append">
			    		<input id="product_search" type="text" data-provide="typeahead"
       data-source='[{{$categorlist}}]' name="searchcat" placeholder="Type Parent Categories name to search sub categories" autocomplete="off">
			    		<input type="submit" class="btn btn-danger" value="Search" />
			    	</div>
		    	</form>

               <!-- Media datatable -->
                <div class="widget">
                	<div class="navbar">
                    	<div class="navbar-inner">
                        	<h6>Category Listings</h6>
                        </div>
                    </div>
                    <div class="table-overflow">
                        <table class="table table-striped table-bordered table-checks media-table-user short-category">
                            <thead>
                                <tr>
                                    <th style="width:30%;">Name</th>
                                    <th>Link Slug</th>
                                    <th>Parent</th>
                                    <th>Priority</th>
                                    <th>Account info</th>
                                    <th class="actions-column">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($categorys as $category)
									<tr id="trc{{ $category->id }}">
				                        <td>{{ $category->title }}</td>
				                        <td><a href="#" title="">{{ $category->linkslug }}</a></td>
				                        <td> 
				                        	<?php
				                        		$catobj	=	Category::where_id($category->parent)->first();
					                        	if(is_null($catobj)){
													echo "Root";
												}else{
													echo $catobj->title;
												}
				                        	?>
				                        </td>
				                        <td>{{ $category->priority }}</td>
				                        <td class="file-info">
				                        	<span><strong>Is Special:</strong> {{ $category->isspecial }}</span>
				                        	<span><strong>Icon :</strong>
				                        	@if (!$category->linkicon)
												<img src="http://placehold.it/24x24" alt="" /></span>
											@else
												{{HTML::image('/images/'.$category->linkicon.'/24/24/90', "Icon");}}
											@endif
				                        </td>
				                        <td>
			                                <ul class="navbar-icons">
			                                    <li><a href="/admin/category/edit/{{$category->id}}" class="tip" title="Edit"><i class="icon-edit"></i></a></li>
												<li><a href="#" class="tip deletecategory" data="{{$category->id}}" data-name="{{$category->title}}" title="Delete"><i class="icon-remove"></i></a></li>
			                                </ul>
				                        </td>
	                                </tr>
								@endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /media datatable -->

		    </div>
		    <!-- /content wrapper -->
@endsection