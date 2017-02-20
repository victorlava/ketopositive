<?php
/**
 * Branch
 *
 * @package WordPress
 */

get_header(); ?>
   
  <main id="main"> 

  	<div class="container">
  		<div class="row">
		  	<header class="header header--top header--main header--line header--center"> 
				<h2 class="header-title"><?php the_title(); ?></h2>
			</header>
		</div>

		<div class="row">
			<div class="col-md-8">
				<article class="article"> 
					<?php echo get_post_field('post_content', $post->ID); ?>
					<img class="box-shadow" src="<?php the_field('nuotrauka'); ?>" width="903" height="426">
				</article>
			</div>

			<div class="sidebar col-md-4"> 
				<div class="data-block data-block--offer data-block--simple data-block--hoveroff">
					<h4 class="title">Kontaktai</h4>
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
		</div>
	</div>

		<?php $location = get_field('zemelapis'); ?>

		<?php if( !empty($location) ): ?>
		<div class="acf-map gmap">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
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
		<?php endif; ?>

<!--
		
	<div id="gmap" class="gmap">
		
	</div>

	<script>
      function initMap() {
        var uluru = {lat: 54.6921976, lng: 25.2929409};
        var map = new google.maps.Map(document.getElementById('gmap'), {
          zoom: 15,
          center: uluru
        });

        var icon = {
            url: "/assets/img/src/location-gmap.png"
        };

        var marker = new google.maps.Marker({
            position: {lat: 54.6921976, lng: 25.2929409},
            map: map,
            zoom: 1,
            icon: icon
        });

      }
    </script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjPWSM0OMLF1b_LeztaVJmqxoqqmBZ4_8&amp;callback=initMap"></script>
  -->
  </main><!-- #main -->

<?php get_footer(); ?>