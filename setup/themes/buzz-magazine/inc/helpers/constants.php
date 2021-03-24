<?php
/**
 * All the constant use for Buzz_Magazine defined here..
 *
 * @package Buzz_Magazine
 */
$buzz_magazine_theme_root = trailingslashit( wp_normalize_path( get_template_directory() ));
$buzz_magazine_theme_uri  = esc_url(trailingslashit( get_template_directory_uri() ));

define( 'BUZZ_MAGAZINE_THEME_URI'     , $buzz_magazine_theme_uri );

define( 'BUZZ_MAGAZINE_ROOT_URI'      , $buzz_magazine_theme_root );

define( 'BUZZ_MAGAZINE_ASSETS'        , BUZZ_MAGAZINE_THEME_URI . 'assets/' );

define( 'BUZZ_MAGAZINE_CSS_URI'       , BUZZ_MAGAZINE_ASSETS . 'css/' );

define( 'BUZZ_MAGAZINE_JS_URI'        , BUZZ_MAGAZINE_ASSETS . 'js/' );

define( 'BUZZ_MAGAZINE_IMAGE_URI'     , BUZZ_MAGAZINE_ASSETS . 'img/' );

define( 'BUZZ_MAGAZINE_FONT_URI'      , BUZZ_MAGAZINE_ASSETS . 'fonts/' );

define( 'BUZZ_MAGAZINE_INC'           , BUZZ_MAGAZINE_ROOT_URI . 'inc/');

define( 'BUZZ_MAGAZINE_HELPERS'       , BUZZ_MAGAZINE_INC. 'helpers/');

define( 'BUZZ_MAGAZINE_CUSTOMIZER_URI', BUZZ_MAGAZINE_INC. 'customizer/');

define( 'BUZZ_MAGAZINE_SANITIZATION'  , BUZZ_MAGAZINE_CUSTOMIZER_URI.'sanitization/');

define( 'BUZZ_MAGAZINE_PANELS'        , BUZZ_MAGAZINE_CUSTOMIZER_URI.'panels/');

define( 'BUZZ_MAGAZINE_SECTIONS'       , BUZZ_MAGAZINE_CUSTOMIZER_URI.'sections/');

define( 'BUZZ_MAGAZINE_WIDGETS'        , BUZZ_MAGAZINE_INC . 'widgets/' );

define( 'BUZZ_MAGAZINE_METABOX'        , BUZZ_MAGAZINE_INC . 'metabox/');

define( 'BUZZ_MAGAZINE_CONTROL'        , BUZZ_MAGAZINE_CUSTOMIZER_URI.'controls/');

define( 'BUZZ_MAGAZINE_HOOK'           , BUZZ_MAGAZINE_INC .'hooks/');

define( 'BUZZ_MAGAZINE_LIBRARY'        , BUZZ_MAGAZINE_INC .'library/');

