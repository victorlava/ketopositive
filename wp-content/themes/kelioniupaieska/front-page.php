<?php
/**
 * Template Name: Front-page
 *
 * @package WordPress
 */
 
get_header(); ?>

<?php 

	$destinations = file_get_contents('https://litamicus.waavo.com/webservice/travels_search_form/destinations');
	$destinations = json_decode($destinations);

	$last_minute = file_get_contents('https://litamicus.waavo.com/webservice/travels_lastminutes/prices/');
	$last_minute = json_decode($last_minute);

	//echo "<pre>";
	//print_R($last_minute);
	//echo "</pre>";

	function createDateRangeArray($strDateFrom,$strDateTo){
    // takes two dates formatted as YYYY-MM-DD and creates an
    // inclusive array of the dates between the from and to dates.

    // could test validity of dates here but I'm already doing
    // that in the main script

    $aryRange=array();

    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

    if ($iDateTo>=$iDateFrom)
    {
        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
        while ($iDateFrom<$iDateTo)
        {
            $iDateFrom+=86400; // add 24 hours
            array_push($aryRange,date('Y-m-d',$iDateFrom));
        }
    }
    return $aryRange;
}
$now = date('Y-m-d');
$after = date('Y-m-d', strtotime("+3 month"));
$dates = createDateRangeArray($now, $after);

?>

  <main id="main"> 

  	<div class="main-search">
		<div class="container">
	        <form action="http://kelioniupaieskawp.victorlava.com/tez-tour-keliones/" method="GET" role="form">
	        	<div class="main-search-inputs col-md-9">
		            <div class="input-group input-group--select">
		                <span class="input-group-addon">
		                	<i class="icon icon-location"></i>
		                </span>
		                <select class="selectpicker" name="city_id" title="Visi">
		                  <option selected disabled>Visi kurortai</option>
		                  <?php foreach($destinations->data as $destination): ?>
		                  <option value="<?php echo $destination->id; ?>"><?php echo $destination->full_name; ?></option>
		              	  <?php endforeach; ?>
		                </select> 
		            </div>

		            <div class="input-group input-group--select">
		                <span class="input-group-addon">
		                	<i class="icon icon-adults"></i>
		                </span>
		                <select class="selectpicker" name="adults">
		                  <option selected disabled>Suaugusieji</option>
		                  <option value="1">1</option>
		                  <option value="2">2</option>
		                  <option value="3">3</option>
		                  <option value="4">4</option>
		                  <option value="5">5</option>
		                  <option value="6">6</option>
		                </select> 
		            </div>

		            <div class="input-group input-group--select">
		                <span class="input-group-addon">
		                	<i class="icon icon-children"></i>
		                </span>
		                <select class="selectpicker" name="children">
		                  <option selected disabled>Vaikai</option>
		                  <option value="1">1</option>
		                  <option value="2">2</option>
		                  <option value="3">3</option>
		                  <option value="4">4</option>
		                </select> 
		            </div>

		             <div class="input-group input-group--select">
		                <span class="input-group-addon">
		                	<i class="icon icon-date"></i>
		                </span>
		                <input type="text" class="datepicker btn" value="Data" name="date">
		                <span class="bs-caret"><span class="caret"></span></span>
		            </div>
	            </div><!-- .main-search-inputs -->

	            <div class="main-search-submit col-md-3">
		        	<a href="#" class="js-add-url form-control button button--primary">Ieškoti</a>
	        	</div><!-- .main-search-submit -->
	        </form>
	        <script type="text/javascript">
	        jQuery(document).ready(function ($) {

	        	function form_url(base){
	        		$('.js-add-url').attr('href', base);
	        	}


	        	$('.datepicker').pickadate({
	        		monthsFull: ['Sausis', 'Vasaris', 'Kovas', 'Balandis', 'Gegužė', 'Birželis', 'Liepa', 'Rugpjūtis', 'Rugsėjis', 'Spalis', 'Lapkritis', 'Gruodis'],
					weekdaysShort: ['Pr', 'An', 'Tr', 'Ke', 'Pe', 'Še', 'Se'],
					format: 'yyyy-mm-dd',
					today: '',
					clear: '',
					close: '',
					onOpen: function(){
						$('.main-search').css('z-index', 55);
					},
					onClose: function(){
						setTimeout(function(){ $('.main-search').css('z-index', 0); }, 3000);
					}

	        	});

	 
	        	//http://kelioniupaieskawp.victorlava.com/tez-tour-keliones/?wurl=/teztour_search/search/departure_date:2017-03-18/departure_airport:VNO/duration:7/city_id:1688/adults:2/children:4/childage:5%7C20
	        	
	        	var base_url = 'http://kelioniupaieskawp.victorlava.com/tez-tour-keliones/?wurl=/teztour_search/search/',
		        	city_id = 2208,
		        	departure_airport = 'VNO',
		        	departure_date = '2017-06-06',
		        	adults = 2,
		        	children = 0,
		        	duration = '2-7';

	        	var full_url = base_url + 'city_id:' + city_id + '/departure_airport:' + 
	        				departure_airport + '/departure_date:' + departure_date + '/adults:' + adults + '/children:' +
	        				children + '/childage:5%7C20' + '/duration:' + duration;

	        	form_url(full_url);

	        	$('.selectpicker').on('change', function(){
	        		var value = $(this).val(),
	        			name = $(this).attr('name');
	        		if(name == 'city_id'){
	        			city_id = value;
	        		}
	        		else if(name == 'adults'){
	        			adults = value;
	        		}
	        		else if(name == 'children'){
	        			children = value;
	        		}
	        		else if(name == 'date'){
	        			departure_date = value;
	        		}
	        		full_url = base_url + 'city_id:' + city_id + '/departure_airport:' + 
	        				departure_airport + '/departure_date:' + departure_date + '/adults:' + adults + '/children:' +
	        				children + '/childage:5%7C20' + '/duration:' + duration;

	        		form_url(full_url);
	        	});

		        $('.selectpicker').selectpicker({
				  style: '',
				  size: 6
				}); 
		    });
	        </script>
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