/**
 * CityLogic Theme Custom Functionality
 *
 */
( function( $ ) {
	var solidify = false;
	
    $( document ).ready( function() {
    	var scrollbar_width = citylogic_get_scrollbar_width();
    	$('body:not(.mobile-device) .slider-container.default .slider .slide').css( 'width', 'calc(100vw - ' + scrollbar_width + 'px)' ).css( 'max-width', 'calc(100vw - ' + scrollbar_width + 'px)' );
    	
    	citylogic_image_has_loaded();
    	
    	$('.hiddenUntilLoadedImageContainer img, img.hideUntilLoaded').one("load", function() {
	    }).each(function() {
	    	if (this.complete) {
	    		$(this).load();
	    	}
	    });
    	
	    // Themify Product Filter
    	$( document ).on( 'wpf_ajax_success', function() {
    		citylogic_image_has_loaded();
    	} );
    	
        // Add button to sub-menu parent to show nested pages on the mobile menu
        $( '.main-navigation li.page_item_has_children, .main-navigation li.menu-item-has-children' ).prepend( '<span class="menu-dropdown-btn"><i class="otb-fa otb-fa-angle-right"></i></span>' );
        
        // Sub-menu toggle button
        $( '.main-navigation a[href="#"], .menu-dropdown-btn' ).bind( 'click', function(e) {
        	e.preventDefault();
            $(this).parent().toggleClass( 'open-page-item' );
            $(this).parent().find('.otb-fa:first').toggleClass('otb-fa-angle-right').toggleClass('otb-fa-angle-down');
        });
        
        var focused_mobile_menu_item;
        
        // Remove all hover classes from menu items when anything  on the page is clicked
        $( document ).bind( 'click', function(e) {
        	if ( e.target != focused_mobile_menu_item ) {
        		$( 'body.mobile-device .main-navigation li.menu-item-has-children' ).removeClass('hover');
        	}
        	
        	focused_mobile_menu_item = null;
        });

        // 
        $( 'body.mobile-device .main-navigation li.menu-item-has-children > a' ).bind( 'click', function(e) {
        	e.preventDefault();
        	menu_item = $(this).parent();

        	// If a menu item with a submenu is clicked that doesn't have a # for a URL show the submenu
        	if ( menu_item.find('a').attr('href') != '#' && !menu_item.hasClass('hover') ) {
        		focused_mobile_menu_item = e.target;        		
        		menu_item.addClass('hover');
        		
        	// If the submenu is already displaying then go to it's URL
        	} else if ( menu_item.hasClass('hover') ) {
        		window.location.href = menu_item.find('a').attr('href');
        	}
        });
        
        // Set the vertical position of the side-aligned social links - a third of the users screen height
        $('.side-aligned-social-links').css('top', function() {
        	return screen.height / 3;
        });
		
        citylogic_toggle_header_element_opacity();
    	citylogic_set_slider_height();
    	citylogic_pad_text_overlay_container();

    	// Wrap the SiteOrigin Layout Slider widget navigation controls in a container div for styling purposes
    	$('.sow-slide-nav.sow-slide-nav-next, .sow-slide-nav.sow-slide-nav-prev').wrapAll('<div class="otb-sow-slide-nav-wrapper"></div');

		// Add selected menu item indicators
    	$(".main-navigation.rollover-underline .menu > ul > li > a, .main-navigation.rollover-underline ul.menu > li > a").append("<div class='indicator'></div>");
    	
    	// Once the header image has loaded remove the loading class and set the height to auto 
        if ( $(".header-image img").length > 0 ) {
    	    var img = $('<img/>');
    	    img.attr("src", $(".header-image img").attr("src") ); 
    		
    	    img.on('load', function() {
    			initFittext();
    			initFitbutton();
    			citylogic_pad_text_overlay_container();
    	    	
    	    	$('.site-header').removeClass('forced-solid');
    	    	$('.header-image').removeClass('loading');
    	    	$('.header-image').css('height', 'auto');
    		});
        }
        
        // Mobile menu toggle button
        $( '.header-menu-button' ).click( function(e){
            $( 'body' ).toggleClass( 'show-main-menu' );
            $( '.main-navigation #main-menu' ).addClass( 'animate' );
        });
        $( '.main-menu-close' ).click( function(e){
            $( '.header-menu-button' ).click();
            $( '.main-navigation #main-menu' ).addClass( 'animate' );
        });
        
        $( '.main-navigation' ).on( 'transitionend webkittransitionend', function() {
        	$( '.main-navigation #main-menu' ).removeClass( 'animate' );
        });
    	
        // Show / Hide navigation search slidedown
        $(".search-button:not(.plugin)").click(function(e){
        	e.preventDefault();
        	
        	if ( !$(".search-slidedown").hasClass('open') ) {
	        	$(".search-slidedown").addClass('open');
	        	$(".search-slidedown").css('visibility', 'visible');
	        	$(".search-slidedown").animate( { opacity: 1 }, 150 );
	            $(".search-slidedown .search-field").focus();
        	} else {
	        	$(".search-slidedown").removeClass('open');
	        	$(".search-slidedown").animate( { opacity: 0 }, 150, function() {
	        		$(".search-slidedown").css('visibility', 'hidden');
	        	});
        	}
        });

        // Show border on focus of sidebar search widget - can't be achieved with CSS alone due to the required HTML structure
        $( '.widget-area .widget_search .search-field' ).on( 'focus', function() {
        	$( '.widget-area .widget_search' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.widget-area .widget_search' ).toggleClass('focused'); 
        });
        
        // Show border on focus of footer search widget - can't be achieved with CSS alone due to the required HTML structure
        $( '.site-footer-widgets .widget_search .search-field' ).on( 'focus', function() {
        	$( '.site-footer-widgets .widget_search' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.site-footer-widgets .widget_search' ).toggleClass('focused'); 
        });
        
        // Show border on focus of sidebar product search widget - can't be achieved with CSS alone due to the required HTML structure
        $( '.widget-area .widget_product_search .search-field' ).on( 'focus', function() {
        	$( '.widget-area .widget_product_search' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.widget-area .widget_product_search' ).toggleClass('focused'); 
        });

        // Show border on focus of footer product search widget - can't be achieved with CSS alone due to the required HTML structure
        $( '.site-footer-widgets .widget_product_search .search-field' ).on( 'focus', function() {
        	$( '.site-footer-widgets .widget_product_search' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.site-footer-widgets .widget_product_search' ).toggleClass('focused'); 
        });
        
        // Custom click functionality required because of replacing the search widget button with a link 
        $(".search-submit").bind('click', function(event) {
        	var form = $(this).parents("form");

            // Don't search if no keywords have been entered
        	if ( form.find(".search-field").val() == "") {
        		event.preventDefault();
        	} else {
        		form.submit();
        	}
        });
        	
    });
    
    $(window).resize(function () {
    	clearTimeout( window.resizedFinished );
    	
    	// Use setTimeout to stop the code from running before the window has finished resizing
    	window.resizedFinished = setTimeout(function() {
			
			initFittext();
			initFitbutton();
			citylogic_scale_slider_controls();
			citylogic_set_slider_controls_visibility();
	        citylogic_toggle_header_element_opacity();
	        citylogic_pad_text_overlay_container();
	    	citylogic_set_search_block_position();
			citylogic_constrain_text_overlay_opacity();
			
    	}, 0);
    }).resize();
    
    $(window).on('load', function() {
    	citylogic_home_slider();
    	citylogic_set_search_block_position();
    });
    
    $(window).scroll(function(e) {
		animateInitialPageScroll = false;
		
		var scrollTop = parseInt( $(window).scrollTop() ) + 28;
    });
    
    function citylogic_scale_slider_controls() {
    	// Slider control buttons
    	var sliderControlButtons = $('.slider-container.default .prev, .slider-container.default .next');
		var maxsliderControlButtonSize = 49;
		var minsliderControlButtonSize = 26;

		// Slider control arrows
    	var sliderControlArrows  = $('.slider-container.default .prev .otb-fa, .slider-container.default .next .otb-fa');
		var maxsliderControlArrowSize;
		var sliderControlArrowLineHeight;
    	
		var maxsliderControlArrowSize = 75;
		var minsliderControlArrowSize = 40;
		var maxsliderControlArrowLineHeight = 75;
		var minsliderControlArrowLineHeight = 40;
		var compressor = 1;
		
		var sliderTextOverlay = $('.slider-container.default .slider .slide .overlay-container .overlay');
		
		var sliderControlButtonHeight = Math.max(Math.min( sliderTextOverlay.width() / (compressor*10), maxsliderControlButtonSize), minsliderControlButtonSize);
		
		sliderControlButtons.css({
			'height': sliderControlButtonHeight,
			'width': sliderControlButtonHeight
		});
		
		sliderControlArrowLineHeight = sliderControlButtonHeight * (94 / 100);
		
		sliderControlArrows.css({
			'font-size': Math.max(Math.min( sliderTextOverlay.width() / (compressor*10), maxsliderControlArrowSize), minsliderControlArrowSize),
			'line-height': sliderControlArrowLineHeight + 'px'
		});
	}
    
    function citylogic_constrain_text_overlay_opacity() {
    	var sliderTextOverlay = $('.slider-container.default .slider .slide .overlay-container .overlay');
		var sliderTextOverlayOpacity = $('.slider-container.default .slider .slide .overlay-container .overlay .opacity');
		var headerImageTextOverlay = $('.header-image .overlay-container .overlay');
		var headerImageTextOverlayOpacity = $('.header-image .overlay-container .overlay .opacity');
		
		if ( !$('.slider-container.default').hasClass('loading') && sliderTextOverlayOpacity.length > 0 && sliderTextOverlayOpacity.outerHeight() >= sliderTextOverlay.height() ) {
			sliderTextOverlayOpacity.addClass('constrained');
		} else {
			sliderTextOverlayOpacity.removeClass('constrained');
		}
		
		if ( !$('.header-image.default').hasClass('loading') && headerImageTextOverlayOpacity.length > 0 && headerImageTextOverlayOpacity.outerHeight() >= headerImageTextOverlay.height() ) {
			headerImageTextOverlayOpacity.addClass('constrained');
		} else {
			headerImageTextOverlayOpacity.removeClass('constrained');
		}
    }
    
    function citylogic_set_slider_controls_visibility() {
    	var sliderContainer = $('.slider-container.default'); 
		var controlsContainer = $( '.slider-container.default .controls-container' );
		var textOverlayOpacity = $( '.slider-container.default .slider .slide .overlay-container .overlay .opacity' );

		if ( !sliderContainer.hasClass('loading') && controlsContainer.length > 0 && textOverlayOpacity.length > 0 && textOverlayOpacity.css('display') != 'none' ) {
			var prevButton = $( '.slider-container.default .controls-container .controls .prev' );
			var nextButton = $( '.slider-container.default .controls-container .controls .next' );
			
			var prevButtonLeftOffset = 0;
			var nextButtonLeftOffset = 0;

			var textOverlayOpacityLeftOffset = textOverlayOpacity.offset().left - sliderContainer.offset().left;
			var textOverlayOpacityRightOffset = controlsContainer.width() - ( textOverlayOpacityLeftOffset + textOverlayOpacity.outerWidth() );
			
			if ( prevButton.css('left').indexOf('px') > -1 ) {
				prevButtonLeftOffset = parseFloat( prevButton.css('left').replace('px', '') ); 
			} else if ( prevButton.css('left').indexOf('%') > -1 ) {
				prevButtonLeftOffset = ( parseFloat( prevButton.css('left').replace('%', '') ) * controlsContainer.width() ) / 100;
			}
	
			if ( nextButton.css('right').indexOf('px') > -1 ) {
				nextButtonLeftOffset = parseFloat( nextButton.css('left').replace('px', '') ); 
			} else if ( nextButton.css('right').indexOf('%') > -1 ) {
				nextButtonLeftOffset = ( parseFloat( nextButton.css('left').replace('%', '') ) * controlsContainer.width() ) / 100;
			}
			
			if (
				textOverlayOpacityLeftOffset - ( prevButtonLeftOffset + prevButton.outerWidth() ) <= 10 || 
				nextButtonLeftOffset - textOverlayOpacityRightOffset <= 10
			) {
				controlsContainer.css('display', 'none');
			} else {
				controlsContainer.css('display', 'block');
			}
    	}
    }
	
    // Initalise fittext
    function initFittext() {
        $('.slider-container.default .slider .slide .overlay-container .overlay .opacity h1, .slider-container.default .slider .slide .overlay-container .overlay .opacity h2').fitText(2, { minFontSize: '17px', maxFontSize: '40px' });
        $('.slider-container.default .slider .slide .overlay-container .overlay .opacity').fitText(2.5, { minFontSize: '13px', maxFontSize: '24px' });
        $('.header-image .overlay-container .overlay .opacity h1, .header-image .overlay-container .overlay .opacity h2').fitText(2, { minFontSize: '17px', maxFontSize: '40px' });
        $('.header-image .overlay-container .overlay .opacity').fitText(2.5, { minFontSize: '13px', maxFontSize: '24px' });
    }

    // Initalise fitbutton
    function initFitbutton() {
		$('.slider-container.default .slider .slide .overlay-container .overlay .opacity').fitButton(2.5, { minFontSize: '10px', maxFontSize: '15px', minHorizontalPadding: '10px', maxHorizontalPadding: '29px', minVerticalPadding: '12px', maxVerticalPadding: '20px' });
		$('.header-image .overlay-container .overlay .opacity').fitButton(2.5, { minFontSize: '10px', maxFontSize: '15px', minHorizontalPadding: '10px', maxHorizontalPadding: '29px', minVerticalPadding: '12px', maxVerticalPadding: '20px' });
    }
    
    function citylogic_set_search_block_position() {
    	if ( $('.search-button').length > 0 ) {
    		$('.search-slidedown .search-block').css('left', ( $('.search-button').position().left + parseInt( $('.search-button').css('padding-left').replace('px', '') ) ) - ( $('.search-slidedown .search-block').width() - $('.search-button').width() ) );
    	}
    }
    
    function citylogic_toggle_header_element_opacity() {
    	//
    	if ( !($('body').hasClass('mobile-device') && $('.site-header').hasClass('mobile-sticky-disabled')) ) {
    	
		    if ( citylogic_get_viewport().width <= parseInt( citylogic.solidify_breakpoint ) ) {
	    		if ( $('.site-header').hasClass('transparent') ) {
	    			$('.site-header').data('opacity', 'transparent');
	    			$('.site-header').removeClass('transparent');
	    		} else if ( $('.site-header').hasClass('translucent') ) {
	    			$('.site-header').data('opacity', 'translucent');
	    			$('.site-header').removeClass('translucent');
	    		}
	
	    		if ( $('.site-header').hasClass('floated') ) {
	    			$('.site-header').addClass('mustBeFloated').removeClass('floated');
	    		}
	    		if ( ( $('.site-header').data('opacity') == 'transparent' || $('.site-header').data('opacity') == 'translucent' ) && solidify ) {
	    			$('.site-header').addClass('fauxSolid');
	    		}
	    		
	    		if ( $('.main-navigation').hasClass('transparent') ) {
	    			$('.main-navigation').data('opacity', 'transparent');
	    			$('.main-navigation').removeClass('transparent');
	    		} else if ( $('.main-navigation').hasClass('translucent') ) {
	    			$('.main-navigation').data('opacity', 'translucent');
	    			$('.main-navigation').removeClass('translucent');
	    		}
	    		
	    		if ( $('.main-navigation').hasClass('floated') ) {
	    			$('.main-navigation').addClass('mustBeFloated').removeClass('floated');
	    		}
	    		if ( ( $('.main-navigation').data('opacity') == 'transparent' || $('.main-navigation').data('opacity') == 'translucent' ) && solidify ) {
	    			$('.main-navigation').addClass('fauxSolid');
	    		}
	    		
		    } else {
		    	if ( !$('.site-header').hasClass('fauxSolid') && !$('.site-header').hasClass('floated') ) {
		    		$('.site-header').addClass( $('.site-header').data('opacity' ) );
		    	}
		    	if ( $('.site-header').hasClass('mustBeFloated') ) {
		    		$('.site-header').addClass( 'floated' );
	        		$('.site-header').removeClass('fauxSolid mustBeFloated');
		    	}
		    	
		    	if ( !$('.main-navigation').hasClass('fauxSolid') && !$('.main-navigation').hasClass('floated') ) {
		    		$('.main-navigation').addClass( $('.main-navigation').data('opacity' ) );
		    	}
		    	if ( $('.main-navigation').hasClass('mustBeFloated') ) {
		    		$('.main-navigation').addClass( 'floated' );
	        		$('.main-navigation').removeClass('fauxSolid mustBeFloated');
		    	}
		    	
		    }
		    
    	}
	    
    }
    
    function citylogic_set_slider_height() {
        // Set the height of the slider to the height of the first slide's image
    	var firstSlide  = $(".slider-container.default .slider .slide:eq(0)");
    	var headerImage = $(".header-image img");
    	if ( firstSlide.length > 0 ) {
    		var firstSlideImage = firstSlide.find('img').first();
    		
    		if ( firstSlideImage.length > 0) {
    			
    			if ( firstSlideImage.attr('height') > 0 ) {
    				
    				// The height needs to be dynamically calculated with responsive in mind ie. the height of the image will obviously grow
    				var firstSlideImageWidth  = firstSlideImage.attr('width');
    				var firstSlideImageHeight = firstSlideImage.attr('height');
    				var sliderWidth = $('.slider-container').width();
    				var widthPercentage;
    				var widthRatio;
    				
    				widthRatio = sliderWidth / firstSlideImageWidth;
    				
    				$('.slider-container.loading').css('height', Math.round( widthRatio * firstSlideImageHeight ) + parseInt( $('.slider-container').css('paddingTop').replace('px', '') ) );
    			}
    		}
    	} else if ( headerImage.length > 0 ) {
    		
    		if ( headerImage.attr('height') > 0 ) {

				// The height needs to be dynamically calculated with responsive in mind ie. the height of the image will obviously grow
				var headerImageWidth  = headerImage.attr('width');
				var headerImageHeight = headerImage.attr('height');
				var headerImageContainerWidth = $('.header-image').width();
				var widthPercentage;
				var widthRatio;
				
				widthRatio = headerImageContainerWidth / headerImageWidth;
				
				$('.header-image.loading').css('height', Math.round( widthRatio * headerImageHeight ) + parseInt( $('.header-image').css('paddingTop').replace('px', '') ) );
    		}
    	}
    }
    
    function citylogic_pad_text_overlay_container() {
    	var textOverlayOffset;
    	var sliderControlsOffset = 0;
		var main_navigation_parent_item;
		
		if ( $('.main-navigation .menu > li').length > 0 ) {
			main_navigation_parent_item = $('.main-navigation .menu > li');
		} else {
			main_navigation_parent_item = $('.main-navigation .menu > ul > li');
		}

    	if ( $('.site-header').hasClass('translucent') || $('.site-header').hasClass('transparent') || $('.site-header').hasClass('floated') || $('.site-header').hasClass('mustBeFloated') ) {

    		textOverlayOffset = $('.site-header .site-logo-area').outerHeight(true);
    		sliderControlsOffset = $('.site-header .site-logo-area').outerHeight(true);
    		
    		// Only include the height of the navigation menu if it's positioned below the site logo container
    		// NB: THIS NEEDS TO BE RETHOUGHT BECAUSE IF THE LOGO COMES DOWN LOWER THAN THE NAV THE PADDING SHOULD BE BASED ON THE LOGO
    		// ALSO IN THE EVENT THAT THE NAVIGATION MENU IS POSITIONED BELOW THE SITE LOGO AND IS TRANSPARENT IT SHOULD NOT COUNT THE ENTIRE NAVGATION HEIGHT
    		//if ( $('.site-header.left-aligned .main-navigation.inline').length > 0 ) {
    		
    		// Reduce the offset if the rollover style of the navigation menu is an underline and the navigation menu is inline or transparent
    		if ( ( $('.site-header.transparent .main-navigation.inline').length > 0 || $('.main-navigation.transparent').length > 0 ) && $('.main-navigation.rollover-underline').length > 0 ) {
    			
    			if ( !$('.main-navigation').hasClass('inline') ) {
	    			textOverlayOffset = textOverlayOffset + parseInt( $('.main-navigation').height() );
	    			sliderControlsOffset = sliderControlsOffset + parseInt( $('.main-navigation').height() );
    			}
    			
    			textOverlayOffset = textOverlayOffset - main_navigation_parent_item.css('paddingBottom').replace('px', '');
    			sliderControlsOffset = sliderControlsOffset - main_navigation_parent_item.css('paddingBottom').replace('px', '');
    			
    			if ( $( '.main-navigation .menu .indicator' ).length > 0 ) {
    				textOverlayOffset -= ( parseInt( $( '.main-navigation .menu .indicator' ).css('marginBottom').replace('px', '') ) );
    				sliderControlsOffset += $( '.main-navigation .menu .indicator' ).height();
    			}
    			
    		} else {
    			textOverlayOffset += $('.main-navigation').outerHeight(true);
    			sliderControlsOffset += $('.main-navigation').outerHeight(true);
    		}
    		
    	} else if ( $('.main-navigation.translucent').length > 0 || $('.main-navigation.transparent').length > 0 ) {
    		textOverlayOffset = $('.main-navigation').outerHeight(true);
    		sliderControlsOffset = $('.main-navigation').outerHeight(true);
    		
    		// Reduce the offset if the rollover style of the navigation menu is an underline and the navigation menu is inline or transparent
    		if ( $('.main-navigation.transparent').length > 0 && $('.main-navigation.rollover-underline').length > 0 ) {
				textOverlayOffset = textOverlayOffset - main_navigation_parent_item.css('paddingBottom').replace('px', '');
				sliderControlsOffset = sliderControlsOffset - main_navigation_parent_item.css('paddingBottom').replace('px', '');
				
				if ( $( '.main-navigation .menu .indicator' ).length > 0 ) {
					textOverlayOffset -= ( parseInt( $( '.main-navigation .menu .indicator' ).css('marginBottom').replace('px', '') ) ) ;
					sliderControlsOffset += $( '.main-navigation .menu .indicator' ).height();
					
					textOverlayOffset -= ( parseInt( $( '.main-navigation .menu .indicator' ).css('marginBottom').replace('px', '') ) ) ;
					sliderControlsOffset += $( '.main-navigation .menu .indicator' ).height();
				}
			}
    		
    	}
    	
    	if ( textOverlayOffset ) {
			// If the default slider is being used and there's a text overlay then set the top padding 
			if ( $('.slider-container.default .slider .slide .overlay-container').length > 0 ) {
				$('.slider-container .slider .slide .overlay-container').css('paddingTop', textOverlayOffset);
				$('.slider-container .controls-container').css('marginTop', sliderControlsOffset);
				
			// If there's a header image text overlay then set the top padding
			} else if ( $('.header-image .overlay-container').length > 0 ) {
				// You need to include the height of the top bar as the overlay container has an absolute position and doesn't obey the padding set in citylogic_set_top_bar_offset
				$('.header-image .overlay-container').css('paddingTop', textOverlayOffset);
			}
    	}
	}
    
    function citylogic_get_viewport() {
        var e = window;
        var a = 'inner';
        
        if ( !('innerWidth' in window ) ) {
            a = 'client';
            e = document.documentElement || document.body;
        }
    	
        return {
        	width: e[ a + 'Width' ],
        	height: e[ a + 'Height' ]
        };
    }
    
    function citylogic_get_scrollbar_width() {

		// Creating invisible container
		const outer = document.createElement('div');
		outer.style.visibility = 'hidden';
		outer.style.overflow = 'scroll'; // forcing scrollbar to appear
		outer.style.msOverflowStyle = 'scrollbar'; // needed for WinJS apps
		document.body.appendChild(outer);
		
		// Creating inner element and placing it in the container
		const inner = document.createElement('div');
		outer.appendChild(inner);
		
		// Calculating difference between container's full width and the child width
		const scrollbarWidth = (outer.offsetWidth - inner.offsetWidth);
		
		// Removing temporary elements from the DOM
		outer.parentNode.removeChild(outer);
		
		return scrollbarWidth;
    }
    
    function citylogic_image_has_loaded() {
    	var container;

    	$('.hiddenUntilLoadedImageContainer img').on('load',function(){
	    	container = $(this).parents('.hiddenUntilLoadedImageContainer');
	    	container.removeClass('loading');
	    	
	    	(function(container){
	    	    setTimeout(function() {
	    	    	container.addClass('transition');
	    	    }, 50);
	    	})(container);
	    });
    	
	    $('img.hideUntilLoaded').on('load',function(){
	    	container = $(this).parents('.featured-image-container');
	    	container.removeClass('loading');
	    });
	}
    
    function citylogic_home_slider() {
    	if ( $('.slider').length ) {
    		
	        $(".slider").carouFredSel({
	            responsive: true,
	            circular: true,
	            infinite: false,
	            width: 1200,
	            height: 'variable',
	            items: {
	                visible: 1,
	                width: 1200,
	                height: 'variable'
	            },
	            onCreate: function(items) {
	    			initFittext();
	    			initFitbutton();
	    			
	    			citylogic_pad_text_overlay_container();
	            	
	            	$('.site-header').removeClass('forced-solid');
	            	$('.slider-container').css('height', 'auto');
	            	$('.slider-container').removeClass('loading');
	            	
	            	//setTimeout(function(){
	            		citylogic_set_slider_controls_visibility();
	            		citylogic_constrain_text_overlay_opacity();
	            	//}, 1000);            	
	            },
	            scroll: {
	            	fx: 'uncover-fade',
	                duration: cityLogicSliderTransitionSpeed
	            },
	            auto: false,
	            pagination: '.pagination',
	            prev: ".prev",
	            next: ".next",
	            swipe: {
	            	onTouch: true
	            }
	        });

		}
    }
    
} )( jQuery );