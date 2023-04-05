<?php
/**
 * theme-support.php
 * Add all theme related setup functionality to this file, eg. custom menu items, settings etc...
 *
 * @package starter-theme
 * @author Philip Bradbury
 * @created 03/04/2023 12:48
 * @since 1.0
 * @updated 1.0
 */

if ( ! function_exists( 'creativestream_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since creativestream 1.0
     *
     * @return void
     */
    function creativestream_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Twenty Twenty-One, use a find and replace
         * to change 'twentytwentyone' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'creativestream', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * This theme does not use a hard-coded <title> tag in the document head,
         * WordPress will provide it for us.
         */
        add_theme_support( 'title-tag' );

        /**
         * Add post-formats support.
         */
        add_theme_support(
            'post-formats',
            array(
                'link',
                'aside',
                'gallery',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat',
            )
        );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1568, 9999 );


        register_nav_menus(
            array(
                'primary' => esc_html__( 'Primary menu', 'creativestream' ),
                'header'  => __( 'Secondary menu', 'creativestream' ),
                'footer'  => __( 'Footer menu', 'creativestream' ),
                'loggedin'  => __( 'Logged in menu', 'creativestream' ),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
                'navigation-widgets',
            )
        );

        /*
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        $logo_width  = 300;
        $logo_height = 100;

        add_theme_support(
            'custom-logo',
            array(
                'height'               => $logo_height,
                'width'                => $logo_width,
                'flex-width'           => true,
                'flex-height'          => true,
                'unlink-homepage-logo' => true,
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        $editor_stylesheet_path = './assets/css/style-editor.css';

        // Note, the is_IE global variable is defined by WordPress and is used
        // to detect if the current browser is internet explorer.
        global $is_IE;
        if ( $is_IE ) {
            $editor_stylesheet_path = './assets/css/ie-editor.css';
        }

        // Enqueue editor styles.
        add_editor_style( $editor_stylesheet_path );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        // Add support for custom line height controls.
        add_theme_support( 'custom-line-height' );

        // Add support for experimental link color control.
        add_theme_support( 'experimental-link-color' );

        // Add support for experimental cover block spacing.
        add_theme_support( 'custom-spacing' );

        // Add support for custom units.
        // This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
        add_theme_support( 'custom-units' );

        //add_theme_support( 'woocommerce' );
    }
}
add_action( 'after_setup_theme', 'creativestream_setup' );



add_action( 'customize_register', 'creativestream_customize_register_second_logo_settings', 10 );
if ( ! function_exists( 'creativestream_customize_register_second_logo_settings' ) ) :
    function creativestream_customize_register_second_logo_settings($wp_customize){
        $wp_customize->add_setting('secondary_logo');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'secondary_logo', array(
            'label' => 'Alternative Logo',
            'section' => 'title_tagline',
            'settings' => 'secondary_logo',
            'priority' => 8
        )));
        $wp_customize->add_setting('footer_logo');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
            'label' => 'Footer Logo',
            'section' => 'title_tagline',
            'settings' => 'footer_logo',
            'priority' => 9
        )));

        $wp_customize->add_setting('default_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'default_image', array(
            'label' => 'Default Image',
            'section' => 'title_tagline',
            'settings' => 'default_image',
            'priority' => 20
        )));
    }


endif;

add_action( 'customize_register', 'creativestream_customize_register_social_media', 10 );

if ( ! function_exists( 'creativestream_customize_register_social_media' ) ) :
    /** Add social media customizer objects to theme
     * Panel social media settings
     *
     * use get_theme_mod( 'creativestream_'.$post_type.'_image' )
     */

    function creativestream_customize_register_social_media( $wp_customize ) {

        $wp_customize->add_panel( 'creativestream_social_media_theme_options_panel', array(
            'priority'       => 70,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Social Media Settings', 'creativestream' ),
            'description'    => __( 'Social media settings for theme', 'creativestream' ),
        ) );

        $social_media_platforms=['facebook','twitter','instagram','linkedin'];

        foreach ($social_media_platforms as $platform){

            $wp_customize->add_section(
                'creativestream_social_media_'.$platform.'_section',
                array(
                    'title'       => __( ucfirst( $platform ) .' Settings', 'creativestream' ),
                    'capability'  => 'edit_theme_options',
                    'description' => __( 'Set '.$platform.' settings', 'creativestream' ),
                    'priority'    => 10,
                    'panel'       => 'creativestream_social_media_theme_options_panel',
                )
            );

            $wp_customize->add_setting('show_'.$platform, array(
                'default'    => 0,
            ));

            $wp_customize->add_control(
                new WP_Customize_Control(
                    $wp_customize,
                    'show_'.$platform.'_control',
                    array(
                        'label'       => __( 'Show '.ucfirst($platform), 'creativestream' ),
                        'section'     => 'creativestream_social_media_'.$platform.'_section',
                        'settings'    => 'show_'.$platform,
                        'type'        => 'checkbox',
                    )
                )
            );

            $wp_customize->add_setting(
                $platform.'_url',
                array(
                    'default'           => '',
                    'sanitize_callback' => '',
                )
            );

            $wp_customize->add_control(
                new WP_Customize_Control(
                    $wp_customize,
                    $platform.'_url_control',
                    array(
                        'label'       => __( ucfirst($platform).' Url', 'creativestream' ),
                        'section'     => 'creativestream_social_media_'.$platform.'_section',
                        'settings'    => $platform.'_url',
                        'type'        => 'text',
                    )
                )
            );

            $wp_customize->add_setting(
                $platform.'_text_colour',
                array(
                    'default'           => '#FFFFFF',
                    'sanitize_callback' => 'sanitize_hex_color',
                )
            );

            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    $platform.'_text_colour_control',
                    array(
                        'label'       => __( ucfirst($platform).' Text Colour', 'understrap' ),
                        'section'     => 'creativestream_social_media_'.$platform.'_section',
                        'settings'    => $platform.'_text_colour',
                        'type'        => 'color',
                    )
                )
            );

            $wp_customize->add_setting(
                $platform.'_bg_colour',
                array(
                    'default'           => '#000000',
                    'sanitize_callback' => 'sanitize_hex_color',
                )
            );

            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    $platform.'_bg_colour_control',
                    array(
                        'label'       => __( 'Background Colour', 'understrap' ),
                        'section'     => 'creativestream_social_media_'.$platform.'_section',
                        'settings'    => $platform.'_bg_colour',
                        'type'        => 'color',
                    )
                )
            );
        }

    }
