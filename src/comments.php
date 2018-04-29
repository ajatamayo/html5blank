<div id="comments" class="comments">
	<?php if ( post_password_required() ) : ?>
	<p><?php esc_html_e( 'Post is password protected. Enter the password to view any comments.', 'html5blank' ); ?></p>
</div>

	<?php return; endif; ?>

<?php if ( have_comments() ) : ?>

	<h2><?php comments_number(); ?></h2>

	<ul>
		<?php wp_list_comments( 'type=comment&callback=html5blankcomments' ); // Custom callback in functions.php. ?>
	</ul>

<?php endif; ?>

<?php comment_form(); ?>

</div>
