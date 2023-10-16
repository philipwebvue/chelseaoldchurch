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
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'rewrite'             => array( 'slug' => 'weeks', 'with_front' => false ),
        'supports'            => array( 'title', 'thumbnail', 'editor' ),
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
        'hierarchical'        => false,
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

add_action( 'init', 'chelseaoldchurch_create_monument_post_type' );
function chelseaoldchurch_create_monument_post_type()
{
    $labels = [
        'name'               => _x( 'Monuments', 'post type general name', 'chelseaoldchurch' ),
        'singular_name'      => _x( 'Monument', 'post type singular name', 'chelseaoldchurch' ),
        'add_new'            => __( 'Add Monument', 'chelseaoldchurch' ),
        'add_new_item'       => __( 'Add Monument', 'chelseaoldchurch' ),
        'edit_item'          => __( 'Edit', 'chelseaoldchurch' ),
        'new_item'           => __( 'New', 'chelseaoldchurch' ),
        'all_items'          => __( 'View Monument', 'chelseaoldchurch' ),
        'view_item'          => __( 'View', 'chelseaoldchurch' ),
        'search_items'       => __( 'Search', 'chelseaoldchurch' ),
        'not_found'          => __( 'No Monuments found', 'chelseaoldchurch' ),
        'not_found_in_trash' => __( 'No Monuments found in Trash', 'chelseaoldchurch' ),
        'parent_item_colon'  => '',
        'menu_name'          => __( 'Monuments', 'chelseaoldchurch' ),
    ];
    register_post_type( 'monuments', array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'hierarchical'        => false,
        'menu_icon'           => 'dashicons-bank',
        'menu_position'       => 26,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'rewrite'             => array( 'slug' => 'monuments', 'with_front' => false ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author' ), //,excerpt,author,editor
    ) );
}

add_action( 'init', 'chelseaoldchurch_create_news_post_type' );
function chelseaoldchurch_create_news_post_type()
{
    $labels = [
        'name'               => _x( 'News', 'post type general name', 'chelseaoldchurch' ),
        'singular_name'      => _x( 'News', 'post type singular name', 'chelseaoldchurch' ),
        'add_new'            => __( 'Add New', 'chelseaoldchurch' ),
        'add_new_item'       => __( 'Add New', 'chelseaoldchurch' ),
        'edit_item'          => __( 'Edit', 'chelseaoldchurch' ),
        'new_item'           => __( 'New', 'chelseaoldchurch' ),
        'all_items'          => __( 'View News', 'chelseaoldchurch' ),
        'view_item'          => __( 'View', 'chelseaoldchurch' ),
        'search_items'       => __( 'Search', 'chelseaoldchurch' ),
        'not_found'          => __( 'No News found', 'chelseaoldchurch' ),
        'not_found_in_trash' => __( 'No news found in Trash', 'chelseaoldchurch' ),
        'parent_item_colon'  => '',
        'menu_name'          => __( 'News', 'chelseaoldchurch' ),
    ];

    register_post_type( 'news', array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'hierarchical'        => false,
        'menu_icon'           => 'dashicons-format-aside',
        'menu_position'       => 26,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'rewrite'             => array( 'slug' => 'news', 'with_front' => false ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author', 'excerpt' ), //,excerpt,author,editor
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
        'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'author', 'excerpt' ), //,excerpt,author,editor
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
            'show_in_rest'      => true,
            'rewrite'           => array( 'slug' => 'event-category', 'with_front' => false ),
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
            'show_in_rest'      => true,
            'rewrite'           => array( 'slug' => 'story-category', 'with_front' => false ),
        )
    );
}

