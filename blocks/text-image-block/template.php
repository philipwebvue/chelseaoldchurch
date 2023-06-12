<?php
/**
 * Text image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $title_primary The block title.
 * @param   string $title_secondary for Secondary block title.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 */

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_name = 'text-image-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$title_primary = get_field('title_primary');
$title_secondary = get_field('title_secondary');
$content = get_field('text_content');
$link_1 = get_field('link_1');
$link_2 = get_field('link_2');
$image = get_field('image');
$image_position= get_field('image_position');


?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container xl:max-w-content-desktop px-5 sm:px-0 md:px-5 mx-auto">
        <div class="flex flex-col <?php echo $image_position=='right' ? 'md:flex-row-reverse': 'md:flex-row';?>">
            <?php if($image):?>
            <div class="text-image-imgcol mb-5 md:mb-0">
                <?php if($title_primary!=''):?>
                <h2 class="h1 title_primary md:hidden"><?php echo $title_primary;?></h2>
                <?php endif; ?>
                <div class="image-wrapper relative">
                    <?php
                    $img_atts = wp_get_attachment_image_src( $image, 'medium_large' );
                    ?>
                    <img class="absolute object-cover top-0 left-0 w-full h-full" src="<?php echo $img_atts[0]; ?>" width="<?php echo $img_atts[1]; ?>" height="<?php echo $img_atts[2]; ?>" alt="" />
                </div>
            </div>
            <?php endif;?>
            <div class="text-image-contentcol <?php echo $image_position=='right' ? 'md:pr-10 xl:pr-20': 'md:pl-10 xl:pl-20';?>">
                <?php if($title_primary!=''):?>
                <h2 class="h1 title_primary hidden md:block"><?php echo $title_primary;?></h2>
                <?php endif; ?>
                <?php if($title_secondary!=''):?>
                <h3 class="h2 title_secondary"><?php echo $title_secondary;?></h3>
                <?php endif; ?>
                <?php echo $content;?>
                <div class="flex flex-col items-center md:items-start">
                    <?php
                    if($link_1):
                        ?><div class="mb-2.5"><?php echo get_acflink_html($link_1,'button');?></div>
                        <?php
                    endif;
                    ?>
                    <?php
                    if($link_2):
                        ?><div><?php echo get_acflink_html($link_2,'button');?></div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>