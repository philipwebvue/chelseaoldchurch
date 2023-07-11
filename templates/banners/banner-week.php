<?php 

$post_type = get_post_type();


?>
<div class="max-w-content mx-auto relative">
    <div class="relative aspect-banner w-full">
        <?php
        $position = get_field( $post_type.'_header_image_position', 'option' ) ? get_field( $post_type.'_header_image_position', 'option' ) : 'center';
        $bannerImage = get_field( $post_type.'_header_image', 'option' );
        $image_args=[
            'class'=>"object-cover aspect-banner lg:absolute lg:top-0 lg:left-0 lg:w-full lg:h-full object-".$position." ",
            'loading'=>'',
        ];
        echo wp_get_attachment_image( $bannerImage['ID'], 'banner-image', $image_args );
        ?>
    </div>
</div>