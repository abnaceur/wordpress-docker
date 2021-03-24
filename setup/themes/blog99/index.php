<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */

	get_header(); 

	/**
	 * Main Banner Slider
	*/
	blog99_main_slider(); 
	
	/**
	 * Features Category List
	*/
	blog99_home_category_postlist();


blog99_before_mainsec(); 

?>

	<?php 
		if ( blog99_get_sidebar_layout() == 'blog99-left-sidebar' || blog99_get_sidebar_layout() == 'blog99-both-sidebar' ) :

		get_sidebar('left');

		endif 
	?>

	<div id="primary" class="content-area <?php echo esc_attr( blog99_container_class() ); ?>">

		<?php blog99_content_top(); ?>
		
				<?php 
					//get the title
					$blog99_title = get_theme_mod('blog99_blog_header_title');
				
				if( !empty( $blog99_title ) ): ?>
					
					<h2 id="blog99-main-slider-section" class="widget-title mt-0"><span>	<?php echo esc_html( $blog99_title ); ?></span><span class="effect"></span></h2>
				
				<?php endif; ?>
				
				<?php blog99_content_loop(); ?>

				<?php 
					the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => __( '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10"><g fill="none" fill-rule="evenodd" stroke="#FFF"><path d="M17 5.1H.075M13.31 9.508L17 4.845 13.31.1"></path></g></svg>', 'blog99' ),
						'next_text' => __( '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10"><g fill="none" fill-rule="evenodd" stroke="#FFF"><path d="M17 5.1H.075M13.31 9.508L17 4.845 13.31.1"></path></g></svg>', 'blog99' ),
					) );
				?>
		<?php blog99_content_bottom(); ?>

	</div><!-- #primary -->

	<?php 

		if ( blog99_get_sidebar_layout() == 'blog99-right-sidebar' || blog99_get_sidebar_layout() == 'blog99-both-sidebar'  ) : 

			get_sidebar(); 

		endif; 


blog99_after_mainsec(); 

get_footer();