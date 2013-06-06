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
		                <li class="active"><a href="/oscore/controlboard" title="">Add New Deal</a></li>
		            </ul>
			    </div>
			    <!-- /breadcrumbs line -->

			    <!-- Page header -->
			    <div class="page-header">
			    	<div class="page-title">
				    	<h5>New Deal</h5>
				    	<span>Create new deal item</span>
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

				<h5 class="widget-name"><i class="icon-th"></i>New Deal</h5>


				<form class="form-horizontal validate" action="/admin/deal" method="post" enctype="multipart/form-data">
					<fieldset>

						<!-- General form elements -->
						<div class="widget row-fluid">
						    <div class="navbar">
						        <div class="navbar-inner">
						            <h6>Category Details</h6>
	                                <ul class="navbar-icons">
	                                    <li><a href="#" class="tip" title="Reset Form"><i class="ico-refresh"></i></a></li>
	                                </ul>
						        </div>
						    </div>

						    <div class="well">
						        <div class="control-group">
						            <label class="control-label">Title :</label>
						            <div class="controls"><input type="text" name="title" class="input-xxlarge catnamelimit100 validate[required]" />
									<span class="help-block" id="catname100lim">Field limited to 100 characters.</span>
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Inner Title :</label>
						            <div class="controls"><input type="text" name="innertitle" class="input-xxlarge dealtitleinner validate[required]" />
									<span class="help-block" id="dealinnertitle140">Field limited to 140 characters.</span>
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Type :</label>
						            <div class="controls">
										<select name="type" class="styled validate[required]" >
											<option value="">Select...</option>
											<option value="product">Product</option>
											<option value="services">Services</option>
										</select>
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Select Category :</label>
						            <div class="controls">
										<select data-placeholder="Select Item to Assign Attribute" multiple="multiple" tabindex="16" class="select2single validate[required]" name="category">
											<option value=""></option>
											<optgroup label="Colors">
												<option value="1">Dallas Cowboys</option>
												<option value="2">New York Giants</option>
												<option value="3">Philadelphia Eagles</option>
												<option value="4">Washington Redskins</option>
											</optgroup>
										</select>  
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Select Payment Types :</label>
						            <div class="controls">
										<select data-placeholder="Select Item to Assign Attribute" multiple="multiple" tabindex="16" class="select2 validate[required]" name="paymenttype[]">
											<option value=""></option>
											<optgroup label="Colors">
												<option value="1">Dallas Cowboys</option>
												<option value="2">New York Giants</option>
												<option value="3">Philadelphia Eagles</option>
												<option value="4">Washington Redskins</option>
											</optgroup>
										</select>  
									</div>
						        </div>
						        <div class="control-group">
						            <label class="control-label">Featured? :</label>
						            <div class="controls">
										<label class="radio inline">
											<input type="radio" id="d" name="featured" class="styled" value="yes">
											Yes
										</label>
										<label class="radio inline">
											<input type="radio" id="f" name="featured" class="styled" value="no" checked>
											No
										</label>
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Preorder? :</label>
						            <div class="controls">
										<label class="radio inline">
											<input type="radio" id="d" name="preorder" class="styled" value="yes">
											Yes
										</label>
										<label class="radio inline">
											<input type="radio" id="f" name="preorder" class="styled" value="no" checked>
											No
										</label>
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Will Circulate? :</label>
						            <div class="controls">
										<label class="radio inline">
											<input type="radio" id="d" name="circulate" class="styled" value="yes">
											Yes
										</label>
										<label class="radio inline">
											<input type="radio" id="f" name="circulate" class="styled" value="no" checked>
											No
										</label>
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Circulation Offset :</label>
						            <div class="controls"><input type="text" value="7" name="circulationoffset" class="input-xxlarge dealcirculatecount validate[required,custom[onlyLetterNumberSp]]" />
									<span class="help-block" id="dealcirculatecount10">Field limited to 10 characters.</span>
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Date Range :</label>
						            <div class="controls">
										<ul class="dates-range">
											<li><input type="text" id="fromDatedeal" name="fromdate" placeholder="From" class="validate[required]" /></li>
											<li class="sep">-</li>
											<li><input type="text" id="toDatedeal" name="todate" placeholder="To" class="validate[required]"/></li>
										</ul>
									</div>
						        </div>
								
								<div class="control-group">
						            <div class="widget">
										<div class="navbar">
											<div class="navbar-inner">
												<h6>Description</h6>
											</div>
										</div>
										<textarea name="description" class="ckeditor"></textarea>
									</div>
						        </div>
								
								<div class="control-group">
						            <div class="widget">
										<div class="navbar">
											<div class="navbar-inner">
												<h6>Specification</h6>
												<div class="nav pull-right">
													<a href="#" class="dropdown-toggle navbar-icon" data-toggle="dropdown"><i class="icon-cog"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#" class="addnewspecificationdeal"><i class="icon-plus"></i>Add new</a></li>
													</ul>
												</div>
											</div>
										</div>
										<!-- Table with navbar elements -->
											<div class="table-overflow">
												<table class="table table-striped table-bordered align-center" id="dealspecificationtbl">
													<thead>
														<tr>
															<th>#</th>
															<th>Name</th>
															<th>Value</th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody class="dealspecificationtable">
														
													</tbody>
												</table>
											</div>
										<!-- /table with navbar elements -->
									</div>
						        </div>
								
								<div class="control-group">
						            <div class="widget">
										<div class="navbar">
											<div class="navbar-inner">
												<h6>Terms</h6>
											</div>
										</div>
										<textarea name="terms" class="ckeditor"></textarea>
									</div>
						        </div>
								
								<div class="control-group">
						            <div class="widget">
										<div class="navbar">
											<div class="navbar-inner">
												<h6>Coupon Info</h6>
											</div>
										</div>
										<textarea name="couponinfo" class="ckeditor"></textarea>
									</div>
						        </div>
								
								<div class="control-group">
						            <label class="control-label">Link Slug :</label>
						            <div class="controls"><input type="text" name="linkslug" class="input-xxlarge catlinklimit100 validate[required,custom[onlyUrlSlug]]" />
									<span class="help-block" id="catlink100lim">Field limited to 100 characters.</span>
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