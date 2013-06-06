@layout('master')

@section('headerinc')

	{{ HTML::script('oscore/js/plugins/charts/excanvas.min.js') }}
	{{ HTML::script('oscore/js/plugins/charts/jquery.flot.js') }}
	{{ HTML::script('oscore/js/plugins/charts/jquery.flot.resize.js') }}
	{{ HTML::script('oscore/js/plugins/charts/jquery.sparkline.min.js') }}

	{{ HTML::script('oscore/js/plugins/ui/jquery.easytabs.min.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.collapsible.min.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.mousewheel.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.fancybox.js') }}
	{{ HTML::script('oscore/js/plugins/ui/jquery.fullcalendar.min.js') }}

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
                <li class="active"><a href="/admin/user" title="">Admin Profile</a></li>
            </ul>
	    </div>
	    <!-- /breadcrumbs line -->

	    <!-- Page header -->
	    <div class="page-header">
	    	<div class="page-title">
		    	<h5>Admin Profile</h5>
		    	<span>Admin Profile Preview</span>
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

		<h5 class="widget-name"><i class="icon-th"></i>Profile Details</h5>

       <!-- With titles -->
		<div class="media row-fluid">
				<div class="span3">
					<a href="img/demo/big.jpg" title="" class="lightbox">
						@if (!$userphoto)
							<img src="http://placehold.it/250x230&text=No Image!" alt="No Image" />
						@else
							{{HTML::image('/images/'.$userphoto.'.jpg/250/230/90', "Admin Photo");}}
						@endif
					</a>
				</div>
				<div class="span9">
						 <div class="widget">
							<div class="navbar">
								<div class="navbar-inner">
									<h6>Admin description</h6>
									<div class="nav pull-right">
										<a href="#" class="dropdown-toggle navbar-caret" data-toggle="dropdown"><i class="caret"></i></a>
										<ul class="dropdown-menu pull-right">
											<li><a href="/admin/user/edit/{{$userid}}"><i class="icon-edit"></i>Edit</a></li>
											<li><a href="/admin/user/suspend/{{$userid}}"><i class="icon-thumbs-down"></i>Suspend</a></li>
											<li><a href="/admin/user/delete/{{$userid}}"><i class="icon-minus-sign"></i>Delete</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="well body">
								<div class="well-white body">
									<dl class="dl-horizontal">
										<dt>Name</dt>
										<dd>{{$usernamefull}}</dd>
										<dt>E-Mail</dt>
										<dd>{{$useremail}}</dd>
										<dt>Phone</dt>
										<dd>{{$userphone}}</dd>
										<dt>Address</dt>
										<dd>{{$useraddress}}</dd>
										<dt>Date Of birth</dt>
										<dd>{{$userdob}}</dd>
										<dt>Joining Date</dt>
										<dd>{{$userjod}}</dd>
									</dl>
								</div>
							</div>
						</div>
				</div>
		</div>
        <!-- /with titles -->
		<!-- Media datatable -->
        <div class="widget">
        	<div class="navbar">
            	<div class="navbar-inner">
                	<h6>User Log</h6>
                </div>
            </div>
            <div class="table-overflow">
                <table class="table table-striped table-bordered table-checks media-table-user-log">
                    <thead>
                        <tr>
                            <th style="width:30%;">Date & time</th>
                            <th style="width:50%;">Track</th>
                            <th>Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                    		//var_dump($activities->attributes);
                    	?>
                        @foreach ($activities as $activity)
                        	<tr>
						        <td>{{Date::forge($activity->time)->format('%B %d, %Y | %I.%M.%S %p')}}</td>
						        <td>{{$activity->track}}</td>
						        <td class="file-info">
						        	<span><strong>Section:</strong> {{$activity->section}}</span>
						        	<span><strong>ID:</strong> {{$activity->nodeid}}</span>
									<span><strong>Status:</strong> {{$activity->status}}</span>
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