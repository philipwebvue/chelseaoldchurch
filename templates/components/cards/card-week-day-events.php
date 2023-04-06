<?php
/**
 * card.php
 *
 *
 * @package ottra
 * @author Philip Bradbury
 * @created 20/04/2022 14:00
 * @since 1.0
 * @updated 1.0
 */

$default_args = [
    'key'  => '',
    'name'   => '',
    'date'  => '',
    'is_sunday'   => false,
    'date_format' => get_option( 'date_format' )
];
$args = array_merge( $default_args, $args );

?>
<div class="card-week-day-event <?php echo $args['is_sunday']?'is-sunday':'';?>">
    <div class="card-header">
        <h4><?php echo $args[ 'name' ]; ?></h4>
        <h4><?php echo $args[ 'date' ]; ?></h4>
    </div>
    <div class="card-body">
        <div class="text-center">
            <?php echo wpautop( get_field( $args[ 'key' ] . '_information' ) ); ?>
        </div>
    </div>
</div>
