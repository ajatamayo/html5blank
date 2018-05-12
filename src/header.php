<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' | '; } ?><?php bloginfo( 'name' ); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">

		<?php wp_head(); ?>
		<script>
		// conditionizr.com
		// configure environment tests
		conditionizr.config({
			assets: '<?php echo esc_url( get_template_directory_uri() ); ?>',
			tests: {}
		});
		</script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">
				<?php $image_src = wp_get_attachment_url( get_theme_mod( 'html5blank_banner' ) ); ?>
				<?php if ( !empty( $image_src ) ) : ?>
					<div class="hide-on-large-only logo">
						<a class="brand-logo valign-wrapper" href="<?php echo esc_url( home_url() ); ?>">
							<img src="<?php echo esc_url( $image_src ); ?>" alt="<?php _e( 'Banner', 'html5blank' )?>" class="logo-img">
						</a>
					</div>
				<?php endif; ?>

				<!-- sidenav -->
				<?php html5blank_sidenav(); ?>
				<a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only"><i class="material-icons">menu</i></a>
				<!-- /sidenav -->

			</header>
			<!-- /header -->
