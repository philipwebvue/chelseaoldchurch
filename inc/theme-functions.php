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

function chelseaoldchurch_archive_post_type_fields( $post_type, $page_name, $title )
{
    acf_add_local_field_group( array(
        'key'                   => 'group_' . $post_type,
        'title'                 => $title . ' page',
        'fields'                => array(
            array(
                'key'               => 'field_banner_tab_' . $post_type,
                'label'             => 'Banner',
                'name'              => '',
                'type'              => 'tab',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'placement'         => 'left',
                'endpoint'          => 0,
            ),
            array(
                'key'               => 'field_banner_checkbox_' . $post_type,
                'label'             => 'Show Banner Image',
                'name'              => $post_type . '_show_background_image',
                'type'              => 'true_false',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '30%',
                    'class' => '',
                    'id'    => '',
                ),
                'message'           => '',
                'default_value'     => 1,
                'ui'                => 1,
                'ui_on_text'        => '',
                'ui_off_text'       => '',
            ),
            array(
                'key'               => 'field_banner_select_' . $post_type,
                'label'             => 'Position',
                'name'              => $post_type . '_header_image_position',
                'type'              => 'select',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '70%',
                    'class' => '',
                    'id'    => '',
                ),
                'choices'           => array(
                    'default'      => 'Default',
                    'left-top'     => 'Top Left',
                    'top'          => 'Top Center',
                    'right-top'    => 'Top Right',
                    'left'         => 'Center Left',
                    'center'       => 'Center Center',
                    'right'        => 'Center Right',
                    'left-bottom'  => 'Bottom Left',
                    'bottom'       => 'Bottom Center',
                    'right-bottom' => 'Bottom Right',
                ),
                'default_value'     => false,
                'allow_null'        => 0,
                'multiple'          => 0,
                'ui'                => 0,
                'return_format'     => 'value',
                'ajax'              => 0,
                'placeholder'       => '',
            ),
            array(
                'key'               => 'field_banner_image_' . $post_type,
                'label'             => 'Banner Image',
                'name'              => $post_type . '_header_image',
                'type'              => 'image',
                'instructions'      => 'Leave blank to use feature image',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'return_format'     => 'array',
                'preview_size'      => 'medium',
                'library'           => 'all',
                'min_width'         => '',
                'min_height'        => '',
                'min_size'          => '',
                'max_width'         => '',
                'max_height'        => '',
                'max_size'          => '',
                'mime_types'        => '',
            ),

            array(
                'key'               => 'field_introduction_tab_' . $post_type,
                'label'             => 'Introduction',
                'name'              => '',
                'type'              => 'tab',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'placement'         => 'left',
                'endpoint'          => 0,
            ),
            array(
                'key'               => 'field_introduction_title_' . $post_type,
                'label'             => 'Title',
                'name'              => $post_type.'_title',
                'aria-label'        => '',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
            ),
            array(
                'key'               => 'field_introduction_wysiwyg_' . $post_type,
                'label'             => 'Introduction',
                'name'              => $post_type . '_introduction',
                'type'              => 'wysiwyg',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'default_value'     => '',
                'tabs'              => 'visual',
                'toolbar'           => 'basic',
                'media_upload'      => 0,
                'delay'             => 0,
            ),
        ),
        'location'              => array(
            array(
                array(
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => $page_name,
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => '',
        'active'                => true,
        'description'           => '',
    ) );
}