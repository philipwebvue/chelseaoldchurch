<?php
/**
 * card.php
 *
 *
 * @package ottra
 * @author Philip Bradbury
 * @created 20/04/2022 14:00
 * @since 1.0
 * @updated 1.0
 */

$default_args = [
    'show_title' => true,
    'show_body' => true,
    'show_image' => true,
    'show_date' => false,
    'date_format' => get_option('date_format')
];

$args = array_merge($default_args, $args);

$image = apply_filters('cs_display_featured_image',get_the_ID());
?>
<div class="card" >

    <a class="absolute z-10 top-0 left-0 w-full h-full " href="<?php the_permalink(); ?>"></a>
    <?php if ($args['show_image']): ?>
        <div class="card-header">
                <?php echo $image ?>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <?php if ($args['show_title']): ?>
            <h3 class="title font-semibold mb-0">
                <?php the_title(); ?>
            </h3>
        <?php endif; ?>

        <?php if ($args['show_date']): ?>
            <p class="date"><?php echo get_the_date($args['date_format']); ?></p>
        <?php endif; ?>

        <?php if ($args['show_body']): ?>
            <div class="excerpt">
                <?php
                $excerpt = get_field('excerpt');
                if (!empty($excerpt)):
                    echo wpautop($excerpt);
                endif;
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>
