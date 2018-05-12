<?php
/****************************************
 * Add custom taxonomy for Stations *
 ****************************************/

add_action( 'init', 'stations_categories_register' );

function stations_categories_register() {
    $labels = array(
        'name'                          => 'Malls',
        'singular_name'                 => 'Mall',
        'search_items'                  => 'Search Malls',
        'popular_items'                 => 'Popular Malls',
        'all_items'                     => 'All Malls',
        'parent_item'                   => 'Parent Mall Category',
        'edit_item'                     => 'Edit Mall Category',
        'update_item'                   => 'Update Mall Category',
        'add_new_item'                  => 'Add New Mall Category',
        'new_item_name'                 => 'New Mall Category',
        'separate_items_with_commas'    => 'Separate Malls with commas',
        'add_or_remove_items'           => 'Add or remove Malls',
        'choose_from_most_used'         => 'Choose from most used Malls'
    );

    $args = array(
        'label'                         => 'Malls',
        'labels'                        => $labels,
        'public'                        => true,
        'hierarchical'                  => true,
        'show_ui'                       => true,
        'show_in_nav_menus'             => true,
        'args'                          => array( 'orderby' => 'term_order' ),
        'rewrite'                       => array( 'slug' => 'stations', 'with_front' => true, 'hierarchical' => true ),
        'query_var'                     => true
    );

    register_taxonomy( 'mall', 'station', $args );
}

/*****************************************
 * Add custom post type for Stations *
 *****************************************/

add_action( 'init', 'stations_register' );

function stations_register() {

    $labels = array(
        'name' => 'Stations',
        'singular_name' => 'Station',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Station',
        'edit_item' => 'Edit Station',
        'new_item' => 'New Station',
        'view_item' => 'View Station',
        'search_items' => 'Search Stations',
        'not_found' =>  'Nothing found',
        'not_found_in_trash' => 'Nothing found in Trash',
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'query_var' => true,
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'stations', 'with_front' => true ),
        'capability_type' => 'post',
        // 'menu_position' => 6,
        'supports' => array(
            'title',
            // 'excerpt',
            'editor',
            'thumbnail'
        ) // here you can specify what type of inputs will be accessible in the admin area
      );

    register_post_type( 'station' , $args );
}

/****************************************
 * Filter by Mall for Stations *
 ****************************************/

add_action( 'restrict_manage_posts', 'filter_stations_by_mall' );

function filter_stations_by_mall() {
    global $typenow;
    $post_type = 'station';
    $taxonomy  = 'mall';

    if ( $typenow == $post_type ) {
        $selected = isset( $_GET[$taxonomy] ) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy( $taxonomy );
        wp_dropdown_categories( array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}

/****************************************
 * Filter stations by mall in admin
 ****************************************/

add_filter( 'parse_query', 'convert_mall_id_to_term_in_query' );

function convert_mall_id_to_term_in_query( $query ) {
    global $pagenow;
    $post_type = 'station';
    $taxonomy = 'mall';
    $q_vars = &$query->query_vars;

    if ( $pagenow == 'edit.php' && isset( $q_vars['post_type'] ) && $q_vars['post_type'] == $post_type && isset( $q_vars[$taxonomy] ) && is_numeric( $q_vars[$taxonomy] ) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by( 'id', $q_vars[$taxonomy], $taxonomy );
        $q_vars[$taxonomy] = $term->slug;
    }
}

/****************************************
 * Add shortcode to show list of breastfeeding stations
 ****************************************/

function render_breastfeeding_stations() {
    $categories = get_terms( 'mall', array(
        'orderby'    => 'term_order',
        'hide_empty' => 0,
    ) );

    $display = false;
    $params = array( 'term_id' => null, 'size' => 'full' );

    ob_start(); ?>

    <div class="row">
        <div class="col s12 m8 xl7">
            <ul>
            <?php foreach ( $categories as $category ) :
                $posts = get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type'      => 'station',
                        'orderby'        => 'title',
                        'order'          => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'mall',
                                'field' => 'term_id',
                                'terms' => $category->term_id,
                            )
                        ),
                    )
                );

                $params['term_id'] = $category->term_id;
                $src = category_image_src( $params, $display ); ?>

                <li class="scrollspy" id="<?php echo sanitize_title( $category->name ); ?>">
                    <div class="row">
                        <div class="col s12">
                            <img class="mall-logo" src="<?php echo esc_url( $src ); ?>">
                            <h2><?php echo $category->name; ?></h2>
                        </div>
                    </div>

                    <ul class="station-list row">
                    <?php foreach ( $posts as $post ) : ?>
                        <li>
                            <article class="col s12 m6 xl4 station match-height">
                                <h3 class="station-title"><?php echo $post->post_title; ?></h3>
                                <address><?php echo apply_filters( 'the_content', $post->post_content ); ?></address>
                            </article>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>

        <div class="col hide-on-small-only m4 xl3 offset-xl1">
            <div class="toc-wrapper">
                <ul class="section table-of-contents">
                <?php foreach ( $categories as $category ) : ?>
                    <li><a href="#<?php echo sanitize_title( $category->name ); ?>"><?php echo $category->name; ?></a></li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <?php return ob_get_clean();
}

add_shortcode( 'breastfeeding_stations', 'render_breastfeeding_stations' );
