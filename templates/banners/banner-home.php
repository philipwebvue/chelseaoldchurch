<div class="max-w-content mx-auto relative">
    <div class="">
        <?php
        $position = get_post_meta(get_the_ID(),'featured_image_position',true);
        $image_args=[
                'class'=>" aspect-banner object-cover object-".$position ? $position : 'center'." ",
                'loading'=>'',
        ];
        echo get_the_post_thumbnail( get_the_ID(), 'banner-image', $image_args );
        ?>
    </div>
</div>