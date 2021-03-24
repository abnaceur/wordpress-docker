<?php
/**
 * Template part for displaying header menu
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package colon
 */

?>

<?php
	$page_val = is_front_page() ? 'home' : 'page' ;
?>
<header id="<?php echo esc_attr($page_val); ?>-inner" class="elementor-menu-anchor theme-menu-wrapper full-width-menu style1 page colon-header" role="banner" itemscope itemtype="https://schema.org/WPHeader">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'colon' ); ?></a>
	<?php
		if(true===get_theme_mod('colon_enable_header_topbar',false)) :
			/**
	        * Hook - colon_action_enable_header_topbar_style1
	        *
	        * @hooked colon_enable_header_topbar_style1 - 10
	        */
	        do_action( 'colon_action_enable_header_topbar_style1' );
		endif;
	?>
	<div id="header-main" class="header-wrapper colon-wrapper">
		<div class="container">
			<div class="clearfix"></div>
			<div class="logo" itemscope itemtype="https://schema.org/Organization">
       			<?php 
       				if (has_custom_logo()) :
	                	colon_custom_logo();
	                endif;               		                	
                ?>
                <?php 
                    $alt_logo=esc_url(get_theme_mod( 'colon_sticky_logo' ));
                	if(!empty($alt_logo)) :
	                	?>
	                		<a id="logo-alt" class="logo-alt" href="<?php echo esc_url(home_url( '/' )); ?>"><img src="<?php echo esc_url( get_theme_mod( 'colon_sticky_logo' ) ); ?>" alt="logo"></a>
	                	<?php
	                endif;
	            	if(!empty(get_bloginfo( 'name' ))) :
	            		?>
	            			<h1 class="site-title" itemprop="name">
						        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a>
						    </h1>
	            		<?php
	            	endif;
	            ?>
			    <?php
			        $description = get_bloginfo( 'description', 'display' );
			        if ( $description || is_customize_preview() ) :
			            ?>
			                <p class="site-description" itemprop="description"><?php echo $description; ?></p>
			            <?php 
			        endif;
			    ?>
			</div>
			<div class="top-menu-wrapper">
				<nav class="top-menu" role="navigation" aria-label="<?php esc_attr_e( 'primary', 'colon' ); ?>" itemscope itemtype="https://schema.org/SiteNavigationElement">
					<div class="menu-header">
						<span><?php echo esc_html(get_theme_mod( 'colon_header_toggle_menu_text','MENU')) ?> </span>
				     	<button type="button" class="hd-bar-opener navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
					       	<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'colon' ); ?></span>
					      	<span class="icon-bar"></span>
					       	<span class="icon-bar"></span>
					       	<span class="icon-bar"></span>
				     	</button>
				   	</div>
					<div class="navbar-collapse collapse clearfix" id="navbar-collapse-1">
				   		<?php
			                wp_nav_menu( array(			                  	
			                  	'theme_location'    => 'primary',
			                  	'depth'             => 3,
			                  	'container'         => 'ul',
			                  	'container_class'   => 'navigation',
			                  	'container_id'      => 'menu-primary',
			                  	'menu_class'        => 'navigation',
			                  	)
			                );
		             	?>
				   	</div>
				</nav>
	        </div>
		</div>
    </div>
    <div class="clearfix"></div>
    <?php
    	/**
        * Hook - colon_action_header_inner_content
        *
        * @hooked colon_header_inner_content - 10
        */
        do_action( 'colon_action_header_inner_content' );
    ?>
</header>

<!-- Side Bar -->
<section id="hd-left-bar" class="hd-bar left-align mCustomScrollbar" data-mcs-theme="dark">
    <div class="hd-bar-wrapper">
    	<div class="hd-bar-closer">
	        <button><span class="qb-close-button"></span></button>
	    </div>
        <div class="side-menu">
        	<nav role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
	            <div class="side-navigation clearfix" id="navbar-collapse-2">
			   		<?php
		                wp_nav_menu( array(			                  	
		                  	'theme_location'    => 'primary',
		                  	'depth'             => 3,
		                  	'container'         => 'ul',
		                  	'container_class'   => 'navigation',
		                  	'container_id'      => 'menu-primary-mobile',
		                  	'menu_class'        => 'navigation',
		                  	)
		                );
	             	?>						
			   	</div>
			</nav>
        </div>
        <a class="hd-bar-close" href="#"><?php esc_html_e( 'Close Menu', 'colon' ); ?></a>
    </div>
</section>
<div class="clearfix"></div>
<div id="content" class="elementor-menu-anchor"></div>