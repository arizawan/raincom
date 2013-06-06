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
				    	<h5>Deals</h5>
				    	<span>Listing Deals</span>
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

				<h5 class="widget-name"><i class="icon-th"></i>Deal Listing</h5>
               <!-- Media datatable -->
                <div class="widget">
                	<div class="navbar">
                    	<div class="navbar-inner">
                        	<h6>Deal Listings</h6>
							<div class="nav pull-right">
								<a href="#" class="dropdown-toggle navbar-icon"><i class="icon-save"></i></a>
							</div>
                        </div>
                    </div>
                    <div class="table-overflow">
                        <table class="table table-striped table-bordered table-checks media-table-user short-category">
                            <thead>
                                <tr>
                                    <th style="width:20%;">Main</th>
                                    <th>Image</th>
                                    <th style="width:20%;">Info</th>
                                    <th>Status</th>
                                    <th>G.P</th>
                                    <th>F.P</th>
                                    <th>P.P</th>
                                    <th class="actions-column">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($deals as $deal)
                                <tr id="trc{{$deal->id}}">
			                        <td class="file-info">
										<dl>
											<dt>SKU :</dt>
											<dd>
												<span class="label label-error">{{$deal->dealid}}</span>
											</dd>
											<dt>Title :</dt>
											<dd>{{$deal->title}}</dd>
											<dt>Inner Title :</dt>
											<dd>{{$deal->innertitle}}</dd>
											<dt>Featured :</dt>
											<dd>
											@if (($deal->isfeatured)=='yes')
												<span class="label label-success activestate">Yes</span>
											@else
												<span class="label label-error activestate">No</span>
											@endif
											</dd>
										</dl>
									</td>
			                        <td>
										<img src="http://placehold.it/150x150&text=No Images!" alt="" /></span>
									</td>
			                        <td>
			                        	<dl>
											<dt>Type :</dt>
											<dd>{{$deal->type}}</dd>
											<dt>Category :</dt>
											<dd><?php
				                        		$catobj	=	Category::where_id($deal->category)->first();
					                        	if(is_null($catobj)){
													echo "Root";
												}else{
													echo $catobj->title;
												}
				                        	?></dd>
											<dt>Preorder :</dt>
											<dd>{{$deal->preorder}}</dd>
										</dl>
			                        </td>
			                        <td class="file-info">
										<span><strong>Start Date :</strong> {{Date::forge($deal->startdate)->format('%B %d, %Y | %I.%M.%S %p')}} </span>
										<span><strong>End Date :</strong> {{Date::forge($deal->enddate)->format('%B %d, %Y | %I.%M.%S %p')}} </span>
										<span><strong>Circulation :</strong> {{$deal->circulationstate}} | {{$deal->circulationoffset}} days</span>
										<span><strong>Circulation Start :</strong> 
											<?php
												$startdate	=	strtotime($deal->startdate);
												$nextdate	=	strtotime("+$deal->circulationoffset day", $startdate);
												$pausetime	=	$deal->circulationoffset*2+1;
												$nextdate2	=	strtotime("+$pausetime day", $startdate);
											?>
											{{Date::forge($nextdate)->format('%B %d, %Y | %I.%M.%S %p')}}
										</span>
										<span><strong>Circulation Pause :</strong> {{Date::forge($nextdate2)->format('%B %d, %Y | %I.%M.%S %p')}}</span>
			                        </td>
			                        <td>1</td>
			                        <td>2</td>
			                        <td>3</td>
			                        <td>
		                                <ul class="table-controls">
                                            <li><a href="/admin/deal/edit/{{$deal->id}}" class="btn tip" title="Edit entry"><i class="icon-pencil"></i></a></li>
											<li><a href="#" class="btn tip deletepartners" data="{{$deal->id}}" data-name="{{$deal->name}}" title="Delete"><i class="icon-remove"></i></a></li>
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