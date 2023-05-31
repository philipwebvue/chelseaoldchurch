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
$class_name = 'banner-intro-block max-w-content-single mx-auto bg-white py-4 lg:py-9 relative';

$title = get_field('title');
$title_tag = get_field('title_tag') ? get_field('title_tag') : 'h1';

$heading = !empty($title) ? '<'.$title_tag.' class="heading font-prata text-3xl text-center mb-4 lg:mb-5">'.$title.'</'.$title_tag.'>' : null;

$content = get_field('content');
$link = get_field('link');
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <?php if($heading!=null):?>
        <?php echo $heading;?>
    <?php endif;?>
    <div class="content">
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