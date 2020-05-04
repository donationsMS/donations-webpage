<?php
/**
 * Builds out customizer options
 *
 * @package       Customizer_Library
 * @author        Devin Price
 */

if ( ! function_exists( 'customizer_library_register' ) ) : /**
 * Configure settings and controls for the theme customizer
 *
 * @since  1.0.0.
 *
 * @param  object $wp_customize The global customizer object.
 *
 * @return void
 */ {
	function customizer_library_register( $wp_customize ) {

		$customizer_library = Customizer_Library::Instance();

		$options = $customizer_library->get_options();

		// Bail early if we don't have any options.
		if ( empty( $options ) ) {
			return;
		}

		// Add the sections
		if ( isset( $options['sections'] ) ) {
			customizer_library_add_sections( $options['sections'], $wp_customize );
		}

		// Add the sections
		if ( isset( $options['panels'] ) ) {
			customizer_library_add_panels( $options['panels'], $wp_customize );
		}

		// Sets the priority for each control added
		$loop = 0;

		// Loops through each of the options
		foreach ( $options as $option ) {

			// Set blank description if one isn't set
			if ( ! isset( $option['description'] ) ) {
				$option['description'] = '';
			}

			if ( isset( $option['type'] ) ) {

				$loop ++;

				// Apply a default sanitization if one isn't set
				if ( ! isset( $option['sanitize_callback'] ) ) {
					$option['sanitize_callback'] = customizer_library_get_sanitization( $option['type'] );
				}

				// Set blank active_callback if one isn't set
				if ( ! isset( $option['active_callback'] ) ) {
					$option['active_callback'] = '';
				}

				// Add the setting
				customizer_library_add_setting( $option, $wp_customize );

				// Priority for control
				if ( ! isset( $option['priority'] ) ) {
					$option['priority'] = $loop;
				}

				// Adds control based on control type
				switch ( $option['type'] ) {

					case 'text':
					case 'url':
					case 'select':
					case 'radio':
					case 'checkbox':
					case 'range':
					case 'dropdown-pages':

						$wp_customize->add_control(
							$option['id'], $option
						);

						break;

					case 'color':

						$wp_customize->add_control(
							new WP_Customize_Color_Control(
								$wp_customize, $option['id'], $option
							)
						);

						break;

					case 'image':

						$wp_customize->add_control(
							new WP_Customize_Image_Control(
								$wp_customize,
								$option['id'], array(
									'label'             => $option['label'],
									'section'           => $option['section'],
									'sanitize_callback' => $option['sanitize_callback'],
									'priority'          => $option['priority'],
									'active_callback'   => $option['active_callback'],
									'description'      => $option['description']
								)
							)
						);

						break;

					case 'upload':

						$wp_customize->add_control(
							new WP_Customize_Upload_Control(
								$wp_customize,
								$option['id'], array(
									'label'             => $option['label'],
									'section'           => $option['section'],
									'sanitize_callback' => $option['sanitize_callback'],
									'priority'          => $option['priority'],
									'active_callback'   => $option['active_callback'],
									'description'      => $option['description']
								)
							)
						);

						break;

					case 'textarea':

						// Custom control required before WordPress 4.0
						if ( version_compare( $GLOBALS['wp_version'], '3.9.2', '<=' ) ) :

							$wp_customize->add_control(
								new Customizer_Library_Textarea(
									$wp_customize, $option['id'], $option
								)
							);

						else :

							$wp_customize->add_control( 'setting_id', array(
								$wp_customize->add_control(
									$option['id'], $option
								)
							) );

						endif;

						break;

					case 'heading':
						
						$wp_customize->add_control(
							new Customizer_Library_Heading(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description']
								)
							)
						);
						
						break;
						
					case 'divider':
						
						$wp_customize->add_control(
							new Customizer_Library_Divider(
								$wp_customize,
								$option['id'], array(
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'class'            => $option['class']
								)
							)
						);
						
						break;

					case 'info':
						
						$wp_customize->add_control(
							new Customizer_Library_Info(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description']
								)
							)
						);
						
						break;
						
					case 'warning':
						
						$wp_customize->add_control(
							new Customizer_Library_Warning(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description']
								)
							)
						);
						
						break;
						
					case 'dropdown-categories':
						
						$wp_customize->add_control(
							new Customizer_Library_Dropdown_Categories(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description']
								)
							)
						);
						
						break;
						
					case 'dropdown-pages-multi':
						
						$wp_customize->add_control(
							new Customizer_Library_Dropdown_Pages_Multi(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description']
								)
							)
						);
						
						break;						

					case 'dropdown-pages-posts':
						
						$wp_customize->add_control(
							new Customizer_Library_Dropdown_Pages_Posts(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description']
								)
							)
						);
						
						break;		

					case 'dropdown-logo-pages-posts':
						
						$wp_customize->add_control(
							new Customizer_Library_Dropdown_Logo_Pages_Posts(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description']
								)
							)
						);
						
						break;						
						
					case 'dropdown-menus':
						
						$wp_customize->add_control(
							new Customizer_Library_Dropdown_Menus(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description']
								)
							)
						);
						
						break;						

					case 'dropdown-post-types-multi':
						
						$wp_customize->add_control(
							new Customizer_Library_Dropdown_Post_Types_Multi(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description']
								)
							)
						);
						
						break;						
						
					case 'dropdown-image-size':
						
						$wp_customize->add_control(
							new Customizer_Library_Dropdown_Image_Sizes(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description'],
									'default'      	   => $option['default']
								)
							)
						);
						
						break;						
						
					case 'pixels':
						
						$wp_customize->add_control(
							new Customizer_Library_Pixels(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description']
								)
							)
						);
						
						break;						
						
					case 'percentage':
						
						$wp_customize->add_control(
							new Customizer_Library_Percentage(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description']
								)
							)
						);
						
						break;						

					case 'milliseconds':
						
						$wp_customize->add_control(
							new Customizer_Library_Milliseconds(
								$wp_customize,
								$option['id'], array(
									'label'            => $option['label'],
									'section'          => $option['section'],
									'priority'         => $option['priority'],
									'description'      => $option['description']
								)
							)
						);
						
						break;						
						
					case 'content':
					case 'line':

						// error_log( print_r( $option ) );

						$wp_customize->add_control(
							new Customizer_Library_Content(
								$wp_customize, $option['id'], $option
							)
						);

						break;

				}
			}
		}
	}
}

