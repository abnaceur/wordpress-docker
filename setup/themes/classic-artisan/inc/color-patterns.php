<?php
/**
 * Generate custom colors CSS.
 */

function classic_artisan_custom_colors_css() {
	$h = absint( get_theme_mod( 'cab_h', 250 ) );
	$s = absint( get_theme_mod( 'cab_s', 20 ) );
	$s_heavy = 5 * $s;
	if ( $s_heavy > 100 ) {
		$s_heavy = 100;
	}

	// Defaults for all colors, so don't need to do anything.
	if ( 250 === $h && 20 === $s ) {
		return '';
	}

	$css = '
body,
button,
input,
select,
textarea,
input[type="text"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="password"]:focus,
input[type="search"]:focus,
input[type="number"]:focus,
input[type="tel"]:focus,
input[type="range"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="week"]:focus,
input[type="time"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="color"]:focus,
textarea:focus,
a,
.screen-reader-text:focus,
.alignwide figcaption,
.alignfull figcaption {
	color: hsl(' . $h . ', ' . $s . '%, 13%);
}

.site .mejs-container,
.site .mejs-embed,
.site .mejs-embed body,
.site .mejs-container .mejs-controls,
hr {
	background: hsl(' . $h . ', ' . $s . '%, 13%);
}

a:hover,
a:focus,
a:active,
.main-navigation .current_page_item > a,
.main-navigation .current-menu-item > a,
.main-navigation .current_page_ancestor > a,
.main-navigation .current-menu-ancestor > a {
	color: hsl(' . $h . ', ' . $s_heavy . '%, 33%);
}

.site .mejs-controls .mejs-time-rail .mejs-time-current {
    background: hsl(' . $h . ', ' . $s_heavy . '%, 33%);
}

pre,
code,
kbd,
tt,
var,
table th {
	background: hsl(' . $h . ', ' . $s . '%, 93%);
}

body,
.site-header,
.content-area,
.widget-area,
.site-info,
.main-navigation ul a,
.main-navigation ul ul,
.screen-reader-text:focus,
.site .mejs-controls .mejs-time-rail .mejs-time-loaded,
.site .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
.alignwide figcaption,
.alignfull figcaption {
	background: hsl(' . $h . ', ' . $s . '%, 98%);
}

.button:hover,
.site-content .entry-content .button:hover,
.wp-block-button__link:hover,
.site-content .entry-content .wp-block-file__button:hover,
.site-content .entry-content .wp-block-button__link:hover,
button:hover,
input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover,
.wp-custom-header-video-button:hover,
.button:focus,
.site-content .entry-content .button:focus,
.wp-block-button__link:focus,
.site-content .entry-content .wp-block-file__button:focus,
.site-content .entry-content .wp-block-button__link:focus,
button:focus,
input[type="button"]:focus,
input[type="reset"]:focus,
input[type="submit"]:focus,
.wp-custom-header-video-button:focus,
.button:active,
.site-content .entry-content .button:active,
.wp-block-button__link:active,
.site-content .entry-content .wp-block-file__button:active,
.site-content .entry-content .wp-block-button__link:active,
button:active,
input[type="button"]:active,
input[type="reset"]:active,
input[type="submit"]:active,
.wp-custom-header-video-button:active {
	border-color: hsl(' . $h . ', ' . $s . '%, 13%);
	background-color: hsl(' . $h . ', ' . $s . '%, 13%);
	color: hsl(' . $h . ', ' . $s . '%, 98%);
}

/* Block Styles */
.has-fg-dark-color {
	color: hsl(' . $h . ', ' . $s . '%, 13%);
}

.has-fg-light-color {
	color: hsl(' . $h . ', ' . $s . '%, 98%);
}

.has-accent-light-color {
	color: hsl(' . $h . ', ' . $s_heavy . '%, 85%);
}

.has-accent-dark-color {
	color: hsl(' . $h . ', ' . $s_heavy . '%, 33%);
}

.has-fg-dark-background-color {
	background-color: hsl(' . $h . ', ' . $s . '%, 13%);
}

.has-fg-light-background-color {
	background-color: hsl(' . $h . ', ' . $s . '%, 98%);
}

.has-accent-light-background-color {
	background-color: hsl(' . $h . ', ' . $s_heavy . '%, 85%);
}

.has-accent-dark-background-color {
	background-color: hsl(' . $h . ', ' . $s_heavy . '%, 33%);
}
	';

	return $css;
}