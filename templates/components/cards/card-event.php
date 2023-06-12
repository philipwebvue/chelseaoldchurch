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
    'ID' => get_the_ID(),
    'show_title' => true,
    'show_body' => true,
    'show_image' => true,
    'show_date' => false,
    'date_format' => get_option('date_format')
];
$args = array_merge($default_args, $args);

$image = apply_filters('cs_display_featured_image',$args['ID']);
$maincontent = get_the_content($args['ID']);
$event_date = get_field('event_date_time', $args['ID']);
?>
<div class="card-wide" >
    <?php if ($args['show_image']): 
        if($maincontent!=""):
        ?>
        <a class="card-header" href="<?php the_permalink($args['ID']); ?>">
            <div class="image-wrapper">
                <?php echo $image ?>
            </div>
        </a>
        <?php 
        else:
        ?>
        <div class="card-header"">
            <div class="image-wrapper">
                <?php echo $image; ?>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="card-body">
        <?php if ($args['show_title']): ?>
            <h3 class="title">
                <?php if($maincontent!=""): ?>
                <a href="<?php the_permalink($args['ID']); ?>"><?php the_title(); ?></a>
                <?php else: ?>
                    <?php the_title(); ?>
                <?php endif; ?>
            </h3>
        <?php endif; ?>

        <?php if ($args['show_date']): ?>
            <p class="date"><?php echo date($args['date_format'],strtotime($event_date)); ?></p>
        <?php endif; ?>

        <?php if ($args['show_body']): ?>
            <div class="excerpt">
                <?php
                    $excerpt = get_the_excerpt($args['ID']);
                    if($maincontent!=""):
                        $excerpt.=sprintf(' <a href=%s>%s</a>',get_permalink($args['ID']),'Find Out More');
                    endif;
                    echo wpautop($excerpt);
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>