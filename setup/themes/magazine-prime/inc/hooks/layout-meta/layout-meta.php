<?php
/**
 * Implement theme metabox.
 *
 * @package Magazine Prime
 */

if (!function_exists('magazine_prime_add_theme_meta_box')) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function magazine_prime_add_theme_meta_box()
    {

        $apply_metabox_post_types = array('post', 'page');

        foreach ($apply_metabox_post_types as $key => $type) {
            add_meta_box(
                'magazine-prime-theme-settings',
                esc_html__('Single Page/Post Settings', 'magazine-prime'),
                'magazine_prime_render_theme_settings_metabox',
                $type
            );
        }

    }

endif;

add_action('add_meta_boxes', 'magazine_prime_add_theme_meta_box');

add_action( 'admin_enqueue_scripts', 'magazine_prime_backend_scripts');
if ( ! function_exists( 'magazine_prime_backend_scripts' ) ){
    function magazine_prime_backend_scripts( $hook ) {
        wp_enqueue_style( 'wp-color-picker');
        wp_enqueue_script( 'wp-color-picker');
    }
}

if (!function_exists('magazine_prime_render_theme_settings_metabox')) :

    /**
     * Render theme settings meta box.
     *
     * @since 1.0.0
     */
    function magazine_prime_render_theme_settings_metabox($post, $metabox)
    {

        $post_id = $post->ID;
        $magazine_prime_post_meta_value = get_post_meta($post_id);

        // Meta box nonce for verification.
        wp_nonce_field(basename(__FILE__), 'magazine_prime_meta_box_nonce');
        // Fetch Options list.
        $page_layout = get_post_meta($post_id, 'magazine-prime-meta-select-layout', true);
        $page_image_layout = get_post_meta($post_id, 'magazine-prime-meta-image-layout', true);
        $magazine_prime_meta_checkbox = get_post_meta($post_id, 'magazine-prime-meta-checkbox', true);
        ?>

        <div class="prime-tab-main">

            <div class="prime-metabox-tab">
                <ul>
                    <li>
                        <a id="twp-tab-general" class="twp-tab-active" href="javascript:void(0)"><?php esc_html_e('Layout Settings', 'magazine-prime'); ?></a>
                    </li>
                </ul>
            </div>

            <div class="prime-tab-content">
                
                <div id="twp-tab-general-content" class="prime-content-wrap prime-tab-content-active">

                    <div class="prime-meta-panels">

                        <div class="prime-opt-wrap prime-checkbox-wrap">

                            <input id="feature-image-checkbox" name="magazine-prime-meta-checkbox" type="checkbox" <?php if ($magazine_prime_meta_checkbox) { ?> checked="checked" <?php } ?> />

                            <label for="feature-image-checkbox"><?php esc_html_e('Check To Use Featured Image As Banner Image', 'magazine-prime'); ?></label>
                        </div>

                         <div class="prime-opt-wrap prime-opt-wrap-alt">
                            <label><?php esc_html_e('Single Page/Post Layout', 'magazine-prime'); ?></label>
                            <select name="magazine-prime-meta-select-layout" id="magazine-prime-meta-select-layout">
                                <option value="global" <?php selected('global', $page_layout); ?>>
                                    <?php esc_html_e('Global', 'magazine-prime') ?>
                                </option>
                                <option value="right-sidebar" <?php selected('right-sidebar', $page_layout); ?>>
                                    <?php esc_html_e('Content - Primary Sidebar', 'magazine-prime') ?>
                                </option>
                                <option value="left-sidebar" <?php selected('left-sidebar', $page_layout); ?>>
                                    <?php esc_html_e('Primary Sidebar - Content', 'magazine-prime') ?>
                                </option>
                                <option value="no-sidebar" <?php selected('no-sidebar', $page_layout); ?>>
                                    <?php esc_html_e('No Sidebar', 'magazine-prime') ?>
                                </option>
                            </select>
                        </div>

                        <div class="prime-opt-wrap prime-opt-wrap-alt">
                            <label><?php esc_html_e('Single Page/Post Image Layout', 'magazine-prime'); ?></label>
                            <select name="magazine-prime-meta-image-layout" id="magazine-prime-meta-image-layout">
                                <option value="global" <?php selected('global', $page_layout); ?>>
                                    <?php esc_html_e('Global', 'magazine-prime') ?>
                                </option>
                                <option value="full" <?php selected('full', $page_image_layout); ?>>
                                    <?php esc_html_e('Full', 'magazine-prime') ?>
                                </option>
                                <option value="left" <?php selected('left', $page_image_layout); ?>>
                                    <?php esc_html_e('Left', 'magazine-prime') ?>
                                </option>
                                <option value="right" <?php selected('right', $page_image_layout); ?>>
                                    <?php esc_html_e('Right', 'magazine-prime') ?>
                                </option>
                                <option value="no-image" <?php selected('no-image', $page_image_layout); ?>>
                                    <?php esc_html_e('No Image', 'magazine-prime') ?>
                                </option>
                            </select>
                        </div>


                    </div>
                </div>

            </div>
        </div>

        <?php
    }

endif;


if (!function_exists('magazine_prime_save_theme_settings_meta')) :

    /**
     * Save theme settings meta box value.
     *
     * @since 1.0.0
     *
     * @param int $post_id Post ID.
     * @param WP_Post $post Post object.
     */
    function magazine_prime_save_theme_settings_meta($post_id, $post)
    {

        // Verify nonce.
        if (!isset($_POST['magazine_prime_meta_box_nonce']) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['magazine_prime_meta_box_nonce'] ) ), basename(__FILE__))) {
            return;
        }

        // Bail if auto save or revision.
        if (defined('DOING_AUTOSAVE') || is_int(wp_is_post_revision($post)) || is_int(wp_is_post_autosave($post))) {
            return;
        }

        // Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
        if( !isset( $_POST['post_ID'] ) || empty( $_POST['post_ID'] ) || absint( wp_unslash( $_POST['post_ID'] ) ) != $post_id ) {
            return;
        }

        // Check permission.
        if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
            if (!current_user_can('edit_page', $post_id)) {
                return;
            }
        } else if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        $magazine_prime_meta_checkbox = isset($_POST['magazine-prime-meta-checkbox']) ? sanitize_text_field( wp_unslash( $_POST['magazine-prime-meta-checkbox'] ) ) : '';
        update_post_meta($post_id, 'magazine-prime-meta-checkbox', sanitize_text_field($magazine_prime_meta_checkbox));

        $magazine_prime_meta_select_layout = isset($_POST['magazine-prime-meta-select-layout']) ? sanitize_text_field( wp_unslash( $_POST['magazine-prime-meta-select-layout'] ) ) : '';
        if (!empty($magazine_prime_meta_select_layout)) {
            update_post_meta($post_id, 'magazine-prime-meta-select-layout', sanitize_text_field($magazine_prime_meta_select_layout));
        }
        $magazine_prime_meta_image_layout = isset($_POST['magazine-prime-meta-image-layout']) ? sanitize_text_field( wp_unslash( $_POST['magazine-prime-meta-image-layout'] ) ) : '';
        if (!empty($magazine_prime_meta_image_layout)) {
            update_post_meta($post_id, 'magazine-prime-meta-image-layout', sanitize_text_field($magazine_prime_meta_image_layout));
        }

    }

endif;

add_action('save_post', 'magazine_prime_save_theme_settings_meta', 10, 3);