<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogzilla
 */
$blogzilla_options = blogzilla_theme_options();
$facebook_link = $blogzilla_options['facebook_link'];
$youtube_link = $blogzilla_options['youtube_link'];
$twitter_link = $blogzilla_options['twitter_link'];
$pinterest_link = $blogzilla_options['pinterest_link'];
$instagram_link = $blogzilla_options['instagram_link'];
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open();  ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogzilla' ); ?></a>

	<header id="masthead" class="site-header">
        <div class="top-header">


    			<div class="container">
    				<div class="row">
                        <nav class="navbar navbar-default">
                            <div class="header-logo">
                                <?php
                                $description = get_bloginfo('description', 'display');
                                    the_custom_logo();

                                    ?>
                                    <div class="site-identity-wrap">
                                    <h3 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                                    </h3>
                                    <p class="site-description"><?php echo esc_html($description) ?></p>
                                    </div>
                                    <?php
                                ?>
                            </div>

                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar-collapse" aria-expanded="false">
                                <span class="sr-only"><?php echo esc_html__('Toggle navigation','blogzilla'); ?></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
            	            <div class="collapse navbar-collapse" id="navbar-collapse">

            	             <?php
            	                if (has_nav_menu('primary')) { ?>
            	                <?php
            	                    wp_nav_menu(array(
            	                        'theme_location' => 'primary',
            	                        'container' => '',
            	                        'menu_class' => 'nav navbar-nav navbar-center',
            	                        'walker' => new blogzilla_nav_walker(),
            	                        'fallback_cb' => 'blogzilla_nav_walker::fallback',
            	                    ));
            	                ?>
            	                <?php } else { ?>
            	                    <nav id="site-navigation" class="main-navigation clearfix">
            	                        <?php   wp_page_menu(array('menu_class' => 'menu')); ?>
            	                    </nav>
            	                <?php } ?>

            	            </div><!-- End navbar-collapse -->

                                <ul class="social-icons header-icons">
                                    <?php if($facebook_link){ ?>
                                    <li><span class="social-icon"> <a href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook"></i></a></span></li>
                                    <?php  } ?>

                                    <?php if($twitter_link){ ?>
                                    <li><span  class="social-icon"><a href="<?php echo esc_url($twitter_link); ?>"> <i class="fa fa-twitter"></i></a></span></li>
                                    <?php  } ?>

                                    <?php if($pinterest_link){ ?>
                                    <li><span  class="social-icon"><a href="<?php echo esc_url($pinterest_link); ?>"> <i class="fa fa-pinterest"></i></a></span></li>
                                    <?php  } ?>

                                    <?php if($youtube_link){ ?>
                                    <li><span  class="social-icon"><a href="<?php echo esc_url($youtube_link); ?>"> <i class="fa fa-youtube"></i></a></span></li>
                                    <?php  } ?>

                                    <?php if($instagram_link){ ?>
                                    <li><span  class="social-icon"><a href="<?php echo esc_url($instagram_link); ?>">  <i class="fa fa-instagram"></i></a></span></li>
                                    <?php  } ?>
                                </ul>
                        </nav>
                     </div>
                </div>

        </div>
	</header><!-- #masthead -->

<?php

if ( ! is_page() && ! is_single()) {
     get_template_part('template-parts/banner','section');
} ?>
<div id="content">
