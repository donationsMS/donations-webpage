<?php
/**
 * Plugin recommendation
 *
 * @package cherry-blog
 */

// Load TGM library.
require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

if ( ! function_exists( 'cherry_blog_register_recommended_plugins' ) ) :

    /**
     * Register recommended plugins.
     */
    function cherry_blog_register_recommended_plugins() {
        $plugins = array(
            array(
                'name'     => esc_html__( 'One Click Demo Importer', 'cherry-blog' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),
        );

        $config = array();

        tgmpa( $plugins, $config );
    }

endif;

add_action( 'tgmpa_register', 'cherry_blog_register_recommended_plugins' );
