<?php
/**
 * card-pagelink.php
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
    'show_image' => true,
];
$args = array_merge($default_args, $args);

$image = apply_filters('cs_display_featured_image',get_the_ID());
?>
<div class="card-pagelink" >
    <a class="absolute z-10 top-0 left-0 w-full h-full " href="<?php the_permalink(); ?>"></a>
    <?php if ($args['show_image']): ?>
        <div class="card-header">
            <?php echo $image ?>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <?php if ($args['show_title']): ?>
            <h3 class="title">
                <?php the_title(); ?>
            </h3>
        <?php endif; ?>
    </div>
</div>
