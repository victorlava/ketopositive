
<?php if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h3 class="title">Komentarai</h3>
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ol><!-- .comment-list -->

	

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments">Nėra komentarų.</p>
	<?php endif; ?>

	 <?php do_action('form_message'); ?>

	<?php 

	$fields =  array(

	  'author' =>
	    '<p class="comment-form-author col-md-6"><label for="author">Vardas</label> ' .
	    ( $req ? '<span class="required">*</span>' : '' ) .
	    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	    '" size="30"' . $aria_req . ' /></p>',

	  'email' =>
	    '<p class="comment-form-email col-md-6"><label for="email">El. paštas</label> ' .
	    ( $req ? '<span class="required">*</span>' : '' ) .
	    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	    '" size="30"' . $aria_req . ' /></p>',

	   'comment_field' => '<p class="comment-form-comment col-md-12"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>'
	);
		$comments_args = array(
		        // change the title of send button 
		        'label_submit'=> 'Išsiųsti',
		        'class_submit'      => 'submit col-md-3 pull-right',
		        // change the title of the reply section
		        'title_reply'=> 'Naujas komentaras',
		        'comment_field' => '',
		        // remove "Text or HTML to be displayed after the set of comment fields"
		        'comment_notes_before' => '',
		        'comment_notes_after' => '',
		        'fields' => apply_filters( 'comment_form_default_fields', $fields )
		);

		comment_form($comments_args);
	?>


</div><!-- .comments-area -->

