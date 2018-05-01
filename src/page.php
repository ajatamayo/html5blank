<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>

			<div class="row">
				<div class="col s12 xl7">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m8 xl7">

				<?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php $headings = get_headings( get_the_content() ); ?>

						<?php the_content(); ?>

						<?php comments_template( '', true ); // Remove if you don't want comments. ?>

						<br class="clear">

						<?php edit_post_link(); ?>

					</article>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else : ?>

					<!-- article -->
					<article>

						<h2><?php esc_html_e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

					</article>
					<!-- /article -->

				<?php endif; ?>

				</div>

				<div class="col hide-on-small-only m4 xl3 offset-xl1">
					<?php table_of_contents( $headings ); ?>
				</div>
			</div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
