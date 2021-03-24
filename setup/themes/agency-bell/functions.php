<?php
/**
 * Describe child theme functions
 *
 * @package Construction Light
 * @subpackage Agency Bell
 * 
 */

 if ( ! function_exists( 'agencybell_setup' ) ) :

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Agency Bell, use a find and replace
     * to change 'agencybell' to the name of your theme in all the template files.
    */
    load_theme_textdomain( 'agencybell', get_template_directory() . '/languages' );

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function agencybell_setup() {
        
        $agencybell_theme_info = wp_get_theme();
        $GLOBALS['agencybell_version'] = $agencybell_theme_info->get( 'Version' );
    }
endif;
add_action( 'after_setup_theme', 'agencybell_setup' );


/**
 * remove parent actions
 */
add_action( 'init', 'agencybell_remove_action');

function agencybell_remove_action() {

    remove_action('construction_light_action_video_calltoaction','construction_light_video_calltoaction', 40);

    remove_action('construction_light_calltoaction_section','construction_light_calltoaction', 50);

    remove_action('construction_light_counter_section','construction_light_counter', 60);

    remove_action('construction_light_blog_section','construction_light_blog', 65);
}
/**
 * Enqueue child theme styles and scripts
*/
function agencybell_scripts() {
    
    global $agencybell_version;

    wp_dequeue_style( 'construction-light-style' );
    
    wp_enqueue_style( 'agencybell-parent-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'style.css', array(), esc_attr( $agencybell_version ) );
    
    wp_enqueue_style( 'agencybell-style', get_stylesheet_uri(), esc_attr( $agencybell_version ) );

    wp_add_inline_style('agencybell-style', agencybell_dymanic_styles());

    wp_enqueue_style( 'agencybell-responsive', get_template_directory_uri(). '/assets/css/responsive.css');

    wp_enqueue_script('agencybell', get_stylesheet_directory_uri() . '/js/agencybell.js', array('jquery','masonry'), esc_attr( $agencybell_version ), true);

}
add_action( 'wp_enqueue_scripts', 'agencybell_scripts', 20 );


if ( ! function_exists( 'agencybell_child_options' ) ) {

    function agencybell_child_options( $wp_customize ) {

        $wp_customize->remove_control("header_image");

        $agencybell = $wp_customize->get_setting('construction_light_header_layout');
        $agencybell->default = 'layout_three';
        $agencybellchoices = $wp_customize->get_control('construction_light_header_layout');
        $agencybellchoices->choices = array(
            'layout_one'  => esc_html__( 'Layout One', 'agencybell' ),
            'layout_two'    => esc_html__( 'Layout Two', 'agencybell' ),
            'layout_three'   => esc_html__( 'Layout Three', 'agencybell' )
        );

        /**
         *  About Section
        */
        $wp_customize->remove_control('construction_light_aboutus_image');
        $wp_customize->remove_control('construction_light_aboutus_style');
        $wp_customize->remove_control('construction_light_aboutus_text_color');
        $wp_customize->remove_control('construction_light_aboutus_bg_color');
        $agencybell = $wp_customize->get_setting('construction_light_aboutus_alignment');
        $agencybell->default = 'text-center';

        /**
         *  Service Section Layout
        */
        $agencybell = $wp_customize->get_setting('construction_light_service_layout');
        $agencybell->default = 'layout_three';
        $agencybellchoices = $wp_customize->get_control('construction_light_service_layout');
        $agencybellchoices->choices = array(
            'layout_one'  => esc_html__( 'Layout One', 'agencybell' ),
            'layout_two'    => esc_html__( 'Layout Two', 'agencybell' ),
            'layout_three'   => esc_html__( 'Layout Three', 'agencybell' )
        );

        $wp_customize->add_setting('construction_light_service_image', array(
            'sanitize_callback'	=> 'esc_url_raw'		//done
		));

		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'construction_light_service_image', array(
			'label'	   => esc_html__('Background Image','agencybell'),
			'section'  => 'construction_light_service_section',
            'type'	   => 'image',
            'priority' => 1
		)));

        /**
         * Remove Section
        */
        $wp_customize->remove_section( 'construction_light_video_calltoaction_section');

        $wp_customize->remove_section( 'construction_light_calltoaction_section');

        $wp_customize->remove_section( 'construction_light_counter_section');

        $wp_customize->remove_section( 'construction_light_blog_section');


    }
}
add_action( 'customize_register' , 'agencybell_child_options', 11 );


