<?php
/**
 * Offer
 *
 * @package WordPress
 */


get_header(); ?>

  <main id="main">

  	<div class="container">
  		<div class="row">
  			<header class="header header--top header--main header--center">
				<h2 class="header-title"><?php the_title(); ?></h2>
				<div class="stars">
					<ul class="list list--inline">
							<li><i class="icon icon-star"></i></li>
                            <li><i class="icon icon-star"></i></li>
                            <li><i class="icon icon-star"></i></li>
                            <li><i class="icon icon-star"></i></li>
                            <li><i class="icon icon-star"></i></li>
					</ul>
				</div>
			</header>
  		</div>
		<div class="row">
			<div class="col-md-8">
				<?php if( have_rows('nuotraukos') ): ?>
				<div id="hotel-carousel" class="carousel slide carousel--simple box-shadow" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">

				  		<?php $b = 0; ?>
				   		<?php while ( have_rows('nuotraukos') ) : the_row(); ?>
					   		<div class="item<?php if($b == 0){echo " active";}?>">
								<img class="box-shadow" src="<?php the_sub_field('nuotrauka'); ?>" width="825" height="508">
						    </div>
						    <?php $b = $b + 1; ?>
				   		<?php endwhile; ?>

				  </div>

				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				  	<?php $b = 0; ?>
			   		<?php while ( have_rows('nuotraukos') ) : the_row(); ?>
				   		<li data-target="#hotel-carousel" data-slide-to="<?php echo $b; ?>" class="<?php if($b == 0){ echo "active";}?>"></li>
					    <?php $b = $b + 1; ?>
			   		<?php endwhile; ?>
				  </ol>


				  <!-- Controls -->
				  <a class="left carousel-control" href="#hotel-carousel" role="button" data-slide="prev">
				    <i class="icon align">
				    	<i class="icon-arrow-left"></i>
				    </i>
				  </a>
				  <a class="right carousel-control" href="#hotel-carousel" role="button" data-slide="next">
				     <i class="icon align">
				     	<i class="icon-arrow-right"></i>
				     </i>
				  </a>
				</div>
				<?php endif; ?>

				<article class="article">

					<?php echo get_post_field('post_content', $post->ID); ?>
				</article>
									<div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>

				<?php if(get_field('rodyti_forma') == 'Ne'): ?>
				<div id="uzsakyti" class="offer-form offer-form--long data-block data-block--simple data-block--hoveroff hidden-xs hidden-sm">
						<div class="row">
							<h3 class="title">Užsakykite kelionę</h3>
							<h3 class="sub-title"><?php the_field('keliones_kryptis'); ?></h3>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="row">
									<ul>
										<li>
											<div class="offer-form-first">
												<i class="icon icon-small-calendar"></i> Kelionės data:
											</div>
											<div class="offer-form-second date">
												<?php the_field('keliones_data'); ?>
											</div>
										</li>
										<li>
											<div class="offer-form-first">
												<i class="icon icon-small-bed"></i> Nakvynių skaičius:
											</div>
											<div class="offer-form-second">
												<?php the_field('nakvyniu_skaicius'); ?>
											</div>
										</li>
										<li>
											<div class="offer-form-first">
												<i class="icon icon-small-drink"></i> Maitinimas:
											</div>
											<div class="js-track-change offer-form-second">
												<?php if(get_field('pirmos_eilutes_pavadinimas')): ?>
												<div class="js-first-radio radio">
												  <input type="radio" id="breakfest-second" name="offer-radio-second" value="<?php the_field('pirmos_eilutės_reiksmė'); ?>" checked>
												  <label for="breakfest-second"><?php the_field('pirmos_eilutes_pavadinimas'); ?> <?php if(get_field('pirmos_eilutės_reiksmė')): ?><span class="highlight">+ <?php the_field('pirmos_eilutės_reiksmė'); ?>€</span><?php endif; ?></label>
												</div>
												<?php endif; ?>
												<?php if(get_field('antros_eilutes_pavadinimas')): ?>
												<div class="js-second-radio radio">
												  <input type="radio" id="all-second" name="offer-radio-second" value="<?php the_field('antros_eilutės_reiksmė'); ?>">
												  <label for="all-second"><?php the_field('antros_eilutes_pavadinimas'); ?> <?php if(get_field('antros_eilutės_reiksmė')): ?><span class="highlight">+ <?php the_field('antros_eilutės_reiksmė'); ?>€</span><?php endif; ?></label>
												</div>
												<?php endif; ?>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-md-4">
								<div class="price-wrapper">
									<p>Kaina: <span class="js-change-price"><?php the_field('kaina'); ?> €</span></p>
								</div>
								<a href="<?php the_field('iframe_nuoroda'); ?>" class="form-control button button--primary button--submit">Užsakyti</a>
							</div>
						</div>
				</div>
				<?php else: ?>
					<div id="uzsakyti" class="offer-form offer-form--long offer-form--full data-block data-block--simple data-block--hoveroff">
					<?php if($adult == TRUE): ?>
					<div class="error error--block error--red">
						Prašome pasirinkti suagusiūjų skaičių.
					</div>
					<?php endif; ?>

					<?php if($children == TRUE): ?>
					<div class="error error--block error--red">
						Prašome pasirinkti vaikų skaičių.
					</div>
					<?php endif; ?>

					<?php if($hideForm == TRUE): ?>
					<div class="error error--block error--green">
						Užsakymų forma sėkmingai išsiųsta!
					</div>
					<?php endif; ?>
						<form action="<?php get_permalink(); ?>#uzsakyti" method="POST">
							<div class="row">
								<h3 class="title">Užsakykite kelionę</h3>
							</div>
							<div class="offer-form-price row">
								<div class="col-md-9">
									<div class="row row--first">
										<ul class="list list--inline">
											<li><strong><?php the_field('keliones_kryptis_trumpa'); ?></strong></li>
											<li><?php the_title(); ?></li>
											<li><?php the_field('keliones_data'); ?></li>
										</ul>
									</div>
									<div class="js-track-change row">
										<ul class="list list--inline">
											<li>Maitinimas:</li>
											<?php if(get_field('pirmos_eilutes_pavadinimas')): ?>
											<li>
												<div class="js-first-radio radio">
												  <input type="radio" id="breakfest-second" name="offer-radio-second" value="<?php the_field('pirmos_eilutės_reiksmė'); ?>" checked>
												  <label for="breakfest-second"><?php the_field('pirmos_eilutes_pavadinimas'); ?> <?php if(get_field('pirmos_eilutės_reiksmė')): ?><span class="highlight">+ <?php the_field('pirmos_eilutės_reiksmė'); ?>€</span><?php endif; ?></label>
												</div>
											</li>
											<?php endif ;?>
											<?php if(get_field('antros_eilutes_pavadinimas')): ?>
											<li>
												<div class="js-second-radio radio">
												  <input type="radio" id="all-second" name="offer-radio-second" value="<?php the_field('antros_eilutės_reiksmė'); ?>">
												  <label for="all-second"><?php the_field('antros_eilutes_pavadinimas'); ?> <?php if(get_field('antros_eilutės_reiksmė')): ?><span class="highlight">+ <?php the_field('antros_eilutės_reiksmė'); ?>€</span><?php endif; ?></label>
												</div>
											</li>
											<?php endif; ?>
										</ul>
									</div>
								</div>
								<div class="col-md-3 price-wrapper">
									<p>Kaina: <span class="js-change-price"><?php the_field('kaina'); ?> €</span></p>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
								    <div class="row">
									    <div class="col-md-6">
									    	<label for="name">Vardas</label>
									    	<input type="text" id="first_name" name="first_name" placeholder="" value="<?php echo $_POST['first_name']; ?>" required>
									    </div>
									    <div class="col-md-6">
									    	<label for="name">Pavardė</label>
									    	<input type="text" id="last_name" name="last_name" placeholder="" value="<?php echo $_POST['last_name']; ?>" required>
									    </div>
								    </div>
								</div>
								<div class="form-group">
								    <div class="row">
								    	<div class="col-md-6">
									    	<label for="name">Telefonas</label>
									    	<input type="text" id="phone" name="phone" placeholder="" value="<?php echo $_POST['phone']; ?>" required>
									    </div>
									    <div class="col-md-6">
									    	<label for="name">El. paštas</label>
									    	<input type="email" id="email" name="email" placeholder="" value="<?php echo $_POST['email']; ?>" required>
									    </div>
								    </div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-6">
													<label for="suagusieji">Suagusių skaičius</label>
													<div class="input-group input-group--select">
										                <span class="input-group-addon">
										                	<i class="icon icon-adults"></i>
										                </span>
										                <select class="selectpicker" name="adult">
										                  <option selected="" disabled="" id="suagusieji" name="suagusieji">Suaugusieji</option>
										                  <option value="1">1</option>
										                  <option value="2">2</option>
										                  <option value="3">3</option>
										                </select>
										            </div>
												</div>
												<div class="col-md-6">
													<label for="vaikai">Vaikų skaičius</label>
													<div class="input-group input-group--select">
										                <span class="input-group-addon">
										                	<i class="icon icon-children"></i>
										                </span>
										                <select class="selectpicker" name="children">
										                  <option selected="" disabled="" id="vaikai" name="vaikai">Vaikai</option>
										                  <option value="1">1</option>
										                  <option value="2">2</option>
										                  <option value="3">3</option>
										                </select>
										            </div>
												</div>
											</div>
										</div>
									<div class="col-md-6">
										<input type="submit" class="form-control button button--primary" value="Užsakyti">
									</div>
									</div>
								</div>
							</div>
						</form>
						<script type="text/javascript">
				        jQuery(document).ready(function ($) {
					        $('.selectpicker').selectpicker({
							  style: '',
							  size: 4
							});
					    });
				        </script>
				</div>
				<?php endif; ?>


			</div>

			<div class="sidebar col-md-4">

				<div class="offer-form offer-form--short data-block data-block--simple data-block--hoveroff<?php if(get_field('rodyti_forma') != 'Ne'){ echo " hidden-xs hidden-sm";} ?>">
					<h3 class="title"><?php the_field('keliones_kryptis_trumpa'); ?></h3>
					<ul>
						<li>
							<div class="offer-form-first date">
								<i class="icon icon-small-calendar"></i> Kelionės data:
							</div>
							<div class="offer-form-second date">
								<?php the_field('keliones_data'); ?>
							</div>
						</li>
						<li>
							<div class="offer-form-first">
								<i class="icon icon-small-bed"></i> Nakvynių skaičius:
							</div>
							<div class="offer-form-second">
								<?php the_field('nakvyniu_skaicius'); ?>
							</div>
						</li>
						<li>
							<div class="offer-form-first">
								<i class="icon icon-small-drink"></i> Maitinimas:
							</div>
							<div class="js-track-change offer-form-second">
								<?php if(get_field('pirmos_eilutes_pavadinimas')): ?>
								<div class="js-first-radio radio">
								  <input type="radio" id="breakfest-first" name="offer-radio-first" value="<?php the_field('pirmos_eilutės_reiksmė'); ?>" checked>
								  <label for="breakfest-first"><?php the_field('pirmos_eilutes_pavadinimas'); ?> <?php if(get_field('pirmos_eilutės_reiksmė')): ?><span class="highlight">+ <?php the_field('pirmos_eilutės_reiksmė'); ?>€</span><?php endif; ?></label>
								</div>
								<?php endif; ?>
								<?php if(get_field('antros_eilutes_pavadinimas')): ?>
								<div class="js-second-radio radio">
								  <input type="radio" id="all-first" name="offer-radio-first" value="<?php the_field('antros_eilutės_reiksmė'); ?>">
								  <label for="all-first"><?php the_field('antros_eilutes_pavadinimas'); ?> <?php if(get_field('antros_eilutės_reiksmė')): ?><span class="highlight">+ <?php the_field('antros_eilutės_reiksmė'); ?>€</span><?php endif; ?></label>
								</div>
								<?php endif; ?>
							</div>
						</li>
					</ul>
					<div class="price-wrapper">
						<p>Kaina: <span class="js-change-price"><?php the_field('kaina'); ?> €</span></p>
					</div>
					<?php if(get_field('rodyti_forma') == 'Ne'): ?>
						<a href="<?php the_field('iframe_nuoroda'); ?>" class="form-control button button--primary button--submit">Užsakyti</a>
					<?php else: ?>
						<a href="#uzsakyti" class="form-control button button--primary button--submit">Užsakyti</a>
					<?php endif; ?>


				</div>

				<?php
					$args = array(
						'post_type'              => array( 'offer' ),
						'post_status'            => array( 'public' ),
						'orderby'                => 'rand',
						'posts_per_page'		 => 2
					);

					// The Query
					$getOffers = new WP_Query( $args );


				?>

				<?php if( $getOffers->have_posts() ): ?>
					<header class="header header--sidebar header--line">
						<h4 class="header-title">Kiti pasiūlymai</h4>
					</header>


					<?php while( $getOffers->have_posts() ) : $getOffers->the_post(); ?>
						<div class="data-block data-block--offer data-block--hoveroff">
							<a href="<?php get_permalink();?>">
								<div class="data-block-image">
							   		<?php while ( have_rows('nuotraukos') ) : the_row(); ?>
								   		<div class="data-block-image">
											<img src="<?php the_sub_field('nuotrauka'); ?>">
									    </div>
									    <?php break; ?>
							   		<?php endwhile; ?>
								</div>
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
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function($){

			var currentPrice = $('.js-change-price').html();
				currentPrice = currentPrice.replace(' €', '') * 1;

			$('.js-track-change input').on('change', function(){
				var value = $(this).val() * 1;

				if($(this).parent().hasClass('js-first-radio')){
					$('#main .js-first-radio input').attr('checked', true);
				}
				else{
					$('#main .js-second-radio input').attr('checked', true);
				}

				if(value != 0){
					$('.js-change-price').html(value + currentPrice + ' €');
				}
				else{
					$('.js-change-price').html(currentPrice + ' €');
				}

			});

		});
	</script>

  </main><!-- #main -->

<?php get_footer(); ?>
