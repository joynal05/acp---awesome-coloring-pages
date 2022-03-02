<?php

function ac_custom_post_type_reg() {
    $args = array(
        'public' => true,
        'label'  => __( 'AC pages', 'textdomain' ),
        'supports' => array( 'title', 'editor', 'thumbnail')
    );
    register_post_type( 'ac-page', $args );
}
add_action( 'init', 'ac_custom_post_type_reg' );

function ac_custom_post_type_tex_reg() {
    register_taxonomy(
        'pages',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'ac-page',   // post type name
        array(
            'hierarchical' => true,
            'label' => 'Category',
        )
    );
}
add_action( 'init', 'ac_custom_post_type_tex_reg');
