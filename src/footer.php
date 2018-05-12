		<div class="row">
			<div class="col s12">

			<div class="divider"></div>

			<!-- footer -->
			<footer class="footer center-align" role="contentinfo">

				<?php $image_src = wp_get_attachment_url( get_theme_mod( 'html5blank_footer' ) ); ?>
				<?php if ( !empty( $image_src ) ) : ?>
					<a href="<?php echo esc_url( home_url() ); ?>">
						<img src="<?php echo esc_url( $image_src ); ?>" alt="<?php _e( 'Logo', 'html5blank' )?>">
					</a>
				<?php endif; ?>

				<?php html5blank_footer_menu(); ?>

				<!-- copyright -->
				<p class="copyright">
					&copy; <?php echo esc_html( date( 'Y' ) ); ?> Copyright <?php bloginfo( 'name' ); ?>.
				</p>
				<!-- /copyright -->

			</footer>
			<!-- /footer -->

			<?php do_action( 'after_footer' ); ?>

			</div>
		</div>

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
