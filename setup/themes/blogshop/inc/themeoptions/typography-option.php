<?php

$font_choices = array(
	'Source Sans Pro:400,700,400italic,700italic' => '<li>'.'Source Sans Pro'. '</li>',
	'Open Sans:400italic,700italic,400,700' => 'Open Sans',
	'Oswald:400,700' => 'Oswald',
	'Playfair Display:400,700,400italic' => 'Playfair Display',
	'Montserrat:400,700' => 'Montserrat',
	'Raleway:400,700' => 'Raleway',
	'Droid Sans:400,700' => 'Droid Sans',
	'Lato:400,700,400italic,700italic' => 'Lato',
	'Arvo:400,700,400italic,700italic' => 'Arvo',
	'Lora:400,700,400italic,700italic' => 'Lora',
	'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
	'Oxygen:400,300,700' => 'Oxygen',
	'PT Serif:400,700' => 'PT Serif',
	'PT Sans:400,700,400italic,700italic' => 'PT Sans',
	'PT Sans Narrow:400,700' => 'PT Sans Narrow',
	'Cabin:400,700,400italic' => 'Cabin',
	'Fjalla One:400' => 'Fjalla One',
	'Francois One:400' => 'Francois One',
	'Josefin Sans:400,300,600,700' => 'Josefin Sans',
	'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
	'Arimo:400,700,400italic,700italic' => 'Arimo',
	'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
	'Bitter:400,700,400italic' => 'Bitter',
	'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
	'Roboto:400,400italic,700,700italic' => 'Roboto',
	'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
	'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
	'Roboto Slab:400,700' => 'Roboto Slab',
	'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
	'Rokkitt:400' => 'Rokkitt',
	'Poppins:400,500,600,700,800,900' => 'Poppins',

);
$wp_customize->add_section(
	'typhograpy',
	array(
		'priority'       => 6,
		'panel'          => 'blogshop',
		'title'          => __( 'Typhograpy', 'blogshop' ),
		'capability'     => 'edit_theme_options',
	)
);
$wp_customize->add_setting(
	'blogshop_body_fonts',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'blogshop_sanitize_fonts',
		'default'  => 'Poppins:400,500,600,700,800,900',
	)
);
$wp_customize->add_control( 
	'blogshop_body_fonts', 
	array(
		'type' => 'select',
		'label' => __('Body Font Family', 'blogshop'),
		'section' => 'typhograpy',
		'choices' => $font_choices
	)
);
$wp_customize->add_setting( 
	'blogshop_body_fonts_size',
	array(
		'transport' => 'refresh',
		'default' => 15,
		'sanitize_callback' => 'blogshop_sanitize_number_absint',
	)
);
$wp_customize->add_control( 
	'blogshop_body_fonts_size', 
	array(
		'type' => 'number',
		'label' => __('Body Font Size', 'blogshop'),
		'section' => 'typhograpy',
	)
);
$wp_customize->add_setting( 
	'blogshop_body_fonts_weight',
	array(
		'transport' => 'refresh',
		'default' => 400,
		'sanitize_callback' => 'blogshop_sanitize_number_absint',
	)
);
$wp_customize->add_control( 
	'blogshop_body_fonts_weight', 
	array(
		'type' => 'select',
		'label' => __('Body Font Weight', 'blogshop'),
		'section' => 'typhograpy',
		'choices' => array(
			'100' => __( '100', 'blogshop' ),
			'200' => __( '200', 'blogshop' ),
			'300' => __( '300', 'blogshop' ),
			'400' => __( '400', 'blogshop' ),
			'500' => __( '500', 'blogshop' ),
			'600' => __( '600', 'blogshop' ),
			'700' => __( '700', 'blogshop' ),
			'800' => __( '800', 'blogshop' ),
			'900' => __( '900', 'blogshop' ),
			'1100' => __( '1100', 'blogshop' ),
		),
	)
);
$wp_customize->add_setting( 
	'blogshop_body_fonts_line_height',
	array(
		'transport' => 'refresh',
		'default' => 28,
		'sanitize_callback' => 'blogshop_sanitize_number_absint',
	)
);
$wp_customize->add_control( 
	'blogshop_body_fonts_line_height', 
	array(
		'type' => 'number',
		'label' => __('Body Line Height', 'blogshop'),
		'section' => 'typhograpy',
	)
);