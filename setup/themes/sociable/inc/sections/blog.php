<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */
if ( ! function_exists( 'sociable_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Sociable 1.0.0
    */
    function sociable_add_blog_section() {
    	$options = sociable_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'sociable_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'sociable_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        sociable_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'sociable_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Sociable 1.0.0
    * @param array $input blog section details.
    */
    function sociable_get_blog_section_details( $input ) {
        $options = sociable_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];
        
        $content = array();
        switch ( $blog_content_type ) {
        	
            case 'category':
                $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 3,
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : array();
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 3,
                    'category__not_in'  => ( array ) $cat_ids,
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['excerpt']   = sociable_trim_content( 25 );
                $page_post['url']       = get_the_permalink();
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri().'/assets/uploads/no-featured-image-590x650.jpg';
                $page_post['author']    = sociable_author();

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// blog section content details.
add_filter( 'sociable_filter_blog_section_details', 'sociable_get_blog_section_details' );


if ( ! function_exists( 'sociable_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Sociable 1.0.0
   *
   */
   function sociable_render_blog_section( $content_details = array() ) {
        $options = sociable_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="latest-posts" class="relative page-section">
            <div class="wrapper">
                <?php if ( ! empty( $options['blog_icon'] ) ) : ?>
                    <div class="section-icon">
                        <i class="fa <?php echo esc_attr( $options['blog_icon'] ); ?>" ></i>
                    </div><!-- .section-icon -->
                <?php endif; ?>

                <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="archive-blog-wrapper col-3 clear">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="blog-post-item <?php echo has_post_thumbnail( $content['id'] ) ? 'has' : 'no'; ?>-post-thumbnail">

                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <div class="entry-meta">
                                        <?php sociable_posted_on( $content['id'] ); ?>    
                                    </div><!-- .entry-meta -->

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->

                                    <?php echo sociable_article_footer_meta( $content['id'] ); ?>      
                                </div><!-- .entry-container -->
                            </div><!-- .facebook-post-item -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .archive-blog-wrapper -->

            </div><!-- .wrapper -->
        </div><!-- #latest-posts -->

    <?php }
endif;