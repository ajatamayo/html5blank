<?php

function render_category_grid() {
    $categories = get_terms( 'category', array(
        'orderby'    => 'term_order',
        'hide_empty' => 0,
    ) );

    $display = false;
    $params = array( 'term_id' => null, 'size' => 'full' );

    ob_start(); ?>

    <ul class="row">
    <?php foreach ( $categories as $category ) :
        $params['term_id'] = $category->term_id;
        $src = category_image_src( $params, $display ); ?>

        <li class="col s12 m6 xl4">
            <div class="card">
                <div class="card-image">
                    <a href="<?php echo esc_url( get_category_link( $category ) ); ?>">
                        <img src="<?php echo esc_url( $src ); ?>">
                    </a>
                </div>
                <div class="card-content match-height">
                    <a href="<?php echo esc_url( get_category_link( $category ) ); ?>">
                        <h2 class="card-title"><?php echo $category->name; ?></h2>
                    </a>
                    <p><?php echo $category->description; ?></p>
                </div>
                <div class="card-action">
                    <a href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php _e( 'View guides', 'html5blank' ); ?></a>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
    </ul>

    <?php return ob_get_clean();
}

add_shortcode( 'category_grid', 'render_category_grid' );
