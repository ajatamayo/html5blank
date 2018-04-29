<!-- sidebar -->
<aside class="sidebar" role="complementary">
	<div class="row">
		<div class="col s12 xl7">
			<?php get_template_part( 'searchform' ); ?>

			<div class="sidebar-widget">
				<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'widget-area-1' ) ) ?>
			</div>

			<div class="sidebar-widget">
				<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'widget-area-2' ) ) ?>
			</div>
		</div>
	</div>
</aside>
<!-- /sidebar -->
