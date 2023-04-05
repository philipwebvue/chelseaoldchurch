<?php
/**
 * webvue functions and definitions
 *
 * Please try to keep this file as clean as possible instead populate the inc folder files to help updating and diagnostics
 *
 * @package webvue
 */
if ( ! defined( 'ABSPATH' ) )
{
    exit; // Exit if accessed directly.
}

/**
 * Theme version information, if you have made changes to the css or js files update this to break the caches on the server.
 * Always use _THEME_VERSION when enqueueing styles and scripts
 */
if ( ! defined( '_THEME_VERSION' ) )
{
    // Replace the version number of the theme on each release.
    define( '_THEME_VERSION', '1.0.0' );
}

$theme_includes = array(
    '/admin-support.php',                       // Custom admin view filters
    '/theme-support.php',                       // Customizer additions.
    '/theme-filters.php',                       // General theme filters calls
    '/theme-actions.php',                       // General theme action calls
    '/theme-functions.php',                     // General stand-alone theme functions (use sparingly)
    '/theme-widgets.php',                       // Setup theme widgets.

    '/acf_custom_fields.php',                   // ACF Custom fields auto setup
    '/enqueue-files.php',                       // Enqueue scripts and styles.
    '/post-types.php',                          // Custom post types
    '/register-image-sizes.php',                // Register image sizes
    '/breadcrumbs.php',                         // Breadcrumbs
    '/pagination/numeric-pagination.php',       // Pagination
);

foreach ( $theme_includes as $file )
{
    $filepath = locate_template( 'inc' . $file );
    if ( ! $filepath )
    {
        trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
    }
    require_once $filepath;
}
