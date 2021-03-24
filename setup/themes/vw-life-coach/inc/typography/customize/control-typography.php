<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Life_Coach_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'vw-life-coach-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-life-coach' ),
				'family'      => esc_html__( 'Font Family', 'vw-life-coach' ),
				'size'        => esc_html__( 'Font Size',   'vw-life-coach' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-life-coach' ),
				'style'       => esc_html__( 'Font Style',  'vw-life-coach' ),
				'line_height' => esc_html__( 'Line Height', 'vw-life-coach' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-life-coach' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-life-coach-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-life-coach-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-life-coach' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-life-coach' ),
        'Acme' => __( 'Acme', 'vw-life-coach' ),
        'Anton' => __( 'Anton', 'vw-life-coach' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-life-coach' ),
        'Arimo' => __( 'Arimo', 'vw-life-coach' ),
        'Arsenal' => __( 'Arsenal', 'vw-life-coach' ),
        'Arvo' => __( 'Arvo', 'vw-life-coach' ),
        'Alegreya' => __( 'Alegreya', 'vw-life-coach' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-life-coach' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-life-coach' ),
        'Bangers' => __( 'Bangers', 'vw-life-coach' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-life-coach' ),
        'Bad Script' => __( 'Bad Script', 'vw-life-coach' ),
        'Bitter' => __( 'Bitter', 'vw-life-coach' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-life-coach' ),
        'BenchNine' => __( 'BenchNine', 'vw-life-coach' ),
        'Cabin' => __( 'Cabin', 'vw-life-coach' ),
        'Cardo' => __( 'Cardo', 'vw-life-coach' ),
        'Courgette' => __( 'Courgette', 'vw-life-coach' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-life-coach' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-life-coach' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-life-coach' ),
        'Cuprum' => __( 'Cuprum', 'vw-life-coach' ),
        'Cookie' => __( 'Cookie', 'vw-life-coach' ),
        'Chewy' => __( 'Chewy', 'vw-life-coach' ),
        'Days One' => __( 'Days One', 'vw-life-coach' ),
        'Dosis' => __( 'Dosis', 'vw-life-coach' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-life-coach' ),
        'Economica' => __( 'Economica', 'vw-life-coach' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-life-coach' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-life-coach' ),
        'Francois One' => __( 'Francois One', 'vw-life-coach' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-life-coach' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-life-coach' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-life-coach' ),
        'Handlee' => __( 'Handlee', 'vw-life-coach' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-life-coach' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-life-coach' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-life-coach' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-life-coach' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-life-coach' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-life-coach' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-life-coach' ),
        'Kanit' => __( 'Kanit', 'vw-life-coach' ),
        'Lobster' => __( 'Lobster', 'vw-life-coach' ),
        'Lato' => __( 'Lato', 'vw-life-coach' ),
        'Lora' => __( 'Lora', 'vw-life-coach' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-life-coach' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-life-coach' ),
        'Merriweather' => __( 'Merriweather', 'vw-life-coach' ),
        'Monda' => __( 'Monda', 'vw-life-coach' ),
        'Montserrat' => __( 'Montserrat', 'vw-life-coach' ),
        'Muli' => __( 'Muli', 'vw-life-coach' ),
        'Marck Script' => __( 'Marck Script', 'vw-life-coach' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-life-coach' ),
        'Open Sans' => __( 'Open Sans', 'vw-life-coach' ),
        'Overpass' => __( 'Overpass', 'vw-life-coach' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-life-coach' ),
        'Oxygen' => __( 'Oxygen', 'vw-life-coach' ),
        'Orbitron' => __( 'Orbitron', 'vw-life-coach' ),
        'Patua One' => __( 'Patua One', 'vw-life-coach' ),
        'Pacifico' => __( 'Pacifico', 'vw-life-coach' ),
        'Padauk' => __( 'Padauk', 'vw-life-coach' ),
        'Playball' => __( 'Playball', 'vw-life-coach' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-life-coach' ),
        'PT Sans' => __( 'PT Sans', 'vw-life-coach' ),
        'Philosopher' => __( 'Philosopher', 'vw-life-coach' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-life-coach' ),
        'Poiret One' => __( 'Poiret One', 'vw-life-coach' ),
        'Quicksand' => __( 'Quicksand', 'vw-life-coach' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-life-coach' ),
        'Raleway' => __( 'Raleway', 'vw-life-coach' ),
        'Rubik' => __( 'Rubik', 'vw-life-coach' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-life-coach' ),
        'Russo One' => __( 'Russo One', 'vw-life-coach' ),
        'Righteous' => __( 'Righteous', 'vw-life-coach' ),
        'Slabo' => __( 'Slabo', 'vw-life-coach' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-life-coach' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-life-coach'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-life-coach' ),
        'Sacramento' => __( 'Sacramento', 'vw-life-coach' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-life-coach' ),
        'Tangerine' => __( 'Tangerine', 'vw-life-coach' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-life-coach' ),
        'VT323' => __( 'VT323', 'vw-life-coach' ),
        'Varela Round' => __( 'Varela Round', 'vw-life-coach' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-life-coach' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-life-coach' ),
        'Volkhov' => __( 'Volkhov', 'vw-life-coach' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-life-coach' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-life-coach' ),
			'100' => esc_html__( 'Thin',       'vw-life-coach' ),
			'300' => esc_html__( 'Light',      'vw-life-coach' ),
			'400' => esc_html__( 'Normal',     'vw-life-coach' ),
			'500' => esc_html__( 'Medium',     'vw-life-coach' ),
			'700' => esc_html__( 'Bold',       'vw-life-coach' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-life-coach' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'vw-life-coach' ),
			'normal'  => esc_html__( 'Normal', 'vw-life-coach' ),
			'italic'  => esc_html__( 'Italic', 'vw-life-coach' ),
			'oblique' => esc_html__( 'Oblique', 'vw-life-coach' )
		);
	}
}
