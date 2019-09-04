<?php
/**
 * Template Name: Front-page
 *
 * @package WordPress
 */

get_header(); ?>

  <main id="main">

  	<div class="main-search">
		<div class="container">
			<div class="col-md-2">

			</div>
			<div class="col-md-8 text-center">
				<h1>Start your keto weight loss journey today</h1>
				<p>Hundreds of thousands of people use ruled.me to lose weight. Join them in the FREE newsletter for exclusive advice, mouth-watering recipes, and extra motivation!</p>
		        <form action="http://kelioniupaieskawp.victorlava.com/tez-tour-keliones/" method="GET" role="form">
		        	<div class="main-search-inputs col-md-8">
						<input type="text" name="" placeholder="Your e-mail address" value="">
		            </div><!-- .main-search-inputs -->

		            <div class="main-search-submit col-md-4">
			        	<a href="#" class="js-add-url form-control button button--primary">Subscribe</a>
		        	</div><!-- .main-search-submit -->
		        </form>
			</div>
			<div class="col-md-2">

			</div>
		 </div>
  	</div><!-- .main-search -->

	<?php
		$args = array(
			'post_type'              => array( 'recipe' ),
			'post_status'            => array( 'publish' ),
			'posts_per_page' => 6
		);

		// The Query
		$getOffers = new WP_Query( $args );

	?>

	<?php if( $getOffers->have_posts() ): ?>
  	<section class="section">
  		<div class="container">
	  		<div class="row">
	  			<header class="header header--main header--line header--center">
					<h2 class="header-title">Recipes</h2>
					<p class="header-sub-title">Popular Keto Recipes</p>
				</header>
	  		</div>

			<div class="row">
				<?php $b = 0; ?>
				<?php while( $getOffers->have_posts() ) : $getOffers->the_post(); ?>
				<div class="col-md-4">
                    <div class="data-block data-block--offer data-block--article">
                        <div class="data-block-image">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('full'); ?>
                            </a>
                        </div>
                        <div class="data-block-info">
                            <a href="<?php echo esc_url( get_permalink()); ?>">
                                <h3 class="title"><?php the_title(); ?></h3>
                            </a>
                            <p><?php echo get_excerpt(); ?></p>
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
                                        <i class="icon fas fa-fish" aria-hidden="true"></i>
                                        <span><?php the_field('proteins'); ?> g.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
				</div>
				<?php endwhile; ?>
			</div>

			<div class="row">
				<hr class="empty half">
				<a href="keto/all-recipes/" class="button button--primary button--long button--center">Click to See More Recipes</a>
			</div>
		</div>
  	</section>
	<?php endif; ?>
	<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

  	<section class="section favourite-hotels">
			<div class="container">
				<div class="row">
					<header class="header header--main header--line header--center">
						<h2 class="header-title">What is a Keto Diet?</h2>
						<p class="header-sub-title">A quick explanation on what is the Keto Diet</p>
					</header>
				</div>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Ketogenic Diet</h3>
                        <p>A ketogenic diet is a low carb, high fat diet that turns your body into a fat-burning machine. When insulin - the fat storing hormone - levels drop, you will feel the difference of an optimal body. Keto has many weight loss, health and performance benefits for type 2 diabetes, epilepsy, PCOS, metabolic syndrome, blood pressure, cholesterol, mental focus and numerous autoimmune diseases.

                        </p>
                        <p>Keto restricts your intake of sugar and starchy foods, like pasta and bread. Instead, you'll eat delicious real food with selective protein, healthy fats, and vegetables for nutrients. Ruled.me contains everything you need - what to eat, what to avoid, and exactly how to do it.</p>

                        <p>To learn more, take a peek at our guide:</p>
                        <a href="#" target="_blank" class="button button--primary">Start Here</a>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <h3>Start changing your life</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <a href="#" target="_blank" class="button button--primary">Join the club</a>
                    </div>
                </div>
			</div>

  	</section>

	<?php
		$args = array(
			'post_type'              => array( 'direction' ),
			'post_status'            => array( 'public' )
		);

		// The Query
		$getDirections = new WP_Query( $args );

	?>
	<?php if( $getDirections->have_posts() ): ?>
  	<section class="section favourite-directions">
  		<div class="container">
			<div class="row">
				<header class="header header--main header--line header--center">
					<h2 class="header-title">Populiariausios poilsinių kelionių kryptys</h2>
					<p class="header-sub-title">Išsirinkite savo atostogų kryptį</p>
				</header>
			</div>

			<div class="row">
				<?php while( $getDirections->have_posts() ) : $getDirections->the_post(); ?>
				<div class="col-md-6">
					<div class="direction-block">
						<a href="<?php the_field('nuoroda'); ?>">
							<img src="<?php the_field('nuotrauka'); ?>">
							<header class="header header--main">
								<h2 class="header-title"><?php the_title(); ?></h2>
								<p class="header-sub-title"><?php the_field('antraste'); ?></p>
							</header>
						</a>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
  	</section>
    <?php endif; ?>
    <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

  </main><!-- #main -->

  <?php get_footer(); ?>
