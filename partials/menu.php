<nav class="navbar navbar--main">
    <div class="navbar-top">
      <div class="container">
        <a class="navbar-brand pull-left" href="/">
          KelioniuPaieska.lt
        </a> 

        <div class="navbar-top-right">
          <div class="navbar-top-menu">
            <!-- visible for desktops only -->
            <ul class="nav nav--secondary nav--dropdown list list--inline hidden-xs">
              <li class="active"> 
                <a href="#">Vizos</a>
              </li>
              <li>
                <a href="#">Autonuoma</a>
              </li>
              <li>
                <a href="#">Draudimas</a> 
              </li>
              <li class="dropdown">    
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kontaktai</a>
                <ul class="dropdown-menu">
                  <?php for($i=0;$i < 4; $i++): ?>
                  <div class="col-md-6">
                    <?php include('partials/department.php'); ?>
                  </div>
                  <?php endfor; ?>
                </ul>
              </li>
            </ul>

            <!-- visible for mobiles only (mobile menu) -->
            <ul class="nav nav--secondary nav--dropdown list list--inline visible-xs">
              <li class="active"> 
                <a href="#">Teztour keliones</a>
              </li>
              <li>
                <a href="#">Novaturo keliones</a>
              </li>
              <li>
                <a href="#">Viešbučiai</a> 
              </li>
            </ul>
          </div>

          <div class="navbar-top-phone">
            <!-- savaičių dienų partial -->
            <?php include('partials/work-days.php'); ?>
            <a href="tel:+37052124474">+370 5 212 4474</a>
          </div>

          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

        </div><!-- .navbar-top-right -->
      </div>
  </div><!-- .navbar-top -->

  <div class="navbar-bottom">
    <div class="container">
      <div id="navbar" class="navbar-collapse collapse in hidden-xs hidden-sm" aria-expanded="true">
        <ul class="nav nav--main navbar-nav">
          <li class="active"><a href="#">Top pasiūlymai</a></li>
          <li><a href="#about">TezTour kelionės</a></li>
          <li><a href="#about">Novaturo kelionės</a></li>
          <li><a href="#about">Pažintinės kelionės</a></li>
          <li><a href="#about">Tolimi kraštai</a></li>
          <li><a href="#about">Viešbučiai</a></li>
          <li><a href="#about">Keltų bilietai</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div><!-- .navbar-bottom -->

</nav>
