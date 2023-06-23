<?php
/**
 * page.php
 *
 *
 * @package stalbans
 * @author Philip Bradbury
 * @created 03/04/2023 14:08
 * @since 1.0
 * @updated 1.0
 */

 $default_args=[
    'is_archieve'=>false,
];

$args = array_merge($default_args, $args);

?>
<div id="page-content">
    <?php if($args['is_archieve']):?>
        <div id="post-content" class="w-full max-w-content-desktop mx-auto px-6 lg:px-5">
            <?php the_content(); ?>
        </div>
    <?php else:?>
        <div id="post-content" class="mx-auto max-w-content-left px-6 lg:px-8">
            <?php the_content(); ?>
        </div>
    <?php endif;?>
</div>
