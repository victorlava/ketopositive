
<?php include('partials/header.php'); ?> 

<body class="contact">
  
  <?php include('partials/menu.php'); ?>

  <main id="main"> 

  	<div class="container">
  		<div class="row">
		  	<header class="header header--top header--main header--line header--center"> 
				<h2 class="header-title">Kontaktai</h2>
			</header>
		</div>

	
			<div class="departments col-md-8">
				<?php for($i=0; $i < 4; $i++): ?>
				<div class="row">
					<div class="department-wrapper data-block data-block--offer data-block--simple data-block--hoveroff">
						<div class="col-md-6">
							<?php include('partials/department.php'); ?> 
						</div>
						<div class="col-md-6">
							<div class="gmap"></div>
						</div>
					</div>
				</div>
				<?php endfor; ?>
			</div>

			<div class="col-md-4"> 
				<div class="data-block data-block--offer data-block--simple data-block--hoveroff">
					<h4 class="title">Įmonės rekvizitai</h4>
					<p> Turizmo UAB „LITAMICUS“</br>
						A. Jakšto g. 7, LT-01105 Vilnius</br>
						Įmonės kodas 120053794</br>
						PVM kodas LT200537917</br>
						AB SEB BANKAS</br>
						A/S LT287044060001048358</br>
						AB SWED bankas
					</p>
				</div>

				<div>
					<header class="header header--sidebar header--line"> 
						<h4 class="header-title">Susisiekite</h4>
					</header>
					<form>
						<div class="form-group">
						    <label for="name">Vardas *</label>
						    <input type="text" id="name" placeholder="">
						 </div>

						 <div class="form-group">
						    <label for="name">El. paštas *</label>
						    <input type="text" id="email" placeholder="">
						 </div>

						 <div class="form-group">
						    <label for="name">Telefonas *</label>
						    <input type="text" id="telephone" placeholder="">
						 </div>

						 <div class="form-group">
						    <label for="name">Filialas</label>
						    <select>
			                  <option selected="">Centrinis filialas</option>
			                  <option value="1">1</option>
			                  <option value="2">2</option>
			                  <option value="3">3</option>
			                </select>
						 </div>

						 <div class="form-group">
						    <label for="name">Jūsų žinutė *</label>
						    <textarea id="message"></textarea>
						 </div>

						 <div class="form-group">
						     <input type="submit" class="form-control button button--primary" value="Išsiųsti">
						 </div>
					</form> 
				</div>
			</div>
		
	</div>

  </main><!-- #main -->

  	<?php include('partials/email-cta.php'); ?>  

    <?php include('partials/footer.php'); ?>  