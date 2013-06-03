<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="author" content="Ahmed Rizawan">
<title>OSCORE - DeepSea</title>
{{ HTML::style('oscore/css/main.css') }}
<!--[if IE 8]>{{ HTML::style('oscore/css/ie8.css') }}<![endif]-->
<!--[if IE 9]>{{ HTML::style('oscore/css/ie9.css') }}<![endif]-->
{{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,600,700') }}

{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js') }}
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js') }}

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

{{ HTML::script('oscore/js/files/bootstrap.min.js') }}

{{ HTML::script('oscore/js/files/login.js') }}

</head>

<body class="no-background">

	<!-- Fixed top -->
	<div id="top">
		<div class="fixed">
			<a href="index.html" title="" class="logo">{{HTML::image('oscore/img/logo.png', "Logo");}}</a>
			<ul class="top-menu">
				<li class="dropdown">
					<a class="login-top" data-toggle="dropdown"></a>
					<ul class="dropdown-menu pull-right">
						<li><a href="#registermodel" title="Register a new user" data-toggle="modal"><i class="icon-plus"></i>Register user</a></li>
						<li><a href="#passresetmodel" data-toggle="modal"><i class="icon-refresh"></i>Recover password</a></li>
						<li><a href="../" title=""><i class="icon-remove"></i>Go to the website</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /fixed top -->


    <!-- Login block -->
    <div class="login">
        <div class="navbar">
            <div class="navbar-inner">
                <h6><i class="icon-user"></i>Login page</h6>
            </div>
        </div>
        <div class="well">
            <form method="post" action="/admin/loginuser" class="row-fluid validate">

            	@if ( $notificationermsg != "")
				    <div class="control-group">
	        			<div class="alert alert-error">
				            <button type="button" class="close" data-dismiss="alert">×</button>
				            {{$notificationermsg}}
				        </div>
	            	</div>
				@endif

				@if ( $notificationsucmsg != "")
				    <div class="control-group">
	        			<div class="alert alert-success">
				            <button type="button" class="close" data-dismiss="alert">×</button>
				            {{$notificationsucmsg}}
				        </div>
	            	</div>
				@endif
            	
            	
                <div class="control-group">
                    <label class="control-label">UserID/Email</label>
                    <div class="controls"><input class="span12 validate[required,custom[email]]" type="text" name="username" placeholder="username" /></div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Password:</label>
                    <div class="controls"><input class="span12 validate[required]" type="password" name="password" placeholder="password" /></div>
                </div>

                <div class="control-group">
                    <div class="controls"><label class="checkbox inline"><input type="checkbox" name="remember" class="styled" value="true" checked="checked">Remember me</label></div>
                </div>

                <div class="login-btn"><input type="submit" value="Log me in" class="btn btn-danger btn-block" /></div>
            </form>
        </div>
    </div>
    <!-- /login block -->


	<!-- Footer -->
	<div id="footer">
		<div class="copyrights">&copy;  OScom IT</div>
		<ul class="footer-links">
			<li><a href="#contactadminmodel" title="" data-toggle="modal"><i class="icon-cogs"></i>Contact admin</a></li>
		</ul>
	</div>
	<!-- /footer -->
	
	<!-- New User Model Box -->
	<div id="registermodel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Register User</h3>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal validate" method="post" action="/admin/register">
		  <div class="control-group">
			<label class="control-label" for="inputName">Name</label>
			<div class="controls">
			  <input type="text" id="inputName" placeholder="Full Name"  name="username" class="input-xlarge validate[required]">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="roleselect">Role</label>
			<div class="controls">
				<select id="roleselect" class="input-xlarge styled validate[required]" name="userrole" data-prompt-position="topLeft:0,10">
					<option value="">Select...</option>
					@foreach ($usergroups as $group)
						<option value="{{ $group->id }}">{{ $group->name }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputEmail">Email</label>
			<div class="controls">
			  <input type="text" id="inputEmail" placeholder="Email" class="input-xlarge validate[required,custom[email]]" name="useremail">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputPassword">Password</label>
			<div class="controls">
			  <input type="password" id="inputPassword" placeholder="Password" class="input-xlarge validate[required]" name="userpassword">
			</div>
		  </div>
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<input type="submit" class="btn btn-primary" value="Register">
	  </div>
	  </form>
	</div>
	<!-- /New User Model Box -->
	
	<!-- Password Reset Model Box -->
	<div id="passresetmodel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Password Reset Request</h3>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal validate" method="post" action="/admin/resetpass">
		  <div class="control-group">
			<label class="control-label" for="inputEmailr">Email</label>
			<div class="controls">
			  <input type="text" id="inputEmailr" placeholder="Email" class="input-xlarge validate[required,custom[email]]" name="useremail">
			</div>
		  </div>
		<div class="control-group">
			<label class="control-label" for="inputEmailr">New Password</label>
			<div class="controls">
			<input type="password" id="inputPass" placeholder="New Password" class="input-xlarge validate[required]" name="usernewpass">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputEmailr">Confirm Password</label>
			<div class="controls">
			<input type="password" id="inputPassc" placeholder="Confirm Password" class="input-xlarge validate[required,equals[inputPass]]" name="usernewpassconf">
			</div>
		</div>
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<input type="submit" class="btn btn-primary" value="Request">
	  </div>
	  </form>
	</div>
	<!-- /Password Reset Model Box -->
	
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
					<option value="Technical">Technical</option>
					<option value="User Account">User Account</option>
					<option value="Others">Others</option>
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
