<?php
/**
 * post-types.php
 * Generate all custom post types here, do not use a plugin.
 *
 * @package starter-theme
 * @author Philip Bradbury
 * @created 03/04/2023 12:45
 * @since 1.0
 * @updated 1.0
 */

add_action( 'init', 'chelseaoldchurch_create_event_post_type' );
function chelseaoldchurch_create_event_post_type()
{
    $labels = [
        'name'               => _x( 'Events', 'post type general name', 'chelseaoldchurch' ),
        'singular_name'      => _x( 'Events', 'post type singular name', 'chelseaoldchurch' ),
        'add_new'            => __( 'Add New', 'chelseaoldchurch' ),
        'add_new_item'       => __( 'Add New', 'chelseaoldchurch' ),
        'edit_item'          => __( 'Edit', 'chelseaoldchurch' ),
        'new_item'           => __( 'New', 'chelseaoldchurch' ),
        'all_items'          => __( 'View Events', 'chelseaoldchurch' ),
        'view_item'          => __( 'View', 'chelseaoldchurch' ),
        'search_items'       => __( 'Search', 'chelseaoldchurch' ),
        'not_found'          => __( 'No course found', 'chelseaoldchurch' ),
        'not_found_in_trash' => __( 'No Event found in Trash', 'chelseaoldchurch' ),
        'parent_item_colon'  => '',
        'menu_name'          => __( 'Events', 'chelseaoldchurch' ),
    ];

    register_post_type( 'event', array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'hierarchical'        => false,
        'menu_icon'           => 'dashicons-calendar-alt',
        'menu_position'       => 26,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'rewrite'             => array( 'slug' => 'event', 'with_front' => false ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    ) );
}

add_action( 'init', 'chelseaoldchurch_create_week_post_type' );
function chelseaoldchurch_create_week_post_type()
{
    $labels = [
        'name'               => _x( 'Weeks', 'post type general name', 'chelseaoldchurch' ),
        'singular_name'      => _x( 'Weeks', 'post type singular name', 'chelseaoldchurch' ),
        'add_new'            => __( 'Add New', 'chelseaoldchurch' ),
        'add_new_item'       => __( 'Add New', 'chelseaoldchurch' ),
        'edit_item'          => __( 'Edit', 'chelseaoldchurch' ),
        'new_item'           => __( 'New', 'chelseaoldchurch' ),
        'all_items'          => __( 'View Weeks', 'chelseaoldchurch' ),
        'view_item'          => __( 'View', 'chelseaoldchurch' ),
        'search_items'       => __( 'Search', 'chelseaoldchurch' ),
        'not_found'          => __( 'No Week found', 'chelseaoldchurch' ),
        'not_found_in_trash' => __( 'No Week found in Trash', 'chelseaoldchurch' ),
        'parent_item_colon'  => '',
        'menu_name'          => __( 'Weeks', 'chelseaoldchurch' ),
    ];
    register_post_type( 'week', array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        "capability_type"     => "post",
        'hierarchical'        => false,
        'menu_icon'           => 'dashicons-editor-paste-word',
        'menu_position'       => 26,
        'show_in_nav_menus'   => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'rewrite'             => array( 'slug' => 'weeks', 'with_front' => false ),
        'supports'            => array( 'title', 'thumbnail' ),
    ) );
}

add_action( 'init', 'chelseaoldchurch_create_staff_post_type' );
function chelseaoldchurch_create_staff_post_type()
{
    $labels = [
        'name'               => _x( 'Staff', 'post type general name', 'chelseaoldchurch' ),
        'singular_name'      => _x( 'Staff', 'post type singular name', 'chelseaoldchurch' ),
        'add_new'            => __( 'Add New', 'chelseaoldchurch' ),
        'add_new_item'       => __( 'Add New', 'chelseaoldchurch' ),
        'edit_item'          => __( 'Edit', 'chelseaoldchurch' ),
        'new_item'           => __( 'New', 'chelseaoldchurch' ),
        'all_items'          => __( 'View Staff', 'chelseaoldchurch' ),
        'view_item'          => __( 'View', 'chelseaoldchurch' ),
        'search_items'       => __( 'Search', 'chelseaoldchurch' ),
        'not_found'          => __( 'No staff found', 'chelseaoldchurch' ),
        'not_found_in_trash' => __( 'No ministry found in Trash', 'chelseaoldchurch' ),
        'parent_item_colon'  => '',
        'menu_name'          => __( 'Staff', 'chelseaoldchurch' ),
    ];
    register_post_type( 'staff', array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'hierarchical'        => FALSE,
        'menu_icon'           => 'dashicons-businessman',
        'menu_position'       => 26,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'rewrite'             => array( 'slug' => 'staff', 'with_front' => false ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author' ), //,excerpt,author,editor
    ) );
}

