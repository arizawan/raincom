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
		                <li class="active"><a href="#" title="">Add New Category</a></li>
		            </ul>
			    </div>
			    <!-- /breadcrumbs line -->

			    <!-- Page header -->
			    <div class="page-header">
			    	<div class="page-title">
				    	<h5>Add New Category</h5>
				    	<span>Add New Category to application</span>
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

				<h5 class="widget-name"><i class="icon-th"></i>Category Details</h5>

               <form class="form-horizontal validate" action="/admin/category/edit/{{$categorytoedit->id}}" method="post" enctype="multipart/form-data">
					<fieldset>

						<!-- General form elements -->
						<div class="widget row-fluid">
						    <div class="navbar">
						        <div class="navbar-inner">
						            <h6>Category Details</h6>
	                                <ul class="navbar-icons">
	                                    <li><a href="#" class="tip resetform" title="Reset Form"><i class="ico-refresh"></i></a></li>
	                                </ul>
						        </div>
						    </div>

						    <div class="well">

						        <div class="control-group">
						            <label class="control-label">Category Name :</label>
						            <div class="controls"><input type="text" name="title" class="input-xxlarge catnamelimit100 validate[required,custom[onlyLetterNumberSp]]" id="cattitle" value="{{$categorytoedit->title}}" />
									<span class="help-block" id="catname100lim">Field limited to 100 characters.</span>
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Link Slug :</label>
						            <div class="controls"><input type="text" name="link" class="input-xxlarge catlinklimit100 validate[required,custom[onlyUrlSlug]]" id="cattitleslug" value="{{$categorytoedit->linkslug}}"/>
									<span class="help-block" id="catlink100lim">Field limited to 100 characters.</span>
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Select Parent :</label>
						            <div class="controls">
										<select name="parent" class="styled" >
											<option value="0">Root</option>
											@foreach ($categorys as $category)
												@if ( $category->id == $categorytoedit->parent )
												    <option selected="selected" value="{{ $category->id }}">{{ $category->title }}</option>
												@else
												    <option value="{{ $category->id }}">{{ $category->title }}</option>
												@endif
											@endforeach
										</select>
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Is Special :</label>
						            <div class="controls">
						            	@if ( $categorytoedit->isspecial == 'yes' )
										    <label class="radio inline">
												<input type="radio" id="d" name="isspecial" class="styled" value="yes" checked>
												Yes
											</label>
											<label class="radio inline">
												<input type="radio" id="f" name="isspecial" class="styled" value="no" >
												No
											</label>
										@else
										    <label class="radio inline">
												<input type="radio" id="d" name="isspecial" class="styled" value="yes">
												Yes
											</label>
											<label class="radio inline">
												<input type="radio" id="f" name="isspecial" class="styled" value="no" checked>
												No
											</label>
										@endif
										
									</div>
						        </div>
								<div class="control-group">
						            <label class="control-label">Icon :</label>
						            <div class="controls">
										<input type="file" class="styled" name="imagefile">
									</div>
						        </div>
						        <div class="form-actions align-right">
									<button type="submit" class="btn btn-primary">Submit</button>
									<a href="/admin" type="button" class="btn btn-danger">Cancel</a>
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