<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>

			<div class="row">
				<div class="col s12 xl7">
					<h1><?php single_cat_title(); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col s12 xl10">
					<div class="row">
						<?php get_template_part( 'loop', 'grid' ); ?>
					</div>
				</div>
			</div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
