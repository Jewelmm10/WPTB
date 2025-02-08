<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package wptb
 */


if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area comment blog-post-list p-4">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'wptb' ), number_format_i18n( get_comments_number() ) ); ?>
		</h2>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'type'			=> 'comment',
					'style'      	=> 'ul',
                    'max_depth'     => 3,
					'short_ping' 	=> false,
					'callback'		=> 'wptb_comment',
                    'avatar_size'   => 32,
				) );
			?>
		</ul><!-- .comment-list -->		

	<?php endif; // have_comments() ?>


</div>

<?php
// Declare Variables
$comment_send     = 'Submit Comment';
$comment_reply    = 'Leave a Reply';
$comment_reply_to = 'Reply';

$comment_author = 'Name*';
$comment_email  = 'Email*';
$comment_body   = 'Write Comments';

$comment_before = 'Your email address will not be published. Required fields are marked *';
$comment_cancel = 'Cancel Reply';

// Array for fields
$fields = array(
    // Author field
    'author' => '<div class="col-lg-6">
                    <input type="text" id="author" name="author" required 
                    placeholder="' . esc_attr($comment_author) . '" />
                 </div>',
    // Email Field
    'email' => '<div class="col-lg-6">
                    <input type="email" id="email" name="email" required 
                    placeholder="' . esc_attr($comment_email) . '" />
                </div>',
    'cookies' => '',
);

// Arguments for comment form
$args = array(
    'fields'                => $fields,
    'comment_field'         => '<div class="col-lg-12">
                                    <textarea id="comment" name="comment" 
                                    rows="5"
                                    placeholder="' . esc_attr($comment_body) .'"></textarea>
                                </div>',
    'class_form'            => 'row g-4',
    'title_reply'           => '<h3>' . esc_html($comment_reply) . '</h3>',
    'comment_notes_before'  => '<p>' . esc_html($comment_before) . '</p>',
    'class_submit'          => 'btn d-flex fw-500 cmn--btn align-items-center gap-2',
    'submit_button'         => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" /><span class="get__text">%4$s</span><span><i class="bi bi-arrow-right fz-20"></i> </span></button>',
    'label_submit'          => __( $comment_send ),
    'title_reply'           => __( $comment_reply ),
    'title_reply_to'        => __( $comment_reply_to ),
    'cancel_reply_link'     => __( $comment_cancel ),
    
);

?>

<div class="replay__box cmn__bg">
    <?php comment_form($args); ?>
</div>
