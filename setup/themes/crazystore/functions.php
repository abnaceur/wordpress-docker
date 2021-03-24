<?php
/**
 * Describe child theme functions
 *
 * @package SparkleStore
 * @subpackage Crazystore
 * 
 */

 /**
 * Main Header Area
*/
if ( ! function_exists( 'crazystore_main_header' ) ) {
	
	function crazystore_main_header() { ?>

		<div class="mainheader mobile-only">
			<div class="container">
				<div class="header-middle-inner">
					<?php 
						/**
						 * Menu Toggle
						*/
						do_action('sparklestore_menu_toggle'); 
					?>

			        <div class="sparklelogo">
		              	<?php 
		              		if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
							} 
						?>
		              	<div class="site-branding">				              		
		              		<h1 class="site-title">
		              			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		              				<?php bloginfo( 'name' ); ?>
		              			</a>
		              		</h1>
		              		<?php
		              		$description = get_bloginfo( 'description', 'display' );
		              		if ( $description || is_customize_preview() ) { ?>
		              			<p class="site-description"><?php echo $description; ?></p>
		              		<?php } ?>
		              	</div>
			        </div><!-- End Header Logo --> 

			        <div class="rightheaderwrapend">
	    	          	<?php if ( sparklestore_is_woocommerce_activated() ) {  ?>
	    	          		<div id="site-header-cart" class="site-header-cart block-minicart sparkle-column">
								<?php echo wp_kses_post( sparklestore_shopping_cart() ); ?>
					            <div class="shopcart-description">
									<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
					            </div>
					        </div>
	    		        <?php } ?> 
			        </div>
			    </div>

			    <div class="rightheaderwrap">
		        	<div class="category-search-form">
		        	  	<?php 
		        	  		/**
		        	  		 * Normal & Advance Search
		        	  		*/
		        	  		if ( sparklestore_is_woocommerce_activated() ) {

		        	  			sparklestore_advance_product_search_form();
		        	  		}
		        	  	?>
		        	</div>
		        </div>
		        
			</div>
        </div>
        
		<div class="mainheader">
			<div class="container">
				<div class="header-middle-inner crazystore-header">
                    <div class="rightheaderwrap">
                        <i class="fas fa-headset"></i>
                        <div class="header-info">
                            <?php
                                $quick_wroking    = get_theme_mod( 'sparklestore_start_open_time' );
                                $quick_phone      = get_theme_mod( 'sparklestore_phone_number' );
                            ?>
                            <?php if( !empty( $quick_phone ) ) { ?>
                                <div class="phoneinfo">
                                    <?php echo esc_html( $quick_phone ); ?>
                                </div>
                            <?php } if( !empty( $quick_wroking ) ) { ?>
                                <div class="workingtime">
                                    <?php echo esc_html( $quick_wroking ); ?>
                                </div>
                            <?php } ?>
                        </div>
			        </div><!-- End Quick Information --> 
			        <div class="sparklelogo">
		              	<?php 
		              		if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
							} 
						?>
		              	<div class="site-branding">				              		
		              		<h1 class="site-title">
		              			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		              				<?php bloginfo( 'name' ); ?>
		              			</a>
		              		</h1>
		              		<?php
		              		$description = get_bloginfo( 'description', 'display' );
		              		if ( $description || is_customize_preview() ) { ?>
		              			<p class="site-description"><?php echo $description; ?></p>
		              		<?php } ?>
		              	</div>
			        </div><!-- End Header Logo --> 
			        <div class="rightheaderwrapend">
	    	          	<?php if ( sparklestore_is_woocommerce_activated() ) {  ?>
	    	          		<div id="site-header-cart" class="site-header-cart block-minicart sparkle-column">
								<?php echo wp_kses_post( sparklestore_shopping_cart() ); ?>
					            <div class="shopcart-description">
									<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
					            </div>
					        </div>
	    		        <?php } ?> 
			        </div>
			    </div>
			</div>
		</div>		    
		<?php
	}
}
add_action( 'sparklestore_header', 'crazystore_main_header', 25 );


