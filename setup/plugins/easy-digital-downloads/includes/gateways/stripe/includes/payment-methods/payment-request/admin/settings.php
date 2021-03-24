<?php
/**
 * Payment Request Button: Settings
 *
 * @package EDD_Stripe
 * @since   2.8.0
 */

/**
 * Adds settings to the Stripe subtab.
 *
 * @since 2.8.0
 *
 * @param array $settings Gateway settings.
 * @return array Filtered gateway settings.
 */
function edds_prb_add_settings( $settings ) {
	// Prevent adding the extra settings if the requirements are not met.
	// The `edd_settings_gateways` filter runs regardless of the short circuit
	// inside of `edds_add_settings()`
	if (
		false === edds_has_met_requirements( 'php' ) &&
		false === edds_is_pro()
	) {
		return $settings;
	}

	$prb_settings = array(
		array(
			'id'      => 'stripe_prb',
			'name'    => __( 'Apple Pay/Google Pay', 'easy-digital-downloads' ),
			'desc'    => wp_kses(
				(
					sprintf(
						/* translators: %1$s Opening anchor tag, do not translate. %2$s Opening anchor tag, do not translate. %3$s Closing anchor tag, do not translate. */
						__( '"Express Checkout" via Apple Pay, Google Pay, or Microsoft Pay digital wallets. By using Apple Pay, you agree to %1$sStripe%3$s and %2$sApple\'s%3$s terms of service.', 'easy-digital-downloads' ),
						'<a href="https://stripe.com/apple-pay/legal" target="_blank" rel="noopener noreferrer">',
						'<a href="https://developer.apple.com/apple-pay/acceptable-use-guidelines-for-websites/" target="_blank" rel="noopener noreferrer">',
						'</a>'
					) . (
						edd_use_taxes()
						? '<br /><strong>' . __( 'This feature is not available when taxes are enabled.', 'easy-digital-downloads' ) . '</strong>'
						: ''
					) . (
						edd_is_test_mode()
						? '<br /><strong>' . __( 'Apple Pay is not available in Test Mode.', 'easy-digital-downloads' ) . '</strong> ' . sprintf(
							/* translators: %1$s Opening anchor tag, do not translate. %2$s Opening anchor tag, do not translate. */
							__( 'See our %1$sdocumentation%2$s for more information.', 'easy-digital-downloads' ),
							'<a href="' . esc_url( edds_documentation_route( 'stripe-express-checkout' ) ) . '" target="_blank" rel="noopener noreferrer">',
							'</a>'
						)
						: ''
					)
				),
				array(
					'br'     => true,
					'strong' => true,
					'a'      => array(
						'href'   => true,
						'target' => true,
						'rel'    => true,
					),
				)
			),
			'type'    => 'multicheck',
			'options' => array(
				/** translators: %s Download noun */
				'single'   => sprintf( 
					__( 'Single %s', 'easy-digital-downloads' ),
					edd_get_label_singular()
				),
				/** translators: %s Download noun */
				'archive'  => sprintf( 
					__( '%s Archive (includes <code>[downloads]</code> shortcode)', 'easy-digital-downloads' ),
					edd_get_label_singular()
				),
				'checkout' => __( 'Checkout', 'easy-digital-downloads' ),
			),
		)
	);

	$position = array_search(
		'stripe_statement_descriptor',
		array_values( wp_list_pluck( $settings['edd-stripe'], 'id' ) ),
		true
	);

	$settings['edd-stripe'] = array_merge(
		array_slice( $settings['edd-stripe'], 0, $position + 1 ),
		$prb_settings,
		array_slice( $settings['edd-stripe'], $position + 1 )
	);

	return $settings;
}
add_filter( 'edd_settings_gateways', 'edds_prb_add_settings', 20 );

/**
 * Force "Payment Request Buttons" to be disabled if taxes are enabled.
 *
 * @since 2.8.0
 *
 * @param mixed  $value Setting value.
 * @param string $key Setting key.
 * @return string Setting value.
 */
function edds_prb_sanitize_setting( $value, $key ) {
	if ( 'stripe_prb' === $key && edd_use_taxes() ) {
		$value = array();
	}

	return $value;
}
add_filter( 'edd_settings_sanitize_multicheck', 'edds_prb_sanitize_setting', 10, 2 );
