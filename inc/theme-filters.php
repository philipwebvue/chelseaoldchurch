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

add_filter("manage_edit-event_columns", "main_cat_edit_columns",10, 1 );
function main_cat_edit_columns($columns) {
    $columns['event_date_time'] = "Date & Time";
    return $columns;
}

function event_archive_pre_get_posts( $query ) {
  
    if( is_admin() ) {
      return $query; 
    }
    if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'event' && $query->is_main_query() ) {
      
      $query->set('orderby', 'meta_value'); 
      $query->set('meta_key', 'event_date_time');   
      $query->set('order', 'DESC'); 
      
    }
    return $query;
}
add_action('pre_get_posts', 'event_archive_pre_get_posts');

/**
* used to override default settings when blocks are registered
* @param $settings
* @param $metadata
* @return array
 */
function filter_metadata_registration( $settings, $metadata ) {
    if($metadata['name'] === 'pb/accordion-item'){
        $settings['attributes']['titleTag']['default'] = 'h3';
    }


    return $settings;
};
add_filter( 'block_type_metadata_settings', 'filter_metadata_registration', 10, 2 );
