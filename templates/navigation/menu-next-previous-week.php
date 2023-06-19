<?php
/**
 * menu-next-previous.php
 *
 *
 * @package stalbans
 * @author Philip Bradbury
 * @created 06/04/2023 22:52
 * @since 1.0
 * @updated 1.0
 */
$default_args=[
    'next'=>'next',
    'prev'=>'prev',
];

$args = array_merge($default_args, $args);
?>

<div class="week-navigation flex justify-between items-end mb-11">
    <div class="font-theme uppercase text-mxl week-nav-prev">
        <?php previous_post_link('<i class="icon-prev"></i> %link', $args['prev']); ?>
    </div>
    <div class="text-center">
        <div class="font-theme uppercase text-mxl">Week starting</div>
        <h1 class="text-primary"><?php echo $args['week_start'];?></h1>
    </div>
    <div class="font-theme uppercase text-mxl week-nav-next">
        <?php next_post_link('%link <i class="icon-next"></i>', $args['next']); ?>
    </div>
</div>
