<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
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

<div id="comments">

	<?php if ( have_comments() ) : ?>
		<ol class="commentlist">
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
		<p class="no-comments"><?php _e( 'Komentarų nėra.', 'twentyfifteen' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- .comments-area -->

				<div class="comments data-block data-block--simple data-block--stylesoff">


					<h3 class="title">Komentarai</h3>

					<?php comments_template(); ?>
					<div id="comments">



						<ol class="commentlist">
							<li class="comment even thread-even depth-1" id="li-comment-20905">
								<div class="comment-container data-block data-block--simple data-block--hoveroff">
									<div class="row">
										<div class="col-md-2">
											<div class="comment-author vcard">
												<cite class="fn">Sigitas</cite>
											</div><!-- .comment-author .vcard -->
											
											<div class="comment-meta commentmetadata">
												2016-01-20<br>13:15			
											</div><!-- .comment-meta .commentmetadata -->
										</div>


										<div class="col-md-10">
											<div class="comment-body">
												<p>Paryžiuje bus pristatytas "Gallimard" leidyklos išleistas gidas "Vilnius žemėlapiuose" ("Cartoville Vilnius"). Tai pirmasis ir kol kas vienintelis gidas apie Vilnių prancūzų kalba. Beje, leidinyje trumpai apžvelgiami visi keturi mūsų šalies regionai. Leidykla "Gallimard" gidą "Vilnius žemėlapiuose", be prancūzų, išleido dar anglų ir norvegų kalbomis. Leidėjų teigimu, knygą bus galima įsigyti septynių</p>
											</div>

											<div class="reply pull-right">
												<a href="#">Atsakyti</a>
											</div><!-- .reply -->
										</div>
									</div>
								</div><!-- #comment-##  -->

								<ul class="children">
										<li class="comment byuser comment-author-emanuel_blagonic bypostauthor odd alt depth-2" id="li-comment-20906">
											<div class="comment-container data-block data-block--simple data-block--hoveroff">
												<div class="row">
													<div class="col-md-2">
														<div class="comment-author vcard">
															<cite class="fn">Sigitas</cite>
														</div><!-- .comment-author .vcard -->
														
														<div class="comment-meta commentmetadata">
															2016-01-20<br>13:15			
														</div><!-- .comment-meta .commentmetadata -->
													</div>


													<div class="col-md-10">
														<div class="comment-body">
															<p>Paryžiuje bus pristatytas "Gallimard" leidyklos išleistas gidas "Vilnius žemėlapiuose" ("Cartoville Vilnius"). Tai pirmasis ir kol kas vienintelis gidas apie Vilnių prancūzų kalba. Beje, leidinyje trumpai apžvelgiami visi keturi mūsų šalies regionai. Leidykla "Gallimard" gidą "Vilnius žemėlapiuose", be prancūzų, išleido dar anglų ir norvegų kalbomis. Leidėjų teigimu, knygą bus galima įsigyti septynių</p>
														</div>
													</div>
												</div>
											</div><!-- #comment-##  -->
										</li><!-- #comment-## -->
								</ul><!-- .children -->
							</li><!-- #comment-## -->
						</ol>
					</div> 
				</div>
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
					<div class="error error--block error--red">
						Prašome įvesti el. paštą.
					</div>
					<div class="error error--block error--green">
						Komentaras sėkmingai publikuotas!
					</div>
				</div>
