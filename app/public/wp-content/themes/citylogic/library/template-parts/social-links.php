<ul class="social-links">
<?php
if( get_theme_mod( 'citylogic-social-email', customizer_library_get_default( 'citylogic-social-email' ) ) != '' ) :
    echo '<li><a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'citylogic-social-email' ), 1 ) ) . '" title="';
	echo __( 'Send us an email', 'citylogic' );
	echo '" class="social-email"><i class="otb-fa otb-fa-envelope-o"></i></a></li>';
endif;

if( get_theme_mod( 'citylogic-social-skype', customizer_library_get_default( 'citylogic-social-skype' ) ) != '' ) :
    echo '<li><a href="skype:' . esc_html( get_theme_mod( 'citylogic-social-skype' ) ) . '?userinfo" title="';
	echo __( 'Contact us on Skype', 'citylogic' );
	echo '" class="social-skype"><i class="otb-fa otb-fa-skype"></i></a></li>';
endif;

if( get_theme_mod( 'citylogic-social-tumblr', customizer_library_get_default( 'citylogic-social-tumblr' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'citylogic-social-tumblr' ) ) . '" target="_blank" title="';
	echo __( 'Find us on Tumblr', 'citylogic' );
	echo '" class="social-tumblr"><i class="otb-fa otb-fa-tumblr"></i></a></li>';
endif;

if( get_theme_mod( 'citylogic-social-flickr', customizer_library_get_default( 'citylogic-social-flickr' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'citylogic-social-flickr' ) ) . '" target="_blank" title="';
	echo __( 'Find us on Flickr', 'citylogic' );
	echo '" class="social-flickr"><i class="otb-fa otb-fa-flickr"></i></a></li>';
endif;
?>
</ul>