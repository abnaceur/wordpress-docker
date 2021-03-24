<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package colon
 */

get_header();
colon_before_title();
?>
	<div class="page-title">
        <?php colon_before_title_content(); ?>
        <div class="container">
        	<?php
        		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
        	?>
           <h1 class="main-title">
           		<span><?php esc_html_e('Author: ','colon') ?></span>
           		<?php echo $curauth->nickname; ?>
        	</h1>
            <?php
                if(get_theme_mod( 'colon_enable_page_breadcrumbs',true)) :
                    do_action('colon_breadcrumbs_hook');
                endif;
            ?>
        </div>
        <?php colon_after_title_content(); ?>
    </div>
<?php
colon_after_title();

?>

<div id="primary" class="<?php echo esc_attr(get_theme_mod('colon_header_menu_style','style1')); ?> content-area">
	<main id="main" class="site-main colon-main" role="main">
		<div class="container">
			<div id="blog-section">
		        <div class="row">
		        	<?php
		        		if ( is_active_sidebar('sidebar-1')) :
		        			if('right'===esc_html(get_theme_mod('colon_blog_sidebar_layout','right'))) :
			        			?>
			        				<div class="col-md-9">
										<?php
											if(have_posts() ) :
												while(have_posts() ) :
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/post/content-archive', get_post_format());
												endwhile;
												?>
						                			<nav class="pagination">
						                    			<?php the_posts_pagination(); ?>
						                			</nav>
												<?php	
											endif;
										?>
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
										<?php
											if(have_posts() ) :
												while(have_posts() ) :
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/post/content-archive', get_post_format());
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
													get_template_part( 'template-parts/post/content-archive', get_post_format());
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
												get_template_part( 'template-parts/post/content-archive', get_post_format());
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
	</main>
</div>

<?php

get_footer();