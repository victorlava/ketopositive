<?php
/**
 * The template for displaying the footer
 * @package WordPress
 */

	$args = array(
		'post_type'              => array( 'branch' ),
		'post_status'            => array( 'public' )
	);

	// The Query
	$getDepartments = new WP_Query( $args );

		
?>
	<?php get_template_part( 'partials/email' ); ?>  
	
	<section class="footer section">
		<footer>
				<div class="footer-top row">
		        	<div class="container">
		        		<div class="col-md-3">
		        			<div class="footer-block">
		        				<header class="header header--line header--left">
		        					<h4 class="header-title">Apie kelioniupaieska.lt</h4>
		        				</header>
			        			<p>Profesionalų komanda, sukaupusi ilgametę patirtį ir padedanti įsigyti keliones į bet kurį pasaulio kraštą. Siūlome aviabilietus, traukinių, autobusų, keltų bilietus, viešbučius visame pasaulyje. Mūsų biuruose gausite išsamią, tikslią ir naujausią informaciją.</p>
		        			</div>
		        		</div>
		        		
		        		<div class="col-md-3">
		        			<div class="footer-block">
		        				<header class="header header--line header--left">
		        					<h4 class="header-title">Agentūros filialai</h4>
		        				</header>
		        				<?php if( $getDepartments->have_posts() ): ?>
		        				<ul class="list list--phones">
		        					<?php while( $getDepartments->have_posts() ) : $getDepartments->the_post(); ?>
		        					<?php 
		        						$telephone = get_field('telefonas');
		        						$telephone = str_replace(array(' ', '(', ')', '-'), '', $telephone);
		        					?>
		        					<li><a href="call:<?php echo $telephone; ?>"><strong><?php the_field('miestas'); ?>:</strong> <?php the_field('telefonas'); ?></a></li>
		        					<?php endwhile; ?>
		        				</ul>
		        				<?php endif;?>
								<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
		        			</div>
		        		</div>


		        		<div class="col-md-3">
		        			<div class="footer-block">
		        				<header class="header header--line header--left">
		        					<h4 class="header-title">Naudinga informacija</h4>
		        				</header>
			        			<ul class="list list--links">
	        						<?php 
				        				$defaults = array(
										    'theme_location'  => 'naudinga',
										    'echo'            => true,
										    'fallback_cb'     => 'wp_page_menu',
										    'items_wrap'      => '%3$s'
										);
				
			        				?>

			        				<?php wp_nav_menu( $defaults ); ?>
		        				</ul>
		        			</div>
		        		</div>

		        		<div class="col-md-3">
		        			<div class="footer-block">
		        				<header class="header header--line header--left">
		        					<h4 class="header-title">Kelionės</h4>
		        				</header>
			        			<ul class="list list--links">
			        				<?php 
				        				$defaults = array(
										    'theme_location'  => 'keliones',
										    'container'		  => '',
										    'echo'            => true,
										    'fallback_cb'     => 'wp_page_menu',
										    'items_wrap'      => '%3$s'
										);
				
			        				?>

			        				<?php wp_nav_menu( $defaults ); ?>
		        				</ul>
		        			</div>
		        		</div>
		        	</div> 
	    		</div>

	    		<div class="footer-bottom">
	    			<div class="container">
	    				<div class="footer-copyright pull-left">
	        				Kelioniupaieska.lt ® 2016
	        			</div>
	        			<div class="footer-social pull-right"> 
	        					<li><a href="<?php echo get_theme_mod('social_setting'); ?>" class="facebook"><i class="icon"></i></a></li>
	        					<li><a href="<?php echo get_theme_mod('social_setting2'); ?>" class="google"><i class="icon"></i></a></li>
	        					<li><a href="<?php echo get_theme_mod('social_setting3'); ?>" class="instagram"><i class="icon"></i></a></li>
	        				</ul>
	        			</div>
	    			</div>
	    		</div>
	    </footer>
	</section>
 
<?php wp_footer(); ?>

</body>
</html>
