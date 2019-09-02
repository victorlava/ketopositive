<?php
/**
 *
 * @package WordPress
 */

get_header(); ?>

  <main id="main">

  	  	<div class="container">
  		<div class="row">
		  	<header class="header header--top header--main header--line header--center">
				<h1 class="header-title">
                    <?php single_tag_title(); ?></h1>
			</header>
		</div>

		<div class="row">
			<?php if ( have_posts() ) : ?>
			<div class="col-md-8 content-wrapper">
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-md-6">
					<div class="data-block data-block--offer data-block--article">
						<div class="data-block-image">
							<?php if ( has_post_thumbnail() ) : ?>
							    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							        <?php the_post_thumbnail('full'); ?>
							    </a>
							<?php else: ?>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/src/offer.jpg">
							<?php endif; ?>
					    </div>
						<div class="data-block-info">
							<a href="<?php echo esc_url( get_permalink()); ?>">
								<h3 class="title"><?php the_title(); ?></h3>
								<span class="comment-count"><?php comments_number( '0', '1', '%' ); ?></span>
							</a>
							<p><?php echo get_excerpt(); ?></p>
							<div class="tag-links">
								<?php the_tags(''); ?>
							</div>
						</div>
					</div>

				</div>
				<?php endwhile; ?>

				<div class="col-md-12">
					<?php
						// Previous/next page navigation.
						the_posts_pagination( array(
							'prev_text'          => __( 'Atgal', 'twentyfifteen' ),
							'next_text'          => __( 'Sekantis', 'twentyfifteen' ),
							'screen_reader_text' => ' ',
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . ' </span>',
						) );
					?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>

  </main><!-- #main -->

  <?php get_footer(); ?>
