<?php
/**
 * Shows breadcrumb
 *
 * @package blog99
 */

// If we are front page or blog page, return.
if ( is_front_page() || is_home() ) {
	return;
}

// If file is not already loaded, loaded it now.
if ( ! function_exists( 'breadcrumb_trail' ) ) {

	load_template( get_template_directory() . '/wp99themes/compatibility/class-breadcrumb-trail.php' );
}
//single breadcrumb section
?>

<div class="breadcrumbwrap">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12 col-sm-12">
	        	<div class="custom-header">
		            <?php 
		            if( get_theme_mod('blog99_breadcrumb_title_enable',true) == true ){

		                if( is_single() || is_page() ) {

		                    the_title( '<h2 class="entry-title">', '</h2>' );

		                } elseif( class_exists( 'WooCommerce' ) && (is_product() || is_shop() ) ) { ?>

		                    <h2 class="page-title"><?php woocommerce_page_title(); ?></h2>

		                <?php } elseif( is_archive() ) {

		                    the_archive_title( '<h2 class="page-title">', '</h2>' );
		                    the_archive_description( '<div class="taxonomy-description">', '</div>' );

		                } elseif( is_search() ) { ?>

		                    <h2 class="page-title">
		                          <?php printf( wp_kses( 'Search Results for: %s', 'blog99' ), '<span>' . get_search_query() . '</span>' ); ?>
		                    </h2>

		                <?php } elseif( is_404() ) {

		                    echo '<h2 class="entry-title">'. esc_html( '404 Error', 'blog99' ) .'</h2>';

		                } elseif( is_home() ) {

		                    $page_for_posts_id = get_option( 'page_for_posts' );
		                    $page_title = get_the_title( $page_for_posts_id );

		            ?>
		                <h2 class="entry-title"><?php echo esc_html( $page_title ); ?></h2>
					
		            <?php } } if( get_theme_mod('blog99_breadcrumb_list_enable',true) == true ){ ?>

		                <nav id="breadcrumb" class="breadcrumbs">
		                    <?php
		                        get_blog99_breadcrumb_trail( array(
		                          'container'   => 'div',
		                          'show_browse' => false,
		                        ) );
		                    ?>
		                </nav>
		            <?php } ?>
		        </div>
	        </div>
	    </div>
	</div>
</div>

	<!-- <section class="breadcrumb blog99-breadcumb">
		<div class="breadcrumb-wrapper">
			<div class="container">
				<?php
					//breadcrumb title
					if( get_theme_mod('blog99_breadcrumb_title_enable',true) == true ){
						?>
							<h3 class="breadcrumb-title"><?php the_title(); ?></h3>
						<?php
					}
					//breadcrumb list enable
					if( get_theme_mod('blog99_breadcrumb_list_enable',true) == true ){
						get_blog99_breadcrumb_trail( array(
							'container'   => 'div',
							'before'      => '<div class="container">',
							'after'       => '</div>',
							'show_browse' => false,
						) );
					}
				?>
			</div>
		</div>
	</section> -->
	
<?php

if( is_single() && get_theme_mod('blog99_single_page_layout','blog99-single-one') == 'blog99-single-two') :
	
	do_action('blog99_single_page_layout_two'); 

endif; ?>
