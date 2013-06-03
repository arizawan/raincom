$(function() {

	//===== Hide/show sidebar =====//

	$('.fullview').click(function(){
	    $("body").toggleClass("clean");
	    $('#sidebar').toggleClass("hide-sidebar mobile-sidebar");
	    $('#content').toggleClass("full-content");
	});



	//===== Hide/show action tabs =====//

	$('.showmenu').click(function () {
		$('.actions-wrapper').slideToggle(100);
	});



	//===== Easy tabs =====//
	
	$('.sidebar-tabs').easytabs({
		animationSpeed: 150,
		collapsible: false,
		tabActiveClass: "active"
	});

	$('.actions').easytabs({
		animationSpeed: 300,
		collapsible: false,
		tabActiveClass: "current"
	});

	
	//===== Date pickers =====//

	$( ".datepicker" ).datepicker({
				defaultDate: +7,
		showOtherMonths:true,
		autoSize: true,
		appendText: '(dd-mm-yyyy)',
		dateFormat: 'dd-mm-yy'
		});
		
	$( ".datepicker-os" ).datepicker({
		showOtherMonths:true,
		dateFormat: 'dd-mm-yy'
	});
		
	$('.inlinepicker').datepicker({
        inline: true,
		showOtherMonths:true
    });

	var dates = $( "#fromDatedash, #toDatedash" ).datepicker({
		defaultDate: "+1w"
	});
	
	$( "#datepicker-icon, .navbar-datepicker" ).datepicker({
		showOn: "button",
		buttonImage: "img/icons/date_picker.png",
		buttonImageOnly: true
	});
	
	var dates = $( "#fromDatedeal, #toDatedeal" ).datepicker({
		defaultDate: "+1w"
	});




	//===== Collapsible plugin for main nav =====//
	
	$('.expand').collapsible({
		defaultOpen: 'current,third',
		cookieName: 'navAct',
		cssOpen: 'subOpened',
		cssClose: 'subClosed',
		speed: 200
	});
	
	//===== Sparklines =====//
	
	$('#total-users').sparkline(
		'html', {type: 'bar', barColor: '#ef705b', height: '35px', barWidth: "5px", barSpacing: "2px", zeroAxis: "false"}
	);
	$('#total-active-orders').sparkline(
		'html', {type: 'bar', barColor: '#91c950', height: '35px', barWidth: "5px", barSpacing: "2px", zeroAxis: "false"}
	);
	$('#total-transections').sparkline(
		'html', {type: 'bar', barColor: '#5cb1ec', height: '35px', barWidth: "5px", barSpacing: "2px", zeroAxis: "false"}
	);
	$('#new-users').sparkline(
		'html', {type: 'bar', barColor: '#ef705b', height: '35px', barWidth: "5px", barSpacing: "2px", zeroAxis: "false"}
	);
	$('#new-user-transections').sparkline(
		'html', {type: 'bar', barColor: '#5cb1ec', height: '35px', barWidth: "5px", barSpacing: "2px", zeroAxis: "false"}
	);
	$(window).resize(function () {
		$.sparkline_display_visible();
	}).resize();
	
	//===== Tooltips =====//

	$('.tip').tooltip();
	$('.focustip').tooltip({'trigger':'focus'});
	
	//===== Fancybox =====//
	
	$(".lightbox").fancybox({
		'padding': 2
	});
	
	 //===== Media item hover overlay =====//

	$('.view').hover(function(){
	    $(this).children(".view-back").fadeIn(200);
	},function(){
	    $(this).children(".view-back").fadeOut(200);
	});
	
	//===== Datatables =====//

	oTable = $(".media-table-user").dataTable({
		"bJQueryUI": false,
		"bAutoWidth": false,
		"sPaginationType": "full_numbers",
		"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
		"oLanguage": {
			"sSearch": "<span>Filter records:</span> _INPUT_",
			"sLengthMenu": "<span>Show entries:</span> _MENU_",
			"oPaginate": { "sFirst": "First", "sLast": "Last", "sNext": ">", "sPrevious": "<" }
		},
		"aoColumnDefs": [
	      { "bSortable": false, "aTargets": [ 0, 4 ] }
	    ]
    });
	
	oTable = $(".media-table-user-log").dataTable({
		"bJQueryUI": false,
		"bAutoWidth": false,
		"sPaginationType": "full_numbers",
		"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
		"oLanguage": {
			"sSearch": "<span>Filter records:</span> _INPUT_",
			"sLengthMenu": "<span>Show entries:</span> _MENU_",
			"oPaginate": { "sFirst": "First", "sLast": "Last", "sNext": ">", "sPrevious": "<" }
		},
		"aoColumnDefs": [
	      { "bSortable": false, "aTargets": [ 0, 2 ] }
	    ]
    });
	
	//===== Form elements styling =====//
	
	$(".styled").uniform({ radioClass: 'choice' });
	
	//===== Input limiter =====//
	
	$('.catnamelimit100').inputlimiter({
		limit: 100,
		boxId: 'catname100lim',
		boxAttach: false
	});
	$('.catlinklimit100').inputlimiter({
		limit: 100,
		boxId: 'catlink100lim',
		boxAttach: false
	});
	$('.dealtitleinner').inputlimiter({
		limit: 140,
		boxId: 'dealinnertitle140',
		boxAttach: false
	});
	$('.dealcirculatecount').inputlimiter({
		limit: 10,
		boxId: 'dealcirculatecount10',
		boxAttach: false
	});
	
	// ===== Form Validation =====//
	$(".validate").validationEngine({promptPosition : "topRight:0,20"});
	
	// Data Sorting
	$( ".short-category tbody" ).sortable({
		opacity: 0.6,
		revert: true,
		cursor: "move", 
		zIndex:9000,
		update: function(event, ui) {
			var newOrder = $(this).sortable('toArray').toString();
			alert(JSON.stringify(newOrder));
			//$.post("core/functions/shortsiteback.php", { order: newOrder } );
		}
	});
	
	// Category Delete Confirmation
	$("a.deletecategory").click(function(e) {
		e.preventDefault();
		var deldata	=	$(this).attr('data');
		bootbox.confirm('<h4 style="text-align:center;padding:20px;font-size:">Are you sure about Deleting <strong><span class="label label-important" style="font-size:20px; padding:10px;">'+deldata+'</span></strong>?</h4>', function(confirmed) {
			console.log("Confirmed: "+confirmed);
		});
	});
	
	//===== Category Typeahead =====//

	$('#typeahead').typeahead({
		source: ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"],
		appendToBody: false
	});
	
	// Color Picker
	$('.colorpickerd').colorpicker({
		format: 'hex'
	});
	
	// Tag Based Selection
	$(".select2").select2();
	$(".select2single").select2({ maximumSelectionSize: 1 });
	
	// WISIWIG Editor
	$(function()
	{
		CKEDITOR.replace('.weditor');
	});
	
	// Deal Specification Add
	$("a.addnewspecificationdeal").live("click",function(e) {
		e.preventDefault();
		var rowCount = $('#dealspecificationtbl tr').length;
		var	uid = (Math.floor(Math.random() * (new Date()).getTime()).toString(4)).substring(0, 6);
		var trowid	=	'ID'+rowCount+uid;
		var appendhtmltemp	=	'<tr id="'+trowid+'" class="newspecification"><td>'+trowid+'</td><td><input type="text" name="regular" class="input-xlarge" /></td><td><input type="text" name="regular" class="input-xlarge" /></td><td><ul class="table-controls"><li><a href="#" class="tip removespecificationdeal" title="Remove entry"><i class="fam-cross"></i></a> </li></ul></td></tr>';
		$(appendhtmltemp).appendTo('.dealspecificationtable');
	});
	// Deal Specification Remove
	$("a.removespecificationdeal").live("click", function(e) {
		e.preventDefault();
		$(this).closest('tr').remove();
	});
	
	// Dual Selection Init
	$.configureBoxes();
	
	//===== Deal File uploader =====//
	
	$("#deal-file-uploader").pluploadQueue({
		runtimes : 'html5,html4',
		url : '/admin/uploaddealimages',
		max_file_size : '6mb',
		unique_names : true,
		multiple_queues : true,
		filters : [
			{title : "Image files", extensions : "jpg,gif,png,bmp"}
		]
	});
	
	var dealfileuploader = $("#deal-file-uploader").pluploadQueue();

	dealfileuploader.bind('FileUploaded', function(up, files, data) {
		var rowCount = $('#dealimagepriotbl tr').length;
		var	uid = (Math.floor(Math.random() * (new Date()).getTime()).toString(4)).substring(0, 6);
		var trowid	=	files.id;
		var trowidimg	=	files.target_name;
		var appendhtmltemp	=	'<tr id="'+trowid+'" class="newspecification"><td>'+trowid+'</td><td><img src="/images/'+trowid+'.jpg/100/100/70" alt="" /></td><td><input type="text" name="dealimagepos[]" class="input-xlarge" /><input type="hidden" name="dealimage[]" value="'+trowid+'.jpg" /></td><td><ul class="table-controls"><li><a href="#" class="tip removeimagedeal" title="Remove entry"><i class="fam-cross"></i></a> </li></ul></td></tr>';
		$(appendhtmltemp).appendTo('.dealimagepriotable');
	});
	// Deal Image Remove
	$("a.removeimagedeal").live("click", function(e) {
		e.preventDefault();
		$(this).closest('tr').remove();
	});



});