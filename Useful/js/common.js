$(function () {

	$(".hamburger").on('click', function (e) {
		$(this).toggleClass('is-active');
		return false;
	})

	$("#my-menu").mmenu();


	$(".popup-with-zoom-anim").each(function (e) {
		var th = $(this);

		th.attr("href", "#preview-" + e)
	})

	$(".zoom-anim-dialog").each(function (e) {
		var th = $(this);

		th.attr("id", "preview-" + e)
	})

	$('.popup-with-zoom-anim').magnificPopup({
		type: 'inline',

		fixedContentPos: true,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,

		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in',

		modal: true
	});
	$(document).on('click', '.popup-modal-dismiss', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});

});

$(window).on('load', function () {
	$('.preloader').fadeOut('slow');
});