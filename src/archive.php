<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>

			<div class="row">
				<div class="col s12 xl7">
					<h1><?php esc_html_e( 'Archives', 'html5blank' ); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m8 xl7">
					<?php get_template_part( 'loop' ); ?>

					<?php get_template_part( 'pagination' ); ?>
				</div>
			</div>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
