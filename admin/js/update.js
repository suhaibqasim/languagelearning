		
$(window).ready(function(){
	$(".edit").click(function(){
		$(this).parent().siblings(".enable").attr("contenteditable","true");
	});

	$(".update").click(function(){
		$(this).parent().siblings(".enable").attr("contenteditable","false");
		$(this).parent().siblings(".enable").text();
	});



});