if( !function_exists( 'sparklestore_header_vertical' ) ) :

    function sparklestore_header_vertical(){
  
      $enable_vertical_menu    = get_theme_mod( 'sparklestore_vertical_menu_options','on' );
      $vertical_menu_title     = get_theme_mod( 'sparklestore_vertical_menu_title','All Categories' );
      $vertical_all_menu       = get_theme_mod( 'sparklestore_vertical_menu_show_all_menu','More' );
      $vertical_all_close      = get_theme_mod( 'sparklestore_vertical_menu_show_all_menu_close','Close' );
      $vertical_item_visible   = get_theme_mod( 'sparklestore_vertical_menu_display_itmes', 10 );
      $vertical_menu_alignment = get_theme_mod( 'sparklestore_vertical_menu_display_itmes', 'on' );
  
  
      if ( !empty( $enable_vertical_menu ) && $enable_vertical_menu == 'on' ):
        $block_vertical_class = array( 'vertical-wapper block-nav-category has-vertical-menu' );

        if ( is_front_page() || is_home() ) {
            $slider_layout    = get_theme_mod( 'sparklestore_slider_layout_options', 'fullslider');
            $slider_options   = get_theme_mod( 'sparklestore_slider_options', 'on' );
            if( !empty( $slider_layout ) && $slider_layout == 'verticalmenu' && $slider_options == 'on'  ){
    
                $block_vertical_class[] = 'alway-open';
            }
        }
        ?>
            <div data-items="<?php echo esc_attr( $vertical_item_visible ); ?>" class="category-menu-main  <?php echo esc_attr( implode( ' ', $block_vertical_class ) ); ?>">
                <button type="button" class="category-menu-title block-title">
                    <?php echo esc_html( $vertical_menu_title ); ?>
                </button>
                <div class="block-content verticalmenu-content menu-category">
                    <?php
                        wp_nav_menu( array(
                            'theme_location'  => 'sparklecategory',
                            'depth'           => 4,
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'vertical-menu',
                        )
                        );
                    ?>
                  <div class="view-all-category">
                        <a href="javascript:void(0);" class="btn-view-all copen-cate"><?php echo esc_html( $vertical_all_menu ) ?>
                        </a>

                        <a href="javascript:void(0);" class="btn-view-all cclose-cate"><?php echo esc_html( $vertical_all_close ) ?>
                        </a>
                  </div>
                </div>
            </div><!-- block category -->
      <?php endif;
    }
endif;
add_action( 'sparklestore_header_vertical', 'sparklestore_header_vertical' );

/**
 * Crazystore_breadcrumbs
*/
if ( ! function_exists( 'sparklestore_breadcrumbs' ) ) {

    function sparklestore_breadcrumbs(){ 

       $bg_image = esc_url( get_theme_mod('sparklestore_breadcrumbs_normal_page_background_image') ); ?>
        <div class="container">
            <div class="breadcrumbs-wrap breadcrumbs">
                <?php if( class_exists('WooCommerce') && ( is_shop() || is_archive() ) ){ ?>

                      <h2 class="page-title"><?php woocommerce_page_title(); ?></h2>

                <?php
                    }elseif( is_archive() || is_category() ) {

                        the_archive_title( '<h2 class="entry-title">', '</h2>' );

                    }elseif( is_search() ){ ?>

                        <h2 class="entry-title"><?php printf( esc_html__( 'Search Results for : %s', 'crazystore' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                    
                    <?php }elseif( is_404() ){ ?>

                        <h2 class="entry-title"><?php echo esc_html__('404','crazystore'); ?></h2>

                    <?php }else{

                        the_title( '<h2 class="entry-title">', '</h2>' ); 
                    }

                    breadcrumb_trail( array(
                      'container'   => 'div',
                      'show_browse' => false,
                    ) );
                ?>
            </div>
        </div>
        <?php 
    } 
}
add_action( 'sparklestore-breadcrumbs', 'sparklestore_breadcrumbs' );

if ( ! function_exists( 'Crazystore_child_options' ) ) {
    function Crazystore_child_options( $wp_customize ) {

        //$wp_customize->remove_control('breadcrumbs_normal_page_background_image');

        $wp_customize->remove_section( 'sparklestore_breadcrumbs_normal_page_section');

        $crazystore = $wp_customize->get_setting('sparklestore_slider_layout_options');
        $crazystore->default = 'verticalmenu';
        $crazystorechoices = $wp_customize->get_control('sparklestore_slider_layout_options');
        $crazystorechoices->choices = array(
            'verticalmenu'  => esc_html__( 'Vertical Menu With Slider', 'crazystore' ),
            'fullslider'    => esc_html__( 'Full Slider', 'crazystore' ),
            'sliderpromo'   => esc_html__( 'Slider With Promo Images', 'crazystore' )
        );

        $verticalMenu = $wp_customize->get_setting('sparklestore_vertical_menu_show_all_menu');
        $verticalMenu->default = esc_html__( "More", 'crazystore' );
    }
}
add_action( 'customize_register' , 'Crazystore_child_options', 11 );

if ( ! function_exists( 'crazystore_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function crazystore_setup() {
        
        $crazystore_theme_info = wp_get_theme();
        $GLOBALS['crazystore_version'] = $crazystore_theme_info->get( 'Version' );
    }
endif;
add_action( 'after_setup_theme', 'crazystore_setup' );


/**
 * Enqueue child theme styles and scripts
*/
add_action( 'wp_enqueue_scripts', 'crazystore_scripts', 20 );

function crazystore_scripts() {
    
    global $crazystore_version;

    wp_dequeue_style( 'sparklestore-style' );
    wp_dequeue_style( 'sparklestore-style-responsive' );
    
	wp_enqueue_style( 'sparklestore-parent-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/style.css', array(), esc_attr( $crazystore_version ) );

    wp_enqueue_style( 'crazystore-style', get_stylesheet_uri(), array(), esc_attr( $crazystore_version ) );
    wp_enqueue_style( 'sparklestore-style-responsive', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/responsive.css', array(), esc_attr( $crazystore_version ) );

    wp_enqueue_script('crazystore', get_stylesheet_directory_uri() . '/js/crazystore.js', array('jquery','masonry'), esc_attr( $crazystore_version ), true);
    
}