<?php
/**
 * Images grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_name = 'images-grid';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$images  = get_field('images');
if($images && sizeof($images) > 0):
?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container px-5 xl:px-0 mx-auto">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 lg:gap-4">
            <?php
            foreach($images as $img):
                $image_html = wp_get_attachment_image( $img['image'], 'medium_large', false, ['class'=>'absolute w-full h-full top-0 left-0 object-cover duration-300'] );
                ?>
                <a href="<?php echo $img['link']['url'];?>" title="<?php echo $img['link']['title'];?>" class="image-col relative block overflow-hidden">
                    <div class="relative aspect-square w-full h-full">
                        <?php echo $image_html;?>
                    </div>
                    <div class="image-title"><?php echo $img['title'];?></div>
                </a>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</div>
<?php
endif;