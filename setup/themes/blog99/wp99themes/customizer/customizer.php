<?php
/**
 * Blog99 Theme Customizer
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http:/wp99themes.com
 * @since       Blog99 1.0.0
 * */
 /**
  * Customizer file section
  */
  class Blog99Customizer{

        /**
         * Instance
         *
         * @var $instance
         * @since 1.0.0
         */
        private static $instance;

        /**
         * Initiator
         *
         * @since 1.0.0
         * @return object
         */
        public static function get_instance() {
            if ( ! isset( self::$instance ) ) {
                self::$instance = new self;
            }
            return self::$instance;
        }
        
        /**
         * Blog99 Customizer construct functins
         *
         * @access public
         */
        public function __construct(){

            /**
             * Blog99 Customizer panel call
             *
             * @access public
             * @var    array
             * @since 1.0.0
             */
            $blog99_panels   = array( 'theme-options',);
        

            /**
             * Blog99 Customizer section array
             *
             * @access public
             * @var    array
             * @since 1.0.0
             */
            $blog99_sub_sections   = array(
                'theme-options'        =>  array( 'top-header','header-settings','banner-slider','grid-categorys','archive-blog-page','single-page','breadcrumb','sidebar-layout','theme-layout','footer', 'general-settings' ),
            );

            //call the functions
            $this->blog99_customizer_panel( $blog99_panels , $blog99_sub_sections );


            /**
             * Sanitize callback for checkbox
             * 
             * sanitization-functions.php | senitization the custoizer function
             * 
             * @since 1.0.0
            */
            load_template( trailingslashit ( get_template_directory() ) . 'wp99themes/customizer/sanitization-functions.php' );
            
            
            /**
             * Customizer Preview Js
             * 
             * 
             * @since 1.0.0
            */
            add_action( 'customize_preview_init',array( $this,'blog99_customize_preview_js' )  );
            add_action( 'customize_controls_enqueue_scripts',array( $this,'blog99_customizer_scripts' ) );
            add_action( 'customize_controls_print_scripts',array( $this,'add_scripts' ) );

        }

        /**
         * Blog99 Customizer load script
         *
         * @access public
         * @since 1.0.0
         */
        function add_scripts(){
            $loop = get_posts( 'numberposts=1' );
            $latest = false;
            if( count($latest)){
                $latest = $loop[0];
            }
            
            ?>
            <script type="text/javascript">
                jQuery( document ).ready( function( $ ) {
                    wp.customize.section("blog99_banner_section", function(section) {
                        section.expanded.bind(function(isExpanded) {
                            if (isExpanded) {
                                var url = wp.customize.settings.url.home;
                                wp.customize.previewer.previewUrl.set(url);
                            }
                        });
                    });
                    wp.customize.section("blog99_category_section", function(section) {
                        section.expanded.bind(function(isExpanded) {
                            if (isExpanded) {
                               var url = wp.customize.settings.url.home;
                                wp.customize.previewer.previewUrl.set(url);
                            }
                        });
                    });
                    wp.customize.section("blog99_archive_section", function(section) {
                        section.expanded.bind(function(isExpanded) {
                            if (isExpanded) {
                               var url = wp.customize.settings.url.home;
                                wp.customize.previewer.previewUrl.set(url);
                            }
                        });
                    });
                    
                    wp.customize.section("blog99_single_page_section", function(section) {
                        section.expanded.bind(function(isExpanded) {
                            if (isExpanded) {
                                wp.customize.previewer.previewUrl.set( '<?php echo esc_js( get_permalink($latest) ); ?>' );
                            }
                        });
                    });
                    
                } );
            </script>
		<?php
        }


        /**
         * Blog99 Customizer load the all panel and section
         *
         * @access public
         * @since 1.0.0
         */
        public function blog99_customizer_panel( $blog99_panels , $blog99_sub_sections ){
            /**
             * Call the panel 
             * 
             * Register the all blog99 customizer panel
             * 
             * @since 1.0.0
             */
            foreach( $blog99_panels as $panel ){
                load_template( trailingslashit ( get_template_directory() ) . '/wp99themes/customizer/panels/' . $panel . '.php' );
            }

            
            /**
             * Call the section
             * 
             * Register the all blog99 customizer section,
             * and conrol.
             * 
             * @since 1.0.0
             */
            foreach( $blog99_sub_sections as $k => $v ){
                foreach( $v as $w ){        
                    load_template( trailingslashit ( get_template_directory() ) . 'wp99themes/customizer/panels/' . $k . '/' . $w . '.php' );
                }
            }
        }


        
        /**
         * Basic Js File enqueue Section
         * 
         * @access public 
         * @since 1.0.0
         */
        public function blog99_customize_preview_js() {
            wp_enqueue_script( 'blog99-customizer-preview', trailingslashit ( get_template_directory_uri() ) . 'wp99themes/customizer/js/customizer.js', array( 'customize-preview', 'customize-selective-refresh' ), BLOG99_THEME_VERSION, true );
        }


        /**
         * Basic Js File enqueue Section
         * 
         * @access public
         * @since 1.0.0
         */
        public function blog99_customizer_scripts() {
            wp_enqueue_style( 'blog99-customize',trailingslashit ( get_template_directory_uri() ) .'wp99themes/customizer/css/blog99-customizer.css', BLOG99_THEME_VERSION, false );
        }
}

/**
 * customizer file this off by calling 'get_instance()' method
 */
Blog99Customizer::get_instance();