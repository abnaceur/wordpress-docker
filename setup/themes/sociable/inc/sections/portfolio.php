<?php
/**
 * Portfolio section
 *
 * This is the template for the content of portfolio section
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */
if ( ! function_exists( 'sociable_add_portfolio_section' ) ) :
    /**
    * Add portfolio section
    *
    *@since Sociable 1.0.0
    */
    function sociable_add_portfolio_section() {
    	$options = sociable_get_theme_options();
        // Check if portfolio is enabled on frontpage
        $portfolio_enable = apply_filters( 'sociable_section_status', true, 'portfolio_section_enable' );

        if ( true !== $portfolio_enable ) {
            return false;
        }
        // Get portfolio section details
        $section_details = array();
        $section_details = apply_filters( 'sociable_filter_portfolio_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render portfolio section now.
        sociable_render_portfolio_section( $section_details );
    }
endif;

if ( ! function_exists( 'sociable_get_portfolio_section_details' ) ) :
    /**
    * portfolio section details.
    *
    * @since Sociable 1.0.0
    * @param array $input portfolio section details.
    */
    function sociable_get_portfolio_section_details( $input ) {
        $options = sociable_get_theme_options();

        $content = array();
        $cat_id = ! empty( $options['portfolio_content_category'] ) ? $options['portfolio_content_category'] : array();
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 5,
            'category__in'      => ( array ) $cat_id,
            'ignore_sticky_posts'   => true,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = sociable_trim_content( 25 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

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
// portfolio section content details.
add_filter( 'sociable_filter_portfolio_section_details', 'sociable_get_portfolio_section_details' );


if ( ! function_exists( 'sociable_render_portfolio_section' ) ) :
  /**
   * Start portfolio section
   *
   * @return string portfolio content
   * @since Sociable 1.0.0
   *
   */
   function sociable_render_portfolio_section( $content_details = array() ) {
        $options = sociable_get_theme_options();
        $cat_id = ! empty( $options['portfolio_content_category'] ) ? $options['portfolio_content_category'] : array();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="our-projects" class="relative page-section">
                <div class="wrapper">
                    <?php if ( ! empty( $options['portfolio_icon'] ) ) : ?>
                        <div class="section-icon">
                            <i class="fa <?php echo esc_attr( $options['portfolio_icon'] ); ?>" ></i>
                        </div><!-- .section-icon -->
                    <?php endif;

                    if ( ! empty( $options['portfolio_title'] ) ) : ?>
                        <div class="section-header">
                            <h2 class="section-title"><?php echo esc_html( $options['portfolio_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; 

                    if ( ! empty( $cat_id ) ) : ?>
                        <div class="slick-filter-nav">
                            <ul class="slick-filter">
                                <li class="active"><a href="#" data-slug="all"><?php esc_html_e( 'All', 'sociable' ); ?></a></li>
                                <?php foreach ( $cat_id as $cat ) : ?>
                                    <li><a href="#" data-slug="<?php echo 'portfolio-' . absint( $cat ); ?>"><?php echo esc_html( get_cat_name( $cat ) ); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div><!-- .slick-filter-nav -->
                    <?php endif; ?>

                    <div class="project-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 3, "infinite": false, "speed": 1000, "dots": true, "arrows":false, "autoplay": false, "draggable": true, "fade": false }'>
                        <?php foreach ( $content_details as $content ) : 
                            $categories = get_the_category( $content['id'] );
                        ?>
                            <article class="all <?php foreach ( $categories as $category ) { echo ' portfolio-' . absint( $category->term_id ); } ?>">
                                <div class="project-item-wrapper" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        <span class="cat-links">
                                            <?php the_category( '', '', $content['id'] ); ?>
                                        </span><!-- .cat-links -->
                                    </header>
                                </div>
                            </article>
                        <?php endforeach; ?>

                    </div><!-- .project-slider -->

                </div><!-- .wrapper -->
            </div><!-- #our-projects -->

    <?php }
endif;