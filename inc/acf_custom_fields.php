<?php
/**
 * acf_custom_fields.php
 * add php generated acf fields here, Not necessary for all ACFs... but it is a good idea to add theme critical ACFs here to stop clients from editing core functionality by accident.
 *
 * @package starter-theme
 * @author Philip Bradbury
 * @created 03/04/2023 12:45
 * @since 1.0
 * @updated 1.0
 */

/**
 * Options Page setup
 */
if ( function_exists( 'acf_add_options_page' ) )
{
    acf_add_options_page( array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'default-settings',
        'position'   => '2',
        'icon_url'   => 'dashicons-database',
        'capability' => 'edit_posts',
        'redirect'   => false
    ) );

}