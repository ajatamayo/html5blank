<?php
/**
 * Automatically split content on headings such as <h2></h2>
 *
 * @param string $content The html content of a post
 */
function auto_split_sections( $content ) {
    if ( !empty( get_page_template_slug() ) ) {
        return $content;
    }

    $sentinel = '<!-- sentinel -->';
    $tags = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );

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

    $content = "<div id='$slug' class='scrollspy'>$content</div>";
    return $content;
}

/**
 * Utility function to get the contents of headings such as <h2></h2> from an html string
 * Will return the text inside header tags
 *
 * @param string $html The html to look for headings in
 * @return array An array of strings
 */
function get_headings( $html ) {
    preg_match_all( '|<h[^>]+>(.*)</h[^>]+>|iU', $html, $headings );
    return $headings[1];
}

/**
 * Utility function to render a table of contents, based on the headings returned by the get_headings function
 *
 * @param array $headings An array of strings
 */
function table_of_contents( $headings ) {
    if ( !empty( $headings ) ) : ?>
        <div class="toc-wrapper">
            <ul class="section table-of-contents">
            <?php foreach ( $headings as $heading ) : ?>
                <li><a href="#<?php echo sanitize_title( $heading ); ?>"><?php echo $heading; ?></a></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif;
}
