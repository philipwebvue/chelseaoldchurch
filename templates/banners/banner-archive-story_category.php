<?php 
$term = get_queried_object();
?>
<div class="max-w-content mx-auto relative">
    <div class="relative">
        <?php
        $position = get_field( 'story_header_image_position', 'option' );
        $bannerImage = get_field( 'story_header_image', 'option' );
        $image_args=[
            'class'=>" aspect-banner object-cover object-".$position ? $position : 'center'." ",
            'loading'=>'',
        ];
        echo wp_get_attachment_image( $bannerImage['ID'], 'banner-image', $image_args );
        ?>
    </div>
</div>