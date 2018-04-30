<?php
/**
 * Display a background image for the whole site
 *
 */
function background_image_css() {
    $image_src = wp_get_attachment_url( get_theme_mod( 'html5blank_background' ) );
    if ( empty( $image_src ) ) return;
    ?>
    <style type="text/css">
        body {
            background: url(<?php echo esc_url( $image_src ); ?>) no-repeat fixed center center;
        }

        .sidenav {
            background-color: transparent;
        }
    </style>
    <?php
}

add_action( 'wp_head', 'background_image_css', 10 );
