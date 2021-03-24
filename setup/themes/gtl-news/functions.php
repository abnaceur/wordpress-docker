<?php
/**
 * gtl-news functions and definitions.
 *
 * @package gtl-news
 * @since 1.0.0
 */

define( 'gtl_news_VERSION', '1.0.0' );

/**
 * Load assets.
 *
 * @since 1.0.0
 */
if( ! function_exists('gtl_news_enqueue') ):
function gtl_news_enqueue() {
    $parent = 'gtl-news-style';
    $style  = '/style.css';

   
    wp_enqueue_style( 
        $parent, 
        get_template_directory_uri() . $style,
        array(),
        gtl_news_VERSION
    );

   
    wp_enqueue_style( 
        'gtl-news-style', 
        get_stylesheet_directory_uri() . $style, 
        array( $parent ), 
        gtl_news_VERSION 
    );
}
add_action( 'wp_enqueue_scripts', 'gtl_news_enqueue' );

endif;

if( ! function_exists('gtl_news_callout') ):

function gtl_news_callout($wp_customize) {
    
    
   
            /**
             * Panel
             */
            $panel = 'general_panel_section';
            $wp_customize->add_panel( $panel , array(
                'title'             => esc_html__( 'Fonts Setting', 'gtl-news' ),
                'priority'          => 15
            ) );

      /**
             * Section
             */
            $wp_customize->add_section( 'gtl_news_callout_section' , array(
                'title'             => esc_html__( 'Typography', 'gtl-news' ),
                'description' => __('If you are not familier with google fonts, please visit: google.com/fonts', 'gtl-news'),
                'priority'          => 10,
                'panel'             => 'general_panel_section',
            ) );

  
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => 'Lato',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'body_font_name',
        array(
            'label' => __( 'Font family', 'gtl-news' ),
            'description' => __('Example: Roboto ', 'gtl-news'),
            'section' => 'gtl_news_callout_section',
            'type' => 'text',
            'priority' => 12
        )
    );
    
    $wp_customize->add_setting(
        'body_font_type',
        array(
            'default' => 'sans-serif',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'body_font_type',
        array(
            'label' => __( 'Font Type', 'gtl-news' ),
            'description' => __('Use: serif or sans-serif', 'gtl-news'),
            'section' => 'gtl_news_callout_section',
            'type' => 'text',
            'priority' => 12
        )
    );
    
    $wp_customize->add_setting(
        'para_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
        )       
    );

    $wp_customize->add_control( 'para_size', array(
        'type'        => 'number',
        'priority'    => 29,
        'section'     => 'gtl_news_callout_section',
        'label'       => __('Paragraph Text Size', 'gtl-news'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
        ),
    ) );  

 
    $wp_customize->add_setting(
        'menu_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
        )       
    );

    $wp_customize->add_control( 'menu_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'gtl_news_callout_section',
        'label'       => __('Menu items', 'gtl-news'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
        ),
    ) ); 

    
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '38',
        )       
    );

    $wp_customize->add_control( 'h1_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'gtl_news_callout_section',
        'label'       => __('H1 font size', 'gtl-news'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );

   
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '34',
        )       
    );

    $wp_customize->add_control( 'h2_size', array(
        'type'        => 'number',
        'priority'    => 18,
        'section'     => 'gtl_news_callout_section',
        'label'       => __('H2 font size', 'gtl-news'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );

    
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
        )       
    );

    $wp_customize->add_control( 'h3_size', array(
        'type'        => 'number',
        'priority'    => 19,
        'section'     => 'gtl_news_callout_section',
        'label'       => __('H3 font size', 'gtl-news'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );

    
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '26',
        )       
    );

    $wp_customize->add_control( 'h4_size', array(
        'type'        => 'number',
        'priority'    => 20,
        'section'     => 'gtl_news_callout_section',
        'label'       => __('H4 font size', 'gtl-news'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );

   
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '24',
        )       
    );

    $wp_customize->add_control( 'h5_size', array(
        'type'        => 'number',
        'priority'    => 21,
        'section'     => 'gtl_news_callout_section',
        'label'       => __('H5 font size', 'gtl-news'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );

   
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
        )       
    );

    $wp_customize->add_control( 'h6_size', array(
        'type'        => 'number',
        'priority'    => 22,
        'section'     => 'gtl_news_callout_section',
        'label'       => __('H6 font size', 'gtl-news'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    
    $wp_customize->add_setting(
        'theme_color',
        array(
            'default'           => '#1e9265',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_color',
            array(
                'label' => __('Theme Color', 'gtl-news'),
                'section' => 'colors',
                'priority' => 20
            )
        )
    );
    
    $wp_customize->add_setting(
        'rib_color',
        array(
            'default'           => '#eae434',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'rib_color',
            array(
                'label' => __('Breaking News Ribbon Color', 'gtl-news'),
                'section' => 'colors',
                'priority' => 20
            )
        )
    );
    

}

add_action('customize_register', 'gtl_news_callout');

endif;


/**
 * Load Widgets
 */

require 'inc/widgets/main-highlights.php';




if( ! function_exists('gtl_news_dynamic_css') ):
function gtl_news_dynamic_css(){
	ob_start();
	?>
    	<style>
    	
    	  body {
			font-family: '<?php echo get_theme_mod('body_font_name'); ?>', <?php echo get_theme_mod('body_font_type'); ?> !important;
			
		}  
    	
		nav.menu-main li a {font-size: <?php echo esc_attr(get_theme_mod('menu-size')); ?>px !important;}
		h1{font-size: <?php echo esc_attr(get_theme_mod('h1_size')); ?>px !important; }
		h2{font-size: <?php echo esc_attr(get_theme_mod('h2_size')); ?>px !important; }
		h3{font-size: <?php echo esc_attr(get_theme_mod('h3_size')); ?>px !important; }
		h4{font-size: <?php echo esc_attr(get_theme_mod('h4_size')); ?>px !important; }
		h5{font-size: <?php echo esc_attr(get_theme_mod('h5_size')); ?>px !important; }
		h6{font-size: <?php echo esc_attr(get_theme_mod('h6_size')); ?>px !important; }
		p {font-size: <?php echo esc_attr(get_theme_mod('para_size')); ?>px !important; }
		
		.wrap-nav, .top-header-right, .widget-title, #submit, .search-submit, #menu-main-menu .current-menu-item a, .feature-one p.card-title, .top-header-wrapper a:hover, .main-navigation.sec-main-navigation ul ul {
		    background: <?php echo esc_attr(get_theme_mod('theme_color')); ?> !important;
		    
		}
		.widget_recent_entries li::before, .site-title a:hover, a:hover {
		    color: <?php echo esc_attr(get_theme_mod('theme_color')); ?> !important;
		}
		
		span.notice-title {
            background: <?php echo esc_attr(get_theme_mod('rib_color')); ?> !important;
    	
    	</style>
	<?php 
	echo ob_get_clean();
}

endif;
add_action( 'wp_head' , 'gtl_news_dynamic_css' , 55 );



add_editor_style('editor-style.css');



