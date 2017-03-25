// Common javascript for all pages that use Forty, for the navigation menu
$(document).ready(function(){
	// alert("Forty!!!");
	if($('.container').height()<$(window).height()){
	    $('#layer2').css('height', '100%');
	}
	$('#showMenu').click(function(){
		$('.outer-nav').fadeIn(500);
	});
	$(".container").click(function(){
		$('.outer-nav').fadeOut(100);
		if($(window).width()<800){
			window.location.reload();
		}
	});
});