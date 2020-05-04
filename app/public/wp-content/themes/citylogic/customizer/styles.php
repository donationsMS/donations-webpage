<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package Customizer Library Demo
 */

if ( ! function_exists( 'citylogic_customizer_library_build_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function citylogic_customizer_library_build_styles() {
	global $mobile_menu_breakpoint, $solidify_breakpoint;
	
	$color = 'citylogic-background-color';
	$colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
	
	if ( $colormod !== get_background_color() ) {
	
		$sancolor = esc_html( $colormod );
	
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body,
				.content-container,
				.site-content .rpwe-block li'
			),
			'declarations' => array(
				'background-color' => $sancolor
			)
		) );
	}	
	
    // Site Logo Area Color - solid
    $color = 'citylogic-header-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    if ( $colormod !== customizer_library_get_default( $color ) ) {
    	
        $sancolor = esc_html( $colormod );
        $sancolor_rgb = customizer_library_hex_to_rgb( $sancolor );
    	
        Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-header .site-logo-area,
				.site-header .site-logo-area.sticky.stuck'
        	),
        	'declarations' => array(
        		'background-color' => $sancolor
			)
			//'media' => '(min-width: ' .$solidify_breakpoint. 'px)'
        ) );
	
    }
    
    // Site Logo Area Color - with opacity
    $color = 'citylogic-header-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    $opacity = 'citylogic-layout-logo-container-opacity';
    $opacitymod = get_theme_mod( $opacity, customizer_library_get_default( $opacity ) );

    if ( $colormod !== customizer_library_get_default( $color ) || $opacitymod !== customizer_library_get_default( $opacity ) ) {
    	
    	$sancolor = esc_html( $colormod );
    	$sancolor_rgb = customizer_library_hex_to_rgb( $sancolor );

		Customizer_Library_Styles()->add( array(
	    	'selectors' => array(
	    		'.site-header.transparent .site-logo-area,
	    		.site-header.transparent .site-logo-area.sticky.stuck'
	    	),
	    	'declarations' => array(
	    		'background-color' => 'rgba(' .$sancolor_rgb['r']. ',' .$sancolor_rgb['g']. ',' .$sancolor_rgb['b']. ', '. floatval( $opacitymod ) .')'
	    	),
	    	'media' => '(max-width: ' .($solidify_breakpoint+1). 'px)'
		) );
    }
    
    // Navigation Menu Color - solid
    $color = 'citylogic-navigation-menu-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    if ( $colormod !== customizer_library_get_default( $color ) ) {
    	
        $sancolor = esc_html( $colormod );
        $sancolor_rgb = customizer_library_hex_to_rgb( $sancolor );
        
        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
        		'.main-navigation'
        	),
        	'declarations' => array(
        		'background-color' => $sancolor
        	)
        	//'media' => '(min-width: ' .$solidify_breakpoint. 'px)'
        ) );
	
    }    
    
    // Navigation Menu Color - with opacity
    $color = 'citylogic-navigation-menu-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    $opacity = 'citylogic-navigation-menu-opacity';
    $opacitymod = get_theme_mod( $opacity, customizer_library_get_default( $opacity ) );

    if ( $colormod !== customizer_library_get_default( $color ) || $opacitymod !== customizer_library_get_default( $opacity ) ) {
    	
    	$sancolor = esc_html( $colormod );
    	$sancolor_rgb = customizer_library_hex_to_rgb( $sancolor );

		Customizer_Library_Styles()->add( array(
	    	'selectors' => array(
	    		'.main-navigation.transparent'
	    	),
	    	'declarations' => array(
	    		'background-color' => 'rgba(' .$sancolor_rgb['r']. ',' .$sancolor_rgb['g']. ',' .$sancolor_rgb['b']. ', '. floatval( $opacitymod ) .')'
	    	),
	    	'media' => '(min-width: ' .($solidify_breakpoint+1). 'px)'
		) );
    }
    
    // Primary Color
    $color = 'citylogic-primary-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    if ( $colormod !== customizer_library_get_default( $color ) ) {
    	
        $sancolor = esc_html( $colormod );
        $sancolor_rgb = customizer_library_hex_to_rgb( $sancolor );

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                '.search-button .otb-fa-search,
				.search-button .otb-fa-search:hover,
				.widget_search .search-submit .otb-fa,
                .widget_product_search .search-submit .otb-fa,
				.info-text em,
				.site-header .site-header-right a:hover,
				.site-header.transparent .site-header-right a:hover,
				.site-header.translucent .site-header-right a:hover,
                
				.main-navigation ul ul a:hover,
                .main-navigation ul ul li.current-menu-item > a,
				.main-navigation ul ul li.current_page_item > a,
				.main-navigation ul ul li.current-menu-parent > a,
				.main-navigation ul ul li.current_page_parent > a,
				.main-navigation ul ul li.current-menu-ancestor > a,
				.main-navigation ul ul li.current_page_ancestor > a,
                
				.site-header .site-container .main-navigation ul ul a:hover,
                .site-header .site-container .main-navigation ul ul li.current-menu-item > a,
				.site-header .site-container .main-navigation ul ul li.current_page_item > a,
				.site-header .site-container .main-navigation ul ul li.current-menu-parent > a,
				.site-header .site-container .main-navigation ul ul li.current_page_parent > a,
				.site-header .site-container .main-navigation ul ul li.current-menu-ancestor > a,
				.site-header .site-container .main-navigation ul ul li.current_page_ancestor > a,
                
				.main-navigation.transparent ul ul a:hover,
                .main-navigation.transparent ul ul li.current-menu-item > a,
				.main-navigation.transparent ul ul li.current_page_item > a,
				.main-navigation.transparent ul ul li.current-menu-parent > a,
				.main-navigation.transparent ul ul li.current_page_parent > a,
				.main-navigation.transparent ul ul li.current-menu-ancestor > a,
				.main-navigation.transparent ul ul li.current_page_ancestor > a,
                
				.site-header.transparent .site-container .main-navigation ul ul a:hover,
                .site-header.transparent .site-container .main-navigation ul ul li.current-menu-item > a,
				.site-header.transparent .site-container .main-navigation ul ul li.current_page_item > a,
				.site-header.transparent .site-container .main-navigation ul ul li.current-menu-parent > a,
				.site-header.transparent .site-container .main-navigation ul ul li.current_page_parent > a,
				.site-header.transparent .site-container .main-navigation ul ul li.current-menu-ancestor > a,
				.site-header.transparent .site-container .main-navigation ul ul li.current_page_ancestor > a,
                
				.woocommerce .woocommerce-breadcrumb a,
				.woocommerce-page .woocommerce-breadcrumb a,
				.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
				.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
				.site-content .widget-title,
				.site-content .rpwe-block h3 a,
				blockquote,
				.required,
				.color-text,
                .citylogic-page-builders-use-theme-styles .testimonials .sow-slider-base ul.sow-slider-images .sow-slider-image-wrapper p'
            ),
            'declarations' => array(
                'color' => $sancolor
            )
        ) );
        
        Customizer_Library_Styles()->add( array(
            'selectors' => array(
            	'.citylogic-page-builders-use-theme-styles .sow-icon-fontawesome,
                .site-header.forced-solid .main-navigation .search-button .otb-fa-search,
				.site-header.forced-solid .main-navigation .search-button .otb-fa-search:hover'
            ),
            'declarations' => array(
                'color' => $sancolor .' !important'
            )
        ) );
        
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'.main-navigation.rollover-font-color .menu > ul > li > a:hover,
				.main-navigation.rollover-font-color ul.menu > li > a:hover,
				.site-header.transparent .site-container .main-navigation.rollover-font-color .menu > ul > li > a:hover,
				.site-header.transparent .site-container .main-navigation.rollover-font-color ul.menu > li > a:hover,
				.main-navigation.rollover-font-color .menu > ul > li.current-menu-item > a,
    			.main-navigation.rollover-font-color ul.menu > li.current-menu-item > a,
				.main-navigation.rollover-font-color .menu > ul > li.current_page_item > a,
    			.main-navigation.rollover-font-color ul.menu > li.current_page_item > a,
				.main-navigation.rollover-font-color .menu > ul > li.current-menu-parent > a,
    			.main-navigation.rollover-font-color ul.menu > li.current-menu-parent > a,
				.main-navigation.rollover-font-color .menu > ul > li.current_page_parent > a,
    			.main-navigation.rollover-font-color ul.menu > li.current_page_parent > a,
				.main-navigation.rollover-font-color .menu > ul > li.current-menu-ancestor > a,
    			.main-navigation.rollover-font-color ul.menu > li.current-menu-ancestor > a,
				.main-navigation.rollover-font-color .menu > ul > li.current_page_ancestor > a,
    			.main-navigation.rollover-font-color ul.menu > ul > li.current_page_ancestor > a,
    			.main-navigation.rollover-font-color button,
				.main-navigation.rollover-font-color .search-button a:hover,
				.site-header.transparent .site-container .main-navigation.rollover-font-color .search-button a:hover,
				.main-navigation.rollover-font-color .search-button a:hover .otb-fa-search,
				.site-header.transparent .site-container .main-navigation.rollover-font-color .search-button a:hover .otb-fa-search'
    		),
    		'declarations' => array(
    			'color' => $sancolor . ' !important'
			),
        		'media' => '(min-width: ' .$mobile_menu_breakpoint. 'px)'
    	) );
        
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'div.wpforms-container form.wpforms-form input[type="text"]:focus,
				div.wpforms-container form.wpforms-form input[type="email"]:focus,
				div.wpforms-container form.wpforms-form input[type="tel"]:focus,
				div.wpforms-container form.wpforms-form input[type="number"]:focus,
				div.wpforms-container form.wpforms-form input[type="url"]:focus,
				div.wpforms-container form.wpforms-form input[type="password"]:focus,
				div.wpforms-container form.wpforms-form input[type="search"]:focus,
				div.wpforms-container form.wpforms-form select:focus,
				div.wpforms-container form.wpforms-form textarea:focus,
				input[type="text"]:focus,
				input[type="email"]:focus,
				input[type="tel"]:focus,
				input[type="number"]:focus,
				input[type="url"]:focus,
				input[type="password"]:focus,
				input[type="search"]:focus,
				select:focus,
				textarea:focus,
				.site-content .rpwe-block li,
				.hentry,
				.paging-navigation,
				.widget-area .widget_search.focused *,
				.widget-area .widget_product_search.focused *,
				.widget-area .widget,
				.site-footer-widgets .widget_search.focused *,
				.site-footer-widgets .widget_product_search.focused *,
				.search-results article'
			),
			'declarations' => array(
				'border-color' => $sancolor
			)
		) );
        
        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
				'#back-to-top,
				#comments .form-submit #submit,
				.no-results-btn,
				button,
        		a.button,
        		.widget-area .widget a.button,
        		.citylogic-page-builders-use-theme-styles .widget_sow-button .ow-button-base a,
				input[type="button"],
				input[type="reset"],
				input[type="submit"],
        		hr,
        		ul.sections > li hr.divider,
        		.main-navigation li:hover .indicator,
        		.main-navigation li.current_page_item .indicator,
				.main-navigation li.current-menu-item .indicator,
				.main-navigation li.current-menu-parent .indicator,
        		.main-navigation li.current-menu-ancestor .indicator,
        		.main-navigation li.current_page_parent .indicator,
				.main-navigation .search-button:hover .indicator,
        		.site-header-right .header-menu-button,
        		.side-aligned-social-links .social-links li,
        		.site-footer-widgets .site-container .widgets-container .divider,
        		.widget-area .widget h2.widget-title:after,
				.site-footer-widgets .widgets-container .widget h2.widgettitle:after,
        		p.woocommerce-store-notice.demo_store,
				.woocommerce ul.products li.product a.add_to_cart_button,
				.woocommerce-page ul.products li.product a.add_to_cart_button,
				.woocommerce ul.products li.product a.button.product_type_simple,
				.woocommerce-page ul.products li.product a.button.product_type_simple,
				.woocommerce button.button:disabled,
				.woocommerce button.button:disabled[disabled],
				.woocommerce button.button:disabled:hover,
				.woocommerce button.button:disabled[disabled]:hover,
				.woocommerce button.button.alt:disabled,
				.woocommerce button.button.alt:disabled[disabled],
				.woocommerce button.button.alt:disabled,
				.woocommerce button.button.alt:disabled:hover,
				.woocommerce button.button.alt:disabled[disabled],
				.woocommerce button.button.alt:disabled[disabled]:hover,
				.woocommerce button.button,
				.woocommerce button.button.alt,
				.woocommerce button.button.alt.disabled,
				.woocommerce button.button.alt.disabled:hover,
				.woocommerce a.button.alt,
				.woocommerce-page button.button.alt,
				.woocommerce input.button.alt,
				.woocommerce-page #content input.button.alt,
				.woocommerce .cart-collaterals .shipping_calculator .button,
				.woocommerce-page .cart-collaterals .shipping_calculator .button,
				.woocommerce a.button,
				.woocommerce-page a.button,
				.woocommerce input.button,
				.woocommerce-page #content input.button,
				.woocommerce-page input.button,
				.woocommerce #review_form #respond .form-submit input,
				.woocommerce-page #review_form #respond .form-submit input,
				.wpcf7-submit,
				.site-footer-bottom-bar,
        		div.wpforms-container form.wpforms-form input[type=submit],
				div.wpforms-container form.wpforms-form button[type=submit],
				div.wpforms-container form.wpforms-form .wpforms-page-button,
        		.citylogic-page-builders-use-theme-styles .testimonials .sow-slider-base .sow-slide-nav,
        		.main-navigation.rollover-background-color a:hover,
				.main-navigation.rollover-background-color li.current-menu-item > a,
				.main-navigation.rollover-background-color li.current_page_item > a,
				.main-navigation.rollover-background-color li.current-menu-parent > a,
				.main-navigation.rollover-background-color li.current_page_parent > a,
				.main-navigation.rollover-background-color li.current-menu-ancestor > a,
				.main-navigation.rollover-background-color li.current_page_ancestor > a,
				.main-navigation.rollover-background-color button'
			),
        	'declarations' => array(
        		'background-color' => $sancolor
        	)
		) );
        
        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
        		'.woocommerce .woocommerce-info,
				.woocommerce .woocommerce-message'
        	),
        	'declarations' => array(
        		'border-top-color' => $sancolor
        	)
        ) );

        // Mobile Menu Button Background Color
        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
        		'#main-menu'
        	),
        	'declarations' => array(
        		'background-color' => $sancolor
        	),
        	'media' => '(max-width: ' .$mobile_menu_breakpoint. 'px)'
        ) );

		Customizer_Library_Styles()->add( array(
        	'selectors' => array(
				'::-moz-selection'
			),
			'declarations' => array(
				'background-color' => $sancolor
			)
		) );

		Customizer_Library_Styles()->add( array(
        	'selectors' => array(
				'::selection'
			),
			'declarations' => array(
				'background-color' => $sancolor
			)
		) );
		
    }
    
    // Secondary Color
    $color = 'citylogic-secondary-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );

    if ( $colormod !== customizer_library_get_default( $color ) ) {

    	$sancolor = esc_html( $colormod );

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                '.widget_search .search-submit .otb-fa:hover,
                .widget_product_search .search-submit .otb-fa:hover,
                .widget_citylogic_social_media_links_widget .social-links li a:hover,
                .site-content .rpwe-block h3.rpwe-title a:hover,
				.woocommerce .woocommerce-breadcrumb a:hover,
				.woocommerce-page .woocommerce-breadcrumb a:hover,
				.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,
				.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
				.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,
				.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active'
            ),
            'declarations' => array(
                'color' => $sancolor
            )
        ) );
        
        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
        		'#back-to-top .hover,
				.main-navigation button:hover,
				#comments .form-submit #submit:hover,
				.no-results-btn:hover,
				button:hover,
        		a.button:hover,
        		.widget-area .widget a.button:hover,
				.citylogic-page-builders-use-theme-styles .widget_sow-button .ow-button-base a.ow-button-hover:hover,
				input[type="button"]:hover,
				input[type="reset"]:hover,
				input[type="submit"]:hover,
        		.side-aligned-social-links .social-links li:hover,
				.select2-container--default .select2-results__option--highlighted[aria-selected],
				.woocommerce input.button.alt:hover,
				.woocommerce-page #content input.button.alt:hover,
				.woocommerce .cart-collaterals .shipping_calculator .button,
				.woocommerce-page .cart-collaterals .shipping_calculator .button,
				.woocommerce a.button:hover,
				.woocommerce-page a.button:hover,
				.woocommerce input.button:hover,
				.woocommerce-page #content input.button:hover,
				.woocommerce-page input.button:hover,
				.woocommerce ul.products li.product a.add_to_cart_button:hover,
				.woocommerce-page ul.products li.product a.add_to_cart_button:hover,
				.woocommerce ul.products li.product a.button.product_type_simple:hover,
				.woocommerce-page ul.products li.product a.button.product_type_simple:hover,
        		.woocommerce button.button:hover,
				.woocommerce button.button.alt:hover,
				.woocommerce a.button.alt:hover,
				.woocommerce-page button.button.alt:hover,
				.woocommerce #review_form #respond .form-submit input:hover,
				.woocommerce-page #review_form #respond .form-submit input:hover,
				.wpcf7-submit:hover,
        		div.wpforms-container form.wpforms-form input[type=submit]:hover,
				div.wpforms-container form.wpforms-form button[type=submit]:hover,
				div.wpforms-container form.wpforms-form .wpforms-page-button:hover,
        		.citylogic-page-builders-use-theme-styles .testimonials .sow-slider-base .sow-slide-nav:hover'
        	),
        	'declarations' => array(
        		'background-color' => $sancolor
        	)
		) );
        
    }
    
    // Link Color
    $color = 'citylogic-link-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    if ( $colormod !== customizer_library_get_default( $color ) ) {
    	
        $sancolor = esc_html( $colormod );
        
        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
        		'a,
        		#cancel-comment-reply-link'
        	),
        	'declarations' => array(
        		'color' => $sancolor
        	)
        ) );
	
    }
    
    // Link Rollover Color
    $color = 'citylogic-link-rollover-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    if ( $colormod !== customizer_library_get_default( $color ) ) {
    	
        $sancolor = esc_html( $colormod );
        
        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
        		'a:hover,
        		#cancel-comment-reply-link:hover,
        		.widget-area .widget ul li a:hover,
        		.site-footer-widgets .widget ul li a:hover'
        	),
        	'declarations' => array(
        		'color' => $sancolor
        	)
        ) );
	
    }
    
    // Footer Color
    $color = 'citylogic-footer-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    if ( $colormod !== customizer_library_get_default( $color ) ) {
    
    	$sancolor = esc_html( $colormod );
    
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'.site-footer'
    		),
    		'declarations' => array(
    			'background-color' => $sancolor
    		)
    	) );
    
    }

    // Site Title Font
    $font = 'citylogic-site-title-font';
    $fontmod = get_theme_mod( $font, customizer_library_get_default( $font ) );
    $fontstack = customizer_library_get_font_stack( $fontmod );
    
    if ( $fontmod != customizer_library_get_default( $font ) ) {
    
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'.site-header .branding .title'
    		),
    		'declarations' => array(
    			'font-family' => $fontstack
    		)
    	) );
    
    }
    
    // Site Title Font Size
    $fontsize = 'citylogic-site-title-font-size';
    $fontsizemod = get_theme_mod( $fontsize, customizer_library_get_default( $fontsize ) );
    
    if ( $fontsizemod !== customizer_library_get_default( $fontsize ) ) {
    
    	$sanfontsize = intval( $fontsizemod );
    
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'.site-header .branding .title'
    		),
    		'declarations' => array(
    			'font-size' => $sanfontsize. 'px'
    		)
    	) );
    }

    // Site Title Font Color
    $color = 'citylogic-site-title-font-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    if ( $colormod !== customizer_library_get_default( $color ) ) {
    	
        $sancolor = esc_html( $colormod );
        $sancolor_rgb = customizer_library_hex_to_rgb( $sancolor );
    	
        Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-header .branding .title'
        	),
        	'declarations' => array(
        		'color' => $sancolor
			)
        ) );
        
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'.site-header.forced-solid .branding .title'
    		),
    		'declarations' => array(
    			'color' => $sancolor .' !important'
    		)
    	) );        
	
    }
    
    // Heading Font
    $font = 'citylogic-heading-font';
    $fontmod = get_theme_mod( $font, customizer_library_get_default( $font ) );
    $fontstack = customizer_library_get_font_stack( $fontmod );
    
    if ( $fontmod != customizer_library_get_default( $font ) ) {
    
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'h1, h2, h3, h4, h5, h6,
				h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
    			.widget-area .widget h2,
				.site-footer-widgets ul li h2.widgettitle,
    			.header-image .overlay .opacity h1,
    			.header-image .overlay .opacity h2,
    			.slider-container.default .slider .slide .overlay-container .overlay .opacity h1,
				.slider-container.default .slider .slide .overlay-container .overlay .opacity h2,
				.woocommerce a.button,
				.woocommerce-page a.button,
				.woocommerce a.button.alt,
				.woocommerce table.cart th,
				.woocommerce-page #content table.cart th,
				.woocommerce-page table.cart th,
				.woocommerce input.button.alt,
				.woocommerce-page #content input.button.alt,
				.woocommerce table.cart input,
				.woocommerce-page #content table.cart input,
				.woocommerce-page table.cart input,
				.woocommerce #respond input#submit,
				.woocommerce a.button,
				.woocommerce button.button,
				.woocommerce input.button,
				button,
				a.button,
				.widget-area .widget a.button,
				.widget_sow-button .ow-button-base a,
    			input[type="button"],
				input[type="reset"],
				input[type="submit"]'
    		),
    		'declarations' => array(
    			'font-family' => $fontstack
    		)
    	) );
    
    }
    
    // Heading Font Color
    $fontcolor = 'citylogic-heading-font-color';
    $fontcolormod = get_theme_mod( $fontcolor, customizer_library_get_default( $fontcolor ) );
    
    if ( $fontcolormod !== customizer_library_get_default( $fontcolor ) ) {
    
    	$sanfontcolor = esc_html( $fontcolormod );
    
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'h1, h2, h3, h4, h5, h6,
				h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
    			.widget-area .widget h2,
				.site-footer-widgets .widgettitle'
    		),
    		'declarations' => array(
    			'color' => $sanfontcolor
    		)
    	) );
    	 
    }

    // Body Font
    $font = 'citylogic-body-font';
    $fontmod = get_theme_mod( $font, customizer_library_get_default( $font ) );
    $fontstack = customizer_library_get_font_stack( $fontmod );

    if ( $fontmod != customizer_library_get_default( $font ) ) {

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
	            'body,
	            input,
				select,
	            textarea,
				.site-header .site-top-bar a,
				.site-header .site-header-right a,
	            .site-header .site-header-right .main-navigation ul ul a,
	            .main-navigation ul ul a,
	            .widget-area .rpwe-block h3.rpwe-title a,
				.breadcrumbs,
	            #cancel-comment-reply-link,
				.site-footer-widgets .widget a,
	            .header-image .overlay .opacity,
	            .slider-container.default .slider .slide .overlay-container .overlay .opacity,
	            .woocommerce .woocommerce-ordering select,
				.woocommerce-page .woocommerce-ordering select'
			),
            'declarations' => array(
                'font-family' => $fontstack
            )
        ) );

    }
    
    // Body Font Color
    $fontcolor = 'citylogic-body-font-color';
    $fontcolormod = get_theme_mod( $fontcolor, customizer_library_get_default( $fontcolor ) );
    
    if ( $fontcolormod !== customizer_library_get_default( $fontcolor ) ) {

        $sanfontcolor = esc_html( $fontcolormod );
        $sanfontcolor_rgb = customizer_library_hex_to_rgb( $sanfontcolor );

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                'body,
	            .widget_citylogic_social_media_links_widget .social-links li a,
				.breadcrumbs,
                .main-navigation ul ul a,
				.main-navigation.transparent ul ul a,
				.site-header .site-container .main-navigation ul ul a,
                .widget-area .widget ul li a,
                .widget-area .rpwe_widget .rpwe-block h3 a,
                .site-footer-widgets .widget ul li a,
				.woocommerce .woocommerce-breadcrumb,
				.woocommerce-page .woocommerce-breadcrumb,
                .woocommerce ul.products li.product .price,
				.woocommerce #content ul.products li.product span.price,
				.woocommerce-page #content ul.products li.product span.price,
				.woocommerce #content div.product p.price,
				.woocommerce-page #content div.product p.price,
				.woocommerce-page div.product p.price,
				.woocommerce #content div.product span.price,
				.woocommerce div.product span.price,
				.woocommerce-page #content div.product span.price,
				.woocommerce-page div.product span.price,
				.woocommerce div.product .woocommerce-tabs ul.tabs li a,
                .woocommerce #reviews #comments ol.commentlist li .meta,
				#add_payment_method #payment div.payment_box,
				.woocommerce-checkout #payment div.payment_box'
            ),
            'declarations' => array(
                'color' => $sanfontcolor
            )
        ) );
        
        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
        		'.rpwe-time,
        		.select2-default'
        	),
        	'declarations' => array(
        		'color' => 'rgba(' .$sanfontcolor_rgb['r']. ',' .$sanfontcolor_rgb['g']. ',' .$sanfontcolor_rgb['b']. ', 0.7) !important'
        	)
        ) );
         
        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
        		'::-webkit-input-placeholder'
        	),
        	'declarations' => array(
        		'color' => 'rgba(' .$sanfontcolor_rgb['r']. ',' .$sanfontcolor_rgb['g']. ',' .$sanfontcolor_rgb['b']. ', 0.7)'
        	)
        ) );
        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
        		':-moz-placeholder'
        	),
        	'declarations' => array(
        		'color' => 'rgba(' .$sanfontcolor_rgb['r']. ',' .$sanfontcolor_rgb['g']. ',' .$sanfontcolor_rgb['b']. ', 0.7)'
        	)
        ) );
        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
        		'::-moz-placeholder'
        	),
        	'declarations' => array(
        		'color' => 'rgba(' .$sanfontcolor_rgb['r']. ',' .$sanfontcolor_rgb['g']. ',' .$sanfontcolor_rgb['b']. ', 0.7)'
        	)
        ) );
        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
        		':-ms-input-placeholder'
        	),
        	'declarations' => array(
        		'color' => 'rgba(' .$sanfontcolor_rgb['r']. ',' .$sanfontcolor_rgb['g']. ',' .$sanfontcolor_rgb['b']. ', 0.7)'
        	)
        ) );        
    }
    
	// Form Input Font Color
    $fontcolor = 'citylogic-form-input-font-color';
    $fontcolormod = get_theme_mod( $fontcolor, customizer_library_get_default( $fontcolor ) );
    
    if ( $fontcolormod !== customizer_library_get_default( $fontcolor ) ) {

        $sanfontcolor = esc_html( $fontcolormod );

        Customizer_Library_Styles()->add( array(
        	'selectors' => array(
        		'div.wpforms-container form.wpforms-form input[type="text"],
				div.wpforms-container form.wpforms-form input[type="email"],
				div.wpforms-container form.wpforms-form input[type="tel"],
                div.wpforms-container form.wpforms-form input[type="number"],
				div.wpforms-container form.wpforms-form input[type="url"],
				div.wpforms-container form.wpforms-form input[type="password"],
				div.wpforms-container form.wpforms-form input[type="search"],
				div.wpforms-container form.wpforms-form select,
				div.wpforms-container form.wpforms-form textarea,
				input[type="text"],
				input[type="email"],
				input[type="tel"],
                input[type="number"],
				input[type="url"],
				input[type="password"],
				input[type="search"],
                select,
				textarea,
				.search-block .search-field,
				.select2-drop,
				.select2-container .select2-choice,
        		.select2-container--default .select2-selection--single .select2-selection__rendered,
        		.select2-container--default .select2-results__option,
        		.woocommerce .woocommerce-ordering select,
				.woocommerce-page .woocommerce-ordering select,
				.woocommerce #content .quantity input.qty,
				.woocommerce .quantity input.qty,
				.woocommerce-page #content .quantity input.qty,
        		.woocommerce-page .quantity input.qty'
        	),
        	'declarations' => array(
        		'color' => $sanfontcolor
        	)
        ) );
	
    }
    
    // Site Logo Area Solid Font Color
    $color = 'citylogic-header-solid-font-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    if ( $colormod !== customizer_library_get_default( $color ) ) {
    
    	$sancolor = esc_html( $colormod );
    
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'.site-header .branding .description,
    			.site-header .site-header-right,
    			.site-header .site-header-right a'
    		),
    		'declarations' => array(
    			'color' => $sancolor
    		)
    	) );
    	
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'.site-header.forced-solid .branding .description,
				.site-header.forced-solid .site-header-right,
				.site-header.forced-solid .site-header-right a:not(:hover)'
    		),
    		'declarations' => array(
    			'color' => $sancolor .' !important'
    		)
    	) );
    
    }

    
    // Site Logo Area Transparent Font Color
    $color = 'citylogic-header-transparent-font-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    if ( $colormod !== customizer_library_get_default( $color ) ) {
    
    	$sancolor = esc_html( $colormod );
    
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'.site-header.transparent .branding .description,
    			.site-header.transparent .site-header-right,
    			.site-header.transparent .site-header-right a'
    		),
    		'declarations' => array(
    			'color' => $sancolor
    		)
    	) );
    
    }
    
    // Navigation Menu Font
    $font = 'citylogic-navigation-menu-font';
    $fontmod = get_theme_mod( $font, customizer_library_get_default( $font ) );
    $fontstack = customizer_library_get_font_stack( $fontmod );

    if ( $fontmod != customizer_library_get_default( $font ) ) {

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
				'.site-header .site-header-right .main-navigation .menu > ul > li > a,
				.site-header .site-header-right .main-navigation ul.menu > li > a,
				.main-navigation .menu > ul > li > a,
				.main-navigation ul.menu > li > a,
            	.main-navigation .search-button a'
			),
            'declarations' => array(
                'font-family' => $fontstack
            )
        ) );

    }    
    
    // Navigation Menu Solid Font Color
    $color = 'citylogic-navigation-menu-solid-font-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    if ( $colormod !== customizer_library_get_default( $color ) ) {
    
    	$sancolor = esc_html( $colormod );
    
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'.main-navigation .menu > ul > li > a,
				.main-navigation .menu > ul > li > a:hover,
				.main-navigation ul.menu > li > a,
				.main-navigation ul.menu > li > a:hover,
    			.main-navigation .search-button a,
				.main-navigation .search-button a:hover,
    			.header-menu-button .otb-fa.otb-fa-bars'
    		),
    		'declarations' => array(
    			'color' => $sancolor
    		)
    	) );
    	
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'.site-header.forced-solid .main-navigation .menu > ul > li > a,
				.site-header.forced-solid .main-navigation .menu > ul > li > a:hover,
				.site-header.forced-solid .main-navigation ul.menu > li > a,
				.site-header.forced-solid .main-navigation ul.menu > li > a:hover,
				.site-header.forced-solid .main-navigation .search-button a,
				.site-header.forced-solid .main-navigation .search-button a:hover'
    		),
    		'declarations' => array(
    			'color' => $sancolor .' !important'
    		)
    	) );    	
    
    }

    // Navigation Menu Transparent Font Color
    $color = 'citylogic-navigation-menu-transparent-font-color';
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    if ( $colormod !== customizer_library_get_default( $color ) ) {
    
    	$sancolor = esc_html( $colormod );
    
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'.main-navigation.transparent .menu > ul > li > a,
				.main-navigation.transparent .menu > ul > li > a:hover,
				.main-navigation.transparent ul.menu > li > a,
				.main-navigation.transparent ul.menu > li > a:hover,
				.site-header.transparent .site-container .main-navigation .menu > ul > li > a,
				.site-header.transparent .site-container .main-navigation .menu > ul > li > a:hover,
				.site-header.transparent .site-container .main-navigation ul.menu > li > a,
				.site-header.transparent .site-container .main-navigation ul.menu > li > a:hover,
				.main-navigation .search-button a,
				.main-navigation .search-button a:hover,
				.site-header.transparent .site-container .main-navigation .search-button a,
				.site-header.transparent .site-container .main-navigation .search-button a:hover,
				.main-navigation.transparent .search-button .otb-fa-search,
				.main-navigation.transparent .search-button .otb-fa-search:hover,
				.site-header.transparent .site-container .main-navigation .search-button .otb-fa-search,
				.site-header.transparent .site-container .main-navigation .search-button .otb-fa-search:hover'
    		),
    		'declarations' => array(
    			'color' => $sancolor
    		)
    	) );
    
    }

    
    // Slider opacity overlay background color and opacity
	$opacity = 'citylogic-slider-overlay-opacity';
	$opacitymod = get_theme_mod( $opacity, customizer_library_get_default( $opacity ) );
	
    if ( $opacitymod !== customizer_library_get_default( $opacity ) ) {
    	    
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'slider-container.default .slider .slide .opacity'
    		),
    		'declarations' => array(
    			'background-color' => 'rgba(0, 0, 0, '. floatval( $opacitymod ) .')'
    		)
    	) );
    
    }    

    
    // Header Image opacity overlay background color and opacity
	$opacity = 'citylogic-header-image-overlay-opacity';
	$opacitymod = get_theme_mod( $opacity, customizer_library_get_default( $opacity ) );
	
    if ( $opacitymod !== customizer_library_get_default( $opacity ) ) {
    
    	Customizer_Library_Styles()->add( array(
    		'selectors' => array(
    			'.header-image .opacity'
    		),
    		'declarations' => array(
    			'background-color' => 'rgba(0, 0, 0, '. floatval( $opacitymod ) .')'
    		)
    	) );
    
    }
    
}
endif;

add_action( 'customizer_library_styles', 'citylogic_customizer_library_build_styles' );

if ( ! function_exists( 'citylogic_customizer_library_styles' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function citylogic_customizer_library_styles() {

	do_action( 'customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"out-the-box-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}
}
endif;

add_action( 'wp_head', 'citylogic_customizer_library_styles', 11 );