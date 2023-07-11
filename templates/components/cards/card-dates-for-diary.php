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

$title = get_field( 'dates_for_diary_title', 'option' ) ?? '';
$events_data = get_field( 'dates_for_diary_events', 'option' ) ?? [];

?>
<div class="card-week-day-event <?php echo $args[ 'is_sunday' ] ? 'is-sunday' : ''; ?>">
    <div class="card-header">
        <h4 class="mb-0"><?php echo $title; ?></h4>
    </div>
    <div class="card-body">
        <div class="events text-center">
            <?php if ( is_array( $events_data ) ): ?>
                <?php foreach ( $events_data as $event_data ): ?>
                    <p class="mt-6 !font-medium !text-lg mb-4 !text-black"><?php echo wp_date( 'l jS M Y', strtotime( get_field( 'event_date_time', $event_data->ID ) ) ); ?></p>
                    <div class="event mb-5">
                        <p class="!font-medium !text-base mb-0 !text-black"><?php echo wp_date( 'g:ia', strtotime( get_field( 'event_date_time', $event_data->ID ) ) ); ?> <?php echo $event_data->post_title; ?></p>
                        <p class="event-meta !text-1xbase font-theme font-light"><?php echo get_field( 'event_meta', $event_data->ID ); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'dates_for_diary_custom_dates', 'option' ) ): ?>
                <?php while ( have_rows( 'dates_for_diary_custom_dates', 'option' ) ) : the_row(); ?>
                    <p class="mt-6 !font-medium !text-lg mb-4 !text-black"><?php echo  get_sub_field( 'date' ); ?></p>
                    <?php if ( have_rows( 'custom_events' ) ): ?>
                        <?php while ( have_rows( 'custom_events' ) ) : the_row(); ?>
                            <div class="event mb-2">
                                <p class="!font-medium !text-base mb-0 !text-black"><?php echo wp_date( 'g:ia', strtotime( get_sub_field( 'custom_event_time' ) ) ); ?> <?php echo get_sub_field( 'custom_event_item' ); ?></p>
                                <p class="event-meta !text-1xbase font-theme font-light"><?php echo get_sub_field( 'custom_event_item_meta' ); ?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="taxonomy-list mt-4">
        <a href="<?php echo home_url( '/events' ); ?>">View All Upcoming Events</a>
    </div>
</div>
