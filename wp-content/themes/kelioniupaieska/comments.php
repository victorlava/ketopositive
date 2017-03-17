
<?php
/** use action for success message **/
if ( $post_id != 0 ) { // success!
	function success_message(){
		echo '<div class="error error--block error--green">
						Komentaras sėkmingai publikuotas!
			  </div>';
	}
    add_action('form_message', 'success_message' );
}
?>
<?php 
	print_R($_POST);
?>

<?php if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<h3 class="title">Komentarai</h3>
	<?php if ( have_comments() ) : ?>
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


				<hr class="empty">
				<div class="add-comment data-block data-block--simple data-block--stylesoff">
					<h3 class="title">Naujas komentaras</h3> 
					<form lpformnum="1">
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label for="name">Vardas</label>
							    	<input type="text" id="name" placeholder="">
								</div>
								<div class="col-md-6">
								 	<label for="name">El. paštas</label>
							    	<input type="text" id="email" placeholder="">	
								</div>
							</div>
						 </div>

						 <div class="form-group">
						    <label for="name">Komentaras</label> 
						    <textarea id="message"></textarea>
						 </div>

						 <div class="form-group col-md-3 pull-right">
						    <div class="row">
						    	 <input type="submit" class="form-control button button--primary" value="Išsiųsti">
						    </div>
						 </div>
					</form>

					 <?php do_action('form_message'); ?>

					<div class="error error--block error--red">
						Prašome įvesti el. paštą.
					</div>
					<div class="error error--block error--green">
						Komentaras sėkmingai publikuotas!
					</div>
				</div>
