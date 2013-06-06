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

	{{ HTML::script('oscore/js/plugins/forms/jquery.uniform.min.js') }}
	{{ HTML::script('oscore/js/plugins/tables/jquery.dataTables.min.js') }}

@endsection

@section('adminimage')
	@if (!$userphoto)
		{{HTML::image('oscore/img/userpic.png', "Avatar");}}
	@else
		{{HTML::image('/images/'.$userphoto.'.jpg/22/22/90', "Admin Photo");}}
	@endif
@endsection

@section('commonuserimage')
	@if (!$userphoto)
		<img src="http://placehold.it/210x110" alt="" />
	@else
		{{HTML::image('/images/'.$userphoto.'.jpg/110/210/90', "Admin Photo");}}
	@endif
@endsection



@section('username')
	{{$usernamefull}}
@endsection

@section('userid')
	{{$userid}}
@endsection

@section('bodycontent')

	<!-- Content wrapper -->
	<div class="wrapper">
		<!-- Breadcrumbs line -->
		<div class="crumbs">
		    <ul id="breadcrumbs" class="breadcrumb"> 
		        <li><a href="./">OSCORE</a></li>
		        <li class="active"><a href="/admin" title="">Control Board</a></li>
		    </ul>
		</div>
		<!-- /breadcrumbs line -->

		<!-- Page header -->
		<div class="page-header">
			<div class="page-title">
		    	<h5>Control Board</h5>
		    	<span>Overall Statistics of this application.</span>
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

		<!-- Action tabs -->
		<div class="actions-wrapper">
		    <div class="actions">
			
				<div id="quick-actions">
			        <ul class="statistics">
		    			<li>
		    				<div class="top-info">
			    				<a href="#" title="" class="blue-square"><i class="icon-group"></i></a>
			    				<strong>12,476</strong>
			    			</div>
							<div class="progress progress-micro"><div class="bar" style="width: 100%;"></div></div>
							<span>New Users</span>
		    			</li>
		    			<li>
		    				<div class="top-info">
			    				<a href="#" title="" class="red-square"><i class="icon-envelope"></i></a>
			    				<strong>621,873</strong>
			    			</div>
							<div class="progress progress-micro"><div class="bar" style="width: 100%;"></div></div>
							<span>Newsletter Subscribers</span>
		    			</li>
		    			<li>
		    				<div class="top-info">
			    				<a href="#" title="" class="purple-square"><i class="icon-shopping-cart"></i></a>
			    				<strong>562</strong>
			    			</div>
							<div class="progress progress-micro"><div class="bar" style="width: 100%;"></div></div>
							<span>New orders</span>
		    			</li>
		    			<li>
		    				<div class="top-info">
			    				<a href="#" title="" class="green-square"><i class="icon-credit-card"></i></a>
			    				<strong>$45,360</strong>
			    			</div>
							<div class="progress progress-micro"><div class="bar" style="width: 100%;"></div></div>
							<span>New User Transections</span>
		    			</li>
		    			<li>
		    				<div class="top-info">
			    				<a href="#" title="" class="sea-square"><i class="icon-upload-alt"></i></a>
			    				<strong>562K+</strong>
			    			</div>
							<div class="progress progress-micro"><div class="bar" style="width: 100%;"></div></div>
							<span>New Item Uploaded</span>
		    			</li>
		    			<li>
		    				<div class="top-info">
			    				<a href="#" title="" class="dark-blue-square"><i class="icon-facebook"></i></a>
			    				<strong>36,290</strong>
			    			</div>
							<div class="progress progress-micro"><div class="bar" style="width: 100%;"></div></div>
							<span>Facebook fans</span>
		    			</li>
		    		</ul>
		    	</div>

		    	<ul class="action-tabs">
		    		<li><a href="#quick-actions" title="">Website statistics</a></li>
		    	</ul>
		    </div>
		</div>
		<!-- /action tabs -->

		<h5 class="widget-name"><i class="icon-th"></i>Latest Uploaded Items</h5>

		<!-- With titles -->
		<div class="media row-fluid">


				<div class="widget span3">
				    <div class="well">
				    	<div class="view">
							<a href="img/demo/big.jpg" class="view-back lightbox"></a>
					    	<img src="http://placehold.it/580x380" alt="" />
					    </div>
				    	<div class="item-info">
				    		<a href="#" title="" class="item-title">Aenean Malesuada Consectetur Risus</a>
				    		<p>Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.</p>
				    		<p class="item-buttons">
								<a href="#" class="btn btn-danger tip" title="Inactive"><i class="icon-eye-close"></i></a>
				    			<a href="#" class="btn btn-info tip" title="Edit"><i class="icon-pencil"></i></a>
				    		</p>
				    	</div>
				    </div>
				</div>
				<div class="widget span3">
				    <div class="well">
				    	<div class="view">
							<a href="img/demo/big.jpg" class="view-back lightbox"></a>
					    	<img src="http://placehold.it/580x380" alt="" />
					    </div>
				    	<div class="item-info">
				    		<a href="#" title="" class="item-title">Aenean Malesuada Consectetur Risus</a>
				    		<p>Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.</p>
				    		<p class="item-buttons">
								<a href="#" class="btn btn-danger tip" title="Inactive"><i class="icon-eye-close"></i></a>
				    			<a href="#" class="btn btn-info tip" title="Edit"><i class="icon-pencil"></i></a>
				    		</p>
				    	</div>
				    </div>
				</div>
				<div class="widget span3">
				    <div class="well">
				    	<div class="view">
							<a href="img/demo/big.jpg" class="view-back lightbox"></a>
					    	<img src="http://placehold.it/580x380" alt="" />
					    </div>
				    	<div class="item-info">
				    		<a href="#" title="" class="item-title">Aenean Malesuada Consectetur Risus</a>
				    		<p>Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.</p>
				    		<p class="item-buttons">
								<a href="#" class="btn btn-danger tip" title="Inactive"><i class="icon-eye-close"></i></a>
				    			<a href="#" class="btn btn-info tip" title="Edit"><i class="icon-pencil"></i></a>
				    		</p>
				    	</div>
				    </div>
				</div>
				<div class="widget span3">
				    <div class="well">
				    	<div class="view">
							<a href="img/demo/big.jpg" class="view-back lightbox"></a>
					    	<img src="http://placehold.it/580x380" alt="" />
					    </div>
				    	<div class="item-info">
				    		<a href="#" title="" class="item-title">Aenean Malesuada Consectetur Risus</a>
				    		<p>Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.</p>
				    		<p class="item-buttons">
								<a href="#" class="btn btn-danger tip" title="Inactive"><i class="icon-eye-close"></i></a>
				    			<a href="#" class="btn btn-info tip" title="Edit"><i class="icon-pencil"></i></a>
				    		</p>
				    	</div>
				    </div>
				</div>


		</div>
		<!-- /with titles -->

		<h5 class="widget-name"><i class="icon-th"></i>New Users</h5>

		<!-- Media datatable -->
		<div class="widget">
			<div class="navbar">
		    	<div class="navbar-inner">
		        	<h6>Newly Registered</h6>
		        </div>
		    </div>
		    <div class="table-overflow">
		        <table class="table table-striped table-bordered table-checks media-table-user">
		            <thead>
		                <tr>
		                    <th>Photo</th>
		                    <th style="width:30%;">Track</th>
		                    <th>Date</th>
		                    <th style="width:30%;">Account info</th>
		                    <th class="actions-column">Actions</th>
		                </tr>
		            </thead>
		            <tbody>
		                <tr>
		                    <td><a href="img/demo/big.jpg" title="" class="lightbox"><img src="http://placehold.it/70x70" alt="" /></a></td>
		                    <td><a href="#" title="">Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.94 Safari/537.36 | 27.147.163.105</a></td>
		                    <td>Feb 12, 2012. 12:28</td>
		                    <td class="file-info">
		                    	<span><strong>Name:</strong> Rain Walker</span>
		                    	<span><strong>E-mail:</strong> ahm.rizawan@gmail.com</span>
		                    	<span><strong>Address:</strong> Gazipur, Simultoli, Santibag</span>
								<span><strong>Status:</strong> Active</span>
		                    </td>
		                    <td>
		                        <ul class="navbar-icons">
		                            <li><a href="#" class="tip" title="Make Active"><i class="icon-thumbs-up"></i></a></li>
		                            <li><a href="#" class="tip" title="Reset Password"><i class="icon-retweet"></i></a></li>
		                            <li><a href="#" class="tip" title="Edit"><i class="icon-edit"></i></a></li>
									<li><a href="#" class="tip" title="Suspend"><i class="icon-thumbs-down"></i></a></li>
									<li><a href="#" class="tip" title="Delete"><i class="icon-remove"></i></a></li>
		                        </ul>
		                    </td>
		                </tr>
						<tr>
		                    <td><a href="img/demo/big.jpg" title="" class="lightbox"><img src="http://placehold.it/70x70" alt="" /></a></td>
		                    <td><a href="#" title="">Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.94 Safari/537.36 | 27.147.163.105</a></td>
		                    <td>Feb 12, 2012. 12:28</td>
		                    <td class="file-info">
		                    	<span><strong>Name:</strong> Ahmed Rizawan</span>
		                    	<span><strong>E-mail:</strong> ahm.rizawan@gmail.com</span>
		                    	<span><strong>Address:</strong> Gazipur, Simultoli, Santibag</span>
								<span><strong>Status:</strong> Active</span>
		                    </td>
		                    <td>
		                        <ul class="navbar-icons">
		                            <li><a href="#" class="tip" title="Make Active"><i class="icon-thumbs-up"></i></a></li>
		                            <li><a href="#" class="tip" title="Reset Password"><i class="icon-retweet"></i></a></li>
		                            <li><a href="#" class="tip" title="Edit"><i class="icon-edit"></i></a></li>
									<li><a href="#" class="tip" title="Suspend"><i class="icon-thumbs-down"></i></a></li>
									<li><a href="#" class="tip" title="Delete"><i class="icon-remove"></i></a></li>
		                        </ul>
		                    </td>
		                </tr>
		                
		            </tbody>
		        </table>
		    </div>
		</div>
		<!-- /media datatable -->

	</div>
	<!-- /content wrapper -->

@endsection