endif;

add_action( 'customize_register', 'customizer_library_register', 100 );

/**
 * Add the customizer sections
 *
 * @since  1.2.0.
 *
 * @param  array $option
 *
 * @return void
 */
function customizer_library_add_sections( $sections, $wp_customize ) {

	foreach ( $sections as $section ) {

		if ( ! isset( $section['description'] ) ) {
			$section['description'] = FALSE;
		}

		$wp_customize->add_section( $section['id'], $section );
	}

}

/**
 * Add the customizer panels
 *
 * @since  1.2.0.
 *
 * @param  array $option
 *
 * @return void
 */
function customizer_library_add_panels( $panels, $wp_customize ) {

	foreach ( $panels as $panel ) {

		if ( ! isset( $panel['description'] ) ) {
			$panel['description'] = FALSE;
		}

		$wp_customize->add_panel( $panel['id'], $panel );
	}

}


/**
 * Add the setting and proper sanitization
 *
 * @since  1.2.0.
 *
 * @param  array $option
 *
 * @return void
 */
function customizer_library_add_setting( $option, $wp_customize ) {

	$settings_default = array(
		'default'              => NULL,
		'option_type'          => 'theme_mod',
		'capability'           => 'edit_theme_options',
		'theme_supports'       => NULL,
		'transport'            => NULL,
		'sanitize_callback'    => 'wp_kses_post',
		'sanitize_js_callback' => NULL
	);

	// Settings defaults
	$settings = array_merge( $settings_default, $option );

	// Arguments for $wp_customize->add_setting
	$wp_customize->add_setting( $option['id'], array(
			'default'              => $settings['default'],
			'type'                 => $settings['option_type'],
			'capability'           => $settings['capability'],
			'theme_supports'       => $settings['theme_supports'],
			'transport'            => $settings['transport'],
			'sanitize_callback'    => $settings['sanitize_callback'],
			'sanitize_js_callback' => $settings['sanitize_js_callback']
		)
	);

}

/**
 * Get default sanitization function for option type
 *
 * @since  1.2.0.
 *
 * @param  array $option
 *
 * @return void
 */
function customizer_library_get_sanitization( $type ) {

	if ( 'select' == $type || 'radio' == $type ) {
		return 'customizer_library_sanitize_choices';
	}

	if ( 'checkbox' == $type ) {
		return 'customizer_library_sanitize_checkbox';
	}

	if ( 'color' == $type ) {
		return 'sanitize_hex_color';
	}

	if ( 'upload' == $type || 'image' == $type ) {
		return 'customizer_library_sanitize_file_url';
	}

	if ( 'text' == $type || 'textarea' == $type ) {
		return 'customizer_library_sanitize_text';
	}

	if ( 'url' == $type ) {
		return 'esc_url';
	}

	if ( 'range' == $type ) {
		return 'customizer_library_sanitize_range';
	}

	if ( 'dropdown-pages' == $type ) {
		return 'absint';
	}

	// If a custom option is being used, return false
	return FALSE;
}
