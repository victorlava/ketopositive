<?php
/**
 * The main template file
 *
 * @package WordPress
 */

get_header(); ?>

  <main id="main"> 

  	<div class="main-search">
		<div class="container">
	        <form role="form">
	        	<div class="main-search-inputs col-md-9">
		            <div class="input-group input-group--select">
		                <span class="input-group-addon">
		                	<i class="icon icon-location"></i>
		                </span>
		                <select class="form-control">
		                  <option selected disabled>Visi kurortai</option>
		                  <option value="turkija">Turkija</option>
		                  <option value="egiptas">Egiptas</option>
		                  <option value="bulgarija">Bulgarija</option>
		                </select> 
		            </div>

		            <div class="input-group input-group--select">
		                <span class="input-group-addon">
		                	<i class="icon icon-adults"></i>
		                </span>
		                <select class="form-control">
		                  <option selected disabled>Suaugusieji</option>
		                  <option value="1">1</option>
		                  <option value="2">2</option>
		                  <option value="3">3</option>
		                </select> 
		            </div>

		            <div class="input-group input-group--select">
		                <span class="input-group-addon">
		                	<i class="icon icon-children"></i>
		                </span>
		                <select class="form-control">
		                  <option selected disabled>Vaikai</option>
		                  <option value="1">1</option>
		                  <option value="2">2</option>
		                  <option value="3">3</option>
		                </select> 
		            </div>

		             <div class="input-group input-group--select">
		                <span class="input-group-addon">
		                	<i class="icon icon-date"></i>
		                </span>
		                <select class="form-control">
		                  <option selected disabled>Data</option>
		                  <option value="1">2015-05-01</option>
		                  <option value="2">2015-05-02</option>
		                  <option value="3">2015-05-03</option>
		                </select> 
		            </div>
	            </div><!-- .main-search-inputs -->

	            <div class="main-search-submit col-md-3">
		        	<input type="submit" class="form-control button button--primary" value="Ieškoti">
	        	</div><!-- .main-search-submit -->
	        </form>
		 </div>      
  	</div><!-- .main-search -->

	<?php
		$args = array(
			'post_type'              => array( 'offer' ),
			'post_status'            => array( 'public' ),
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
						<a href="<?php get_permalink();?>"> 

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
				<a href="#" class="button button--long button--center">Žiūrėti visus pasiūlymus</a>
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
					<ul class="nav nav--secondary nav--carousel-selectors list list--inline">
						<li class="active">
							<a href="#">Turkija</a>
						</li>
						<li>
							<a href="#">Graikija</a>
						</li>
						<li>
							<a href="#">Bulgarija</a>
						</li>
						<li>
							<a href="#">Egiptas</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="row">

				<div id="hotel-carousel" class="carousel slide" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				    
				    <div class="item active">
				    	<?php for($i=0;$i < 6; $i++): ?>
				    	<div class="col-md-2">
				    		<div class="data-block data-block--offer data-block--hotels"> 
								<a href="#"> 
									<div class="data-block-image">
										<img src="/assets/img/src/offer.jpg">
									</div>
									<div class="data-block-info">
										<h4 class="title">Bcn Paseo De Gracia Rocamora </h4>
										<div class="stars">
											<ul class="list list--inline">
												<li><i class="icon icon-star"></i></li>
												<li><i class="icon icon-star"></i></li>
												<li><i class="icon icon-star"></i></li>
												<li><i class="icon icon-star"></i></li>
											</ul>
										</div>
										<p class="time">Alanija, Turkija</p>
									</div>
								</a>
							</div>
				    	</div>
				    	<?php endfor; ?>
				    </div>

				    <div class="item">
				    	<?php for($i=0;$i < 6; $i++): ?>
				    	<div class="col-md-2">
				    		<div class="data-block data-block--offer data-block--hotels"> 
								<a href="#"> 
									<div class="data-block-image">
										<img src="/assets/img/src/offer.jpg">
									</div>
									<div class="data-block-info">
										<h4 class="title">Bcn Paseo De Gracia Rocamora </h4>
										<div class="stars">
											<ul class="list list--inline">
												<li><i class="icon icon-star"></i></li>
												<li><i class="icon icon-star"></i></li>
												<li><i class="icon icon-star"></i></li>
												<li><i class="icon icon-star"></i></li>
											</ul>
										</div>
										<p class="time">Alanija, Turkija</p>
									</div>
								</a>
							</div>
				    	</div>
				    	<?php endfor; ?>
				    </div>

				    <div class="item">
				    	<?php for($i=0;$i < 6; $i++): ?>
				    	<div class="col-md-2">
				    		<div class="data-block data-block--offer data-block--hotels"> 
								<a href="#"> 
									<div class="data-block-image">
										<img src="/assets/img/src/offer.jpg">
									</div>
									<div class="data-block-info">
										<h4 class="title">Bcn Paseo De Gracia Rocamora </h4>
										<div class="stars">
											<ul class="list list--inline">
												<li><i class="icon icon-star"></i></li>
												<li><i class="icon icon-star"></i></li>
												<li><i class="icon icon-star"></i></li>
												<li><i class="icon icon-star"></i></li>
											</ul>
										</div>
										<p class="time">Alanija, Turkija</p>
									</div>
								</a>
							</div>
				    	</div>
				    	<?php endfor; ?>
				    </div>
				  </div>

				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#hotel-carousel" data-slide-to="0" class="active"></li>
				    <li data-target="#hotel-carousel" data-slide-to="1"></li>
				    <li data-target="#hotel-carousel" data-slide-to="2"></li>
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

  </main><!-- #main -->

  <?php get_footer(); ?>