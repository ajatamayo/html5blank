<?php

function add_material_icons() {
    $src = defined( 'MATERIAL_ICONS' ) ? MATERIAL_ICONS : 'https://fonts.googleapis.com/icon?family=Material+Icons';
    ?>
    <link href="<?php echo esc_html( $src ); ?>" rel="stylesheet">
    <?php
}

add_action( 'wp_head', 'add_material_icons', 10 );


function add_primary_google_font() {
    $src = defined( 'GOOGLE_FONT' ) ? GOOGLE_FONT : 'https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700';
    ?>
    <link href="<?php echo esc_html( $src ); ?>" rel="stylesheet">
    <?php
}

add_action( 'wp_head', 'add_primary_google_font', 10 );
