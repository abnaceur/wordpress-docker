<style>

	.site-header .top-header{
		background-color: <?php echo esc_html(get_theme_mod('blogtay_top_header_bg','#fff') ); ?>
	}
	.site-header .top-header,
	.site-header .top-header a,
	.site-header .top-header .social-list li a{
		color: <?php echo esc_html(get_theme_mod('blogtay_top_header_color','#777777')); ?> ;
		

	}
	.site-header .top-header,
	.site-header .top-header li a{
		font-size: <?php echo esc_html(get_theme_mod('blogtay_top_header_font-size','14')); ?>px;
	}
	.main-header{
		background-color: <?php echo esc_html(get_theme_mod('blogtay_main_header_bg','#fff')); ?>
	}
	.nav-menu li a{
		color: <?php echo esc_html(get_theme_mod('blogtay_main_header_color','#777')); ?>;
		font-size: <?php echo esc_html(get_theme_mod('blogtay_main_header_font_size','14')); ?>px;
	}
	.nav-menu li a:hover{
		color: <?php echo esc_html(get_theme_mod('blogtay_main_header_hover_color','#edb302')); ?>
	}
	.nav-menu li .sub-menu a{
		color: <?php echo esc_html(get_theme_mod('blogtay_main_header_sub_color', '#777')); ?>;
		font-size: <?php echo esc_html(get_theme_mod('blogtay_main_header_sub_font_size', '14')); ?>px;
	}
	.nav-menu li .sub-menu a:hover{
		color: <?php echo esc_html(get_theme_mod('blogtay_main_header_sub_hover_color', '#fff')); ?>;
		background-color: <?php echo esc_html(get_theme_mod('blogtay_main_header_sub_hover_bg', '#edb302')); ?>;
	}

	
</style>

