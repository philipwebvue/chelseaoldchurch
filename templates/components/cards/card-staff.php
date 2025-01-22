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

$image = apply_filters('cs_display_featured_image', $args['ID']);
$maincontent = get_the_content($args['ID']);
$terms_list = get_the_terms($args['ID'], 'staff_category');

$termClasses = [];
if ($terms_list):
    foreach ($terms_list as $sterms):
        $termClasses[] = $sterms->slug;
    endforeach;
endif;
?>
<div class="card card-staff p-0 relative <?php echo implode(" ", $termClasses); ?>"> <?php //card-wide ?>
    <?php if ($args['show_image']): ?>
        <div class="card-header-staff relative w-full overflow-hidden !aspect-square">
            <div class="image-wrapper !aspect-square">
                <?php echo $image; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <?php if ($args['show_title']): ?>
            <h3 class="title text-primary text-base text-center">
                <?php the_title(); ?>
            </h3>
        <?php endif; ?>
        <?php if (get_field('staff_role', $args['ID'])): ?>
            <div class="font-medium mb-3 text-base text-center"><?php echo get_field('staff_role', $args['ID']); ?></div>
        <?php endif; ?>
        <?php if ($args['show_body']): ?>
            <div class="excerpt">
                <?php
                $excerpt = get_field('custom_excerpt', $args['ID']);
                if ($maincontent != ""):
                    $excerpt .= sprintf(' <a href=%s class="staff-more-popup">%s</a>', '#' . sanitize_title(get_the_title()), 'Find Out More');
                else:
                    $excerpt .= sprintf(' <a href=%s class="staff-more-popup hidden">%s</a>', '#' . sanitize_title(get_the_title()), '');
                endif;
                echo $excerpt;
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>