add_action( 'init', 'chelseaoldchurch_register_staff_taxonomy' );
function chelseaoldchurch_register_staff_taxonomy()
{
    $labels = [
        'name'                       => _x( 'Staff Categories', 'taxonomy general name', 'chelseaoldchurch' ),
        'singular_name'              => _x( 'Staff Category', 'taxonomy singular name', 'chelseaoldchurch' ),
        'search_items'               => __( 'Search Staff Category', 'chelseaoldchurch' ),
        'popular_items'              => __( 'Popular Staff Category', 'chelseaoldchurch' ),
        'all_items'                  => __( 'All Staff Categories', 'chelseaoldchurch' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Staff Category', 'chelseaoldchurch' ),
        'update_item'                => __( 'Update Staff Category', 'chelseaoldchurch' ),
        'add_new_item'               => __( 'Add New Staff Category', 'chelseaoldchurch' ),
        'new_item_name'              => __( 'New Staff Category Name', 'chelseaoldchurch' ),
        'separate_items_with_commas' => __( 'Separate Staff Category with commas', 'chelseaoldchurch' ),
        'add_or_remove_items'        => __( 'Add or remove Staff Category', 'chelseaoldchurch' ),
        'choose_from_most_used'      => __( 'Choose from the most used Staff Category', 'chelseaoldchurch' ),
    ];
    register_taxonomy( 'staff_category', array( 'staff' ), array(
            'labels'            => $labels,
            'hierarchical'      => false,
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true,
            'rewrite'           => array( 'slug' => 'staff-category', 'with_front' => false ),
        )
    );
}

add_action( 'init', 'chelseaoldchurch_register_monument_taxonomy' );
function chelseaoldchurch_register_monument_taxonomy()
{
    $labels = [
        'name'                       => _x( 'Monument Categories', 'taxonomy general name', 'chelseaoldchurch' ),
        'singular_name'              => _x( 'Monument Category', 'taxonomy singular name', 'chelseaoldchurch' ),
        'search_items'               => __( 'Search Monument Category', 'chelseaoldchurch' ),
        'popular_items'              => __( 'Popular Monument Category', 'chelseaoldchurch' ),
        'all_items'                  => __( 'All Monument Categories', 'chelseaoldchurch' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Monument Category', 'chelseaoldchurch' ),
        'update_item'                => __( 'Update Monument Category', 'chelseaoldchurch' ),
        'add_new_item'               => __( 'Add New Monument Category', 'chelseaoldchurch' ),
        'new_item_name'              => __( 'New Monument Category Name', 'chelseaoldchurch' ),
        'separate_items_with_commas' => __( 'Separate Monument Category with commas', 'chelseaoldchurch' ),
        'add_or_remove_items'        => __( 'Add or remove Monument Category', 'chelseaoldchurch' ),
        'choose_from_most_used'      => __( 'Choose from the most used Monument Category', 'chelseaoldchurch' ),
    ];
    register_taxonomy( 'monument_category', array( 'monuments' ), array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true,
            'rewrite'           => array( 'slug' => 'monument-category', 'with_front' => false ),
        )
    );
}

add_action( 'init', 'chelseaoldchurch_register_news_taxonomy' );
function chelseaoldchurch_register_news_taxonomy()
{
    $labels = [
        'name'                       => _x( 'News Categories', 'taxonomy general name', 'chelseaoldchurch' ),
        'singular_name'              => _x( 'News Category', 'taxonomy singular name', 'chelseaoldchurch' ),
        'search_items'               => __( 'Search News Category', 'chelseaoldchurch' ),
        'popular_items'              => __( 'Popular News Category', 'chelseaoldchurch' ),
        'all_items'                  => __( 'All News Categories', 'chelseaoldchurch' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit News Category', 'chelseaoldchurch' ),
        'update_item'                => __( 'Update News Category', 'chelseaoldchurch' ),
        'add_new_item'               => __( 'Add New News Category', 'chelseaoldchurch' ),
        'new_item_name'              => __( 'New News Category Name', 'chelseaoldchurch' ),
        'separate_items_with_commas' => __( 'Separate News Category with commas', 'chelseaoldchurch' ),
        'add_or_remove_items'        => __( 'Add or remove News Category', 'chelseaoldchurch' ),
        'choose_from_most_used'      => __( 'Choose from the most used News Category', 'chelseaoldchurch' ),
    ];
    register_taxonomy( 'news_category', array( 'news' ), array(
            'labels'            => $labels,
            'hierarchical'      => false,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'news-category', 'with_front' => false ),
        )
    );
}