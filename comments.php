<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to portfolio_perspectives_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Portfolio Perspectives
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				_e('Comments', 'portfolio-perspectives');
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'portfolio-perspectives' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'portfolio-perspectives' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'portfolio-perspectives' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ul class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use portfolio_perspectives_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define portfolio_perspectives_comment() and that will be used instead.
				 * See portfolio_perspectives_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'portfolio_perspectives_comment', 'end-callback' => 'portfolio_perspectives_end_comment' ) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'portfolio-perspectives' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'portfolio-perspectives' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'portfolio-perspectives' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'portfolio-perspectives' ); ?></p>
	<?php endif; ?>

	<?php comment_form(array(
        'id_submit'         => 'commentsubmit',
        'title_reply'       => __( 'Post a Comment', 'portfolio-perspectives' ),
        'title_reply_to'    => __( 'Post a Comment to %s', 'portfolio-perspectives' ),
        'cancel_reply_link' => __( 'Cancel Comment', 'portfolio-perspectives' ),
        'label_submit'      => __( 'Submit Comment', 'portfolio-perspectives' ),

        'comment_field' =>  '<div class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'portfolio-perspectives' ) .
            '</label><div class="input-wrapper"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
            '</textarea></div></div>',

        'comment_notes_before' => '<p class="comment-notes">' .
            __( 'Your email address will not be published.', 'portfolio-perspectives' ) . ( $req ? $required_text : '' ) .
            '</p>',

        'comment_notes_after' => '',

        'fields' => apply_filters( 'comment_form_default_fields', array(

                'author' =>
                    '<div class="comment-form-author">' .
                    '<label for="author">' . __( 'Name', 'portfolio-perspectives' ) .
                    ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
                    '<div class="input-wrapper"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . $aria_req . ' /></div></div>',

                'email' =>
                    '<div class="comment-form-email"><label for="email">' . __( 'Email', 'portfolio-perspectives' ) .
                    ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
                    '<div class="input-wrapper"><input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' /></div></div>',

                'url' =>
                    ''
            )
        ),
    )); ?>

</div><!-- #comments -->