add_action( 'init', 'chelseaoldchurch_create_clergy_post_type' );
function chelseaoldchurch_create_clergy_post_type()
{
    $labels = [
        'name'               => _x( 'Clergy', 'post type general name', 'chelseaoldchurch' ),
        'singular_name'      => _x( 'Clergy', 'post type singular name', 'chelseaoldchurch' ),
        'add_new'            => __( 'Add New', 'chelseaoldchurch' ),
        'add_new_item'       => __( 'Add New', 'chelseaoldchurch' ),
        'edit_item'          => __( 'Edit', 'chelseaoldchurch' ),
        'new_item'           => __( 'New', 'chelseaoldchurch' ),
        'all_items'          => __( 'View Clergy', 'chelseaoldchurch' ),
        'view_item'          => __( 'View', 'chelseaoldchurch' ),
        'search_items'       => __( 'Search', 'chelseaoldchurch' ),
        'not_found'          => __( 'No clergy found', 'chelseaoldchurch' ),
        'not_found_in_trash' => __( 'No ministry found in Trash', 'chelseaoldchurch' ),
        'parent_item_colon'  => '',
        'menu_name'          => __( 'Clergy', 'chelseaoldchurch' ),
    ];

    register_post_type( 'clergy', array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'hierarchical'        => false,
        'menu_icon'           => 'dashicons-businessman',
        'menu_position'       => 26,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'rewrite'             => array( 'slug' => 'clergy', 'with_front' => false ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author' ), //,excerpt,author,editor
    ) );
}

add_action( 'init', 'chelseaoldchurch_create_story_post_type' );
function chelseaoldchurch_create_story_post_type()
{
    $labels = [
        'name'               => _x( 'Story', 'post type general name', 'chelseaoldchurch' ),
        'singular_name'      => _x( 'Story', 'post type singular name', 'chelseaoldchurch' ),
        'add_new'            => __( 'Add New', 'chelseaoldchurch' ),
        'add_new_item'       => __( 'Add New', 'chelseaoldchurch' ),
        'edit_item'          => __( 'Edit', 'chelseaoldchurch' ),
        'new_item'           => __( 'New', 'chelseaoldchurch' ),
        'all_items'          => __( 'View Story', 'chelseaoldchurch' ),
        'view_item'          => __( 'View', 'chelseaoldchurch' ),
        'search_items'       => __( 'Search', 'chelseaoldchurch' ),
        'not_found'          => __( 'No story found', 'chelseaoldchurch' ),
        'not_found_in_trash' => __( 'No story found in Trash', 'chelseaoldchurch' ),
        'parent_item_colon'  => '',
        'menu_name'          => __( 'Story', 'chelseaoldchurch' ),
    ];

    register_post_type( 'story', array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'hierarchical'        => false,
        'menu_icon'           => 'dashicons-book',
        'menu_position'       => 26,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'rewrite'             => array( 'slug' => 'story', 'with_front' => false ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author' ), //,excerpt,author,editor
    ) );
}

add_action( 'init', 'chelseaoldchurch_register_event_taxonomy' );
function chelseaoldchurch_register_event_taxonomy()
{
    $labels = [
        'name'                       => _x( 'Event Categories', 'taxonomy general name', 'chelseaoldchurch' ),
        'singular_name'              => _x( 'Event Category', 'taxonomy singular name', 'chelseaoldchurch' ),
        'search_items'               => __( 'Search Event Category', 'chelseaoldchurch' ),
        'popular_items'              => __( 'Popular Event Category', 'chelseaoldchurch' ),
        'all_items'                  => __( 'All Categories', 'chelseaoldchurch' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Event Category', 'chelseaoldchurch' ),
        'update_item'                => __( 'Update Event Category', 'chelseaoldchurch' ),
        'add_new_item'               => __( 'Add New Event Category', 'chelseaoldchurch' ),
        'new_item_name'              => __( 'New Event Category Name', 'chelseaoldchurch' ),
        'separate_items_with_commas' => __( 'Separate Event Category with commas', 'chelseaoldchurch' ),
        'add_or_remove_items'        => __( 'Add or remove Event Category', 'chelseaoldchurch' ),
        'choose_from_most_used'      => __( 'Choose from the most used Event Category', 'chelseaoldchurch' ),
    ];
    register_taxonomy( 'event_category', array( 'event' ), array(
            'labels'            => $labels,
            'hierarchical'      => false,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'event-category' ),
        )
    );
}

add_action( 'init', 'chelseaoldchurch_register_story_taxonomy' );
function chelseaoldchurch_register_story_taxonomy()
{
    $labels = [
        'name'                       => _x( 'Story Categories', 'taxonomy general name', 'chelseaoldchurch' ),
        'singular_name'              => _x( 'Story Category', 'taxonomy singular name', 'chelseaoldchurch' ),
        'search_items'               => __( 'Search Story Category', 'chelseaoldchurch' ),
        'popular_items'              => __( 'Popular Story Category', 'chelseaoldchurch' ),
        'all_items'                  => __( 'All Story Categories', 'chelseaoldchurch' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Story Category', 'chelseaoldchurch' ),
        'update_item'                => __( 'Update Story Category', 'chelseaoldchurch' ),
        'add_new_item'               => __( 'Add New Story Category', 'chelseaoldchurch' ),
        'new_item_name'              => __( 'New Story Category Name', 'chelseaoldchurch' ),
        'separate_items_with_commas' => __( 'Separate Story Category with commas', 'chelseaoldchurch' ),
        'add_or_remove_items'        => __( 'Add or remove Story Category', 'chelseaoldchurch' ),
        'choose_from_most_used'      => __( 'Choose from the most used Story Category', 'chelseaoldchurch' ),
    ];
    register_taxonomy( 'story_category', array( 'story' ), array(
            'labels'            => $labels,
            'hierarchical'      => false,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'story-category' ),
        )
    );
}