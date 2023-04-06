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

<div class="navigation flex justify-between">
    <div>
        <?php previous_post_link('&laquo; %link', $args['prev']); ?>
    </div>
    <div>
        <?php next_post_link('%link &raquo;', $args['next']); ?>
    </div>
</div>
