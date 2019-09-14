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

	<section class="footer section">
        <?php get_template_part( 'partials/email' ); ?>

		<footer>
				<div class="footer-top row">
		        	<div class="container">
		        		<div class="col-md-3">
		        			<div class="footer-block">
		        				<header class="header header--line header--left">
		        					<h4 class="header-title">About KetoPositive.me</h4>
		        				</header>
                                <p>Our goal is to motivate you and explore delicious recipes to start your life-changing keto journey. Explore tasty keto recipes and start your weight loss journey in a fun and approachable way possible. </p>
		        			</div>
		        		</div>

		        		<div class="col-md-3">
		        			<div class="footer-block">
		        				<header class="header header--line header--left">
		        					<h4 class="header-title">Main</h4>
		        				</header>
                                <ul class="list list--links">
	        						<?php
				        				$defaults = array(
										    'theme_location'  => 'footer_2',
										    'echo'            => true,
										    'fallback_cb'     => 'wp_page_menu',
										    'items_wrap'      => '%3$s'
										);

			        				?>

			        				<?php wp_nav_menu( $defaults ); ?>
		        			</div>
		        		</div>


		        		<div class="col-md-3">
		        			<div class="footer-block">
		        				<header class="header header--line header--left">
		        					<h4 class="header-title">Recipes</h4>
		        				</header>
			        			<ul class="list list--links">
	        						<?php
				        				$defaults = array(
										    'theme_location'  => 'footer_3',
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
		        					<h4 class="header-title">Popular</h4>
		        				</header>
			        			<ul class="list list--links">
			        				<?php
				        				$defaults = array(
										    'theme_location'  => 'footer_4',
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
	        				<a href="#">KetoPositive.me</a> © <?php echo date('Y'); ?> All rights reserved.
	        			</div>
                        <div class="footer-bottom-menu pull-left">
                            <ul>
                                <?php
                                    $defaults = array(
                                        'theme_location'  => 'footer_copyright',
                                        'container'		  => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'items_wrap'      => '%3$s'
                                    );

                                ?>

                                <?php wp_nav_menu( $defaults ); ?>
                            </ul>
                        </div>
	        			<div class="footer-social pull-right">
	        					<li>
                                    <a href="<?php the_field('instagram', 'option'); ?>" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_field('youtube', 'option'); ?>" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_field('pinterest', 'option'); ?>" target="_blank">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_field('facebook', 'option'); ?>" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
	        				</ul>
	        			</div>
	    			</div>
	    		</div>
	    </footer>
	</section>

<?php wp_footer(); ?>

</body>
</html>
