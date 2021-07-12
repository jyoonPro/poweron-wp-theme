$(document).ready(function () {

	// Shift+P Login
	$(document).bind('keydown', function(event) {
	    if(event.keyCode === 80 && event.altKey) {
	        window.location.href = "https://poweron.co/login/?redirect_to=" + encodeURIComponent($(location).attr('href'));
	    }
	});


	// Check for click events on the navbar burger icon
	$(".navbar-burger").click(function () {

		// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
		$(".navbar-burger").toggleClass("is-active");
		$(".navbar-menu").toggleClass("is-active");

	});

	// Wordpress
	var $wpAdminBar = $('#wpadminbar');
	if ($wpAdminBar.length) {
		$wpAdminBar.css({ 'position': 'fixed', 'top': 0 });
		$('.navbar').addClass("p-navbar-wp");
	}

	// Table
	$('.wp-block-table').addClass('p-table-container');
	$('.p-table-container').removeClass('wp-block-table');

	// Stick footer to bottom on short page
	if ($(document).height() <= $(window).height()) {
		$('.footer').css({ 'position': 'fixed', 'bottom': 0, 'width': '100%' });
	}

});