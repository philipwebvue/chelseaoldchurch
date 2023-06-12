<?php
/**
 * Banner Intro Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $title The block title.
 * @param   string $title_tag HTML Heading tag (H1).
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
$class_name = 'banner-intro-block mx-auto bg-white py-4 lg:py-9 relative';

$content_width = get_field('content_width');

$title = get_field('title');
$title_tag = get_field('title_tag') ? get_field('title_tag') : 'h1';
$title_class = 'heading font-prata text-3xl text-center';

if($content_width =='single'):
    $class_name .= ' max-w-[90vw] 2xl:max-w-content-single';
    $title_class .= ' mb-4 lg:mb-5';
else:
    $class_name .= ' max-w-[90vw] 2xl:max-w-content-desktop';
    $title_class .= ' mb-4 lg:mb-12';
endif;

$heading = !empty($title) ? '<'.$title_tag.' class="'.$title_class.'">'.$title.'</'.$title_tag.'>' : null;

$content = get_field('content');
$link = get_field('link');
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <div class="flex justify-center">
        <?php echo custom_breadcrumbs(['separator'=>'<span class="px-1.5">/</span>']);?>
    </div>
    <?php if($heading!=null):?>
        <?php echo $heading;?>
    <?php endif;?>
    <div class="<?php echo $content_width =='single' ? 'content' : 'content large';?>">
        <?php echo $content;?>
        <?php
        if($link):
            ?><div class="flex justify-center">
                <div>
                    <?php echo get_acflink_html($link,'button');?>
                </div>
            </div>
            <?php
        endif;
        ?>
    </div>
</div>