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

						<?php preg_match_all( '|<h[^>]+>(.*)</h[^>]+>|iU', get_the_content(), $headings ); ?>

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

				<div class="col hide-on-small-only m4 xl3">
					<?php if ( !empty( $headings[1] ) ) : ?>
						<div class="toc-wrapper">
							<ul class="section table-of-contents">
							<?php foreach ( $headings[1] as $heading ) : ?>
								<li><a href="#<?php echo sanitize_title( $heading ); ?>"><?php echo $heading; ?></a></li>
							<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
