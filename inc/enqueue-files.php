<?php
/**
 * enqueue-files.php
 * enqueue all scripts and styles here and use _THEME_VERSION for all scripts and styles so we can easily clear caches on the server when we do updates
 *
 * @package starter-theme
 * @author Philip Bradbury
 * @created 03/04/2023 12:45
 * @since 1.0
 * @updated 1.0
 */
function creativestream_enqueue_styles() {

    /** styles */
    wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), _THEME_VERSION );
    wp_enqueue_style( 'common-theme-css', get_template_directory_uri() . '/assets/css/style-editor.css', array(), _THEME_VERSION );
    wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/assets/css/theme.css', array('common-theme-css','theme-style'), _THEME_VERSION );

    /** Fonts */
    wp_enqueue_style( 'google-barlow-font-css', "//fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&display=swap",false );
    wp_enqueue_style( 'fontawesome-5', "//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" );

    /** slick slider styling */
    wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), _THEME_VERSION );
    wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), _THEME_VERSION );

    /**  select2 js style */
    wp_enqueue_style( 'select2-theme-css', get_template_directory_uri() . '/assets/css/select2.min.css', array(), _THEME_VERSION );

}
add_action( 'wp_enqueue_scripts', 'creativestream_enqueue_styles' );
function creativestream_enqueue_scripts() {

    wp_enqueue_script( 'app-js', get_template_directory_uri(). '/assets/js/app.js', array('jquery'), _THEME_VERSION );
    wp_enqueue_script('jquery-effects-core',false,array('jquery'));


    /** slick slider script */
    wp_enqueue_script( 'slick-js', get_template_directory_uri(). '/assets/js/slick.min.js', array('jquery'), _THEME_VERSION );

    /**  select2 js script */
    wp_enqueue_script( 'select2-js', get_template_directory_uri(). '/assets/js/select2.min.js', array('jquery'), _THEME_VERSION );
}

add_action( 'wp_enqueue_scripts', 'creativestream_enqueue_scripts' );

/**
 * enqueue admin scripts
 * @return void
 */
function creativestream_enqueue_admin_scripts(  ) {
    wp_enqueue_script( 'extend-react-functionality', get_template_directory_uri(). '/assets/js/admin/extend-react-functionality.js', array(), _THEME_VERSION );
}
add_action( 'admin_enqueue_scripts', 'creativestream_enqueue_admin_scripts' );

function creativestream_enqueue_admin_styles(  ) {
    /** Fonts */
    wp_enqueue_style( 'google-barlow-font-css', "//fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&display=swap",false );
    wp_enqueue_style( 'fontawesome-5', "//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" );
}
add_action( 'admin_enqueue_scripts', 'creativestream_enqueue_admin_styles' );