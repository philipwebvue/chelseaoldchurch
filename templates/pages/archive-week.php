<?php
$start_date = get_field('event_week_day');
$days_of_the_week = [
    'monday'    => [
        'name' => 'Monday',
        'date' => date('jS F', strtotime($start_date.' +1 day'))
    ],
    'tuesday'   => [
        'name' => 'Tuesday',
        'date' => date('jS F', strtotime($start_date .' +2 day'))
    ],
    'wednesday' => [
        'name' => 'Wednesday',
        'date' => date('jS F', strtotime($start_date .' +3 day'))
    ],
    'thursday'  => [
        'name' => 'Thursday',
        'date' => date('jS F', strtotime($start_date .' +4 day'))
    ],
    'friday'    => [
        'name' => 'Friday',
        'date' => date('jS F', strtotime($start_date .' +5 day'))
    ],
    'saturday'  => [
        'name' => 'Saturday',
        'date' => date('jS F', strtotime($start_date .' +6 day'))
    ]
]
?>
<section class="">
    <div class=" w-full max-w-content mx-auto"> <?php // xl:max-w-content ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-8 ">
            <div class="col-span-2 grid grid-cols-2 gap-4 lg:gap-8">
                <?php foreach ( $days_of_the_week as $key => $day ): ?>
                    <?php
                    $card_args = [
                        'key'       => $key,
                        'name'      => $day[ 'name' ],
                        'date'      => $day['date'],
                        'is_sunday' => false,
                    ];
                    ?>
                    <?php get_template_part( 'templates/components/cards/card', 'week-day-events', $card_args ); ?>
                <?php endforeach; ?>
            </div>
            <div class="">
                <?php
                $show_day = get_field( 'show_sunday_section' ) ?? false;
                $card_args = [
                    'key'       => 'sunday',
                    'name'      => 'Sunday',
                    'date'      => date('jS F', strtotime($start_date .' +7 day')),
                    'is_sunday' => true,
                ];
                ?>
                <?php get_template_part( 'templates/components/cards/card', 'week-day-events', $card_args ); ?>
            </div>
        </div>
    </div>
</section>