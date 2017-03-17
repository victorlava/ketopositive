<?php
/**
 * Template Name: Blogas
 *
 * @package WordPress
 */

get_header(); ?>

  <main id="main"> 

  	  	<div class="container">
  		<div class="row">
		  	<header class="header header--top header--main header--line header--center"> 
				<h2 class="header-title"><span class="header-smaller">Naujienos</span> <?php if(single_tag_title()){ single_tag_title(); } else{ single_post_title(); } ?></h2>
			</header>
		</div> 

		<div class="row">
			<?php if ( have_posts() ) : ?>
			<div class="col-md-8 content-wrapper">
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-md-6">
					<div class="data-block data-block--offer data-block--article"> 
						<div class="data-block-image">
							<?php if ( has_post_thumbnail() ) : ?>
							    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							        <?php the_post_thumbnail('full'); ?>
							    </a>
							<?php else: ?>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/src/offer.jpg">
							<?php endif; ?>
					    </div>
						<div class="data-block-info">
							<a href="<?php echo esc_url( get_permalink()); ?>"><h3 class="title"><?php the_title(); ?></h3></a>
							<p><?php echo get_excerpt(); ?></p> 
							<div class="tag-links">  
								<?php the_tags(''); ?>
							</div>
						</div>
					</div>
					
				</div>
				<?php endwhile; ?>

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
			<?php endif; ?>

			<div class="sidebar col-md-4"> 
				<div class="data-block data-block--offer data-block--simple data-block--cloud data-block--hoveroff">
					<?php wp_tag_cloud( '' ); ?>
				</div>

					<?php
						$args = array(
							'post_type'              => array( 'hotels' ),
							'post_status'            => array( 'publish' ),
							'orderby'                => 'rand',
							'posts_per_page' 		 => 10
						);

						// The Query
						$getHotels = new WP_Query( $args );

						//echo "<pre>";
						//print_R($getHotels);
						//echo "</pre>";

					?>
				<?php if( $getHotels->have_posts() ): ?>
				<header class="header header--sidebar header--line"> 
					<h4 class="header-title">Turkijos viešbučių TOP10</h4>
				</header>

				<?php while( $getHotels->have_posts() ) : $getHotels->the_post(); ?>
				<div class="data-block data-block--offer data-block--hotels data-block--sidebar"> 
					<a href="<?php the_field('nuoroda'); ?>"> 
						<div class="data-block-image">
							<img src="<?php the_field('nuotrauka'); ?>">
						</div>
						<div class="data-block-info">
							<h4 class="title"><?php the_title();?></h4>
							<div class="stars">
								<?php $iterator = get_field('zvaigzduciu_skaicius'); $iterator = $iterator * 1; ?>
								<ul class="list list--inline">
									<?php for($i=0;$i < $iterator; $i++): ?>
										<li><i class="icon icon-star"></i></li>
									<?php endfor; ?>
								</ul>
							</div>
							<p class="time"><?php the_field('vieta'); ?></p>
						</div>
					</a>
				</div>
				<?php endwhile; ?>
				<?php endif;?>
				
			</div>
		</div>
	</div>

  </main><!-- #main -->

  <?php get_footer(); ?>