<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cherry-blog
 */

$cherry_blog_sidebar = get_theme_mod('cherry_blog_homepage_sidebar', 0);

get_header();
?>
<div class="sy-body">
    <div class="container-fluid">
        <div class="row">
            <?php if ($cherry_blog_sidebar) : ?>
            <div class="col-lg-9 col-md-12">
                <?php else : ?>
                <div class="col-12">
                    <?php endif; ?>
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <div class="row">
                                <?php
                                if (have_posts()) :

                                    if (is_home() && !is_front_page()) :
                                        ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?>
                                    </h1>
                                </header>
                                <?php
                                    endif;

                                    /* Start the Loop */
                                    while (have_posts()) :
                                        the_post();

                                        /*
                                         * Include the Post-Type-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                         */
                                        get_template_part('template-parts/card/content', get_post_type());

                                    endwhile;

                                else :

                                    get_template_part('template-parts/content', 'none');

                                endif;
                                ?>
                            </div>
                        </main><!-- #main -->
                        <div class="sy-pagination">
                            <?php
                            $big = 999999999; // need an unlikely integer
                            echo paginate_links([
                                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format' => '?paged=%#%',
                                'current' => max(1, get_query_var('paged')),
                                'total' => $wp_query->max_num_pages
                            ]);
                            ?>
                        </div>
                    </div><!-- #primary -->
                </div>
                <?php if ($cherry_blog_sidebar) : ?>
                <div class="col-lg-3 col-md-12">
                    <?php get_sidebar(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php
get_footer();