/**
 * Our Service Featues Section.
*/
if (! function_exists( 'construction_light_promo_service' ) ):

    function construction_light_promo_service(){

        $features_options = get_theme_mod('construction_light_features_service_section','enable');
        
        if( !empty( $features_options ) && $features_options == 'enable' ){
        ?>
        <section id="cl_feature" class="cons_light_feature promo_light_feature">
            <div class="container">
                <div class="row">
                    <?php
                        $promo_service = get_theme_mod('construction_light_promo_service');

                        if (!empty($promo_service)):

                        $pages = json_decode($promo_service);

                        foreach ($pages as $page):

                        $page_id = $page->promoservice_page;

                        if (!empty($page_id)):

                            $service_query = new WP_Query('page_id=' . $page_id);

                            if ( $service_query->have_posts() ): while ( $service_query->have_posts() ): $service_query->the_post();

                    ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 feature-list">
                            <div class="box">
                                <div class="bottom-content">
                                    <div class="icon-box">
                                        <i class="<?php echo esc_html( $page->promoservice_icon ); ?>"></i>
                                    </div>

                                    <h3><?php the_title(); ?></h3>

                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'read more', 'agencybell' ) ?></a>
                                </div>
                            </div>
                        </div>
                    <?php   endwhile; wp_reset_postdata(); endif; endif; endforeach; endif; ?>
                </div>
            </div>
        </section>
        <?php } }
endif;
add_action('construction_light_action_promo_service', 'construction_light_promo_service', 30);

