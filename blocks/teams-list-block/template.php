<?php
/**
 * Team list Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

 $anchor = '';
 if ( ! empty( $block['anchor'] ) ) {
     $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
 }
 
 $class_name = 'team-list-block';
 if ( ! empty( $block['className'] ) ) {
     $class_name .= ' ' . $block['className'];
 }

 $class_name .= ' team-list-view';
 $qrags = [
    'post_type'              => [ 'staff' ],
	'post_status'            => ['publish' ],
    'posts_per_page'         => -1, //get_option('posts_per_page')
 ];
 $qrags['orderby'] = 'menu_order';  
 $qrags['order'] = 'ASC';
 $query = new WP_Query($qrags);
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <?php if ( $query->have_posts() ): ?>
        <div class="mb-4 lg:mb-14 pt-5 lg:pt-7 pb-0.5 flex justify-center flex-wrap">
            <?php get_template_part( 'templates/navigation/menu', 'custom-taxonomies-staff_category', [ 'taxonomy' => 'staff_category' ] ); ?>
        </div>
        <div>
            <?php while ( $query->have_posts() ) : ?>
                <?php $query->the_post(); ?>
                <?php
                $args = [
                    'show_date' => true,
                    'show_body' => true,
                ];
                
                get_template_part( 'templates/components/cards/card', 'staff', $args );
                ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php
    wp_reset_postdata();
    ?>
</div>