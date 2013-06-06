<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>OSCORE - Control Board :: OScom</title>
{{ HTML::style('oscore/css/main.css') }}
<!--[if IE 8]>{{ HTML::style('oscore/css/ie8.css') }}<![endif]-->
<!--[if IE 9]>{{ HTML::style('oscore/css/ie9.css') }}<![endif]-->
{{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,600,700') }}
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js') }}
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js') }}

{{-- Headers If needed --}}
@yield('headerinc')


{{ HTML::script('oscore/js/files/bootstrap.min.js') }}
{{ HTML::script('oscore/js/files/functions_oscore.js') }}

</head>

<body>

	<!-- Fixed top -->
	<div id="top">
		<div class="fixed">
			<a href="index.html" title="" class="logo">{{HTML::image('oscore/img/logo.png', "Logo");}}</a>
			<ul class="top-menu">
				<li><a class="fullview"></a></li>
				<li><a class="showmenu"></a></li>
				<li class="dropdown">
					<a class="user-menu" data-toggle="dropdown">
						@yield('adminimage')
						<span>Howdy, @yield('username')! 
						<b class="caret"></b></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="/admin/user" title=""><i class="icon-user"></i>Profile</a></li>
						<li><a href="/admin/user/edit/@yield('userid')" title=""><i class="icon-cog"></i>Edit</a></li>
						<li><a href="/admin/logout" title=""><i class="icon-remove"></i>Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /fixed top -->


	<!-- Content container -->
	<div id="container">

		<!-- Sidebar -->
		<div id="sidebar">

			<div class="sidebar-tabs">
		        <ul class="tabs-nav two-items">
		            <li><a href="#general" title=""><i class="icon-reorder"></i></a></li>
		            <li><a href="#stuff" title=""><i class="icon-cogs"></i></a></li>
		        </ul>

		        <div id="general">
				
					<!-- Sidebar user -->
			        <div class="sidebar-user widget">
						<div class="navbar"><div class="navbar-inner"><h6>Wazzup, @yield('username')!</h6></div></div>
			            <a href="#" title="" class="user">@yield('commonuserimage')</a>
			            <ul class="user-links">
			            	<li><a href="" title="">New users<strong>+12</strong></a></li>
			            	<li><a href="" title="">New orders<strong>+156</strong></a></li>
			            	<li><a href="" title="">New Items<strong>+45</strong></a></li>
			            </ul>
			        </div>
			        <!-- /sidebar user -->

				    <!-- Main navigation -->
			        <ul class="navigation widget">
			            <li><a href="/admin/" title=""><i class="icon-home"></i>Control Board</a></li>
			            <li><a href="#" title="" class="expand"><i class="icon-sitemap"></i>Category</a>
			                <ul>
			                    <li><a href="/admin/category/new" title="">Create New</a></li>
								<li><a href="/admin/category/" title="">Customize</a></li>
			                </ul>
			            </li>
						<li><a href="#" title="" class="expand"><i class="icon-th-list"></i>Deal Item</a>
			                <ul>
			                    <li><a href="/admin/deal" title="">Create New</a></li>
								<li><a href="/admin/deal/newchild" title="">Create New Child</a></li>
								<li><a href="/admin/deal/show" title="">Customize Deal</a></li>
								<li><a href="/admin/deal/related" title="">Customize Related</a></li>
								<li><a href="/admin/deal/image" title="">Update Deal Image</a></li>
			                </ul>
			            </li>
						<li><a href="#" title="" class="expand"><i class="ico-th"></i>Attribute</a>
			                <ul>
			                    <li><a href="#" title="">Create New</a></li>
								<li><a href="#" title="">Customize Attribute</a></li>
								<li><a href="#" title="">Add Values</a></li>
								<li><a href="#" title="">Customize Value</a></li>
			                </ul>
			            </li>
						<li><a href="#" title="" class="expand"><i class="icon-comments-alt"></i>Up Sale</a>
			                <ul>
			                    <li><a href="#" title="">Create New</a></li>
								<li><a href="#" title="">Customize</a></li>
								<li><a href="#" title="">Up Sale Inventory</a></li>
			                </ul>
			            </li>
						<li><a href="#" title="" class="expand"><i class="icon-ok"></i>Inventory</a>
			                <ul>
			                    <li><a href="#" title="">Deal Items</a></li>
								<li><a href="#" title="">Wholesale Items</a></li>
			                </ul>
			            </li>
						<li><a href="#" title="" class="expand"><i class="icon-thumbs-up"></i>Partner</a>
			                <ul>
			                    <li><a href="/admin/partner/" title="">Create New</a></li>
								<li><a href="/admin/partner/show" title="">Customize</a></li>
								<li><a href="/admin/partner/rearrange" title="">Rearrange Deals</a></li>
			                </ul>
			            </li>
						<li><a href="#" title="" class="expand"><i class="icon-shopping-cart"></i>Orders</a>
			                <ul>
			                    <li><a href="#" title="">New Orders</a></li>
								<li><a href="#" title="">Unresolved</a></li>
								<li><a href="#" title="">Resolved</a></li>
								<li><a href="#" title="">Rejected</a></li>
			                </ul>
			            </li>
						<li><a href="#" title="" class="expand"><i class="icon-group"></i>Users</a>
			                <ul>
			                    <li><a href="#" title="">List Users</a></li>
								<li><a href="#" title="">Inactive</a></li>
								<li><a href="#" title="">Suspended</a></li>
								<li><a href="#" title="" class="expand">Administrator</a>
					                <ul>
					                    <li><a href="#" title="">List Admins</a></li>
					                    <li><a href="#" title="">Requests</a></li>
					                </ul>
			                    </li>
			                </ul>
			            </li>
						<li><a href="#" title="" class="expand"><i class="icon-info-sign"></i>Reports</a>
			                <ul>
								<li><a href="#" title="" class="expand">Item Report</a>
					                <ul>
					                    <li><a href="#" title="">Overall Report</a></li>
					                    <li><a href="#" title="">Single Item Report</a></li>
					                </ul>
			                    </li>
								<li><a href="#" title="" class="expand">Order Report</a>
					                <ul>
					                    <li><a href="#" title="">Overall Report</a></li>
					                    <li><a href="#" title="">Single Order Report</a></li>
					                </ul>
			                    </li>
								<li><a href="#" title="" class="expand">User Report</a>
					                <ul>
					                    <li><a href="#" title="">Overall Report</a></li>
					                    <li><a href="#" title="">Single User Report</a></li>
					                </ul>
			                    </li>
								<li><a href="#" title="">Logistics Notification</a></li>
			                </ul>
			            </li>
			            
			        </ul>
			        <!-- /main navigation -->

		        </div>

		        <div id="stuff">

		        	<!-- Social stats -->
			        <div class="widget">
			        	<h6 class="widget-name"><i class="icon-twitter"></i>Social statistics</h6>
			        	<ul class="social-stats">
			        		<li>
			        			<a href="" title="" class="orange-square"><i class="icon-rss"></i></a>
			        			<div>
				        			<h4>1,286</h4>
				        			<span>total feed subscribers</span>
				        		</div>
			        		</li>
			        		<li>
			        			<a href="" title="" class="blue-square"><i class="icon-twitter"></i></a>
			        			<div>
				        			<h4>12,683</h4>
				        			<span>total twitter followers</span>
				        		</div>
			        		</li>
			        		<li>
			        			<a href="" title="" class="dark-blue-square"><i class="icon-facebook"></i></a>
			        			<div>
				        			<h4>530,893</h4>
				        			<span>total facebook likes</span>
				        		</div>
			        		</li>
			        	</ul>
			        </div>
			        <!-- /social stats -->


                    <!-- Datepicker -->
		        	<div class="widget">
		        		<h6 class="widget-name"><i class="icon-calendar"></i>Reset Dashboard Report</h6>
		            </div>
		            <!-- /datepicker -->


		            <!-- Dates range -->
                    <ul class="widget dates-range">
                        <li><input type="text" id="fromDatedash" name="from" placeholder="From" /></li>
                        <li class="sep">-</li>
                        <li><input type="text" id="toDatedash" name="to" placeholder="To" /></li>
						<li class="sep">-</li>
						<button class="btn btn-block btn-info">Reload</button>
                    </ul>
                    <!-- /dates range -->

		        </div>

		    </div>
		</div>
		<!-- /sidebar -->


		<!-- Content -->
		<div id="content">
			{{-- Body Content Call --}}
			@yield('bodycontent')
		</div>
		<!-- /content -->

	</div>
	<!-- /content container -->


	<!-- Footer -->
	<div id="footer">
		<div class="copyrights">&copy;  Powered by OScom IT</div>
		<ul class="footer-links">
			<li><a href="#contactadminmodel" title="" data-toggle="modal"><i class="icon-cogs"></i>Contact admin</a></li>
		</ul>
	</div>
	<!-- /footer -->
	
	<!-- Contact Admin Model Box -->
	<div id="contactadminmodel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Contact Admin of this App</h3>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal validate">
		  <div class="control-group">
			<label class="control-label" for="inputNamea">Name</label>
			<div class="controls">
			  <input type="text" id="inputNamea" placeholder="Full Name" class="input-xlarge validate[required]" name="username">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputSubject">Subject</label>
			<div class="controls">
				<select id="inputSubject" class="input-xlarge validate[required] styled" name="subject" data-prompt-position="topLeft:0,10">
					<option value="">Select...</option>
					<option value="1">Technical</option>
					<option value="1">User Account</option>
					<option value="1">Others</option>
				</select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputEmaila">Email</label>
			<div class="controls">
			  <input type="text" id="inputEmaila" placeholder="Email" class="input-xlarge validate[required,custom[email]]" name="email">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputQuery">Query</label>
			<div class="controls">
				<textarea rows="5" cols="5" name="query" class="adminmlimited input-xlarge validate[required]" id="inputQuery"></textarea>
				<span class="help-block" id="limit-text">Field limited to 300 characters.</span>
			</div>
		  </div>
		
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<input type="submit" class="btn btn-primary" value="Submit">
	  </div>
	  </form>
	</div>
	<!-- /Contact Admin Model Box -->

</body>
</html>