/**
 * Our Main Service Section.
*/
if (! function_exists( 'construction_light_service' ) ):
    function construction_light_service(){

        $title          = get_theme_mod('construction_light_service_title');
        $sub_title      = get_theme_mod('construction_light_service_sub_title');
        $service_layout = get_theme_mod('construction_light_service_layout', 'layout_three');
        $service_page   = get_theme_mod('construction_light_service');

        $services_options = get_theme_mod('construction_light_service_service_section','enable');
        
        if( !empty( $services_options ) && $services_options == 'enable' ){
        ?>
        <section id="cl_services" class="cons_light_feature <?php echo esc_attr( $service_layout ); ?>">
            <div class="container">
                
                <?php construction_light_section_title( $title, $sub_title ); ?>
                <?php if ( $service_layout == 'layout_three'):
                        do_action('construciton_light_action_service_layout_three');
                else:  ?>
                <div class="row">
                    <?php
                        if (!empty($service_page)):

                        $pages = json_decode($service_page);

                        foreach ($pages as $page):

                            $page_id = $page->service_page;

                            if (!empty($page_id)):

                            $service_query = new WP_Query('page_id=' . $page_id);

                            if ( $service_query->have_posts() ): while ( $service_query->have_posts() ): $service_query->the_post();

                                if( function_exists( 'pll_register_string' ) ){ 

                                    $service_button = pll__( get_theme_mod( 'construction_light_service_button','Read More' ) ); 

                                }else{ 

                                    $service_button = get_theme_mod( 'construction_light_service_button','Read More' );
                                }
                        
                    if($service_layout == 'layout_one' ){ ?>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 feature-list">
                            <div class="box">
                                <figure>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('construction-light-medium'); ?>
                                    </a>
                                </figure>

                                <div class="bottom-content">

                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                    <?php the_excerpt(); ?>

                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                        <?php echo esc_html( $service_button ); ?>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php }else if( $service_layout == 'layout_two' ){ ?>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 feature-list">
                            <div class="box">
                                <div class="bottom-content">
                                    <div class="icon-box">
                                        <i class="<?php echo esc_attr($page->service_icon); ?>"></i>
                                    </div>

                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                    <?php the_excerpt(); ?>

                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                        <?php echo esc_html( $service_button ); ?>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                        
                       
                        

                    <?php  endwhile; endif; endif; endforeach; endif; ?>
                </div>

                <?php endif; ?>
            </div>
        </section>
    <?php } }
endif;
add_action('construction_light_action_service', 'construction_light_service', 45);



add_action('construciton_light_action_service_layout_three', 'construciton_light_action_service_layout_three');
function construciton_light_action_service_layout_three(){ ?>
    <div class="row">
        <?php
            $service_page   = get_theme_mod('construction_light_service');
            if (!empty($service_page)):

            $pages = json_decode($service_page);
            echo '<ul class="services-tab">';
            foreach ($pages as $page):

                $page_id = $page->service_page;

                if (!empty($page_id)):

                    $service_query = new WP_Query('page_id=' . $page_id);
                    
                    if ( $service_query->have_posts() ): 
                        while ( $service_query->have_posts() ): $service_query->the_post();
                            ?>
                            <li class="services-tab-list">
                                <a href="#services-tab1" data-tabcontent=".content-<?php echo intval($page_id); ?>">
                                    <i class="<?php echo esc_attr($page->service_icon); ?>"></i><span><?php the_title(); ?></span>
                                </a>
                            </li>
                        <?php endwhile; 
                    endif; 
                endif; 
            endforeach; ?>
            </ul>
            <div class='service-tab-content'>
                <?php foreach ($pages as $page):

                    $page_id = $page->service_page;

                    if (!empty($page_id)):

                        $service_query = new WP_Query('page_id=' . $page_id);
                        
                        if ( $service_query->have_posts() ): 
                            while ( $service_query->have_posts() ): $service_query->the_post();
                                ?>
                                <div class="services-tab-content hidden content-<?php echo intval($page_id); ?>">
                                    <div class="services-tab-pane animated zoomIn" id="services-tab1">
                                        <div class="services-content">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; 
                        endif; 
                    endif; 
                endforeach; ?>

            </div>
        <?php endif; ?>
    </div>
<?php
}


function agencybell_css_strip_whitespace($css) {
    $replace = array(
        "#/\*.*?\*/#s" => "", // Strip C style comments.
        "#\s\s+#" => " ", // Strip excess whitespace.
    );
    $search = array_keys($replace);
    $css = preg_replace($search, $replace, $css);

    $replace = array(
        ": " => ":",
        "; " => ";",
        " {" => "{",
        " }" => "}",
        ", " => ",",
        "{ " => "{",
        ";}" => "}", // Strip optional semicolons.
        ",\n" => ",", // Don't wrap multiple selectors.
        "\n}" => "}", // Don't wrap closing braces.
        "} " => "}\n", // Put each rule on it's own line.
    );
    $search = array_keys($replace);
    $css = str_replace($search, $replace, $css);

    return trim($css);
}

/**
 * Dynamic Style
 */
function agencybell_dymanic_styles() {
    
    $services_bg = get_theme_mod('construction_light_service_image');
 
    $customcss = "
 
        #cl_services{background-image: url(" . esc_url($services_bg) . "); background-size: cover; background-repeat: no-repeat;}

    ";

    return agencybell_css_strip_whitespace($customcss);
}


// Add specific CSS class by filter.
add_filter( 'body_class', function( $classes ) {
    if( !get_theme_mod('construction_light_enable_frontpage', 0)){
        return array_merge( $classes, array( 'nav-relateive' ) );
    }
    return $classes;
} );