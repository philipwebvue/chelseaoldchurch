<?php
/**
 * admin-support.php
 * Add all admin related functionality to this file, eg. Admin filters, custom menu items, settings etc...
 *
 * @package starter-theme
 * @author Philip Bradbury
 * @created 03/04/2023 12:47
 * @since 1.0
 * @updated 1.0
 */

function creativestream_register_gutenberg_meta() {

    register_meta( 'post', 'featured_image_position', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
    ) );
}
add_action( 'init', 'creativestream_register_gutenberg_meta' );