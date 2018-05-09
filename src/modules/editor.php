<?php
/**
 * Add css class .browser-default to ul inserted by tinymce editor on post save
 *
 * @param array $postarr An array of sanitized, but otherwise unmodified post data.
 */
function add_ul_class_on_insert( $postarr ) {
    $postarr['post_content'] = str_replace( '<ul>', '<ul class="browser-default">', $postarr['post_content'] );
    return $postarr;
}

add_filter( 'wp_insert_post_data', 'add_ul_class_on_insert' );

/**
 * Add css class .references to ol inserted by tinymce editor on post save
 *
 * @param array $postarr An array of sanitized, but otherwise unmodified post data.
 */
function add_ol_class_on_insert( $postarr ) {
    $postarr['post_content'] = str_replace( '<ol>', '<ol class="references">', $postarr['post_content'] );
    return $postarr;
}

add_filter( 'wp_insert_post_data', 'add_ol_class_on_insert' );

/**
 * Add custom class to inserted images to add a box shadow
 *
 * @param string       $class CSS class name or space-separated list of classes.
 * @param int          $id    Attachment ID.
 * @param string       $align Part of the class name for aligning the image.
 * @param string|array $size  Size of image. Image size or array of width and height values (in that order).
 *                            Default 'medium'.
 */
function add_box_shadow_to_images( $class, $id, $align, $size ) {
    $class .= ' z-depth-1';
    return $class;
}

add_filter( 'get_image_tag_class', 'add_box_shadow_to_images', 10, 4 );
