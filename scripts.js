
$(document).ready( function() {

	var icon = $("#showmenu");
	var menu = $("#topnav");

	icon.click( function(event) {
		event.preventDefault();
		menu.toggleClass("open");
	} );

} );