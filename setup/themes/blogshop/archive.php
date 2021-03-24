<?php
/**
 *   The template for displaying archive pages
 *
 *   @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *   @package blogshop
 */
get_header();
/**
 * Blog Page Sidebar Control
 */
$getblogsidebar = get_theme_mod( 'blog_page_sidebar', 'right' );
$blogsidebar = 'col-md-5 col-lg-4 order-1';
$blogcontent = 'col-md-7 col-lg-8 order-0';
$sidebarshow = true;
if ($getblogsidebar === 'right') {
    $blogsidebar = 'col-md-5 col-lg-4 order-1';
    $blogcontent = 'col-md-7 col-lg-8 order-0';
    $sidebarshow = true;
}elseif ($getblogsidebar === 'left') {
    $blogsidebar = 'col-md-5 col-lg-4 order-0';
    $blogcontent = 'col-md-7 col-lg-8 order-1';
    $sidebarshow = true;
}elseif($getblogsidebar === 'no'){
    $blogsidebar = 'sidebar-hide';
    $blogcontent = 'col-md-12';
    $sidebarshow = false;
}else{
	$blogsidebar = 'col-md-5 col-lg-4 order-1';
	$blogcontent = 'col-md-7 col-lg-8 order-0';
}
 $get_blog_layout = get_theme_mod('blog_layout', 'list');
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main archive-page-section">
			<div class="container">
				<div class="row">
					<div class="<?php echo esc_attr( $blogcontent );?>">
						<?php if ( have_posts() ) :
							 if ('grid' == $get_blog_layout) {
                                echo '<div class="row masonaryactive">';
                            }
                            
                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();
                                
                                get_template_part('template-parts/content/content', get_post_type());
                               
                            endwhile;
                            if ('grid' == $get_blog_layout) {
                                    echo '</div>';
                                }
                               blogshop_pagination();
							else :
								get_template_part( 'template-parts/content/content', 'none' );
							endif;
							?>
					</div>
					<?php if ($sidebarshow === true) :?>
                        <div class="<?php echo esc_attr( $blogsidebar );?>">
                            <?php get_sidebar(); ?>
                        </div>
                    <?php endif; ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
