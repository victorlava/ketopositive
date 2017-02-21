<?php
/**
 * Template Name: Post
 *
 * @package WordPress
 */

get_header(); ?>

  <main id="main"> 

  	<div class="container">
		<div class="row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="col-md-8">
				<header class="header header--top header--line header--left"> 
					<a href="<?php esc_url( get_permalink() ); ?>">
						<h2 class="header-title"><span class="header-smaller"><?php the_title(); ?></h2>
					</a>
				</header>
				<div class="tag-links">  
					<?php the_tags(''); ?>
				</div>
				<article class="article">
					<div class="intro-text">
						<?php the_excerpt(); ?>
					</div>
					<?php the_content(); ?>
					<p>-- fb share --</p>
				</article>
				<header class="header header--top header--line header--left"> 
					<h2 class="header-title"></h2>
				</header>
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
			</div>
		<?php endwhile; endif; ?>

			<div class="sidebar col-md-4"> 
				<?php
					$args = array(
						'post_type'              => array( 'post' ),
						'post_status'            => array( 'publish' ),
						'orderby'				 => 'date',
						'order'					 => 'ASC',
						'posts_per_page' => 3
					);

					// The Query
					$newestPosts = new WP_Query( $args );
				?>

				<?php if( $newestPosts->have_posts() ): ?>
				<header class="header header--sidebar header--line"> 
					<h4 class="header-title">Naujausi straipsniai</h4>
				</header>
				<div class="data-block data-block--news data-block--offer data-block--hoveroff"> 
					<?php while( $newestPosts->have_posts() ) : $newestPosts->the_post(); ?>
						<div class="data-block-info">
							<a href="<?php the_permalink();?>"><h4 class="title"><?php the_title();?></h4></a>
							<div class="tag-links">  
								<?php the_tags(''); ?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>


				<?php
					$args = array(
						'post_type'              => array( 'offer' ),
						'post_status'            => array( 'publish' ),
						'posts_per_page' => 100
					);

					// The Query
					$getOffers = new WP_Query( $args );

				?>

				<?php if( $getOffers->have_posts() ): ?>
				<header class="header header--sidebar header--line"> 
					<h4 class="header-title">Top pasiūlymai</h4>
				</header>
			
				<div id="hotel-carousel" class="carousel slide" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				    
				  	<?php $b = 1; ?>
					<?php while( $getOffers->have_posts() ) : $getOffers->the_post(); ?>

					   <?php if ($b % 3 === 1): // Every sixt item, we close the div and start it again. ?>
							<div class="item<?php if($b == 1){echo ' active';}?>">
					   <?php endif; ?>

						<div class="data-block data-block--offer data-block--hoveroff">
							<a href="<?php the_permalink();?>"> 

								<?php while ( have_rows('nuotraukos') ) : the_row(); ?>
							   		<div class="data-block-image">
										<img src="<?php the_sub_field('nuotrauka'); ?>">
								    </div>
								    <?php break; ?>
						   		<?php endwhile; ?>

								<div class="data-block-info">
									<h4 class="title"><?php the_title(); ?></h4>
									<time datetime="2001-05-15T19:00"><?php the_field('keliones_data'); ?></time>
									<div class="price-wrapper">
										<div class="align align--vertical">
											<p><?php the_field('kaina'); ?>€</p>
											<?php if(get_field('sena_kaina')): ?>
												<p class="old-price"><?php the_field('sena_kaina'); ?>€</p> 
											<?php endif; ?>
										</div>
									</div>
									<div class="included">
										<ul class="list list--inline">
											<li><i class="icon icon-bed"></i> <?php the_field('nakvyniu_skaicius'); ?></li>
											<li><i class="icon icon-drink"></i> Viskas įskaičiuota</li>
										</ul>
									</div>
								</div>
							</a>
						</div>

					   	<?php if ($b % 3 === 0): // Every sixt item, we close the div and start it again. ?>
						</div>
						<?php endif; ?>

						<?php $b = $b + 1; ?>

						<?php endwhile; ?>
						<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
				    </div>
				 

				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				  	<?php $b = 0; $a = 0; ?>
				  	<?php while( $getOffers->have_posts() ) : $getOffers->the_post(); ?>
					  	<?php if ($b % 3 === 0): // Every sixt item, we close the div and start it again. ?>
					  		<li data-target="#hotel-carousel" data-slide-to="<?php echo $a; ?>" class="<?php if($b == 0){echo ' active';}?>"></li>
					  		<?php $a++; ?>
					  	<?php endif; ?>
					  	<?php $b++; ?>
				  	<?php endwhile; ?>
				  </ol>
				</div>
				<?php endif; ?>
				

			</div>
		</div>
	</div>

  </main><!-- #main -->

  <?php get_footer(); ?>