
<?php include('partials/header.php'); ?> 

<body class="offers">
  
  <?php include('partials/menu.php'); ?>

  <main id="main"> 

  	<div class="container">
  		<div class="row">
		  	<header class="header header--top header--main header--line header--center"> 
				<h2 class="header-title">Top pasiūlymai</h2>
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

		<div class="row">
			<?php for($i=0;$i < 18; $i++): ?>
			<div class="col-md-4">
				<div class="data-block data-block--offer">
					<a href="#"> 
						<div class="data-block-image">
							<img src="/assets/img/src/offer.jpg">
						</div>
						<div class="data-block-info">
							<h4 class="title">Lou' Lou' a Beach Resort</h4>
							<time datetime="2001-05-15T19:00">2017 Gegužės 24</time>
							<div class="price-wrapper">
								<div class="align align--vertical">
									<p>539€</p>
									<p class="old-price">1039€</p>
								</div>
							</div>
							<div class="included">
								<ul class="list list--inline">
									<li><i class="icon icon-bed"></i> 7 nakvynės</li>
									<li><i class="icon icon-drink"></i> Viskas įskaičiuota</li>
								</ul>
							</div>
						</div>
					</a>
				</div>
			</div>
			<?php endfor; ?>

		</div>

		<div class="row">
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
	</div>

  </main><!-- #main -->

  	<?php include('partials/email-cta.php'); ?>  

    <?php include('partials/footer.php'); ?>  