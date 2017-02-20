
<?php include('partials/header.php'); ?> 

<body class="offer">
  
  <?php include('partials/menu.php'); ?>

  <main id="main"> 

  	<div class="container">
  		<div class="row">
  			<header class="header header--top header--main header--center"> 
				<h2 class="header-title">Grand resort la deurfaux hotel</h2>
				<div class="stars">
					<ul class="list list--inline">
						<li><i class="icon icon-star"></i></li>
						<li><i class="icon icon-star"></i></li>
						<li><i class="icon icon-star"></i></li>
						<li><i class="icon icon-star"></i></li>
						<li><i class="icon icon-star"></i></li>
					</ul>
				</div>
			</header>
  		</div>
		<div class="row">
			<div class="col-md-8"> 
				<div id="hotel-carousel" class="carousel slide carousel--simple box-shadow" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				    
				   <?php for($b=0; $b < 4; $b++): ?>
				    <div class="item<?php if($b == 0){echo " active";}?>">
						<img class="box-shadow" src="/assets/img/src/offer-image.jpg" width="825" height="508">
				    </div>
					<?php endfor; ?>
				  </div>

				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <?php for($i=0; $i < 4; $i++): ?>
				  	<li data-target="#hotel-carousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo "active";}?>"></li>
				  	<?php endfor; ?>
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

				<article class="article">
					<p>Paryžiuje bus pristatytas "Gallimard" leidyklos išleistas gidas "Vilnius žemėlapiuose" ("Cartoville Vilnius"). Tai pirmasis ir kol kas vienintelis gidas apie Vilnių prancūzų kalba. Beje, leidinyje trumpai apžvelgiami visi keturi mūsų šalies regionai. Leidykla "Gallimard" gidą "Vilnius žemėlapiuose", be prancūzų, išleido dar anglų ir norvegų kalbomis. Leidėjų teigimu, knygą bus galima įsigyti septynių Europos šalių knygynuose: prancūzų kalba - Prancūzijoje, Belgijoje, Šveicarijoje ir Liuksemburge, anglų - Jungtinėje Karalystėje ir Airijoje, norvegų - Norvegijoje. "Gido apie Vilnių išleidimas - didelis įvykis", - džiaugėsi Lietuvos turizmo informacijos centro Paryžiuje direktorė Inga Lanchas. - Iki šiol Prancūzijoje buvo galima rasti įvairių leidyklų gidų apie Baltijos šalis, </p>
					<p>-- fb share --</p>
				</article>

				
				<div class="offer-form offer-form--long data-block data-block--simple data-block--hoveroff hidden-xs hidden-sm">
					<form> 
						<div class="row">
							<h3 class="title">Užsakykite kelionę</h3>
							<h3 class="sub-title">Graikija, Kreta, La Meridion Villon</h3>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="row">
									<?php include('partials/offer-form-list.php'); ?>
								</div>
							</div>
							<div class="col-md-4">
								   <?php include('partials/offer-form-price.php'); ?>		
							</div>
						</div>
					</form>
				</div>
				

			</div>

			<div class="sidebar col-md-4"> 

				<div class="offer-form offer-form--short data-block data-block--simple data-block--hoveroff"> 
					<h3 class="title">Graikija, Kreta</h3>
					<?php include('partials/offer-form-list.php'); ?>
					<?php include('partials/offer-form-price.php'); ?>
				</div>

				<header class="header header--sidebar header--line"> 
					<h4 class="header-title">Kiti pasiūlymai</h4>
				</header>
				<?php for($i=0; $i < 2; $i++): ?>
					<div class="data-block data-block--offer data-block--hoveroff">
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
				<?php endfor; ?>
			</div>
		</div>
	</div>

  </main><!-- #main -->

  	<?php include('partials/email-cta.php'); ?>  

    <?php include('partials/footer.php'); ?>  