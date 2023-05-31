<?php

function chelseaoldchurch_custom_block_categories($categories) {
    return array_merge($categories, array(
        array(
            'slug' => 'chelseaoldchurch-blocks',
            'title' => __(sprintf('%s Blocks', get_bloginfo('name')), 'chelseaoldchurch'),
        )
    ));
}
add_filter('block_categories', 'chelseaoldchurch_custom_block_categories', 10, 2);


add_action( 'init', 'chelseaoldchurch_register_acf_blocks' );
function chelseaoldchurch_register_acf_blocks() {
    register_block_type( get_template_directory().'/blocks/example-block' );
    register_block_type( get_template_directory().'/blocks/banner-intro-block' );
}

