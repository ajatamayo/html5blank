<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<div class="col s12 m6 xl4">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="card">

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="card-image">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( 'thumbnail' ); ?>
						</a>
					</div>
				<?php endif; ?>

				<div class="card-content match-height">
					<h2 class="card-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h2>
					<p class="flow-text"><?php the_excerpt(); ?></p>
				</div>

				<div class="card-action">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e( 'View guide', 'html5blank' ); ?></a>
				</div>

			</div>

		</article>
	</div>

<?php endwhile; ?>

<?php else : ?>

	<article>
		<h2><?php esc_html_e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>

<?php endif; ?>
