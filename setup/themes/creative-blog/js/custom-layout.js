/**
 * setting for the layout option in customizer
 */
jQuery(document).ready(function () {
	jQuery('.controls#creative-blog-img-container li img').click(function () {
		jQuery('.controls#creative-blog-img-container li').each(function () {
			jQuery(this).find('img').removeClass('creative-blog-radio-img-selected');
		});
		jQuery(this).addClass('creative-blog-radio-img-selected');
	});
});
