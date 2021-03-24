<?php
/**
 * Sanitization functions.
 *
 * @package Buzz_Magazine
 */

if ( ! function_exists( 'buzz_magazine_sanitize_select' ) ) :
    /**
     * Sanitize select.
     * @since 1.0.0
     * @param mixed                $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */

    function buzz_magazine_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        if (gettype($input) == 'string'){
            $input = esc_attr( $input );

        }else{
            $input = sanitize_key( $input );

        }

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }

endif;


if ( ! function_exists( 'buzz_magazine_sanitize_checkbox' ) ) :

    /**
     * Sanitize checkbox.
     * @since 1.0.0
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     */

    function buzz_magazine_sanitize_checkbox( $checked ) {

        return ( ( isset( $checked ) && true === $checked ) ? true : false );
    }

endif;