endif;

add_action( 'customize_register', 'creativestream_customize_register_business_settings', 10 );

if ( ! function_exists( 'creativestream_customize_register_business_settings' ) ) :
    /** Add Footer customizer objects to theme
     * Panel Header Settings for all post types
     *
     * use get_theme_mod( 'creativestream_'.$post_type.'_image' )
     */

    function creativestream_customize_register_business_settings( $wp_customize ) {
        //add panel
        $wp_customize->add_panel( 'creativestream_business_theme_options_panel', array(
            'priority'       => 60,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Business Settings', 'creativestream' ),
        ) );


        $wp_customize->add_section(
            'creativestream_business_section',
            array(
                'title'       => __( 'Business Details', 'creativestream' ),
                'capability'  => 'edit_theme_options',
                'description' => __( 'Set the default business details', 'creativestream' ),
                'priority'    => 10,
                'panel'       => 'creativestream_business_theme_options_panel',
            )
        );

        $wp_customize->add_setting(
            'creativestream_business_name',
            array(
                'default' => '',
                'transport'=>'postMessage'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'creativestream_business_name_control',
                array(
                    'label'       => __( 'Business Name', 'creativestream' ),
                    'section'     => 'creativestream_business_section',
                    'settings'    => 'creativestream_business_name',
                    'type'        => 'text',
                )
            )
        );

        $wp_customize->add_setting(
            'creativestream_business_address',
            array(
                'default' => '',
                'transport'=>'postMessage'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'creativestream_business_address_control',
                array(
                    'label'       => __( 'Business Address', 'creativestream' ),
                    'section'     => 'creativestream_business_section',
                    'settings'    => 'creativestream_business_address',
                    'type'        => 'textarea',
                )
            )
        );

        $wp_customize->add_setting(
            'creativestream_business_number',
            array(
                'default' => '',
                'transport'=>'postMessage'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'creativestream_business_number_control',
                array(
                    'label'       => __( 'Registration Number', 'creativestream' ),
                    'section'     => 'creativestream_business_section',
                    'settings'    => 'creativestream_business_number',
                    'type'        => 'text',
                )
            )
        );

        $wp_customize->add_setting(
            'creativestream_vat_number',
            array(
                'default' => '',
                'transport'=>'postMessage'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'creativestream_vat_number_control',
                array(
                    'label'       => __( 'Vat Registered Number', 'creativestream' ),
                    'section'     => 'creativestream_business_section',
                    'settings'    => 'creativestream_vat_number',
                    'type'        => 'text',
                )
            )
        );

        $wp_customize->add_section(
            'creativestream_contact_section',
            array(
                'title'       => __( 'Contact Details', 'creativestream' ),
                'capability'  => 'edit_theme_options',
                'description' => __( 'Set the default contact details', 'creativestream' ),
                'priority'    => 15,
                'panel'       => 'creativestream_business_theme_options_panel',
            )
        );

        $wp_customize->add_setting(
            'creativestream_telephone_number',
            array(
                'default' => '',
                'transport'=>'postMessage'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'creativestream_telephone_number_control',
                array(
                    'label'       => __( 'Telephone Number', 'creativestream' ),
                    'section'     => 'creativestream_contact_section',
                    'settings'    => 'creativestream_telephone_number',
                    'type'        => 'text',
                )
            )
        );

        $wp_customize->add_setting(
            'creativestream_email_address',
            array(
                'default' => '',
                'transport'=>'postMessage'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'creativestream_email_address_control',
                array(
                    'label'       => __( 'Email Address', 'creativestream' ),
                    'section'     => 'creativestream_contact_section',
                    'settings'    => 'creativestream_email_address',
                    'type'        => 'text',
                )
            )
        );
    }
