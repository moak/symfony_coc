$( document ).ready(function() {
	var town_hall_level_max = 10;
	var town_hall_level = $("#players_hall_town" ).val();
	town_hall_level++;

	for (i = 1; i <= town_hall_level_max; i++) { // je boucle sur lui
		$.each($("[data-town-hall-level-min=" + i + "]"), function() {
			if( town_hall_level >= i ) $("[data-town-hall-level-min=" + i + "]").show();
			else $("[data-town-hall-level-min=" + i + "]").hide();
		});
	}
});
	
$( "#players_hall_town" ).on( "change", function() {
	var town_hall_level_max = 10;
	var town_hall_level = $("#players_hall_town" ).val();
	town_hall_level++;

	for (i = 1; i <= town_hall_level_max; i++) { // je boucle sur lui
		$.each($("[data-town-hall-level-min=" + i + "]"), function() {
			if( town_hall_level >= i ) $("[data-town-hall-level-min=" + i + "]").show();
			else $("[data-town-hall-level-min=" + i + "]").hide();
		});
	}			
});