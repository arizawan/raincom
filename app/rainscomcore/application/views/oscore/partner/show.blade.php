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
		                <li class="active"><a href="/oscore/controlboard" title="">Partner</a></li>
		            </ul>
			    </div>
			    <!-- /breadcrumbs line -->

			    <!-- Page header -->
			    <div class="page-header">
			    	<div class="page-title">
				    	<h5>Partner</h5>
				    	<span>Listing Partners</span>
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

				<h5 class="widget-name"><i class="icon-th"></i>Partner Listing</h5>
               <!-- Media datatable -->
                <div class="widget">
                	<div class="navbar">
                    	<div class="navbar-inner">
                        	<h6>Partner Listings</h6>
							<div class="nav pull-right">
								<a href="#" class="dropdown-toggle navbar-icon"><i class="icon-save"></i></a>
								<a href="#" class="dropdown-toggle navbar-icon" data-toggle="dropdown"><i class="icon-search"></i></a>
								<ul class="dropdown-menu pull-right">
									<li><a href="#" class="addnewspecificationdeal"><i class="icon-thumbs-up"></i>Visible</a></li>
									<li><a href="#" class="addnewspecificationdeal"><i class="icon-thumbs-down"></i>Invisible</a></li>
								</ul>
							</div>
                        </div>
                    </div>
                    <div class="table-overflow">
                        <table class="table table-striped table-bordered table-checks media-table-user short-category">
                            <thead>
                                <tr>
                                    <th style="width:10%;">Main</th>
                                    <th>Image</th>
                                    <th>Info</th>
                                    <th>Status</th>
                                    <th class="actions-column">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($partners as $partner)
                                <tr id="trc{{$partner->id}}">
			                        <td class="file-info">
										<dl>
											<dt>Name :</dt>
											<dd>
											@if (($partner->activestate)=='yes')
												<span class="label label-success activestate">{{$partner->name}}</span>
											@else
												<span class="label label-error activestate">{{$partner->name}}</span>
											@endif
											</dd>
										</dl>
									</td>
			                        <td>
			                        	@if (!$partner->image)
											<img src="http://placehold.it/150x150&text=No Images!" alt="" /></span>
										@else
											{{HTML::image('/images/'.$partner->image.'/150/150/90', "Image");}}
										@endif
									</td>
			                        <td>
			                        	<dl>
											<dt>Address :</dt>
											<dd>{{$partner->address}}</dd>
											<dt>Email :</dt>
											<dd>{{$partner->email}}</dd>
											<dt>Phone :</dt>
											<dd>{{$partner->phone}}</dd>
											<dt>Visibility :</dt>
											<dd>{{$partner->isvisible}}</dd>
										</dl>
			                        </td>
			                        <td class="file-info">
										<span><strong>Pin Code :</strong> {{$partner->pincode}} </span>
										<span><strong>Password :</strong> {{$partner->password}} </span>
										<span><strong>Join Date :</strong> {{Date::forge($partner->created_at)->format('%B %d, %Y | %I.%M.%S %p')}}</span>
										<span><strong>Total Items :</strong> 0</span>
										<span><strong>Total Active Items :</strong> 0</span>
										<span><strong>Sold Out :</strong> 0</span>
			                        </td>
			                        <td>
		                                <ul class="table-controls">
                                            <li><a href="/admin/partner/edit/{{$partner->id}}" class="btn tip" title="Edit entry"><i class="icon-pencil"></i></a></li>
											<li><a href="#" data-id="{{$partner->id}}" class="btn tip partnerstatusactive" data="{{$partner->id}}" data-name="{{$partner->name}}" title="Active"><i class="icon-thumbs-up"></i></a></li>
											<li><a href="#" data-id="{{$partner->id}}" class="btn tip partnerstatusinactive" data="{{$partner->id}}" data-name="{{$partner->name}}" title="Inactive"><i class="icon-thumbs-down"></i></a></li>
											<li><a href="#" class="btn tip deletepartners" data="{{$partner->id}}" data-name="{{$partner->name}}" title="Delete"><i class="icon-remove"></i></a></li>
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