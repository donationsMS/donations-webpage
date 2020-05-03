<?php
$opacity_classes = array();

if ( get_theme_mod( 'citylogic-header-image-text-overlay-text-shadow', customizer_library_get_default( 'citylogic-header-image-text-overlay-text-shadow' ) ) ) {
	$opacity_classes[] = 'text-shadow';
}

if ( is_random_header_image() && $header_url = get_header_image() ) {
	// For a random header search for a match against all headers.
	foreach ( get_uploaded_header_images() as $header ) {
		if ( $header['url'] == $header_url ) {
			$attachment_id = $header['attachment_id'];
			break;
		}
	}

} elseif ( $data = get_custom_header() ) {
	// For static headers
	if ( ! empty( $data->attachment_id ) ) {
		$attachment_id = $data->attachment_id;
	}
}

$src 		  = get_header_image();
$width 	  	  = get_custom_header()->width;
$height   	  = get_custom_header()->height;
$alt_text 	  = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
$overlay_text = trim( pll__( get_theme_mod( 'citylogic-header-image-text', customizer_library_get_default( 'citylogic-header-image-text' ) ) ) );

?>

<div class="header-image-padder">
	<div class="header-image loading">
	
		<img src="<?php echo esc_url( $src ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
		<div class="opacity"></div>
		
		<?php
		if ( !empty( $overlay_text ) ) {
		?>
		<div class="overlay-container">
		
			<div class="overlay">
				<div class="opacity <?php echo implode( ' ', $opacity_classes ); ?>">
					<?php 
					echo wp_kses_post( $overlay_text );
					?>
				</div>
			</div>
		</div>
		<?php 
		}
		?>
	
	</div>
</div>
