<?php
/*
Template Name: Comments
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

	<?php
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'simply-materialized-portfolio' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2><!-- .comments-title -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'simply-materialized-portfolio' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'simply-materialized-portfolio' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'simply-materialized-portfolio' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'walker' => new smp_Walker_Comment(),
					'style'      => 'div',
					'avatar_size' => 64,
					'format' => 'html5',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'simply-materialized-portfolio' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'simply-materialized-portfolio' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'simply-materialized-portfolio' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'simply-materialized-portfolio' ); ?></p>
	<?php
	endif; ?>
	<div class="row">
	<?php
	$fields =  array(

  'author' =>
    '<div class="comment-form-author input-field"><label for="author">' . __( 'Name', 'simply-materialized-portfolio' ) . '</label> ' .
    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . ' /></div>',

  'email' =>
    '<div class="comment-form-email input-field"><label for="email">' . __( 'Email', 'simply-materialized-portfolio' ) . '</label> ' .
    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . ' /></div>',

  'url' =>
    '<div class="comment-form-url input-field"><label for="url">' . __( 'Website', 'simply-materialized-portfolio' ) . '</label>' .
    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></div>',
);
	$new_args = array(
		'id_form' => 'commentform',
		'class_form' => 'col s12',
		'id_submit' => 'submit_comment',
		'class_submit' => 'btn waves-effect waves-light',
		'name_submit' => 'submit_comment',
		'title_reply' => __( 'Join the Conversation', 'simply-materialized-portfolio' ),
		'title_reply_to' => __( 'Reply to %s', 'simply-materialized-portfolio' ),
		'cancel_reply_link' => __( 'Cancel Reply', 'simply-materialized-portfolio' ),
		'label_submit' => __( 'Post Comment', 'simply-materialized-portfolio' ),
		'format' => 'html5',

		'comment_field' => '<div class="input-field"><textarea id="comment" class="materialize-textarea" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea><label for="comment">' . _x( 'Comment', 'noun', 'simply-materialized-portfolio' ) . '</label></div>',

		'must_log_in' => '<div class="must-log-in">' .
    sprintf(
      __( '<p>You must be <a href="%s">logged in</a> to post a comment.</p>', 'simply-materialized-portfolio' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</div>',

  'logged_in_as' => '<div class="logged-in-as">' .
    sprintf(
    __( '<p>Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a></p>', 'simply-materialized-portfolio' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</div>',

  'comment_notes_before' => '<div class="comment-notes">' .
    __( 'Your email address will not be published.', 'simply-materialized-portfolio' ) .
    '</div>',

  'comment_notes_after' => '<div class="form-allowed-tags">' .
    sprintf(
      __( 'Styling with Markdown is supported.', 'simply-materialized-portfolio' ),
      ' <code>' . allowed_tags() . '</code>'
    ) . '</div>',

  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	);
	comment_form($new_args);
	?>
	</div>

</div><!-- #comments -->