<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package     Blog99
 * @author      wp99themes
 * @copyright   Copyright (c) 2019, wp99themes
 * @link        http://wp99themes.com
 * @since       Blog99 1.0.0
 * */

class Blog99_Radio_Control extends WP_Customize_Control {
    public function enqueue() {
        wp_enqueue_style( 'blog99-radio', trailingslashit ( get_template_directory_uri() ) . 'wp99themes/customizer/custom-controls/radio/radio.css'); //for slider            
        wp_enqueue_script( 'blog99-radio', trailingslashit ( get_template_directory_uri() ) . 'wp99themes/customizer/custom-controls/radio/radio.js', array( 'jquery'), false, true); //for slider        
    }
    public function render_content() {
        if ( empty( $this->choices)) return;
        $name='_customize-radio-' . $this->id;
        ?><span class="customize-control-title"><?php echo esc_html( $this->label);
        ?></span><span class="description customize-control-description"><?php echo esc_html( $this->description);
        ?></span><ul class="controls" id="blog99-img-container"><?php foreach ( $this->choices as $value=> $label): $class=($this->value()==$value)?'blog99-radio-img-selected blog99-radio-img-img':'ecommerce-radio-img-img-radio-img-img';
        ?><li ><label><input <?php $this->link();
        ?> type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link();
        checked( $this->value(), $value);
        ?>/><img src='<?php echo esc_url( $label ); ?>' class='<?php echo esc_attr( $class ); ?>' /></label></li><?php endforeach;
        ?></ul><?php
    }
}