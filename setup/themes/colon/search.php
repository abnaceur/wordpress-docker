<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package colon
 */

get_header();
colon_before_title();
if(true===get_theme_mod( 'colon_enable_page_title',true)) :
	do_action('colon_get_page_title',false,false,true,false);
endif;
colon_after_title();

?>

<div id="primary" class="<?php echo esc_attr(get_theme_mod('colon_header_menu_style','style1')); ?> content-area">
	<main id="main" class="site-main colon-main" role="main">
		<div class="content-blog searchpage">
			<div class="container">
				<div class="row">
					<?php
						if ( is_active_sidebar('sidebar-1')) :
							if('right'===esc_html(get_theme_mod('colon_blog_sidebar_layout','right'))) :
			        			?>
									<div class="col-md-9">
										<div id="primary" class="content-area">
											<?php
											if ( have_posts() ) : ?>
												<div class="search-content">
													<h1 class="page-search"><?php printf( esc_html__( 'Search Results for: %s', 'colon' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
												</div><!-- .page-header -->

												<?php
												/* Start the Loop */
												while ( have_posts() ) : the_post();

													/**
													 * Run the loop for the search to output the results.
													 * If you want to overload this in a child theme then include a file
													 * called content-search.php and that will be used instead.
													 */
													get_template_part( 'template-parts/post/content', 'search' );

												endwhile;
												the_posts_navigation();
											else :
												get_template_part( 'template-parts/post/content', 'none' );
											endif; ?>
										</div>
									</div>
									<div class="col-md-3">
									<?php get_sidebar('sidebar-1'); ?>
									</div>
								<?php
							elseif('left'===esc_html(get_theme_mod('colon_blog_sidebar_layout','right'))) :
								?>
									<div class="col-md-3">
									<?php get_sidebar('sidebar-1'); ?>
									</div>
									<div class="col-md-9">
										<div id="primary" class="content-area">
											<?php
											if ( have_posts() ) : ?>

												<div class="search-content">
													<h1 class="page-search"><?php printf( esc_html__( 'Search Results for: %s', 'colon' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
												</div><!-- .page-header -->

												<?php
												/* Start the Loop */
												while ( have_posts() ) : the_post();

													/**
													 * Run the loop for the search to output the results.
													 * If you want to overload this in a child theme then include a file
													 * called content-search.php and that will be used instead.
													 */
													get_template_part( 'template-parts/post/content', 'search' );

												endwhile;
												the_posts_navigation();
											else :
												get_template_part( 'template-parts/post/content', 'none' );
											endif; ?>
										</div>
									</div>									
								<?php
							else :
								?>
									<div class="col-md-12">
										<div id="primary" class="content-area">
											<?php
											if ( have_posts() ) : ?>

												<div class="search-content">
													<h1 class="page-search"><?php printf( esc_html__( 'Search Results for: %s', 'colon' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
												</div><!-- .page-header -->

												<?php
												/* Start the Loop */
												while ( have_posts() ) : the_post();

													/**
													 * Run the loop for the search to output the results.
													 * If you want to overload this in a child theme then include a file
													 * called content-search.php and that will be used instead.
													 */
													get_template_part( 'template-parts/post/content', 'search' );

												endwhile;
												the_posts_navigation();
											else :
												get_template_part( 'template-parts/post/content', 'none' );
											endif; ?>
										</div>
									</div>
								<?php
							endif;
						else:
							?>
								<div class="col-md-12">
									<div id="primary" class="content-area">
										<?php
										if ( have_posts() ) : ?>

											<div class="search-content">
												<h1 class="page-search"><?php printf( esc_html__( 'Search Results for: %s', 'colon' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
											</div><!-- .page-header -->

											<?php
											/* Start the Loop */
											while ( have_posts() ) : the_post();

												/**
												 * Run the loop for the search to output the results.
												 * If you want to overload this in a child theme then include a file
												 * called content-search.php and that will be used instead.
												 */
												get_template_part( 'template-parts/post/content', 'search' );

											endwhile;
											the_posts_navigation();
										else :
											get_template_part( 'template-parts/post/content', 'none' );
										endif; ?>
									</div>
								</div>
							<?php
						endif;
					?>
				</div>
			</div>
		</div>
	</main>
</div>

<?php

get_footer();
