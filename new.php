
<?php include('partials/header.php'); ?> 

<body class="new">
  
  <?php include('partials/menu.php'); ?>

  <main id="main"> 

  	<div class="container">
  		<div class="row">
		  	<header class="header header--line header--left"> 
				<h2 class="header-title"><span class="header-smaller">"FT" kviečia į Vilnių.</h2>
			</header>
			<div class="tag-links">  
				<a href="#">Egzotika</a>
				<a href="#">Pigios kelionės</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">
				<article>
					<div class="intro-text">
						Britų leidinys "Financial Times" ("FT") savo skaitytojams pristato Vilnių - Europos kultūros sostinę, kaip naują kelionių kryptį 2009 metais. Specialiame savaitgalio priede "How to Spend it" kovo 7 dieną išspausdintas straipsnis rekomenduoja aplankyti Lietuvos sostinę meno, kultūros ir prabangos mėgėjams.
					</div>
					<p>"How to Spend it" priedas leidžiamas kartą per mėnesį ir yra skirtas pasiturinčiai bei išsilavinusiai auditorijai. Vilnius jame aprašomas pirmą kartą. Straipsnio, pavadinto "Prabangaus ilgo savaitgalio gidas" autorius Nickas Haslamas skaitytojus supažindina su Lietuvos ir Vilniaus istorijos fragmentais, įvairialypiu kultūros ir architektūros paveldu. Būsimiems Vilniaus svečiams taip pat siūloma aplankyti muziejus, įvairias meno erdves, Lietuvos dizainerių studijas bei kruopščiai atrinktus sostinės viešbučius ir restoranus. "FT" savaitgalio numeris yra vienas skaitomiausių specializuotos spaudos leidinių Didžiojoje Britanijoje, jo bendrą auditoriją sudaro apie 550 tūkst. skaitytojų visame pasaulyje.</p>
					<h4>Vilniaus gidas prancūziškai</h4>
					<p>Paryžiuje bus pristatytas "Gallimard" leidyklos išleistas gidas "Vilnius žemėlapiuose" ("Cartoville Vilnius"). Tai pirmasis ir kol kas vienintelis gidas apie Vilnių prancūzų kalba. Beje, leidinyje trumpai apžvelgiami visi keturi mūsų šalies regionai. Leidykla "Gallimard" gidą "Vilnius žemėlapiuose", be prancūzų, išleido dar anglų ir norvegų kalbomis. Leidėjų teigimu, knygą bus galima įsigyti septynių Europos šalių knygynuose: prancūzų kalba - Prancūzijoje, Belgijoje, Šveicarijoje ir Liuksemburge, anglų - Jungtinėje Karalystėje ir Airijoje, norvegų - Norvegijoje. "Gido apie Vilnių išleidimas - didelis įvykis", - džiaugėsi Lietuvos turizmo informacijos centro Paryžiuje direktorė Inga Lanchas. - Iki šiol Prancūzijoje buvo galima rasti įvairių leidyklų gidų apie Baltijos šalis, dabar prancūzai galės naudotis atskiru gidu, skirtu Lietuvos sostinei. "Pasak direktorės, pastaruoju metu prancūzų susidomėjimas Lietuva, ypač sostine Vilniumi, smarkiai auga. 2008 metais į Vilnių atvyko 21,4 proc. daugiau prancūzų turistų negu 2007-aisiais.</p>

				</article>

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

				<header class="header header--sidebar header--line"> 
					<h4 class="header-title">Naujausi straipsniai</h4>
				</header>
				<div class="data-block data-block--news data-block--offer data-block--hoveroff"> 
					<?php for($i=0; $i < 3; $i++): ?>
				
						<div class="data-block-info">
							<a href="#"><h4 class="title">Kuršių Neriją pasieksime ne tik keltais, bet ir tiltu?</h4></a>
							<div class="tag-links">  
								<a href="#">Egzotika</a>
								<a href="#">Pigios kelionės</a>
							</div>
						</div>
					
					<?php endfor; ?>
				</div>

			</div>
		</div>
	</div>

  </main><!-- #main -->

  	<?php include('partials/email-cta.php'); ?>  

    <?php include('partials/footer.php'); ?>  