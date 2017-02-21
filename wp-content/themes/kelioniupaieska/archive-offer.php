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
				<h2 class="header-title">
					Top pasiūlymai
				</h2>
			</header>
		</div>
 
 		<?php
 			$currentTaxonomy = strtolower(single_term_title("", FALSE));

		 	$months = get_terms( array(
					   'taxonomy' => 'menesis',
					     'hide_empty' => false,
					     'order'	  => 'DESC',
					     'parent'    => 0
				) ); 
			?>

			<div class="offer-bar data-block data-block--simple data-block--hoveroff">
				<ul class="list list--inline">
					<?php foreach ($months as $month): ?>
					<li class="<?php if(strtolower($month->name) == $currentTaxonomy){ echo "active"; }?>">
						<a href="?menesis=<?php echo strtolower($month->name); ?>">
							<span><?php echo $month->name; ?></span>
							<span class="stylized-number"><?php echo $month->count; ?></span>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>

		<?php
			$args = array(
				'post_type'              => array( 'offer' ),
				'post_status'            => array( 'publish' ),
				'posts_per_page' => 26
			);

			$tax_query = array(
					        array(
					            'taxonomy' => 'menesis',
					            'field' => "slug",
					            'terms' => $currentTaxonomy 
					        )
					    );

			if($currentTaxonomy == TRUE){
				$args['tax_query'] = $tax_query;
			}

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