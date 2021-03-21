$(document).ready(function() {
		   
	$( ".menu-item a" ).mouseover(function() {
		$(".menu-item").css( "border-bottom","1px solid transparent");
		$(this).parent().css( {"border-bottom":"1px solid rgba(209,209,17,0.8)", "transition": "border 0.5s linear 0.1s"});
	});
	$( ".menu-item a" ).mouseleave(function() {
		$(this).parent().css( "border-bottom","1px solid transparent");
	});

	$( "#showHelperModal" ).click(function() {
		var val = $(".helper").val();
		var id = "#"+val;
		
		$('#helperModal').modal('show');
		$(id).removeClass('hide');
	//	$('#editQuestionText').val(text);
	});

});
