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
			'post_type'              => array( 'offer' ),
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
					<h2 class="header-title">Karščiausi kelionių pasiūlymai</h2>
					<p class="header-sub-title">Atrinkome populiariausias kryptis ir geriausius viešbučius</p>
				</header>
	  		</div>

			<div class="row">
				<?php $b = 0; ?>
				<?php while( $getOffers->have_posts() ) : $getOffers->the_post(); ?>
				<div class="col-md-4">
					<div class="data-block data-block--offer">
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
				</div>
				<?php endwhile; ?>
			</div>

			<div class="row">
				<hr class="empty half">
				<a href="pasiulymas/" class="button button--long button--center">Žiūrėti visus pasiūlymus</a>
			</div>
		</div>
  	</section>
	<?php endif; ?>
	<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

  	<section class="section favourite-hotels">
			<div class="container">
				<div class="row">
					<header class="header header--main header--line header--center">
						<h2 class="header-title">Mėgstamiausi mūsų keliautojų viešbučiai</h2>
						<p class="header-sub-title">Jūsų rinktinės vietos</p>
					</header>
				</div>
			</div>

			<div class="row">
				<div class="carousel-selectors">
					<?php
						$kategorijos = get_terms( array(
						    'taxonomy' => 'kategorija',
						    'hide_empty' => false,
						    'order' => "DESC"
						) );
					?>
					<ul class="nav nav--secondary nav--carousel-selectors list list--inline">
						<?php $b = 0; ?>
						<?php foreach ($kategorijos as $kategorija): ?>
						<li class="<?php if($b == 0){ echo 'active';}?>" data-category="<?php echo $kategorija->slug; ?>">
							<a href="#"><?php echo $kategorija->name; ?></a>
						</li>
						<?php $b++; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

		<?php $c = 0; ?>
		<?php foreach ($kategorijos as $kategorija): ?>
			<?php
				$args = array(
					'post_type'              => array( 'hotels' ),
					'post_status'            => array( 'publish' ),
					'tax_query' => array(
						array(
							'taxonomy' => 'kategorija',
							'field'    => 'slug',
							'terms'    => $kategorija->slug,
						),
					),
					'orderby'        => 'rand',
					'posts_per_page' 		 => 100
				);

				// The Query
				$getHotels = new WP_Query( $args );
			?>
			<?php if( $getHotels->have_posts() ): ?>
			<div id="multiple-items<?php echo $c; ?>" class="carousel row js-show-hide <?php echo $kategorija->slug; ?>">
					<?php while( $getHotels->have_posts() ) : $getHotels->the_post(); ?>
			    	<div class="col-md-2">
			    		<div class="data-block data-block--offer data-block--hotels js-data-<?php the_field('salies_kategorija'); ?>">
							<a href="<?php the_field('nuoroda'); ?>">
								<div class="data-block-image">
									<img src="<?php the_field('nuotrauka'); ?>">
								</div>
								<div class="data-block-info">
									<h4 class="title"><?php the_title();?></h4>
									<div class="stars">
										<ul class="list list--inline">
											<?php $count = get_field('zvaigzduciu_skaicius');$count = $count * 1;?>
											<?php for($i=0;$i < $count;$i++): ?>
												<li><i class="icon icon-star"></i></li>
											<?php endfor; ?>
										</ul>
									</div>
									<p class="time"><?php the_field('vieta'); ?></p>
								</div>
							</a>
						</div>
			    	</div>
			    	<?php endwhile; ?>
				</div>

				<?php endif; ?>
				<?php $c++; ?>
			<?php endforeach; ?>
			<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

				<script type="text/javascript">
					jQuery(document).ready(function($){
						$('.carousel').slick({
						  infinite: true,
						  slidesToShow: 6,
						  slidesToScroll: 2,
						  dots: true,
						  lazyLoad: 'progressive',
						  dotsClass: 'carousel-indicators',
						  prevArrow: '<a class="left carousel-control" role="button"><i class="icon align"><i class="icon-arrow-left"></i></i></a>',
						  nextArrow: '<a class="right carousel-control" hrole="button"><i class="icon align"><i class="icon-arrow-right"></i></i></a>',
						  responsive: [
						    {
						      breakpoint: 994,
						      settings: 'unslick'
						    }

						    // You can unslick at a given breakpoint now by adding:
						    // settings: "unslick"
						    // instead of a settings object
						  ]
						});

						$('.carousel').on('init', function(event, slick){
							alert('ha');
						});
					})

				</script>


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
