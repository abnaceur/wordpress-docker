<?php
/**
 * The template for displaying home page.
 * @package Kiducation
 */
$disable_homepage_content_section = kiducation_get_option( 'disable_homepage_content_section' );
if ( 'posts' != get_option( 'show_on_front' ) ){ 
    get_header(); ?>
    <?php $enabled_sections = kiducation_get_sections();
    if( is_array( $enabled_sections ) ) {
        foreach( $enabled_sections as $section ) {

            if( ( $section['id'] == 'featured-slider' ) ){ ?>
                <?php $disable_featured_slider = kiducation_get_option( 'disable_featured-slider_section' );
                if( true == $disable_featured_slider): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cloud-top.png' ) ?>" class="cloud-bg">
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'services' ) { ?>
                <?php $disable_services_section = kiducation_get_option( 'disable_services_section' );
                if( true ==$disable_services_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section relative">
                        <div class="services-wrapper">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cloud-down.png' ) ?>" class="cloud-bg">
                        </div>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'about' ) { ?>
                <?php $disable_about_section = kiducation_get_option( 'disable_about_section' );
                if( true ==$disable_about_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section relative">

                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            
                        </div>

                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'cta' ) { ?>
                <?php $disable_cta_section = kiducation_get_option( 'disable_cta_section' );
                $background_cta_section = kiducation_get_option( 'background_cta_section' );
                if( true ==$disable_cta_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $background_cta_section );?>');">
                         <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/about-cloud-up.png' ) ?>" class="cloud-shape">
                        <div class="overlay"></div>
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                         <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cloud-up.png' ) ?>" class="cloud-bg"> 
                    </section>
            <?php endif; ?>

             <?php } elseif( $section['id'] == 'course' ) { ?>
                <?php $disable_course_section = kiducation_get_option( 'disable_course_section' );
                if( true ==$disable_course_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section relative">
                        
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>  
                        </div>
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cloud-down.png' ) ?>" class="cloud-bg">
                    </section>
            <?php endif; ?>


            <?php } elseif( $section['id'] == 'testimonial' ) { ?>
            <?php $disable_testimonial_section = kiducation_get_option( 'disable_testimonial_section' );
            $testimonial_image = kiducation_get_option( 'testimonial_image' );
            if( true ==$disable_testimonial_section): ?>
                <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $testimonial_image );?>');">
                
                    <div class="wrapper">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </div>
                </section>            
            <?php endif; ?>

           <?php } elseif ( $section['id'] == 'blog' ) { ?>
                <?php $disable_blog_section = kiducation_get_option( 'disable_blog_section' );
                if( true === $disable_blog_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cloud-up.png' ) ?>" class="cloud-shape">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cloud-down.png' ) ?>" class="cloud-bg">
                    </section>
                <?php endif; 

                
            }
        }
        if(($disable_homepage_content_section == true ) && ('posts' != get_option( 'show_on_front' ))) {
            include( get_page_template() );
        }
    }
    elseif('posts' == get_option( 'show_on_front' )){
        include( get_home_template() );
    } 
    get_footer();
} 
else{
    include( get_home_template() );
}