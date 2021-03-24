<?php
/**
 * The template for displaying meta box in page/post
 *
 * This adds Select Sidebar, Header Featured Image Options, Single Page/Post Image
 * This is only for the design purpose and not used to save any content
 *
 * @package Vip_Business
 */

/**
 * Register meta box(es).
 */
function vip_business_register_meta_boxes() {
    add_meta_box( 'vip-business-sidebar-options', esc_html__( 'Select Sidebar', 'vip-business' ), 'vip_business_display_sidebar_options', array( 'post', 'page' ), 'side' );

    add_meta_box( 'vip-business-featured-image-options', esc_html__( 'Featured Image', 'vip-business' ), 'vip_business_display_featured_image_options', array( 'post', 'page' ), 'side' );
}
add_action( 'add_meta_boxes', 'vip_business_register_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function vip_business_display_sidebar_options( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'vip_business_custom_meta_box_nonce' );

	$sidebar_options = array(
		'default-sidebar'        => esc_html__( 'Default Sidebar', 'vip-business' ),
		'optional-sidebar-one'   => esc_html__( 'Optional Sidebar One', 'vip-business' ),
		'optional-sidebar-two'   => esc_html__( 'Optional Sidebar Two', 'vip-business' ),
		'optional-sidebar-three' => esc_html__( 'Optional Sidebar three', 'vip-business' ),
	);

	$meta_option = get_post_meta( $post->ID, 'vip-business-sidebar-option', true );

	if ( empty( $meta_option ) ){
		$meta_option = 'default-sidebar';
	}
	
	?>
	<select name="vip-business-sidebar-option"> 
		<?php
		foreach ( $sidebar_options as $field => $label ) {
		?>
			<option value="<?php echo esc_attr( $field ); ?>" <?php selected( $field, $meta_option ); ?>><?php echo esc_html( $label ); ?></option>
		<?php
		} // endforeach.
		?>
	</select>
	<?php
}

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function vip_business_display_featured_image_options( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'vip_business_custom_meta_box_nonce' );

	$featured_image_options = array(
		'default'                   => esc_html__( 'Default', 'vip-business' ),
		'disabled'                  => esc_html__( 'Disabled', 'vip-business' ),
		'post-thumbnail'            => esc_html__( 'Post Thumbnail (470x470)', 'vip-business' ),
		'vip-business-slider' => esc_html__( 'Slider Image (1920x954)', 'vip-business' ),
		'full'                      => esc_html__( 'Original Image Size', 'vip-business' ),
	);

	$meta_option = get_post_meta( $post->ID, 'vip-business-featured-image', true );

	if ( empty( $meta_option ) ){
		$meta_option = 'default';
	}
	
	?>
	<select name="vip-business-featured-image"> 
		<?php
		foreach ( $featured_image_options as $field => $label ) {
		?>
			<option value="<?php echo esc_attr( $field ); ?>" <?php selected( $field, $meta_option ); ?>><?php echo esc_html( $label ); ?></option>
		<?php
		} // endforeach.
		?>
	</select>
	<?php
}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function vip_business_save_meta_box( $post_id ) {
	global $post_type;

	$post_type_object = get_post_type_object( $post_type );

	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                      // Check Autosave
	|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )        // Check Revision
	|| ( ! in_array( $post_type, array( 'page', 'post' ) ) )                  // Check if current post type is supported.
	|| ( ! check_admin_referer( basename( __FILE__ ), 'vip_business_custom_meta_box_nonce') )    // Check nonce - Security
	|| ( ! current_user_can( $post_type_object->cap->edit_post, $post_id ) ) )  // Check permission
	{
	  return $post_id;
	}

	$fields = array(
		'vip-business-sidebar-option',
		'vip-business-featured-image',
	);

	foreach ( $fields as $field ) {
		$new = $_POST[ $field ];

		delete_post_meta( $post_id, $field );

		if ( '' == $new || array() == $new ) {
			return;
		} else {
			if ( ! update_post_meta ( $post_id, $field, sanitize_key( $new ) ) ) {
				add_post_meta( $post_id, $field, sanitize_key( $new ), true );
			}
		}
	} // end foreach
}
add_action( 'save_post', 'vip_business_save_meta_box' );
