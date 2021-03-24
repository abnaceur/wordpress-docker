<?php
/**
 * Useful Utility methods shared by most theme options
 *
 * @package Vip_Business
 */
class Vip_Business_Customizer_Utilities {
	/**
	 * Function to register control and setting
	 */
	public static function register_option( $option ) {
		global $wp_customize;

		// Get our Customizer defaults
		$defaults = apply_filters( 'vip_business_customizer_defaults', array() );

		if ( isset( $option['partial_refresh'] ) && isset( $wp_customize->selective_refresh ) ) {
			$option['transport'] = 'postMessage';

			$render = $option['partial_refresh']['render_callback'];

			$wp_customize->selective_refresh->add_partial( $option['settings'], array(
				'selector'            => $option['partial_refresh']['selector'],
				'container_inclusive' => true,
				'render_callback'     => function() use ( $render ) {
					get_template_part( 'template-parts/' . $render . '/' . $render );
				},
			) );
		}

		// Add Setting.
		$wp_customize->add_setting( $option['settings'],
			array(
				'sanitize_callback'  => $option['sanitize_callback'],
				'default'            => isset( $option['default'] ) ? $option['default'] : ( isset( $defaults[ $option['settings'] ] ) ? $defaults[ $option['settings'] ] : '' ),
				'transport'          => isset( $option['transport'] ) ? $option['transport'] : 'refresh',
				'theme_supports'     => isset( $option['theme_supports'] ) ? $option['theme_supports'] : '',
				'description_hidden' => isset( $option['description_hidden'] ) ? $option['description_hidden'] : 0,
			)
		);

		$control = array(
			'label'    => $option['label'],
			'section'  => $option['section'],
			'settings' => $option['settings'],
		);

		if ( isset( $option['active_callback'] ) ) {
			$control['active_callback'] = $option['active_callback'];
		}

		if ( isset( $option['priority'] ) ) {
			$control['priority'] = $option['priority'];
		}

		if ( isset( $option['choices'] ) ) {
			$control['choices'] = $option['choices'];
		}

		if ( isset( $option['type'] ) ) {
			$control['type'] = $option['type'];
		}

		if ( isset( $option['input_attrs'] ) ) {
			$control['input_attrs'] = $option['input_attrs'];
		}

		if ( isset( $option['description'] ) ) {
			$control['description'] = $option['description'];
		}

		if ( isset( $option['custom_control'] ) ) {
			$wp_customize->add_control( new $option['custom_control']( $wp_customize, $option['settings'], $control ) );
		} else {
			$wp_customize->add_control( $option['settings'], $control );
		}
	}

	/**
	 * Get array of terms.
	 */
	public static function get_terms( $term ) {
		$output_terms = array();

		$terms = get_terms(
			array(
				'taxonomy' => $term,
				'order'    => 'ASC',
				'orderby'  => 'id',
			)
		);

		if ( ! is_wp_error( $terms ) ) {
			if ( $terms ) {
				foreach( $terms as $term ) {
					$output_terms[$term->term_id] = $term->name;
				}
			}
		}

		return $output_terms;
	}

	/**
	 * Get array of posts.
	 */
	public static function get_posts_as_array( $args ) {
		$output_terms = array();
		$get_posts    = get_posts( $args );

		if ( ! empty( $get_posts ) ) {
			foreach ( $get_posts as $get_post ) {
				$title = $get_post->post_title;

				if ( empty( $title ) ) {
					$title = sprintf( esc_html__( 'ID: %s No Title', 'vip-business' ) , $get_post->ID );
				}

				$output_terms[ $get_post->ID ] = $title;
			}
		}

		return $output_terms;
	}

	/**
	 * Returns choices array for section visibility.
	 * @return array
	 */
	static function section_visibility() {
		$options = array(
			'disabled'     => esc_html__( 'Disabled', 'vip-business' ),
			'homepage'     => esc_html__( 'Homepage / Frontpage', 'vip-business' ),
			'entire-site'  => esc_html__( 'Entire Site', 'vip-business' ),
		);

		return apply_filters( 'vip_business_section_visibility_options', $options );
	}
}

/**
 * Initialize class
 */
$vip_business_utilities = new Vip_Business_Customizer_Utilities();