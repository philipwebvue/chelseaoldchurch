<?php
/**
 * theme-filters.php
 * add all theme filters here eg add_filter() then you can call the apply_filters() from where ever you like in the templates.
 *
 * @package starter-theme
 * @author Philip Bradbury
 * @created 03/04/2023 12:49
 * @since 1.0
 * @updated 1.0
 */

add_filter('cs_display_featured_image','creativestream_display_featured_image_function',10,1);

function creativestream_display_featured_image_function($post_id=null){

    if(!$post_id){
        $post_id = get_the_ID();
    }
    $position = get_post_meta($post_id,'featured_image_position',true)??0;
    $position_class=$position?'object-'.$position:'object-center';
    $image_args=array( 'class'=>'w-full h-full object-cover '.$position_class );
    $size = 'medium_large';
    if(has_post_thumbnail($post_id)){
        $image = get_the_post_thumbnail( $post_id, $size, $image_args );
    }else{
        $mod_image_id = attachment_url_to_postid(get_theme_mod( 'default_image' ));
        $image = wp_get_attachment_image( $mod_image_id, $size, false, $image_args );
    }

    return $image;
}