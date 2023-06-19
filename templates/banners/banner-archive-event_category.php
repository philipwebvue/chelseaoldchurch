<?php 
$term = get_queried_object();
?>
<div class="w-full mx-auto relative aspect-banner">
    <div class="relative aspect-banner w-full">
        <?php
        $position = get_field( 'event_header_image_position', 'option' ) ? get_field( 'event_header_image_position', 'option' ) : 'center';
        $bannerImage = get_field( 'event_header_image', 'option' );
        $image_args=[
            'class'=>" object-cover aspect-banner lg:absolute lg:top-0 lg:left-0 lg:w-full lg:h-full object-".$position." ",
            'loading'=>'',
        ];
        echo wp_get_attachment_image( $bannerImage['ID'], 'banner-image', $image_args );
        ?>
    </div>
</div>