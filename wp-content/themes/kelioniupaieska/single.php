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
			<?php while ( have_posts() ) : the_post(); ?>
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
					<div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
					  
				</article>



				<header class="header header--top header--line header--left"> 
					<h2 class="header-title"></h2>
				</header>

				<?php if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>

			</div>
		
		<?php endwhile; ?>
			
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