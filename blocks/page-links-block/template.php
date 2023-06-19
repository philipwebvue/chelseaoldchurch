<?php
/**
 * Page links Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$anchor = $block['id'];
if ( ! empty( $block['anchor'] ) ) {
    $anchor = esc_attr( $block['anchor'] );
}

$class_name = 'page-links';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$page_links  = get_field('page_links');
if(!empty($page_links)):
?>
<div id="<?php echo $anchor; ?>" class="<?php echo esc_attr( $class_name ); ?>">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-3">
        <?php
        foreach($page_links as $pglink):
            global $post;
            $post = $pglink;
            setup_postdata( $post );
            $args = [
                'show_body' => false,
                'show_date' => false,
            ];

            get_template_part( 'templates/components/cards/card', 'pagelink', $args );
            wp_reset_postdata();
        endforeach;
        ?>
    </div>
</div>
<?php
endif;