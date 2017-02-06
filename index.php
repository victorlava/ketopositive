
<?php include('partials/header.php'); ?> 

<body class="home">
  
  <?php include('partials/menu.php'); ?>

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

  	<section class="section">
  		<div class="container">
	  		<div class="row">
	  			<header class="header header--main header--line header--center">
					<h2 class="header-title">Karščiausi kelionių pasiūlymai</h2> 
					<p class="header-sub-title">Atrinkome populiariausias kryptis ir geriausius viešbučius</p>
				</header>
	  		</div>

			<div class="row">
				<?php for($i=0;$i < 6; $i++): ?>
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
				<a href="#" class="button button--long button--center">Žiūrėti visus pasiūlymus</a>
			</div>
		</div>
  	</section>

  	<section class="section favourite-hotels">
  		
			<div class="row">
				<header class="header header--main header--line header--center">
					<h2 class="header-title">Mėgstamiausi mūsų keliautojų viešbučiai</h2> 
					<p class="header-sub-title">Jūsų rinktinės vietos</p>
				</header>
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
				    <i class="icon icon-left align"></i>
				  </a>
				  <a class="right carousel-control" href="#hotel-carousel" role="button" data-slide="next">
				     <i class="icon icon-left align"></i>
				  </a>
				</div>
			</div>
		

  	</section>

  	<section class="section">
  		<div class="container">
			<div class="row">
				<header class="header header--main header--line header--center">
					<h2 class="header-title">Populiariausios poilsinių kelionių kryptys</h2> 
					<p class="header-sub-title">Išsirinkite savo atostogų kryptį</p>
				</header>
			</div>

			<div class="row">
				<?php for($i=0;$i < 4; $i++): ?>
				<div class="col-md-6">
					<div class="direction-block">
						<a href="#">
							<img src="/assets/img/src/direction.jpg">
							<header class="header header--main align align--vertical">
								<h2 class="header-title">Maljorka</h2> 
								<p class="header-sub-title">Gražiausia Balearų sala</p>
							</header>
						</a>
					</div>
				</div>
				<?php endfor; ?>
			</div>
		</div>

  	</section>

  </main><!-- #main -->

  	<?php include('partials/email-cta.php'); ?>  

    <?php include('partials/footer.php'); ?>  