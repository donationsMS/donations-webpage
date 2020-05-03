<?php
/**
 * Functions used to implement options
 *
 * @package Customizer Library Demo
 */

/**
 * Enqueue Google Fonts Example
 */
function citylogic_customizer_theme_fonts() {

	// Font options
	$fonts = array(
		get_theme_mod( 'citylogic-site-title-font', customizer_library_get_default( 'citylogic-site-title-font' ) ),
		get_theme_mod( 'citylogic-navigation-menu-font', customizer_library_get_default( 'citylogic-navigation-menu-font' ) ),
		get_theme_mod( 'citylogic-heading-font', customizer_library_get_default( 'citylogic-heading-font' ) ),
		get_theme_mod( 'citylogic-body-font', customizer_library_get_default( 'citylogic-body-font' ) )
	);

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	wp_enqueue_style( 'citylogic_customizer_theme_fonts', $font_uri, array(), null, 'screen' );

}
add_action( 'wp_enqueue_scripts', 'citylogic_customizer_theme_fonts' );