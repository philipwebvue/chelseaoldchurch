<?php
/**
 * theme-functions.php
 * stand alone theme functions, be specific in naming convention in order to avoid collisions, and try to use sparingly.
 * ideally functions should be in the form of an action or a filter.
 *
 * @package starter-theme
 * @author Philip Bradbury
 * @created 03/04/2023 13:13
 * @since 1.0
 * @updated 1.0
 */


/**
 * Strip tags and limit words return shortened string
 * @param $string
 * @param $word_limit
 * @param $continue String Continue reading ending default is nothing
 * @return string
 */
function excerpt_limit_words( $string, $word_limit ,$continue = '')
{
    $string = strip_tags( $string );
    $words = explode( " ", $string );
    $continue_reading = count($words) > $word_limit ?$continue:'';
    return implode( " ", array_splice( $words, 0, $word_limit ) ) . $continue_reading;
}

/**
 * Check if current page is a top level page or not.
 *
 * @return bool
 */
function is_top_level()
{
    global $post, $wpdb;

    $current_page = $wpdb->get_var( "SELECT post_parent FROM $wpdb->posts WHERE ID = " . $post->ID );

    return $current_page == 0;
}