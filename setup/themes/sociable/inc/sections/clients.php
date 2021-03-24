<?php
/**
 * Clients section
 *
 * This is the template for the content of clients section
 *
 * @package Theme Palace
 * @subpackage Sociable
 * @since Sociable 1.0.0
 */
if ( ! function_exists( 'sociable_add_clients_section' ) ) :
    /**
    * Add clients section
    *
    *@since Sociable 1.0.0
    */
    function sociable_add_clients_section() {
    	$options = sociable_get_theme_options();
        // Check if clients is enabled on frontpage
        $clients_enable = apply_filters( 'sociable_section_status', true, 'clients_section_enable' );

        if ( true !== $clients_enable ) {
            return false;
        }
        // Get clients section details
        $section_details = array();
        $section_details = apply_filters( 'sociable_filter_clients_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render clients section now.
        sociable_render_clients_section( $section_details );
    }
endif;

if ( ! function_exists( 'sociable_get_clients_section_details' ) ) :
    /**
    * clients section details.
    *
    * @since Sociable 1.0.0
    * @param array $input clients section details.
    */
    function sociable_get_clients_section_details( $input ) {
        $options = sociable_get_theme_options();

        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 5; $i++ ) {
            if ( ! empty( $options['clients_content_page_' . $i] ) )
                $page_ids[] = $options['clients_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 5,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-150x150.jpg';

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
// clients section content details.
add_filter( 'sociable_filter_clients_section_details', 'sociable_get_clients_section_details' );


if ( ! function_exists( 'sociable_render_clients_section' ) ) :
  /**
   * Start clients section
   *
   * @return string clients content
   * @since Sociable 1.0.0
   *
   */
   function sociable_render_clients_section( $content_details = array() ) {
        $options = sociable_get_theme_options();
        $column = ! empty( $options['clients_column'] ) ? $options['clients_column'] : 'col-5';

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="our-partners" class="relative page-section">
            <div class="wrapper">
                <div class="<?php echo esc_attr( $column ); ?>">
                    <?php foreach ( $content_details as $content ) : 
                        if ( ! empty( $content['image'] ) ) : ?>
                            <article><a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" title="<?php echo esc_attr( $content['title'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a></article>
                        <?php endif; 
                    endforeach; ?>
                </div><!-- .col-5 -->
            </div><!-- .wrapper -->
        </div><!-- #our-partners -->

    <?php }
endif;