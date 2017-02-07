
<?php include('partials/header.php'); ?> 

<body class="news">
  
  <?php include('partials/menu.php'); ?>

  <main id="main"> 

  	<div class="container">
  		<div class="row">
		  	<header class="header header--top header--main header--line header--center"> 
				<h2 class="header-title"><span>Naujienos</span> > Pigios kelionės</h2>
			</header>
		</div>

		<div class="row">
			<div class="col-md-8">
				<?php for($i=0; $i < 8; $i++): ?>
				<div class="col-md-6">
					<div class="data-block data-block--offer data-block--article"> 
						<a href="#"> 
							<div class="data-block-image">
								<img src="/assets/img/src/offer.jpg">
							</div>
							<div class="data-block-info">
								<h3 class="title">Patarimai, planuojantiems savo kelionę savarankiškai</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
								<div class="tag-links">  
									<a href="#">Egzotika</a>
									<a href="#">Pigios kelionės</a>
								</div>
							</div>
						</a>
					</div>
				</div>
				<?php endfor; ?>

				<div class="col-md-12">
					<div class="wp-pagenavi">
						<span class="current button">1</span>
						<a class="page larger button" href="#">2</a>
						<a class="page larger button" href="#">3</a>
						<a class="page larger button" href="#">4</a>
						<a class="nextpostslink button" rel="next" href="#">Kitas</a>
					</div>
				</div>
			</div>

			<div class="col-md-4"> 
				<div class="data-block data-block--offer data-block--simple data-block--hoveroff">
					tag cloud
				</div>

				
				<header class="header header--sidebar header--line"> 
					<h4 class="header-title">Turkijos viešbučių TOP10</h4>
				</header>
				<?php for($i=0; $i < 10; $i++): ?>
				<div class="data-block data-block--offer data-block--hotels data-block--sidebar"> 
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
				<?php endfor; ?>
				
			</div>
		</div>
	</div>

  </main><!-- #main -->

  	<?php include('partials/email-cta.php'); ?>  

    <?php include('partials/footer.php'); ?>  