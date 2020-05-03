<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package cherry-blog
 */

get_header();
?>
    <div class="sy-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">

                            <section class="error-404 not-found">
                                <header class="page-header">
                                    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cherry-blog' ); ?></h1>
                                </header><!-- .page-header -->

                                <div class="page-content">
                                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'cherry-blog' ); ?></p>

                                    <?php
                                        get_search_form();
                                    ?>
                                </div><!-- .page-content -->
                            </section><!-- .error-404 -->

                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
