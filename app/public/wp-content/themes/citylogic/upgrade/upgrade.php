<?php
/**
 * Functions for users wanting to upgrade to premium
 *
 * @package CityLogic
 */

/**
 * Display the upgrade to Premium page & load styles.
 */
function citylogic_premium_admin_menu() {
    global $citylogic_upgrade_page;
    $citylogic_upgrade_page = add_theme_page(
    	__( 'CityLogic Premium', 'citylogic' ),
    	'<span class="premium-link" style="">'. __( 'CityLogic Premium', 'citylogic' ) .'</span>',
    	'edit_theme_options',
    	'premium_upgrade',
    	'citylogic_render_upgrade_page'
	);
}
add_action( 'admin_menu', 'citylogic_premium_admin_menu' );

/**
 * Enqueue admin stylesheet only on upgrade page.
 */
function citylogic_load_upgrade_page_scripts( $hook ) {
    global $citylogic_upgrade_page;
    if ( $hook != $citylogic_upgrade_page ) {
		return;
    }
    
    wp_enqueue_style( 'citylogic-upgrade-body-font-default', '//fonts.googleapis.com/css?family=Lato:400,400italic', array(), CITYLOGIC_THEME_VERSION );
    wp_enqueue_style( 'citylogic-upgrade-heading-font-default', '//fonts.googleapis.com/css?family=Montserrat:500,700', array(), CITYLOGIC_THEME_VERSION );
    wp_enqueue_style( 'citylogic-upgrade', get_template_directory_uri() .'/upgrade/library/css/upgrade.css', array(), CITYLOGIC_THEME_VERSION );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/library/fonts/otb-font-awesome/css/font-awesome.css', array(), '4.7.0' );
    wp_enqueue_script( 'caroufredsel-js', get_template_directory_uri() .'/library/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), CITYLOGIC_THEME_VERSION, true );
    wp_enqueue_script( 'citylogic-upgrade-custom-js', get_template_directory_uri() .'/upgrade/library/js/upgrade.js', array( 'jquery' ), CITYLOGIC_THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'citylogic_load_upgrade_page_scripts' );

/**
 * Render the premium upgrade/order page
 */
function citylogic_render_upgrade_page() {

	if ( isset( $_GET['action'] ) ) {
		$action = $_GET['action'];
	} else {
		$action = 'view-page';
	}

	switch ( $action ) {
		case 'view-page':
			get_template_part( 'upgrade/library/template-parts/content', 'upgrade' );
			break;
	}
}
