<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogzilla
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php blogzilla_post_thumbnail(); ?>
	 <div class="article-wrap">
        <header class="entry-header">
            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

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
            <?php endif; ?>
        </header><!-- .entry-header -->



        <div class="entry-content">
            <?php the_excerpt();
            ?>
        </div><!-- .entry-content -->

    	<footer class="entry-footer">
    		<a href="<?php echo esc_url(get_the_permalink()); ?>" class="read-more-btn"><?php esc_html_e('Continue Reading' , 'blogzilla'); ?></a>

            <div class="footer-social-icons">
                <ul class="social-icons">
                    <li><span data-sharer="facebook" data-url="<?php echo esc_url(get_the_permalink()); ?>" class="social-icon"> <i class="fa fa-facebook"></i></span></li>
                    <li><span data-sharer="twitter" data-url="<?php echo esc_url(get_the_permalink()); ?>" class="social-icon"> <i class="fa fa-twitter"></i></span></li>
                    <li><span data-sharer="pinterest" data-url="<?php echo esc_url(get_the_permalink()); ?>" class="social-icon"> <i class="fa fa-pinterest"></i></span></li>
                    <li><span data-sharer="linkedin" data-url="<?php echo esc_url(get_the_permalink()); ?>" class="social-icon"> <i class="fa fa-linkedin"></i></span></li>
                    <li><span data-sharer="whatsapp" data-url="<?php echo esc_url(get_the_permalink()); ?>" class="social-icon"> <i class="fa fa-whatsapp"></i></span></li>
                    <li><span data-sharer="tumblr" data-url="<?php echo esc_url(get_the_permalink()); ?>" class="social-icon"> <i class="fa fa-tumblr"></i></span></li>
                    <li><span data-sharer="reddit" data-url="<?php echo esc_url(get_the_permalink()); ?>" class="social-icon"> <i class="fa fa-reddit"></i></span></li>
                </ul>
            </div>
    	</footer><!-- .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
