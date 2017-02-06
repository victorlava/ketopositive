
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
  		<header class="header header--main">
			<h2 class="header-title">Karščiausi kelionių pasiūlymai</h2> 
			<p class="header-sub-title">Atrinkome populiariausias kryptis ir geriausius viešbučius</p>
		</header>
  	</section>

  </main><!-- #main -->

  	<?php include('partials/email-cta.php'); ?>  

    <?php include('partials/footer.php'); ?>  