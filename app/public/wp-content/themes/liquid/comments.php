<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<div class="ttl comments-title">
			<?php
			printf( _n( 'Comment (%1$s)', 'Comments (%1$s)', get_comments_number(), 'liquid' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</div>
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
			<?php paginate_comments_links(); ?>
		</ol><!-- .comment-list -->

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><!-- Comments are closed --></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- .comments-area -->
