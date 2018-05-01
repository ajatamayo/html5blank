<?php

/**
 * Add the 'active' css class to menu items for proper styling in Materialize CSS
 *
 * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
 * @param WP_Post  $item    The current menu item.
 * @param stdClass $args    An object of wp_nav_menu() arguments.
 * @param int      $depth   Depth of menu item. Used for padding.
 */
function special_nav_class( $classes, $item, $args, $depth ) {
    if ( $args->theme_location != 'sidenav-menu' ) return $classes;

    if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-ancestor', $classes ) ) {
        $classes[] = 'active';
    }
    return $classes;
}

add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 4 );

/**
 * Adds the logo to the top of the side navigation bar
 *
 * @param string   $items The HTML list content for the menu items.
 * @param stdClass $args  An object containing wp_nav_menu() arguments.
 */
function add_logo_to_sidenav( $items, $args ) {
    if ( $args->theme_location != 'sidenav-menu' ) return $items;

    $image_src = wp_get_attachment_url( get_theme_mod( 'html5blank_logo' ) );

    if ( empty( $image_src ) ) {
        return $items;
    }

    ob_start(); ?>

    <li class="logo">
        <a class="brand-logo" href="<?php echo esc_url( home_url() ); ?>">
            <img src="<?php echo esc_url( $image_src ); ?>" alt="<?php _e( 'Logo', 'html5blank' )?>" class="logo-img">
        </a>
    </li>

    <?php
    $brandlogo = ob_get_clean();
    $items = $brandlogo . $items;

    if ( current_user_can( 'manage_options' ) ) {
        ob_start(); ?>

        <li class="menu-item"><a href="<?php echo admin_url(); ?>"><?php _e( 'Admin', 'html5blank' ); ?></a></li>

        <?php
        $items .= ob_get_clean();
    }

    return $items;
}

add_filter( 'wp_nav_menu_items', 'add_logo_to_sidenav', 10, 2 );
