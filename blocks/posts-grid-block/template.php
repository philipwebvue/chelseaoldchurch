<?php
/**
 * Posts grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

 $anchor = '';
 if ( ! empty( $block['anchor'] ) ) {
     $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
 }
 
 $class_name = 'posts-grid';
 if ( ! empty( $block['className'] ) ) {
     $class_name .= ' ' . $block['className'];
 }

 $post_type = get_field('post_type') ? get_field('post_type') : 'post';
 $class_name .= ' ' . get_field('post_type').'-list-view';
 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
 $qrags = [
    'post_type'              => [ $post_type ],
	'post_status'            => ['publish' ],
    'posts_per_page'         => get_option('posts_per_page'),
    'paged' => $paged
 ];
 if($post_type=='event'):
    $qrags['orderby'] = 'meta_value'; 
    $qrags['meta_key'] = 'event_date_time'; 
    $qrags['order'] = 'DESC'; 
 else:
    $qrags['orderby'] = 'date';  
    $qrags['order'] = 'DESC';
 endif;
 $query = new WP_Query($qrags);
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <?php if ( $query->have_posts() ): ?>
        <div class="mb-4 lg:mb-9">
            <?php get_template_part( 'templates/navigation/menu', 'custom-taxonomies', [ 'taxonomy' => $post_type . '_category' ] ); ?>
        </div>
        <div>
            <?php while ( $query->have_posts() ) : ?>
                <?php $query->the_post(); ?>
                <?php
                $args = [
                    'show_date' => true,
                    'show_body' => true,
                ];
                
                get_template_part( 'templates/components/cards/card', get_post_type(), $args );
                ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <div class="pagination-container flex justify-center">
        <?php ottra_numeric_posts_nav($query); ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>
</div>