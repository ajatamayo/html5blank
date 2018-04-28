<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>

			<div class="row">
				<div class="col s12 xl7">
					<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
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
