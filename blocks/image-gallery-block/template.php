<?php
/**
 * Image Gallery Template.
 *
 * @param   array $block The block settings and attributes.
 */

$anchor = $block['id'];
if ( ! empty( $block['anchor'] ) ) {
    $anchor = esc_attr( $block['anchor'] );
}
$class_name = 'image-gallery-block ';
if(!empty( $block['className'])){
    $class_name .= $block['className'];
}
?>
<div id="<?php echo $anchor; ?>" class="<?php echo esc_attr( $class_name ); ?>">
    <?php if(have_rows('images')):?>
        <div class="image-gallery-grid">
            <?php while(have_rows('images')):
                the_row();
                $image_caption = get_sub_field('caption');
                $imageId = get_sub_field('image');
                $image = wp_get_attachment_image( $imageId, 'large');
                $imageFull = wp_get_attachment_image_src( $imageId, 'full' );
                ?>
                <div class="image-item">
                    <a href="<?php echo $imageFull[0];?>" class="image-gallery-large w-full h-full absolute top-0 left-0 z-10" title="<?php echo $image_caption;?>"></a>
                    <div class="image-wrapper">
                        <?php echo $image;?>
                    </div>
                    <div class="image-caption text-1xbase font-light pt-3">
                        <?php echo $image_caption;?>
                    </div>
                </div>
                <?php
            endwhile;?>
        </div>
    <?php endif;?>
</div>