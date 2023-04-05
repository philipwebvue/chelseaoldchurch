<?php
/**
 * register-image-sizes.php
 * Register image sizes here. dont forget to regenerate thumbnails if you make a change.
 *
 * Dont forget that thumbnail, medium and large are managed in the settings > media page in admin.
 *
 * @package starter-theme
 * @author Philip Bradbury
 * @created 03/04/2023 12:47
 * @since 1.0
 * @updated 1.0
 */

add_action( 'after_setup_theme', 'chelseaoldchurch_image_setup' );

function chelseaoldchurch_image_setup()
{
    add_image_size( 'small-banner-image', 600, 9999, false );
    add_image_size( 'medium-banner-image', 1024, 9999, false );
    add_image_size( 'banner-image', 2000, 9999, false );
    add_image_size( 'large-banner-image', 3000, 9999, false );
    add_image_size( 'massive-banner-image', 4000, 9999, false );
}