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

	{{ HTML::script('oscore/ckeditor/ckeditor.js') }}

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
		                <li class="active"><a href="/oscore/controlboard" title="">Add New Partner</a></li>
		            </ul>
			    </div>
			    <!-- /breadcrumbs line -->

			    <!-- Page header -->
			    <div class="page-header">
			    	<div class="page-title">
				    	<h5>New Partner</h5>
				    	<span>Create new Partner</span>
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

				<h5 class="widget-name"><i class="icon-th"></i>New Partner</h5>

				<form class="form-horizontal validate" action="/admin/partner" method="post" enctype="multipart/form-data">
					<fieldset>

						<!-- General form elements -->
						<div class="widget row-fluid">
						    <div class="navbar">
						        <div class="navbar-inner">
						            <h6>Partner Details</h6>
	                                <ul class="navbar-icons">
	                                    <li><a href="#" class="tip" title="Reset Form"><i class="ico-refresh"></i></a></li>
	                                </ul>
						        </div>
						    </div>

						    <div class="well">
						        <div class="control-group">
						            <label class="control-label">Name :</label>
						            <div class="controls"><input type="text" name="name" class="input-xxlarge catnamelimit100 validate[required,custom[onlyLetterNumberSp]]" />
									<span class="help-block" id="catname100lim">Field limited to 100 characters.</span>
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Address :</label>
						            <div class="controls"><input type="text" name="address" class="input-xxlarge validate[required]" />
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Email :</label>
						            <div class="controls"><input type="text" name="email" class="input-xlarge validate[required,custom[email]]" />
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Phone :</label>
						            <div class="controls"><input type="text" name="phone" class="input-xlarge validate[required]" />
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Latitute :</label>
						            <div class="controls"><input type="text" name="lalitute" class="input-xlarge" />
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Longtitude :</label>
						            <div class="controls"><input type="text" name="longtituted" class="input-xlarge" />
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Pin Code :</label>
						            <div class="controls"><input type="text" name="pincode" class="input-xlarge validate[required,custom[onlyLetterNumberSp]]" />
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Password :</label>
						            <div class="controls"><input type="text" name="password" class="input-xlarge validate[required]" />
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Image :</label>
						            <div class="controls">
										<input type="file" class="styled" name="imagefile">
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Visible? :</label>
						            <div class="controls">
										<label class="radio inline">
											<input type="radio" id="d" name="isvisibe" class="styled" value="yes">
											Yes
										</label>
										<label class="radio inline">
											<input type="radio" id="f" name="isvisibe" class="styled" value="no" checked>
											No
										</label>
									</div>
						        </div>
								
								<div class="control-group">
						            <div class="widget">
										<div class="navbar">
											<div class="navbar-inner">
												<h6>Description</h6>
											</div>
										</div>
										<textarea name="editor" class="ckeditor"></textarea>
									</div>
						        </div>
	
						        <div class="form-actions align-right">
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="button" class="btn btn-danger">Cancel</button>
									<button type="reset" class="btn">Reset</button>
								</div>
						        

						    </div>
						</div>
						<!-- /general form elements -->

					</fieldset> 
				</form>
				<!-- /basic inputs -->

		    </div>
		    <!-- /content wrapper -->

@endsection