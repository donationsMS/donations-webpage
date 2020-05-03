<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package CityLogic
 */
?><!DOCTYPE html><!-- CityLogic -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php
global $show_slider, $slider_type;
$show_slider = false;

// Check if a slider should display
// If it's the homepage and the default slider is active
if ( is_front_page() && get_theme_mod( 'citylogic-slider-type', customizer_library_get_default( 'citylogic-slider-type' ) ) == 'citylogic-slider-default' ) {
	$show_slider = true;
	$slider_type = 'default';
	
// If it's the homepage and the plugin slider is active and there's a shortcode
} else if ( is_front_page() && get_theme_mod( 'citylogic-slider-type', customizer_library_get_default( 'citylogic-slider-type' ) ) == 'citylogic-slider-plugin' && get_theme_mod( 'citylogic-slider-plugin-shortcode', customizer_library_get_default( 'citylogic-slider-plugin-shortcode' ) ) != '' ) {
	$show_slider = true;
	$slider_type = 'plugin';
}


global $show_header_image;
$show_header_image = false;

// Check if a header image should display
// If it's the homepage and a header image has been set and the slider is disabled
if ( is_front_page() && get_header_image() && get_theme_mod( 'citylogic-slider-type', customizer_library_get_default( 'citylogic-slider-type' ) ) == 'citylogic-no-slider' ) {
	$show_header_image = true;
}

global $is_logo_container_transparent;

$is_logo_container_transparent = get_theme_mod( 'citylogic-transparent-header', customizer_library_get_default( 'citylogic-transparent-header' ) );

if ( $is_logo_container_transparent && !$show_slider && !$show_header_image ) {
	$is_logo_container_transparent = false;
}

$header_classes = array();

if ( $is_logo_container_transparent ) {
	$header_classes[] = 'transparent ';
}

?>

<header id="masthead" class="site-header left-aligned <?php echo esc_attr( $show_slider || $show_header_image ? 'has-header-media' : '' ); ?> <?php echo ( $show_slider && $slider_type == 'default' ) || $show_header_image ? 'forced-solid' : ''; ?> <?php echo implode( ' ', $header_classes ); ?>" role="banner">
    
    <?php
    // If the Navigation Menu alignment is set to inline then load the inline header include
    if ( get_theme_mod( 'citylogic-navigation-menu-alignment', customizer_library_get_default( 'citylogic-navigation-menu-alignment' ) ) == 'inline' ) {
		get_template_part( 'library/template-parts/header', 'inline' );
	} else {
		get_template_part( 'library/template-parts/header', 'left-aligned' );
	}
	?>
    
</header><!-- #masthead -->

<script>
	var cityLogicSliderTransitionSpeed = parseInt(<?php echo intval( get_theme_mod( 'citylogic-slider-transition-speed', customizer_library_get_default( 'citylogic-slider-transition-speed' ) ) ); ?>);
</script>
    
<?php
if ( $show_slider ) :
	get_template_part( 'library/template-parts/slider' );
elseif ( $show_header_image ) :
	get_template_part( 'library/template-parts/header-image' );
endif;

$page_template = basename( get_page_template() );
$no_sidebar = false;

if ( ( $page_template == 'template-left-sidebar.php' && !is_active_sidebar( 'sidebar-1' ) ) ) {
	$no_sidebar = true;
}
?>

<div class="content-container <?php echo $show_slider || $show_header_image ? 'extra-padded' : ''; ?>">
	<div id="content" class="site-content site-container <?php echo ( $no_sidebar ) ? 'no-sidebar' : ''; ?>">