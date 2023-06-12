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

/**
 * Code to register custom ACF block dynamically based on folders inside blocks folder in theme. It will check for block.json file for register block.
 */
add_action( 'init', 'chelseaoldchurch_register_acf_blocks' );
function chelseaoldchurch_register_acf_blocks() {
    $blocksDirectory = get_template_directory().'/blocks/';
    $blocks = glob($blocksDirectory.'*',GLOB_ONLYDIR);
    foreach($blocks as $blockpath){
        $blockfolders = explode('/',$blockpath);
        $blockFolder = array_pop($blockfolders);

        if(file_exists($blocksDirectory.$blockFolder.'/block.json')){
            register_block_type($blocksDirectory.$blockFolder);
        }
        
    }    
}