<?php
/**
 * Recipe
 *
 * @package WordPress
 */


get_header(); ?>

  <main id="main">

  	<div class="container">
  		<div class="row">
  			<div class="col-md-12">
                <header class="header header--top">
                  <h2 class="header-title"><?php the_title(); ?></h2>
                    <div class="breadcrumb">
                        <?php get_breadcrumb(); ?>
                    </div>
              </header>
            </div>
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


				<div class="offer-form offer-form--long data-block data-block--simple data-block--hoveroff hidden-xs hidden-sm">
    				<div class="row">
    					<h2 class="title">Nutrient Information for <?php the_title(); ?></h2>
    				</div>
					<div class="row">
						<div class="col-md-7">
							<div class="row">
								<ul>
									<li>
										<div class="offer-form-first">
											<i class="icon fas fa-pizza-slice"></i>Carbs / Fiber / Net Carbs:
										</div>
										<div class="offer-form-second date">
											<?php the_field('carbs'); ?> / <?php the_field('fiber'); ?> / <?php the_field('net_carbs'); ?> g.
										</div>
									</li>
                                    <li>
                                        <div class="offer-form-first">
											<i class="icon fas fa-cheese"></i>Fats:
										</div>
                                        <div class="offer-form-second">
                                            <?php the_field('fats'); ?> g.
                                        </div>
                                    </li>
                                    <li>
                                        <div class="offer-form-first">
											<i class="icon fas fa-fish"></i>Proteins:
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
                    <?php if( have_rows('products') ): ?>
                    <?php while ( have_rows('products') ) : the_row(); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ingredient-wrapper">
                                <div class="row">
                                    <h2 class="title"><?php the_sub_field('product_name'); ?>: </h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <ul>
                                                <?php while ( have_rows('product_ingredients') ) : the_row(); ?>
                                                <li>
                                                    <div class="offer-form-first">
                                                        <i class="fas fa-circle"></i>
                                                        <?php the_sub_field('amount'); ?>
                                                        <?php echo get_term(get_sub_field('measurement_unit'))->name; ?>
                                                        <strong><?php echo get_term(get_sub_field('ingredient'))->name;  ?></strong>
                                                        <em><?php the_sub_field('comment'); ?></em>
                                                        <!-- 6 ounce peanut butter (creamy) -->
                                                    </div>
                                                </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
				</div>

			</div>

			<div class="sidebar col-md-4">
				<?php
					$args = array(
						'post_type'              => array( 'recipe' ),
						'post_status'            => array( 'public' ),
						'orderby'                => 'date',
						'posts_per_page'		 => 5
					);

					// The Query
					$getOffers = new WP_Query( $args );


				?>

				<?php if( $getOffers->have_posts() ): ?>
					<header class="header header--sidebar header--line">
						<h4 class="header-title">Similar Keto Recipes</h4>
					</header>


					<?php while( $getOffers->have_posts() ) : $getOffers->the_post(); ?>
						<div class="data-block data-block--offer data-block--hoveroff">
							<a href="<?php the_permalink();?>">
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
									<div class="included">
										<ul class="list list--inline">
											<li>
                                                <i class="icon fas fa-pizza-slice" aria-hidden="true"></i>
                                                <span><?php the_field('carbs'); ?> g.</span>
                                            </li>
                                            <li>
                                                <i class="icon fas fa-cheese" aria-hidden="true"></i>
                                                <span><?php the_field('fats'); ?> g.</span>
                                            </li>
											<li>
                                                <i class="icon fas fa-fish"></i>
                                                <span><?php the_field('proteins'); ?> g.</span>
                                            </li>
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
