<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogzilla
 */
global $post;
$post_format = get_post_format($post->ID);
$blogzilla_options = blogzilla_theme_options();
$single_sidebar_show_checkbox = $blogzilla_options['single_sidebar_show_checkbox'];


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <?php if (is_archive() || is_home()):
         blogzilla_post_thumbnail(); ?>
     <?php endif; ?>
    <div class="article-wrap">


        <header class="entry-header">
            <?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;

            if ( 'post' === get_post_type() ) :
                ?>
                <div class="entry-meta">
                    <div class="metabar-wrap">
                        <span class="author vcard">
                            <strong><?php esc_html_e('By' , 'blogzilla'); ?></strong><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a>
                        </span>
                        <span class="article-date">
                            <a href="<?php echo esc_url(blogzilla_archive_link($post)); ?>"><?php echo esc_html(the_time( get_option( 'date_format' ) )); ?></a></span>
                        <span class="post-comments">
                            <a href="<?php echo esc_url(get_comments_link()); ?>">
                                <?php
                                printf(/* translators: 1: number of comments */ _nx('%1$s Comment','%1$s Comments',get_comments_number(),'', 'blogzilla'), number_format_i18n( get_comments_number() ));?>

                            </a>
                        </span>
                    </div>
                </div><!-- .entry-meta -->

               <?php if ($single_sidebar_show_checkbox== '0' && is_single()){
                blogzilla_post_thumbnail();
               } ?>
            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php

            global $numpages;
            if (is_archive() || is_home()):
                if($numpages>1 && $post_format != 'gallery'){
                    the_content(sprintf( wp_kses( __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'blogzilla'), array( 'span' => array( 'class' => array(), ),)),get_the_title()));
                }
                else{
                    echo wp_kses_post(blogzilla_get_excerpt($post->ID, 400));
                }
            else:
                the_content(sprintf(wp_kses(__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'blogzilla'),array('span' => array('class' => array(),),)),get_the_title()));
            endif;
            if(is_single()) {
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'blogzilla'),
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ));
            }
            ?>
        </div><!-- .entry-content -->

    	<footer class="entry-footer">
    		<a href="<?php echo esc_url(get_the_permalink()); ?>" class="read-more-btn"><?php esc_html_e('Continue Reading' , 'blogzilla'); ?></a>

            <div class="footer-social-icons"><span class="only-single"><?php esc_html_e('Share Now' , 'blogzilla'); ?></span>
                <ul class="social-icons">
                    <li><span data-sharer="twitter" data-url="<?php echo esc_url(get_the_permalink()); ?>" class="social-icon"> <i class="fa fa-twitter"></i></span></li>
                    <li><span data-sharer="pinterest" data-url="<?php echo esc_url(get_the_permalink()); ?>" class="social-icon"> <i class="fa fa-pinterest"></i></span></li>
                    <li><span data-sharer="linkedin" data-url="<?php echo esc_url(get_the_permalink()); ?>" class="social-icon"> <i class="fa fa-linkedin"></i></span></li>

                </ul>
            </div>
    	</footer><!-- .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
