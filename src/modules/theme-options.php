<?php

/**
 * Adds theme options
 *
 * @param WP_Customize_Manager $this WP_Customize_Manager instance.
 */
function html5blank_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'html5blank_logo_section', array(
        'title' => __( 'Site Logo' ),
        'description' => __( "Add your site's logo here" ),
        'priority' => 30,
        'capability' => 'edit_theme_options',
    ) );

    $wp_customize->add_setting( 'html5blank_logo', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
    ) );

    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize, 'html5blank_logo', array(
                'label' => __( 'Site Logo', 'html5blank' ),
                'section' => 'html5blank_logo_section',
                'mime_type' => 'image',
            )
        )
    );
}
add_action( 'customize_register', 'html5blank_customize_register', 10 );
