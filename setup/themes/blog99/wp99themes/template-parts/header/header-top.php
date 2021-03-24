<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */
$blog99_top_header_address  = get_theme_mod('blog99_top_header_address');
$blog99_top_header_email    = get_theme_mod('blog99_top_header_email');
$blog99_top_header_phone_no = get_theme_mod('blog99_top_header_phone_no');

?>
<div id="blog99-top-header-section-file"  class="blog99-top-header-section shadow-sm">
    <div class="container">
        <div class="row">
            <?php if( !empty( $blog99_top_header_address ) || !empty( $blog99_top_header_email ) || !empty( $blog99_top_header_phone_no )  ): ?>
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 align-self-center">
                    <div class="blog99-header-info overflow-hidden">
                        <ul class="header-info">
                            <?php if( $blog99_top_header_address ): ?><li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo esc_html( $blog99_top_header_address ); ?></li><?php endif; ?>
                            <?php if( $blog99_top_header_email ): ?><li><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo esc_html( $blog99_top_header_email ); ?></li><?php endif; ?>
                            <?php if( $blog99_top_header_phone_no ): ?><li><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( $blog99_top_header_phone_no ); ?></li><?php endif; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-xl-6 col-lg-6 col-md-6 col-12 align-self-center pr-0">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'top-header',
                        'menu_id'        => 'blog99-top-header-section',
                        'container'		 =>	 'ul',
                        'menu_class'	 =>  'blog99-top-header-container overflow-hidden',
                        'depth'          => 1
                    ) );
                ?>
            </div>
        </div>
    </div>
</div>