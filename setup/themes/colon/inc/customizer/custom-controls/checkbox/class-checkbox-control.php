<?php
/**
 * Checkbox Customizer Control
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) :
	exit;
endif;

// Exit if Colon_Checkbox_Control exists and WP_Customize_Control does not exsist.
if ( class_exists('Colon_Checkbox_Control') && ! class_exists( 'WP_Customize_Control' ) ) :
	return null;
endif;

/**
 * This class is for the checkbox control in the Customizer.
 *
 * @access public
 */
class Colon_Checkbox_Control extends WP_Customize_Control {
	
	/**
	 * Declare the control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'colon-cbx';
	
	/**
	 * Define whether the pills can be sorted using drag 'n drop. Either false or true. Default = false
	 */
	private $sortable = false;
	
	/**
	* The width of the pills. Each pill can be auto width or full width. Default = false
	*/
	private $fullwidth = false;

	/**
	 * Constructor
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );
		// Check if these pills are sortable
		if ( isset( $this->input_attrs['sortable'] ) && $this->input_attrs['sortable'] ) {
			$this->sortable = true;
		}
		// Check if the pills should be full width
		if ( isset( $this->input_attrs['fullwidth'] ) && $this->input_attrs['fullwidth'] ) {
			$this->fullwidth = true;
		}
	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @access public
	 * @return void
	 */
	public function enqueue() {
        wp_enqueue_script( 'colon-cbx-control-scripts', get_parent_theme_file_uri( 'inc/customizer/custom-controls/checkbox/checkbox' . ( ( COLON_MINIFY ) ? '.min' : '' ) . '.js' ), array( 'jquery' ), '1.0.0', true );
        wp_enqueue_style( 'colon-cbx-control-css', get_parent_theme_file_uri( 'inc/customizer/custom-controls/checkbox/checkbox' . ( ( COLON_MINIFY ) ? '.min' : '' ) . '.css', array(), '1.0', 'all' ));
	}
	
	/**
	 * Render the control to be displayed in the Customizer.
	 */
	public function render_content() {
		$reordered_choices = array();
		$saved_choices = explode( ',', esc_attr( $this->value() ) );

		// Order the checkbox choices based on the saved order
		if( $this->sortable ) {
			foreach ( $saved_choices as $key => $value ) {
				if( isset( $this->choices[$value] ) ) {
					$reordered_choices[$value] = $this->choices[$value];
				}
			}
			$reordered_choices = array_merge( $reordered_choices, array_diff_assoc( $this->choices, $reordered_choices ) );
		}
		else {
			$reordered_choices = $this->choices;
		}

		?>
			<div class="pill_checkbox_control">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-sortable-pill-checkbox" <?php $this->link(); ?> />
				<div class="sortable_pills<?php echo ( $this->sortable ? ' sortable' : '' ) . ( $this->fullwidth ? ' fullwidth_pills' : '' ); ?>">
					<?php foreach ( $reordered_choices as $key => $value ) { ?>
						<label class="checkbox-label">
							<input type="checkbox" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php checked( in_array( esc_attr( $key ), $saved_choices, true ), true ); ?> class="sortable-pill-checkbox"/>
							<span class="sortable-pill-title"><?php echo esc_html( $value ); ?></span>
							<?php if( $this->sortable && $this->fullwidth ) { ?>
								<span class="dashicons dashicons-sort"></span>
							<?php } ?>
						</label>
					<?php	} ?>
				</div>
			</div>
		<?php
	}
}
	
