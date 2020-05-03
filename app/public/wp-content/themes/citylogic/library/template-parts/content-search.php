<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package CityLogic
 */

$post_classes = array();

$post_classes[] = 'blog-post-side-layout';

if ( has_post_thumbnail() ) {
	$post_classes[] = 'left-aligned';
} else {
	$post_classes[] = 'no-featured-image';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( implode( ' ', $post_classes ) ); ?>>
    
    <?php
	if ( has_post_thumbnail() ) {
		get_template_part( 'library/template-parts/featured-image' );
	}
    ?>	
    
    <div class="post-loop-content">
    
    	<header class="entry-header">
    		<?php
    		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			?>

    		<?php if ( 'post' == get_post_type() ) : ?>
    		<div class="entry-meta">
    			<?php citylogic_posted_on(); ?>
    		</div><!-- .entry-meta -->
    		<?php endif; ?>
    	</header><!-- .entry-header -->

    	<div class="entry-content">
    		<?php
				if ( get_theme_mod( 'citylogic-blog-archive-layout', 'citylogic-blog-archive-layout-full' ) == 'citylogic-blog-archive-layout-full' ) :
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'citylogic' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
				else :
	    			/* translators: %s: Name of current post */
	                the_excerpt();
				endif;
    		?>

    		<?php
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . __( 'Pages:', 'citylogic' ),
    				'after'  => '</div>',
    			) );
    		?>
    	</div><!-- .entry-content -->

    	<footer class="entry-footer">
    		<?php citylogic_entry_footer(); ?>
    	</footer><!-- .entry-footer -->
    
    </div>
    
    <div class="clearboth"></div>
</article><!-- #post-## -->
