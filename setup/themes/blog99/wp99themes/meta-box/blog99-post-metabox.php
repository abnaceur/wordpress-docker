<?php
/**
 * Sidebar Metabox Section
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */
class Blog99_Sidebar_Layout{

    public function __construct(){
        add_action( 'add_meta_boxes',array($this,'blog99_meta_box_add'));
        add_action( 'save_post', array($this,'blog99_meta_box_save') );
        add_action( 'admin_enqueue_scripts',array($this,'blog99_metabox_enqueue') );
    }

    public function blog99_metabox_enqueue() {  
        wp_enqueue_style( 'blog99-metabox', get_template_directory_uri() . '/wp99themes/meta-box/css/blog99-metabox.css'); //for slider       
    }

    public function blog99_meta_box_add(){
        add_meta_box( 'blog99-meta-box-id', esc_html__('Layout Setting', 'blog99'), array($this,'blog99_meta_box_cb'), array('post','page'), 'normal', 'high' );
    }

    public function blog99_meta_box_cb(){

        global $post;

        $blog99_layout = get_post_meta( $post->ID,'layout',true);

        $disable_blog99_title = get_post_meta( $post->ID,'disable_blog99_title',true);
   
        // We'll use this nonce field later on when saving.
        wp_nonce_field( 'layout_nonce', 'meta_box_nonce' );

        //Image layout
        $blog99_right_sidebar     = trailingslashit ( get_template_directory_uri() ) . 'assets/images/sidebar/right-sidebar.jpg';
        $blog99_left_sidebar      = trailingslashit ( get_template_directory_uri() ) . 'assets/images/sidebar/left-sidebar.jpg';
        $blog99_no_sidebar        = trailingslashit ( get_template_directory_uri() ) . 'assets/images/sidebar/full-width.jpg';
        $blog99_both_sidebar      = trailingslashit ( get_template_directory_uri() ) . 'assets/images/sidebar/both-sidebar.jpg';
    ?>
        <p><?php esc_html_e('Select page sidebar position','blog99'); ?><hr/>
            <label for="blog99-left-sidebar"> <?php esc_html_e('Left Sidebar', 'blog99'); ?>
                <input id="blog99-left-sidebar" type="radio" name="layout" value="blog99-left-sidebar" <?php checked( $blog99_layout, 'blog99-left-sidebar' ); ?>><img class="blog99-post-layout-img" src="<?php echo esc_url( $blog99_left_sidebar ); ?>">
            </label>
            <label for="blog99-right-sidebar"> <?php esc_html_e('Right Sidebar', 'blog99'); ?>
                <input id="blog99-right-sidebar" type="radio" name="layout" value="blog99-right-sidebar" <?php checked( $blog99_layout, 'blog99-right-sidebar' ); ?>><img class="blog99-post-layout-img" src="<?php echo esc_url( $blog99_right_sidebar ); ?>">
            </label>
            <label for="blog99-full-sidebar"> <?php esc_html_e('No Sidebar', 'blog99'); ?>
                <input id="blog99-full-sidebar" type="radio" name="layout" value="blog99-full-width" <?php checked( $blog99_layout, 'blog99-full-width' ); ?>><img class="blog99-post-layout-img" src="<?php echo esc_url(  $blog99_no_sidebar  ); ?>">
            </label>
            <label for="blog99-both-sidebar"> <?php esc_html_e('Both Sidebar', 'blog99'); ?>
            <input id="blog99-both-sidebar" type="radio" name="layout" value="blog99-both-sidebar" <?php checked( $blog99_layout, 'blog99-both-sidebar' ); ?>><img class="blog99-post-layout-img" src="<?php echo esc_url(  $blog99_both_sidebar  ); ?>">
            </label>
        </p>

    <?php }

    public function blog99_meta_box_save($news_id){

        // Bail if we're doing an auto save
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        
        // if our nonce isn't there, or we can't verify it, bail
        if ( isset( $_POST['meta_box_nonce'] ) ) {

			$meta_box_nonce = sanitize_text_field( wp_unslash( $_POST['meta_box_nonce'] ) );
		}

        if( !isset( $meta_box_nonce ) || !wp_verify_nonce( $meta_box_nonce, 'layout_nonce' ) ) return;
        
        
        // now we can actually save the data
        $allowed = array(
            'a' => array( // on allow a tags
                'href' => array() // and those anchors can only have href attribute
            )
        );

        if ( isset( $_POST['layout'] ) ) {

			$layout = sanitize_text_field( wp_unslash( $_POST['layout'] ) ); // ...
		}

        if( $layout ){
            
            update_post_meta( $news_id, 'layout',  esc_attr( $layout ));

        }
    }
}
new Blog99_Sidebar_Layout();


/**
 * aCommerce get layout
 */
if ( ! function_exists( 'blog99_get_sidebar_layout' ) ) {

function blog99_get_sidebar_layout() {

        global $post;

        $blog99_layout = get_theme_mod( 'blog99_archiver_sierbar_layout', 'blog99-right-sidebar' );
        
        if($post) {

            $post_specific_layout = get_post_meta( $post->ID, 'layout', true );
        }
        // Home page if Posts page is assigned
        if( is_home() && !( is_front_page() ) ) {
            
            $queried_id  = get_theme_mod( 'blog99_archiver_sierbar_layout', 'blog99-right-sidebar' );
            
            if( !empty($post_specific_layout) && $post_specific_layout != 'default-layout' ) {
                
                $blog99_layout = get_post_meta( $post->ID, 'layout', true );
            }
        }


        elseif( is_page() ) {

            $blog99_layout = get_theme_mod('blog99_page_sierbar_layout','blog99-right-sidebar');
            
            if( !empty($post_specific_layout) && $post_specific_layout != 'default-layout' ) {
                
                $blog99_layout = get_post_meta( $post->ID, 'layout', true );
            
            }
        }

        elseif( is_single() ) {
            
            $blog99_layout = get_theme_mod('blog99_single_page_sierbar_layout','blog99-right-sidebar');
            
            if( !empty($post_specific_layout) && $post_specific_layout != 'default-layout' ) {
                
                $blog99_layout = get_post_meta( $post->ID, 'layout', true );
            }
        }
        
        return $blog99_layout;
    }
}