<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package colon
 */

get_header();
colon_before_title();
do_action('colon_get_page_title',true,false,false,false);
colon_after_title();

?>

<div id="primary" class="container content-area">
	<div id="main" class="site-main" role="main">
		<div class="content-inner">
			<div id="blog-section">
		        <div class="row">
		        	<?php
		        		if ( is_active_sidebar('sidebar-1')) :
		        			if('right'===esc_html(get_theme_mod('colon_blog_sidebar_layout','right'))) :
		        				?>
									<div id="post-wrapper" class="col-md-9">
										<?php
											if(have_posts() ) :							
												while(have_posts() ) :
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													*/
													get_template_part( 'template-parts/post/content', get_post_format());
												endwhile;
												?>
									                <nav class="pagination">
									                    <?php the_posts_pagination(); ?>
									                </nav>
												<?php	
											endif;		
										?>		
						            </div>
						            <div id="sidebar-wrapper" class="col-md-3">
										<?php get_sidebar('sidebar-1'); ?>
									</div>
						    	<?php
						    elseif('left'===esc_html(get_theme_mod('colon_blog_sidebar_layout','right'))) :
    							?>
									<div id="sidebar-wrapper" class="col-md-3">
										<?php get_sidebar('sidebar-1'); ?>
							        </div>
						            <div id="post-wrapper" class="col-md-9">
						            	<?php
											if(have_posts() ) :
												while(have_posts() ) :
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/post/content', get_post_format());
												endwhile;
												?>
								                	<nav class="pagination">
								                		<?php the_posts_pagination(); ?>
								                	</nav>
												<?php	
											endif;		
										?>
						            </div>
								<?php
							else :
								?>
									<div class="col-md-12">
										<?php
											if(have_posts() ) :
												while(have_posts() ) :
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/post/content', get_post_format());
												endwhile;
												?>
						                			<nav class="pagination">
						                    			<?php the_posts_pagination(); ?>
						                			</nav>
												<?php	
											endif;
										?>
						            </div>
								<?php
							endif;
						else:
							?>
								<div class="col-md-12">
									<?php
										if(have_posts() ) :
											while(have_posts() ) :
												the_post();
												/*
												 * Include the Post-Format-specific template for the content.
												 * If you want to override this in a child theme, then include a file
												 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
												 */
												get_template_part( 'template-parts/post/content', get_post_format());
											endwhile;
											?>
					                			<nav class="pagination">
					                    			<?php the_posts_pagination(); ?>
					                			</nav>
											<?php	
										endif;
									?>
					            </div>
							<?php
						endif;
					?>          
		        </div>
			</div>
		</div>
	</div>
</div>


<?php

get_footer();
