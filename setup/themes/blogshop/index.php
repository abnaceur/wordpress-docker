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
 * @package blogshop
 */

get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
<?php
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

?>
        <div class="blog-post-section">
            <div class="container">
                <div class="row">
                    <div class="<?php echo esc_attr( $blogcontent );?>">
                        <?php
                        if ( have_posts() ) :
                            $get_blog_layout = get_theme_mod('blog_layout');
                         
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
                            get_template_part('template-parts/content/content', 'none');
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
        </div>
    </main><!-- #main -->
</div>
<?php
get_footer();
