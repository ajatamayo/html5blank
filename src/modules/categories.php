<?php

function render_category_grid() {
    $categories = get_terms( 'category', array(
        'orderby'    => 'term_order',
        'hide_empty' => 0,
    ) );

    $display = false;
    $params = array( 'term_id' => null, 'size' => 'full' );

    ob_start(); ?>

    <div class="row">
    <?php foreach ( $categories as $category ) :
        $params['term_id'] = $category->term_id;
        $src = category_image_src( $params, $display ); ?>

        <div class="col s12 m6 xl4">
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo esc_url( $src ); ?>">
                </div>
                <div class="card-content">
                    <span class="card-title"><?php echo $category->name; ?></span>
                    <p><?php echo $category->description; ?></p>
                </div>
                <div class="card-action">
                    <a href="#">View guides</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>

    <?php return ob_get_clean();
}

add_shortcode( 'category_grid', 'render_category_grid' );
