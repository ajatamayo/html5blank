<?php

function render_support_groups_grid() {
    $groups = get_posts( array(
        'post_type'   => 'support-group',
        'numberposts' => -1,
    ) );

    ob_start(); ?>

    <ul class="row">
    <?php foreach ( $groups as $group ) :
        $src = wp_get_attachment_image_src( get_post_thumbnail_id( $group->ID ), 'full' ); ?>

        <li class="col s12 xl6">
            <div class="card match-height">
                <div class="card-content">
                    <div class="row">
                        <?php if ( !empty( $src ) ) : ?>
                            <div class="col s12 m4">
                                <img class="group-logo" src="<?php echo esc_url( $src[0] ); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="col s12 <?php if ( !empty( $src ) ) : ?>m8<?php endif; ?>">
                            <h2 class="card-title"><?php echo $group->post_title; ?></h2>
                            <?php echo apply_filters( 'the_content', $group->post_content ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
    </ul>

    <?php return ob_get_clean();
}

add_shortcode( 'support_groups_grid', 'render_support_groups_grid' );
