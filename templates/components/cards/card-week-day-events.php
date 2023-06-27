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
    'key'       => '',
    'name'      => '',
    'date'      => '',
    'is_sunday' => false,
];
$args = array_merge( $default_args, $args );
$show_data = get_field( 'show_' . $args[ 'key' ] . '_section' ) ?? false;
$events_data = get_field( $args[ 'key' ] . '_day_events' ) ?? [];

?>
<div class="card-week-day-event <?php echo $args[ 'is_sunday' ] ? 'is-sunday' : ''; ?>">
    <div class="card-header">
        <h4 class="mb-0"><?php echo $args[ 'name' ]; ?></h4>
        <h4 class="mb-0"><?php echo $args[ 'date' ]; ?></h4>
    </div>
    <?php if ( $show_data ): ?>
        <div class="card-body">
            <div class="introduction text-center mb-2.5">
                <?php echo wpautop( get_field( $args[ 'key' ] . '_information' ) ); ?>
            </div>
            <div class="events">
                <?php if ( is_array( $events_data ) ): ?>
                    <?php foreach ( $events_data as $event_data ): ?>
                        <div class="event mb-5">
                            <p class="font-prata mb-0"><?php echo wp_date( 'h:ia', strtotime( get_field( 'event_date_time', $event_data->ID ) ) ); ?> <?php echo $event_data->post_title; ?></p>
                            <p class="event-meta font-theme font-light"><?php echo get_field( 'event_meta', $event_data->ID ); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
