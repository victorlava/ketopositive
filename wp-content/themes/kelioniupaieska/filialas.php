
<?php include('partials/header.php'); ?> 

<body class="page">
  
  <?php include('partials/menu.php'); ?>

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
					<img class="box-shadow" src="/assets/img/src/content-image.jpg" width="903" height="426">
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
							08:00 - 18:00
						</div>
					</div>
					<p> <?php the_field('adresas'); ?></br>
						Tel.: <?php the_field('telefonas'); ?></br>
						Faks.: <?php the_field('faksas'); ?></br>
						El. paštas: <?php the_field('el-pastas'); ?></br>
						Darbo laikas: <?php the_field('darbo_dienos'); ?> : <?php the_field('darbo_valandos'); ?>
					</p>
					<p> P. Komunos g. 2 (šalia PC Technorama)</br>
						Tel.: (8-46) 257660</br>
						Faks.: (8-46) 257660</br>
						El. paštas: klaipeda@litamicus.lt</br>
						Darbo laikas: I - V : 9:00 - 18:00
					</p>
				</div>
				
			</div>
		</div>
	</div>

			
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
  </main><!-- #main -->

  	<?php include('partials/email-cta.php'); ?>  

    <?php include('partials/footer.php'); ?>  