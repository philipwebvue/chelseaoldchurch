<?php
/**
 * theme-actions.php
 * add all theme actions here eg add_action() then you can call the do_action from where ever you like in the templates.
 *
 * @package starter-theme
 * @author Philip Bradbury
 * @created 03/04/2023 12:50
 * @since 1.0
 * @updated 1.0
 */

add_action("manage_posts_custom_column", "main_cat_custom_columns",10, 2 );

function main_cat_custom_columns($column, $post_id ) {
    global $post;
    switch ($column) {
        case "event_date_time":
            $event_date = get_field('event_date_time',$post_id);
            echo !empty($event_date) ? date('Y m d H:i', strtotime($event_date)) : '';
            break;
        default:
            break;
    }
}