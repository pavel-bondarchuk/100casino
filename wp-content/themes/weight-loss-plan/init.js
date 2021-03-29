jQuery(document).ready(function($) {
	setTimeout(function () {
		$('body').addClass('show-page');
	}, 400);

	new WOW().init();

	$('.js-top').click(function(e){
		e.preventDefault();
		$("html, body").animate({ scrollTop: 0 }, 1000);
			return false;
		});
})