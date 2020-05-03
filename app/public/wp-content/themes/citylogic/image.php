<?php
/**
 * The template for displaying image attachments
 *
 * @package CityLogic
 */

get_header(); ?>

    <?php if ( function_exists( 'bcn_display' ) ) : ?>
        <div class="breadcrumbs">
            <?php bcn_display(); ?>
        </div>
    <?php endif; ?>

	<div id="primary" class="content-area <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'library/template-parts/content', 'image' ); ?>

			<?php citylogic_post_nav(); ?>

			<?php
				// If comments are open load up the comment template
				if ( comments_open() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php
get_footer();