<?php
/**
 * Automatically split content on headings such as <h2></h2>
 *
 * @param string $content The html content of a post
 */
function auto_split_sections( $content ) {
    $sentinel = '<!-- sentinel -->';
    $tags = array( 'h1', 'h2', 'h3' );

    $sections = array();

    foreach ( $tags as $tag ) {
        $content = str_replace( "<$tag", "$sentinel<$tag", $content );
    }

    $sections = explode( $sentinel, $content );

    $sections = array_map( 'trim', $sections );

    $sections = array_filter( $sections );

    $sections = array_map( 'wrap_section', $sections );

    $content = implode( '', $sections );

    return $content;
}

add_filter( 'the_content', 'auto_split_sections' );

/**
 * Wrap each section in a div for the scrollspy feature
 *
 * @param string $content Html. A section of the content of a post
 */
function wrap_section( $content ) {
    preg_match_all( '|<h[^>]+>(.*)</h[^>]+>|iU', $content, $headings );

    if ( empty( $headings[1] ) ) {
        return $content;
    }

    $heading = $headings[1][0];
    $slug = sanitize_title( $heading );

    $content = "<div id='$slug' class='section scrollspy'>$content</div>";
    return $content;
}
