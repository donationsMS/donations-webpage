<?php
$logo = '';
$logo_link_content = '';

if ( get_theme_mod( 'citylogic-logo-link-content', customizer_library_get_default( 'citylogic-logo-link-content' ) ) == "" ) {
	$logo_link_content = home_url( '/' );
} else {
	$logo_link_content = get_permalink( get_theme_mod( 'citylogic-logo-link-content' ) );
}

if ( function_exists( 'has_custom_logo' ) ) {
	if ( has_custom_logo() ) {
		$logo = get_custom_logo();
	}
} else if ( get_theme_mod( 'citylogic-logo' ) ) {
	$logo = "<a href=\"". esc_url( $logo_link_content ) ."\" title=\"". esc_attr( get_bloginfo( 'name', 'display' ) ) .' - '. esc_attr( get_bloginfo( 'description', 'display' ) ) ."\" class=\"custom-logo-link\"><img src=\"". esc_url( get_theme_mod( 'citylogic-logo' ) ) ."\" alt=\"". esc_attr( get_bloginfo( 'name' ) ) .' - '. esc_attr( get_bloginfo( 'description', 'display' ) ) ."\" class=\"custom-logo\" /></a>";
}
?>

<div class="site-logo-area">
	<div class="site-container">
	    
	    <div class="branding">
	        <?php
	        if ( $logo ) {
	       		echo $logo;
	        } else {
			?>
				<a href="<?php echo esc_url( $logo_link_content ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="title"><?php bloginfo( 'name' ); ?></a>
				<div class="description"><?php bloginfo( 'description' ); ?></div>
	        <?php
	        }
	        ?>
		</div>
		
		<?php
		$top_right = '';
	        
		if ( citylogic_is_woocommerce_activated() && get_theme_mod( 'citylogic-header-shop-links', customizer_library_get_default( 'citylogic-header-shop-links' ) ) ) {
			$top_right = 'shop-links';
		} else {
			$top_right = 'info-text-one';
		}
		?>		
	    
	    <div class="site-header-right <?php echo $top_right == '' ? 'top-empty' : ''; ?>">
	        
	        <div class="top <?php echo $top_right == '' ? 'empty' : $top_right; ?>">
		        <?php
		        switch ($top_right) {
		    		case 'shop-links':
		    			get_template_part( 'library/template-parts/shop-links' );
		    			break;
		    			
		    		case 'info-text-one':
		    			get_template_part( 'library/template-parts/info-text' );
		    			break;
		    	}
		    	?>
	        </div>
	        
	        <div class="bottom social-links">
		        <?php
    			get_template_part( 'library/template-parts/social-links' );
		    	?>
			</div>
			        
	    </div>
	    <div class="clearboth"></div>
	    
	</div>
</div>

<?php
global $show_slider, $show_header_image;

//$navigation_menu_opacity = get_theme_mod( 'citylogic-navigation-menu-opacity', customizer_library_get_default( 'citylogic-navigation-menu-opacity' ) );

// If the navigation menu opacity is less than 1 but greater than zero then it's translucent
//$is_navigation_menu_translucent = $navigation_menu_opacity < 1 && $navigation_menu_opacity > 0;

// If the navigation menu opacity is 0 then it's transparent
$is_navigation_menu_transparent = get_theme_mod( 'citylogic-transparent-header', customizer_library_get_default( 'citylogic-transparent-header' ) );

if ( $is_navigation_menu_transparent && !$show_slider && !$show_header_image ) {
	$is_navigation_menu_transparent = false;
}

$uppercase;

if ( get_theme_mod( 'citylogic-navigation-menu-uppercase', customizer_library_get_default( 'citylogic-navigation-menu-uppercase' ) ) ) {
	$uppercase = 'uppercase';
}
?>

<nav id="site-navigation" class="main-navigation border-bottom centered-submenu <?php echo get_theme_mod( 'citylogic-navigation-menu-rollover-style', customizer_library_get_default( 'citylogic-navigation-menu-rollover-style' ) ); ?> <?php echo esc_attr( $uppercase ); ?> <?php echo esc_attr( get_theme_mod( 'citylogic-navigation-menu-alignment', customizer_library_get_default( 'citylogic-navigation-menu-alignment' ) ) ); ?> <?php echo ( $is_navigation_menu_transparent ) ? 'transparent' : ''; ?>" role="navigation">
	<span class="header-menu-button"><i class="otb-fa otb-fa-bars"></i></span>
	<div id="main-menu" class="main-menu-container">
		<div class="main-menu-close"><i class="otb-fa otb-fa-angle-right"></i><i class="otb-fa otb-fa-angle-left"></i></div>
		<div class="main-navigation-inner">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</div>
        
		<div class="search-slidedown">
			<div class="container">
				<div class="padder">
					<div class="search-block">
					<?php if( get_theme_mod( 'citylogic-navigation-menu-search-button', customizer_library_get_default( 'citylogic-navigation-menu-search-button' ) ) && get_theme_mod( 'citylogic-navigation-menu-search-type', customizer_library_get_default( 'citylogic-navigation-menu-search-type' ) ) == 'default' ) : ?>
						<?php get_search_form(); ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
        
	</div>
</nav><!-- #site-navigation -->
