jQuery(function ($) {
	$(document).on('click','tbody tr[data-href]',function () {
		window.location = $(this).attr('data-href');
	}).find('a').hover(function () {
		$(this).parents('tr').unbind('click');
	}, function () {
		$(this).parents('tr').click(function () {
			window.location = $(this).attr('data-href');
		});
	});
});