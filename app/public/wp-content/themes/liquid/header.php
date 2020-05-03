<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="start" href="<?php echo esc_url( home_url() ); ?>" title="<?php esc_html_e( 'TOP', 'liquid' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper" id="top">
<?php if(! dynamic_sidebar('liquid_headline')): ?>
<!-- no widget -->
<?php endif; ?>

<div class="headline">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                <a href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?>" class="logo">
                    <?php echo bloginfo('name'); ?>
                </a>
            </div>
            <div class="col-sm-6">
                <div class="logo_text">
                    <?php if ( !is_front_page() ){ ?>
                    <div class="subttl">
                        <?php bloginfo('description'); ?>
                    </div>
                    <?php } else { ?>
                    <h1 class="subttl">
                        <?php bloginfo('description'); ?>
                    </h1>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-light navbar-expand-md">
    <div class="container">
        <!-- Global Menu -->
        <?php if ( has_nav_menu( 'global-menu' ) ): ?>
        <?php wp_nav_menu(array(
            'theme_location'  => 'global-menu',
            'menu_class'      => 'nav navbar-nav',
            'container'       => false,
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
        )); ?>
        <?php endif; ?>
        <button type="button" class="navbar-toggler collapsed">
            <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'liquid' ); ?></span>
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
    </div>
</nav>

<?php if( get_header_image() && is_home() ): ?>
<img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" class="header_image">
<?php endif; ?>