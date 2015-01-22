
$( "body" ).on( "click", ".glyphicon-plus", function() {	
	//$('.glyphicon-minus').addClass('glyphicon-plus').removeClass('glyphicon-minus');
	$(this).removeClass('glyphicon-plus').addClass('glyphicon-minus');
	//$(".expendables").addClass("hidden");
	$("#" + $(this).data("name")).removeClass('hidden');
});
$( "body" ).on( "click", ".glyphicon-minus", function() {	
	$(this).removeClass('glyphicon-minus').addClass('glyphicon-plus');
	$(this).parent().parent().next('tr').addClass("hidden");
});