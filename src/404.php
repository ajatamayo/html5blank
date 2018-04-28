<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404">

				<div class="row">
					<div class="col s12 xl7">
						<h1><?php esc_html_e( 'Page not found', 'html5blank' ); ?></h1>
					</div>
				</div>

				<div class="row">
					<div class="col s12 m8 xl7">
						<h2>
							<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Return home?', 'html5blank' ); ?></a>
						</h2>
					</div>
				</div>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
