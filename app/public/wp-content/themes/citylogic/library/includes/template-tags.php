<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package CityLogic
 */

if ( ! function_exists( 'citylogic_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function citylogic_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<span class="screen-reader-text"><?php _e( 'Posts navigation', 'citylogic' ); ?></span>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts <span class="meta-nav">&rarr;</span>', 'citylogic' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Newer posts ', 'citylogic' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'citylogic_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function citylogic_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<span class="screen-reader-text"><?php _e( 'Post navigation', 'citylogic' ); ?></span>
		<div class="nav-links">
			<?php
			$slider_categories 	= get_theme_mod( 'citylogic-slider-categories' );
    		$slider_type 		= get_theme_mod( 'citylogic-slider-type', customizer_library_get_default( 'citylogic-slider-type' ) );
    		$exclude_categories = '';
    		
    		if ( $slider_type == 'citylogic-slider-default' ) {
				$exclude_categories = $slider_categories;
			}
			
			previous_post_link( '<div class="nav-previous">%link</div>', _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Previous post link', 'citylogic' ), false, $exclude_categories );
			next_post_link(     '<div class="nav-next">%link</div>',     _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Next post link',     'citylogic' ), false, $exclude_categories );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'citylogic_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function citylogic_posted_on() {
	
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'citylogic' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	
	$byline = sprintf(
		_x( 'by %s', 'post author', 'citylogic' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'citylogic_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function citylogic_entry_footer() {
	// Hide category and tag text for pages.
	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( __( ', ', 'citylogic' ) );
	if ( $categories_list && citylogic_categorized_blog() ) {
		printf( '<span class="cat-links">' . __( 'Posted in %1$s ', 'citylogic' ) . '</span>', $categories_list );
	}

	/* translators: used between list items, there is a space after the comma */
	$tags_list = get_the_tag_list( '', __( ', ', 'citylogic' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links">' . __( 'Tagged %1$s ', 'citylogic' ) . '</span>', $tags_list );
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) && get_theme_mod( 'citylogic-blog-display-comment-count', customizer_library_get_default( 'citylogic-blog-display-comment-count' ) ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment ', 'citylogic' ), __( '1 Comment ', 'citylogic' ), __( '% Comments ', 'citylogic' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'citylogic' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function citylogic_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'citylogic_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'citylogic_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so citylogic_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so citylogic_categorized_blog should return false.
		return false;
	}
}


if ( ! function_exists( 'citylogic_comment' ) ) :
/**
 * Template for comments and pingbacks.
*
* Used as a callback by wp_list_comments() for displaying the comments.
*/
function citylogic_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'citylogic' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'citylogic' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="comment-author vcard">
				<?php if ( 0 != $args['avatar_size'] ) { echo get_avatar( $comment, $args['avatar_size'] ); } ?>
			</div><!-- .comment-author -->

			<div class="comment-content">
			
				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'citylogic' ); ?></p>
				<?php 
				else :
					printf( __( '%s <span class="says">says:</span>', 'citylogic' ), sprintf( '<span class="fn">%s</span>', get_comment_author_link() ) );
					comment_text();
				endif;
				?>

				<?php
				if ( '1' == $comment->comment_approved ) :
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>',
					) ) );
				endif;
				?>
				
				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'citylogic' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'citylogic' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->
				
			</div><!-- .comment-content -->
			
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for citylogic_comment()


/**
 * Flush out the transients used in citylogic_categorized_blog.
 */
function citylogic_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'citylogic_categories' );
}
add_action( 'edit_category', 'citylogic_category_transient_flusher' );
add_action( 'save_post',     'citylogic_category_transient_flusher' );
