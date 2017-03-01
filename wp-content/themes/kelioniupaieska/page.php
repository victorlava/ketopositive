<?php
/**
 * Template Name: Post
 *
 * @package WordPress
 */

get_header(); ?>

  <main id="main"> 

  	<div class="container">
		<div class="row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="col-md-8">
				<header class="header header--top header--line header--left"> 
					<a href="<?php esc_url( get_permalink() ); ?>">
						<h2 class="header-title"><span class="header-smaller"><?php the_title(); ?></h2>
					</a>
				</header>
				<div class="tag-links">  
					<?php the_tags(''); ?>
				</div>
				<article class="article">
					<?php the_content(); ?>
				</article>
				<div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
			</div>
		<?php endwhile; endif; ?>

		</div>
	</div>

  </main><!-- #main -->

  <?php get_footer(); ?>