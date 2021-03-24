<?php
/**
 * Instagram section
 *
 * This is the template for the content of instagram section
 *
 * @package Theme Palace
 * @subpackage Sociable Pro
 * @since Sociable Pro 1.0.0
 */
if ( ! function_exists( 'sociable_add_instagram_section' ) ) :
    /**
    * Add instagram section
    *
    *@since Sociable Pro 1.0.0
    */
    function sociable_add_instagram_section() {
    	$options = sociable_get_theme_options();
        // Check if instagram is enabled on frontpage
        $instagram_enable = apply_filters( 'sociable_section_status', true, 'instagram_section_enable' );

        if ( true !== $instagram_enable ) {
            return false;
        }

        if ( !class_exists('SbiWidget') ) {
            return;
        }

        // Render instagram section now.
        sociable_render_instagram_section();
    }
endif;

if ( ! function_exists( 'sociable_render_instagram_section' ) ) :
  /**
   * Start instagram section
   *
   * @return string instagram content
   * @since Sociable Pro 1.0.0
   *
   */
   function sociable_render_instagram_section() {
        $options = sociable_get_theme_options();
        ?>
        <?php if ( class_exists(class_name) ): ?>
            
        <?php endif ?>
        <div id="instagram-section" class="relative page-section">
                <div class="wrapper">
                    <?php if ( ! empty( $options['instagram_title'] ) ) : ?>
                        <div class="section-header">
                            <h2 class="section-title"><?php echo esc_html( $options['instagram_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif;

                    if ( ! empty( $options['instagram_description'] ) ) : ?>
                        <div class="section-subtitle">
                            <p><?php echo wp_kses_post( $options['instagram_description'] ); ?></p>
                        </div><!-- .section-subtitle -->
                    <?php endif; ?>

                    <?php echo do_shortcode( '[instagram-feed]' ); ?>

                </div><!-- .wrapper -->
            </div><!-- #instagram-section -->
    <?php }
endif;