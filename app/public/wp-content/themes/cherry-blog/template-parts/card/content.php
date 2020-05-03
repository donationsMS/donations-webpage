<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cherry-blog
 */

$post_class = array('sy-card');
$excerpt_length = 22;
$cherry_blog_sidebar = get_theme_mod('cherry_blog_homepage_sidebar', 0);

?>
<?php if ($cherry_blog_sidebar) : ?>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
<?php else : ?>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 d-flex">
<?php endif; ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
        <div class="sy-card__img" title="<?php echo esc_attr(get_the_title()); ?>">
            <?php cherry_blog_post_thumbnail(); ?>
        </div>
        <div class="sy-card__content p-4">
            <header class="entry-header">
                <?php
                if ( is_singular() ) :
                    the_title( '<h1 class="entry-title">', '</h1>' );
                else :
                    the_title( '<h2 class="entry-title"><a class="transition" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;

                if ( 'post' === get_post_type() ) :
                    ?>
                    <div class="entry-meta mt-2">
                        <?php
                        cherry_blog_posted_by();
                        cherry_blog_posted_on();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-content mt-3">
                <p class="mb-0"><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), $excerpt_length, '' ) ); ?></p>
            </div><!-- .entry-content -->
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>
