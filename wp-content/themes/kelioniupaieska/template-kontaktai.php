<?php
/**
 * Template Name: Kontaktai
 *
 * @package WordPress
 */ 

get_header(); ?>
   
  <main id="main"> 

  	 <?php 
	if ( ! empty( $_POST ) ) {

	    //echo "<pre>";
	    //print_R($_POST);
	    //echo "</pre>";

	    $first_name = TRUE;
	    $filialas = TRUE;
	    $phone = TRUE;
	    $email = TRUE;
	    $message = TRUE;
	    $hideForm = FALSE;

	    if($_POST['first_name'] != ''){$first_name = FALSE;}
	    if($_POST['phone'] != ''){$phone = FALSE;}
	    if($_POST['email'] != ''){$email = FALSE;}
	    if($_POST['filialas'] != ''){$filialas = FALSE;}
	    if($_POST['message'] != ''){$message = FALSE;}

	    if($first_name == FALSE && 
	       $filialas == FALSE && 
	       $phone == FALSE &&
	       $email == FALSE && 
	       $message == FALSE){

	       $hideForm = TRUE;

	       $message = "";
	       $message = $_POST['message'] . "\r\n";
	       $message .= "\r\n";
	       $message .= "Vardas: " . $_POST['first_name'] . "\r\n";
	       $message .= "Tel. numeris: " . $_POST['phone'] . "\r\n";
	       $message .= "El. paštas: " . $_POST['email'] . "\r\n";
	       $message .= "Filialas: " . $_POST['filialas'] . "\r\n";
 
	       //$headers = array('From: ieska.lt <info@ieska.lt>');
	       $headers = array('');

	       $mailResult = false;

	       $mailResult = wp_mail('hello@victorlava.com', 'Naujas užklausa', $message, $headers);
	       //$mailResult = wp_mail($_POST['filialas'], 'Naujas užklausa', $message, $headers);
	      

	    }
	    else{
	        
	    }
	    /* name required */
	    /* email required */
	    /* sub category required */

	    // Sanitize the POST field
	    // Generate email content
	    // Send to appropriate email
	}

 ?>

  	<div class="container">
  		<div class="row">
		  	<header class="header header--top header--main header--line header--center"> 
				<h2 class="header-title"><?php the_title(); ?></h2>
			</header>
		</div>

			<?php
				$args = array(
					'post_type'              => array( 'branch' ),
					'post_status'            => array( 'publish' )
				);

				// The Query
				$getDepartments = new WP_Query( $args );

			?>
			<?php if( $getDepartments->have_posts() ): ?>
			<div class="departments col-md-8">
				<?php while( $getDepartments->have_posts() ) : $getDepartments->the_post(); ?>
				<div class="row">
					<div class="department-wrapper data-block data-block--offer data-block--simple data-block--hoveroff">
						<div class="col-md-6">
							<div class="department">
								<a href="<?php the_permalink();?>">	
									<h5 class="title">
										<?php the_field('miestas'); ?>
									</h5>
								</a>
								<div class="work-days">
									<div class="work-days-list">
										<ul class="list list--inline">
											<li class="active"></li>
											<li class="active"></li>
											<li class="active"></li>
											<li class="active"></li>
											<li class="active"></li>
											<li class=""></li>
											<li class=""></li>
										</ul>
									</div>
									<div class="work-days-title">
										<?php the_field('darbo_valandos'); ?>
									</div>
								</div>
								<p> <?php the_field('adresas'); ?></br>
									Tel.: <?php the_field('telefonas'); ?></br>
									Faks.: <?php the_field('faksas'); ?></br>
									El. paštas: <?php the_field('el_pastas'); ?></br>
									Darbo laikas: <?php the_field('darbo_dienos'); ?> : <?php the_field('darbo_valandos'); ?>
								</p>
							</div>
						</div>
						<div class="col-md-6">
							<?php $location = get_field('zemelapis'); ?>

							<?php if( !empty($location) ): ?>
							<div class="acf-map gmap">
								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>

			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjPWSM0OMLF1b_LeztaVJmqxoqqmBZ4_8"></script>
			<script type="text/javascript">
			(function($) {

			/*
			*  new_map
			*
			*  This function will render a Google Map onto the selected jQuery element
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	4.3.0
			*
			*  @param	$el (jQuery element)
			*  @return	n/a
			*/

			function new_map( $el ) {
				
				// var
				var $markers = $el.find('.marker');
				
				
				// vars
				var args = {
					zoom		: 16,
					center		: new google.maps.LatLng(0, 0),
					mapTypeId	: google.maps.MapTypeId.ROADMAP
				};
				
				
				// create map	        	
				var map = new google.maps.Map( $el[0], args);
				
				
				// add a markers reference
				map.markers = [];
				
				
				// add markers
				$markers.each(function(){
					
			    	add_marker( $(this), map );
					
				});
				
				
				// center map
				center_map( map );
				
				
				// return
				return map;
				
			}

			/*
			*  add_marker
			*
			*  This function will add a marker to the selected Google Map
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	4.3.0
			*
			*  @param	$marker (jQuery element)
			*  @param	map (Google Map object)
			*  @return	n/a
			*/

			function add_marker( $marker, map ) {

				// var
				var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

				var icon = {
		            url: "<?php echo get_template_directory_uri(); ?>/assets/img/src/location-gmap.png"
		        };
				// create marker
				var marker = new google.maps.Marker({
					position	: latlng,
					map			: map,
					icon		: icon
				});

				// add to array
				map.markers.push( marker );

				// if marker contains HTML, add it to an infoWindow
				if( $marker.html() )
				{
					// create info window
					var infowindow = new google.maps.InfoWindow({
						content		: $marker.html()
					});

					// show info window when marker is clicked
					google.maps.event.addListener(marker, 'click', function() {

						infowindow.open( map, marker );

					});
				}

			}

			/*
			*  center_map
			*
			*  This function will center the map, showing all markers attached to this map
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	4.3.0
			*
			*  @param	map (Google Map object)
			*  @return	n/a
			*/

			function center_map( map ) {

				// vars
				var bounds = new google.maps.LatLngBounds();

				// loop through all markers and create bounds
				$.each( map.markers, function( i, marker ){

					var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

					bounds.extend( latlng );

				});

				// only 1 marker?
				if( map.markers.length == 1 )
				{
					// set center of map
				    map.setCenter( bounds.getCenter() );
				    map.setZoom( 16 );
				}
				else
				{
					// fit to bounds
					map.fitBounds( bounds );
				}

			}

			/*
			*  document ready
			*
			*  This function will render each map when the document is ready (page has loaded)
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	5.0.0
			*
			*  @param	n/a
			*  @return	n/a
			*/
			// global var
			var map = null;

			$(document).ready(function(){

				$('.acf-map').each(function(){

					// create map
					map = new_map( $(this) );

				});

			});

			})(jQuery);
			</script>
			<?php endif;?>
			<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

			<div class="col-md-4"> 
				<div class="data-block data-block--offer data-block--simple data-block--hoveroff">
					<h4 class="title">Įmonės rekvizitai</h4>
					<p><?php echo get_post_field('post_content', $post->ID); ?></p>
				</div>

				<div id="susisiekite">
					<header class="header header--sidebar header--line"> 
						<h4 class="header-title">Susisiekite</h4>
					</header>
					<form action="<?php get_permalink(); ?>#susisiekite" method="POST">
					<?php if($filialas == TRUE): ?>
					<div class="error error--block error--red">
						Prašome pasirinkti filialą
					</div>
					<?php endif; ?>

					<?php if($hideForm == TRUE): ?>
					<div class="error error--block error--green">
						Žinutė sėkmingai išsiųsta!
					</div>
					<?php endif; ?>
						<div class="form-group">
						    <label for="name">Vardas *</label>
						    <input type="text" id="first_name" name="first_name" placeholder="" value="<?php echo $_POST['first_name']; ?>" required>
						 </div>

						 <div class="form-group">
						    <label for="name">El. paštas *</label>
						    <input type="email" id="email" name="email" placeholder="" value="<?php echo $_POST['email']; ?>" required>
						 </div>

						 <div class="form-group">
						    <label for="name">Telefonas *</label>
						    <input type="text" id="phone" name="phone" placeholder="" value="<?php echo $_POST['phone']; ?>" required>
						 </div>

						 <div class="form-group">
						    <label for="name">Filialas</label>
						    <select id="filialas" name="filialas">
			                  <option selected="">Pasirinkite filialą</option>
			                  <?php if( $getDepartments->have_posts() ): ?>
							  <?php while( $getDepartments->have_posts() ) : $getDepartments->the_post(); ?>
			                  	<option value="<?php the_field('el_pastas'); ?>"><?php the_title(); ?></option>
			                  <?php endwhile; ?>
			             	  <?php endif; ?>
			                </select>
						 </div>

						 <div class="form-group">
						    <label for="name">Jūsų žinutė *</label>
						    <textarea id="message" name="message" required><?php echo $_POST['message']; ?></textarea>
						 </div>

						 <div class="form-group">
						     <input type="submit" class="form-control button button--primary" value="Išsiųsti">
						 </div>
					</form> 
				</div>
			</div>
		
	</div>

  </main><!-- #main -->

<?php get_footer(); ?>