endif;




//rename Aside in posts list table
function creativestream_live_rename_formats( $translations, $file, $handle, $domain ) {
    /**
     * The post format labels used for the dropdown are defined in the
     * "wp-editor" script.
     */
    if ( 'wp-editor' === $handle ) {
        /**
         * The translations are formatted as JSON. Decode the JSON to modify
         * them.
         */
        $translations = json_decode( $translations, true );

        /**
         * The strings are inside locale_data > messages, where the original
         * string is the key. The value is an array of translations.
         *
         * Singular strings only have one value in the array, while strings
         * with singular and plural forms have a string for each in the array.
         */
        $translations['locale_data']['messages']['Standard']  = [ 'Download' ];
        //$translations['locale_data']['messages']['Status'] = [ 'Notice' ];

        /**
         * Re-encode the modified translations as JSON.
         */
        $translations = wp_json_encode( $translations );
    }

    return $translations;
}

add_filter( 'load_script_translations',	'creativestream_live_rename_formats',10, 4 );



function add_toolbar_items($admin_bar){
    $admin_bar->add_menu( array(
        'id'    => 'creativestream-quicklinks',
        'title' => 'Quick Links',
        'href'  => '#',
        'meta'  => array(
            'title' => __('My Item'),
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'creativestream-theme-settings',
        'parent' => 'creativestream-quicklinks',
        'title' => 'Edit Theme Settings',
        'href'  => admin_url('/admin.php?page=default-settings'),
        'meta'  => array(
            'title' => __('Edit Theme Settings'),
            'target' => '_self',
            'class' => 'creativestream_theme_settings_class'
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'creativestream-menu',
        'parent' => 'creativestream-quicklinks',
        'title' => 'Edit Menus',
        'href'  => admin_url('/nav-menus.php'),
        'meta'  => array(
            'title' => __('Edit Menus'),
            'target' => '_self',
            'class' => 'creativestream_menu_class'
        ),
    ));
}

add_action('admin_bar_menu', 'add_toolbar_items', 1000);

function creativestream_add_svg_to_upload_mimes( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'creativestream_add_svg_to_upload_mimes', 10, 1 );