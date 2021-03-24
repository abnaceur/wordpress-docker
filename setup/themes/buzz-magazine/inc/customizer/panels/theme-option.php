<?php
/**
 * Customize >> Theme Option
 * Registers Theme Option Panel
 * @package Buzz_Magazine
 */

$wp_customize->add_panel( 'theme_option',
    array(
        'title'           => esc_html__( 'Theme option' ,'buzz-magazine'),
        'priority'        => 100,
        'capability'      => 'edit_theme_options',
    )
);

/**
 * Storing Sections File Name
 * @var array $buzz_magazine_sections
 */
$buzz_magazine_sections = [
    'top-header',
    'flash-news',
    'main-header',
    'slider',
    'advertisement',
    'general',
    'archive',
    'single-page-post',
    '404',
    'color-category',
    'breadcrumb',
    'footer',

];

/**
 * Looping Through Files
 */
foreach ($buzz_magazine_sections as $buzz_magazine_section){
    require_once BUZZ_MAGAZINE_SECTIONS .'theme_option/' . $buzz_magazine_section .'.php';
}

