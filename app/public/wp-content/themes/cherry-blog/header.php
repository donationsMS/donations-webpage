<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cherry-blog
 */
$cherry_blog_searchbox = get_theme_mod('cherry_blog_search_checkbox', 0);
$cherry_blog_social_link = get_theme_mod('cherry_blog_social_link_checkbox', 0);
$cherry_blog_facebook_link = get_theme_mod('cherry_blog_facebook_link', '');
$cherry_blog_twitter_link = get_theme_mod('cherry_blog_twitter_link', '');
$cherry_blog_instagram_link = get_theme_mod('cherry_blog_instagram_link', '');
$cherry_blog_youtube_link = get_theme_mod('cherry_blog_youtube_link', '');
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body id="sy-body" <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'cherry-blog'); ?></a>

        <?php require get_template_directory() . '/search-toggle.php'; ?>

        <header id="masthead" class="site-header sy-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-7">
                        <div class="d-flex align-items-center">
                            <div class="site-logo">
                                <?php the_custom_logo(); ?>
                            </div>
                            <div class="site-branding">
                                <?php if (is_front_page() && is_home()) :?>
                                <h1 class="site-title m-0"><a
                                        href="<?php echo esc_url(home_url('/')); ?>"
                                        rel="home"><?php bloginfo('name'); ?></a>
                                </h1>
                                <?php
                                else :
                                    ?>
                                <h1 class="site-title m-0"><a
                                        href="<?php echo esc_url(home_url('/')); ?>"
                                        rel="home"><?php bloginfo('name'); ?></a>
                                </h1>
                                <?php
                                endif;
                                $cherry_blog_description = get_bloginfo('description', 'display');
                                if ($cherry_blog_description || is_customize_preview()) :
                                    ?>
                                <p class="site-description m-0"><?php echo $cherry_blog_description; /* WPCS: xss ok. */ ?>
                                </p>
                                <?php endif; ?>
                            </div><!-- .site-branding -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-1">
                        <div class="d-flex align-items-center justify-content-lg-between">
                            <div id="main-nav" class="nnc-nav">
                                <nav id="site-navigation" class="main-navigation">
                                    <div id="close-menu" class="sy-close-menu d-lg-none mb-4 l-h-0" title="close">
                                        <svg class="sy-icon sy-icon--md">
                                            <use xlink:href="#sy-icon-close"></use>
                                        </svg>
                                    </div>
                                <?php
                                    wp_nav_menu([
                                        'theme_location' => 'menu-1',
                                        'menu_id' => 'primary-menu',
                                    ]);
                                ?>
                                </nav><!-- #site-navigation -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-4">
                        <div class="d-flex justify-content-end">
                            <div class="d-none d-lg-block d-md-block">
                                <div class="d-flex align-items-center h-100">
                                    <?php if ($cherry_blog_social_link) : ?>
                                        <div class="sy-header__social d-flex l-h-0">
                                            <?php if ($cherry_blog_facebook_link) : ?>
                                                <a href="<?php echo esc_url($cherry_blog_facebook_link); ?>"
                                                   target="_blank">
                                                    <svg class="sy-icon sy-icon--md">
                                                        <use xlink:href="#sy-icon-fb"></use>
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                            <?php if ($cherry_blog_twitter_link) : ?>
                                                <a href="<?php echo esc_url($cherry_blog_twitter_link); ?>"
                                                   target="_blank">
                                                    <svg class="sy-icon sy-icon--md">
                                                        <use xlink:href="#sy-icon-tweet"></use>
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                            <?php if ($cherry_blog_instagram_link) : ?>
                                                <a href="<?php echo esc_url($cherry_blog_instagram_link); ?>"
                                                   target="_blank">
                                                    <svg class="sy-icon sy-icon--md">
                                                        <use xlink:href="#sy-icon-insta"></use>
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                            <?php if ($cherry_blog_youtube_link) : ?>
                                                <a href="<?php echo esc_url($cherry_blog_youtube_link); ?>"
                                                   target="_blank">
                                                    <svg class="sy-icon sy-icon--md">
                                                        <use xlink:href="#sy-icon-youtube"></use>
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <button id="mobile-menu" class="sy-mobile-menu d-lg-none d-block l-h-0">
                                <svg class="sy-icon sy-icon--primary sy-icon--lg">
                                    <use xlink:href="#sy-icon-menu"></use>
                                </svg>
                            </button>
                            <?php if ($cherry_blog_searchbox) : ?>
                                <button role="button" id="sy-search" title="Search" class="sy-header__search p-0 bg-none l-h-0">
                                    <svg class="sy-icon sy-icon--md cherry-blog-search-icon">
                                        <use xlink:href="#sy-icon-search"></use>
                                    </svg>
                                </button>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- #masthead -->

        <div id="content" class="site-content">