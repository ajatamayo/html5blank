<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>

			<div class="row">
				<div class="col s12">
					<h1><?php single_cat_title(); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col s12">
					<ul class="row">
						<?php get_template_part( 'loop', 'grid' ); ?>
					</ul>
				</div>
			</div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
