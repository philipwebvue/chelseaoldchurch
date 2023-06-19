<?php
$postID = get_the_ID(); 
$show_background_image = get_field('show_background_image',$postID);
$header_image = get_field('header_image',$postID);

if($show_background_image && !empty($header_image)): ?>
<div class="w-full mx-auto relative aspect-banner">
    <div class="relative aspect-banner w-full">
        <?php
        $position = get_field('header_image_position',$postID) ? get_field('header_image_position',$postID) : 'center';
        $image_args=[
                'class'=>"object-cover aspect-banner lg:absolute lg:top-0 lg:left-0 lg:w-full lg:h-full object-".$position." ",
                'loading'=>'',
        ];
        echo wp_get_attachment_image( $header_image, 'banner-image', false, $image_args );
        ?>
    </div>
</div>
<?php
endif;
?>