<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ample_magazine
 */

get_header();?>

	<div class="ample-40"></div>
<?php
$ample_magazine_design_layout = ample_magazine_get_option('ample_magazine_design_layout_option');
if($ample_magazine_design_layout== 'container'){?>
	<div class="container">
<?php } else{
	?>
	<div class="container-full-width">
	<?php
}
?>



	
</div>
<?php
$ample_magazine_blog_page_title = ample_magazine_get_option('ample_magazine_blog_title_option');
if (is_home()) { ?>
	<?php if (is_active_sidebar('home-sections')){ ?>
	<section class="block-wrapper home1">
		<div class="container">
			<div class="row">



				<div id="primary" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

					<?php dynamic_sidebar('home-sections'); ?>

				</div><!-- Content Col end -->


				<div id="secondary" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="sidebar sidebar-right">


						<?php dynamic_sidebar('sidebar-1'); ?>


					</div><!-- Sidebar right end -->
				</div><!-- Sidebar Col end -->

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->
	<?php } ?>

	<?php if (is_active_sidebar('home-sections-2')) { ?>
		<section class="block-wrapper home2 ">
			<div class="container">
				<div class="row">
					<div id="primary" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php dynamic_sidebar('home-sections-2'); ?>
                    </div>
				</div><!-- Row end -->
			</div><!-- Container end -->
		</section>

		<?php
	}
}
 $ample_magazine_hide_home_page_blog = ample_magazine_get_option('ample_magazine_latest_blog_option');

if($ample_magazine_hide_home_page_blog == 1){
?>



	<div class="ample-header-gab"></div>

	<div id="content">
		<section class="block-wrapper adjust">


			<div class="container">

					<div id="primary" class="col-lg-8 col-md-12">
						<div id="" class="ample-inner-banner">

								<div class="entry-title">
									<?php if(!empty($ample_magazine_blog_page_title)){?>
									<header class="head">
										<h3 class="head-title">
			<span>
				<?php echo esc_html($ample_magazine_blog_page_title); ?>
			</span>
										</h3>
									</header><!-- .page-header -->
									<?php } ?>
								
							</div>
						</div>

						<main id="main" class="site-main">


							<?php
							if ( have_posts() ) :


								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
									get_template_part( 'template-parts/content', get_post_format() );

								endwhile;
								?>
                               <div class='next-page'>
								   <?php
								   the_posts_pagination();								   ?>
							   </div>
								<div class="ample-header-gab"></div>
								<?php

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?>

						</main><!-- #main -->

					</div><!-- Content Col end -->

					<div id="secondary" class="col-lg-4 col-md-12">
						<div class="sidebar sidebar-right">
							<?php
							get_sidebar(); ?>

						</div><!-- Sidebar right end -->
					</div><!-- Sidebar Col end -->

			</div><!-- Container end -->
		</section>

		<?php } ?>
	</div>



<?php

get_footer();

