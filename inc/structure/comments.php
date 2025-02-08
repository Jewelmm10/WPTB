<?php
/**
 * Template functions used for the site comments.
 *
 * @package wptb
 */

if ( ! function_exists( 'wptb_display_comments' ) ) {
	/**
	 * wptb display comments
	 * @since  1.0.0
	 */
	function wptb_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'wptb_comment' ) ) {
	/**
	 * wptb comment template
	 * @since 1.0.0
	 */
	function wptb_comment( $comment, $args, $depth ) {
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment-meta';
		}
		?>
		<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
			<div class="comment-body">
				<div class="avatar">
					<?php echo get_avatar( $comment ); ?>
				</div>
				<div class="meta-data">

					<?php if ( 'div' != $args['style'] ) : ?>
					<div id="div-comment-<?php comment_ID() ?>" class="comment-content">
					<?php endif; ?>
					<?php if ( 'div' != $args['style'] ) : ?>
					</div>
					<?php endif; ?>

					<div id="div-comment-meta-<?php comment_ID() ?>" class="comment-meta">
						<div class="author vcard">
							<?php printf( '<cite class="fn says">%s</cite>', get_comment_author_link() ); ?>
						</div>
						<?php if ( '0' == $comment->comment_approved ) : ?>
							<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'wptb' ); ?></em>

						<?php endif; ?>

						<div class="date">
							<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>" class="comment-date">
								<?php echo '<time>' . get_comment_date() . '</time>'; ?>
							</a>
						</div>

						<div class="reply">
							<?php edit_comment_link( esc_html__( 'Edit', 'wptb' ), '  ', '' ); ?>
							<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</div>
					</div>
					<div class="comment-msg">
						<?php comment_text(); ?>
					</div>
					

				</div><!-- /.comment-body -->
			</div><!-- /.media -->
	<?php
	}
}

