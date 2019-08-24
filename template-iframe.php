<?php
/**
 * Template Name: Iframe
 *
 * @package WordPress
 */

get_header(); ?>

  <main id="main"> 

  	<div class="container">
		<div class="row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="col-md-12">
				<header class="header header--top header--line header--left"> 
					<a href="<?php esc_url( get_permalink() ); ?>">
						<h2 class="header-title"><span class="header-smaller"><?php the_title(); ?></h2>
					</a>
				</header>
				<div class="tag-links">  
					<?php the_tags(''); ?>
				</div>
				<article class="article">
					<div class="intro-text">
						<?php the_excerpt(); ?>
					</div>
					<?php the_content(); ?>
					  
					  <!-- Your like button code -->
					  <div class="fb-like" 
					    data-href="<?php echo get_permalink(); ?>" 
					    data-layout="standard" 
					    data-action="like" 
					    data-show-faces="true">
					  </div>
					  
				</article>
				<header class="header header--top header--line header--left"> 
					<h2 class="header-title"></h2>
				</header>

			</div>
		<?php endwhile; endif; ?>
		</div>
	</div>

  </main><!-- #main -->

  <?php get_footer(); ?>