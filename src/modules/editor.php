<?php
/**
 * Add css class .browser-default to ul inserted by tinymce editor on post save
 *
 */
function add_ul_class_on_insert( $postarr ) {
    $postarr['post_content'] = str_replace( '<ul>', '<ul class="browser-default">', $postarr['post_content'] );
    return $postarr;
}

add_filter( 'wp_insert_post_data', 'add_ul_class_on_insert' );
