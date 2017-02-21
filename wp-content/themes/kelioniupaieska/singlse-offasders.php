<?php
/**
 * Template Name: Offers
 *
 * @package WordPress
 */

get_header(); ?>
   
  <main id="main"> 
 
  	<div class="container">
  		<div class="row">
		  	<header class="header header--top header--main header--line header--center"> 
				<h2 class="header-title"><?php the_title(); ?> <?php echo get_post_type(); ?></h2>
			</header>
		</div>
 
		<div class="offer-bar data-block data-block--simple data-block--hoveroff">
			<ul class="list list--inline">
				<li class="active">
					<a href="#">
						<span>Sausis</span>
						<span class="stylized-number">12</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Vasaris</span>
						<span class="stylized-number">12</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Kovas</span>
						<span class="stylized-number">12</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Balandis</span>
						<span class="stylized-number">12</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Gegužė</span>
						<span class="stylized-number">12</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Birželis</span>
						<span class="stylized-number">12</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Liepa</span>
						<span class="stylized-number">6</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Rugpjūtis</span>
						<span class="stylized-number">31</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Rugsėjis</span>
						<span class="stylized-number">12</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Spalis</span>
						<span class="stylized-number">2</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Lapkritis</span>
						<span class="stylized-number">8</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span>Gruodis</span>
						<span class="stylized-number">12</span>
					</a>
				</li>
			</ul>
		</div>

		<?php
			$args = array(
				'post_type'              => array( 'offer' ),
				'post_status'            => array( 'publish' ),
				'posts_per_page' => 4
			);

			// The Query
			$getOffers = new WP_Query( $args );

		?>
		<?php if( $getOffers->have_posts() ): ?>	
		<div class="row">
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
		<?php endif; ?>

		<div class="row">
			<div class="col-md-12">
				<?php
						// Previous/next page navigation.
						the_posts_pagination( array(
							'prev_text'          => __( 'Atgal', 'twentyfifteen' ),
							'next_text'          => __( 'Sekantis', 'twentyfifteen' ),
							'screen_reader_text' => ' ', 
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . ' </span>',
						) );
					?>
			</div>
		</div>
	</div>

  </main><!-- #main -->

<?php get_footer(); ?>