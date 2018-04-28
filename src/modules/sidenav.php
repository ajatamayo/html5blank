<?php

function special_nav_class( $classes, $item, $args, $depth ) {
    if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-ancestor', $classes ) ) {
        $classes[] = 'active';
    }
    return $classes;
}

add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 4 );
