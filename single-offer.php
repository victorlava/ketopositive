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
			</header>
  		</div>
		<div class="row">
			<div class="col-md-8">
				<?php if( have_rows('images') ): ?>
				<div id="hotel-carousel" class="carousel slide carousel--simple box-shadow" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">

				  		<?php $b = 0; ?>
				   		<?php while ( have_rows('images') ) : the_row(); ?>
					   		<div class="item<?php if($b == 0){echo " active";}?>">
								<img class="box-shadow" src="<?php the_sub_field('image'); ?>" width="825" height="508">
						    </div>
						    <?php $b = $b + 1; ?>
				   		<?php endwhile; ?>

				  </div>

				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				  	<?php $b = 0; ?>
			   		<?php while ( have_rows('images') ) : the_row(); ?>
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


				<div id="uzsakyti" class="offer-form offer-form--long data-block data-block--simple data-block--hoveroff hidden-xs hidden-sm">
						<div class="row">
							<h3 class="title">Nutrient information for <?php the_title(); ?></h3>
						</div>
						<div class="row">
							<div class="col-md-7">
								<div class="row">
									<ul>
										<li>
											<div class="offer-form-first">
												<i class="icon icon-small-calendar"></i> Carbs / Fiber / Net Carbs:
											</div>
											<div class="offer-form-second date">
												<?php the_field('carbs'); ?> / <?php the_field('fiber'); ?> / <?php the_field('net_carbs'); ?> g.
											</div>
										</li>
                                        <li>
                                            <div class="offer-form-first">
												<i class="icon icon-small-drink"></i>Fats:
											</div>
                                            <div class="offer-form-second">
                                                <?php the_field('fats'); ?> g.
                                            </div>
                                        </li>
                                        <li>
                                            <div class="offer-form-first">
												<i class="icon icon-small-drink"></i>Proteins:
											</div>
                                            <div class="offer-form-second">
                                                <?php the_field('proteins'); ?> g.
                                            </div>
                                        </li>
									</ul>
								</div>
							</div>
							<div class="col-md-4 col-md-offset-1">
								<div class="price-wrapper">
									<p>Total calories <br><span class="js-change-price"><?php the_field('calories'); ?> kCal</span></p>
								</div>
								<a href="<?php the_field('iframe_nuoroda'); ?>"
                                    class="form-control button button--primary button--submit">
                                    <i class="fas fa-print"></i>
                                    Print Recipe
                                </a>
							</div>
						</div>
				</div>



			</div>

			<div class="sidebar col-md-4">

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
						<h4 class="header-title">Similar recipes</h4>
					</header>


					<?php while( $getOffers->have_posts() ) : $getOffers->the_post(); ?>
						<div class="data-block data-block--offer data-block--hoveroff">
							<a href="<?php get_permalink();?>">
								<div class="data-block-image">
							   		<?php while ( have_rows('images') ) : the_row(); ?>
								   		<div class="data-block-image">
											<img src="<?php the_sub_field('image'); ?>">
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

  </main><!-- #main -->

<?php get_footer(); ?>
