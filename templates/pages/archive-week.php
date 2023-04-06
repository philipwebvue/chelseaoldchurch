<?php
$days_of_the_week = [
    'monday'    => [
        'name' => 'Monday'
    ],
    'tuesday'   => [
        'name' => 'Tuesday'
    ],
    'wednesday' => [
        'name' => 'Wednesday'
    ],
    'thursday'  => [
        'name' => 'Thursday'
    ],
    'friday'    => [
        'name' => 'Friday'
    ],
    'saturday'  => [
        'name' => 'Saturday'
    ]
]
?>
<section class="">
    <div class=" w-full max-w-content mx-auto"> <?php // xl:max-w-content ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-8 ">
            <div class="col-span-2 grid grid-cols-2">
                <?php foreach ( $days_of_the_week as $key => $day ): ?>
                    <?php $show_day = get_field( 'show_' . $key . '_section' ) ?? false; ?>
                    <?php if ( $show_day ): ?>
                        <div class="text-center">
                            <h4><?php echo $day[ 'name' ]; ?></h4>
                            <div>
                                <?php echo wpautop( get_field( $key . '_information' ) ); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="">
                <?php $show_day = get_field( 'show_sunday_section' ) ?? false; ?>
                <?php if ( $show_day ): ?>
                    <div class="text-center">
                        <h4>Sunday</h4>
                        <div>
                            <?php echo wpautop( get_field( 'sunday_information' ) ); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>