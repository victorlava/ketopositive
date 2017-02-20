<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 */
?><!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="author" content="Victor Lava" />
    <meta name="contact" content="hello@victorlava.com" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
 	<!--
	<link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all"> 
    <link rel="stylesheet" href="/assets/css/sprites.css">
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/assets/js/src/script.js"></script>-->

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
	<?php wp_head(); ?>
</head>

<body <?php body_class('test'); ?> >

	<nav class="navbar navbar--main">
	    <div class="navbar-top">
	      <div class="container">
	        <div class="row">

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
	                  	 <!--
	                    <?php for($i=0;$i < 4; $i++): ?>
	                    <div class="col-md-6">
	                      <?php include('partials/department.php'); ?>
	                    </div>
	                    <?php endfor; ?>-->
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
	              <!--<?php include('partials/work-days.php'); ?>-->
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
	      </div>
	  </div><!-- .navbar-top -->

	  <div class="navbar-bottom">
	    <div class="container">
	      <div class="row">
	        <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true">
	          <img class="navbar-close" src="<?php echo get_template_directory_uri(); ?>/assets/img/src/close.png" width="16" height="16"> 
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
	    </div>
	  </div><!-- .navbar-bottom -->

	</nav>
