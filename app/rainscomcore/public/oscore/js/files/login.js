$(function() {


	//===== Form elements styling =====//
	
	$(".styled").uniform({ radioClass: 'choice' });
	
	//===== Input limiter =====//
	
	$('.adminmlimited').inputlimiter({
		limit: 300,
		boxId: 'limit-text',
		boxAttach: false
	});
	
	$(".validate").validationEngine({promptPosition : "topRight:0,20"});

	
});

	
