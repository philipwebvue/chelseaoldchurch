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

$class_name = 'text-image-block latest-story';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$title_primary = get_field('title_primary');
$image_position = get_field('image_position');
$story = get_field('story');
$link = get_field('link');
if($story):
    $imageid = get_post_thumbnail_id($story);
    $title_secondary = get_the_title( $story );
    $content = get_the_excerpt( $story );
?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container xl:max-w-content-desktop px-5 mx-auto">
        <div class="flex flex-col <?php echo $image_position=='right' ? 'md:flex-row-reverse': 'md:flex-row';?>">
            <?php if($imageid):?>
            <div class="text-image-imgcol mb-5 md:mb-0">
                <?php if($title_primary!=''):?>
                <h2 class="h1 title_primary md:hidden"><?php echo $title_primary;?></h2>
                <?php endif; ?>
                <div class="image-wrapper relative">
                    <?php
                        $img_atts = wp_get_attachment_image_src( $imageid, 'medium_large' );
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
                <?php echo wpautop( $content );?>
                <div class="flex flex-col items-center md:items-start">
                    <div class="mb-2.5"><a href="<?php echo get_the_permalink( $story );?>" class="button">Read On</a></div>
                    <?php
                    if($link):
                        ?><div><?php echo get_acflink_html($link,'button');?></div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
endif;
?>