<?php
/**
 * Template Name: Front Page
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

$featuredsection = get_theme_mod('featured_section_on_off', false);
$subfeaturedshow = get_theme_mod('sub_featured_gallery', false);
if (true === $featuredsection) :
    get_template_part( 'template-parts/featured/featured', 'layout' );
endif;
if (true === $subfeaturedshow):
    get_template_part( 'template-parts/featured/subfeatured', 'slider' );
endif;
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
<?php
/**
 * Blog Page Sidebar Control
 */
$getblogsidebar = get_theme_mod( 'front_page_sidebar', 'right' );
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
                            /*
                             * The WordPress Query class.
                             *
                             * @link http://codex.wordpress.org/Function_Reference/WP_Query
                             */
                            global $paged;
                            if ( get_query_var( 'paged' ) ) {
                                $paged = get_query_var( 'paged' );
                            }elseif ( get_query_var( 'page' ) ) { 
                                $paged = get_query_var( 'page' ); 
                            }else {
                                $paged = 1;
                            }
                            // $currentPage = get_query_var( 'paged' );
                            $args = array(
                                // Choose ^ 'any' or from below, since 'any' cannot be in an array
                                'post_type' => array(
                                    'post',
                                ),
                                // Pagination Parameters
                                'posts_per_page' => get_option('posts_per_page'),
                                'paged' => $paged
                            );
                        
                        $query = new WP_Query( $args );
                        
                        if ( $query->have_posts() ) :
                            $get_blog_layout = get_theme_mod('front_post_layout');
                            if (is_home() && ! is_front_page()) :
                                ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>
                                <?php 
                            endif;
                            if ('grid' == $get_blog_layout) {
                                    echo '<div class="row masonaryactive">';
                                }
                            /* Start the Loop */
                            while ($query->have_posts()) :
                                $query->the_post();
                                /*
                                 * Include the Post-Type-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                 */
                                $grid_column = get_theme_mod( 'front_grid_column', 'col-sm-6' );
                                if ($grid_column === 'col-sm-6') {
                                    $grid_column = 'col-lg-6 col-md-12';
                                }elseif ($grid_column === 'col-sm-4') {
                                    $grid_column = 'col-sm-12 col-md-6 col-lg-4';
                                }elseif ($grid_column === 'col-sm-3') {
                                    $grid_column = 'col-sm-12 col-md-6 col-lg-3';
                                }
                                if ('grid' == $get_blog_layout) {
                                    echo '<div class="'.$grid_column.' blog-grid-layout">';
                                }
                                get_template_part('template-parts/content/content', 'frontpage');
                                if ('grid' == $get_blog_layout) {
                                    echo '</div>';
                                }
                            endwhile;
                            if ('grid' == $get_blog_layout) {
                                    echo '</div>';
                                }
                                $pagination_alignment = get_theme_mod('front_page_pagination', 'center');
                                echo '<div class="pagination-'.$pagination_alignment.'">';
                                $prev_icon = '<i class="fa fa-angle-left"></i>';
                                $next_icon = '<i class="fa fa-angle-right"></i>';
                                   echo paginate_links( array(
                                    'total' => $query->max_num_pages,
                                    'type'  => 'list',
                                    'current' => max(1, $paged),
                                    'prev_text' => $prev_icon,
                                    'next_text' => $next_icon,
                                   ) );
                                echo '</div>';
                        else :
                            get_template_part('template-parts/content/content', 'none');
                        endif;
                        wp_reset_postdata();
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
