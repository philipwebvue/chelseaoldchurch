<?php $post_type = get_queried_object()->name; ?>
<div class="banner-intro-block bg-white max-w-content-desktop mx-auto py-4 lg:py-9 relative text-center">
    <div class="flex justify-center">
        <?php echo custom_breadcrumbs(['separator'=>'<span class="px-1.5">/</span>']);?>
    </div>
    <h1 class="heading font-prata text-3xl text-center mb-4 lg:mb-5"><?php echo get_field( $post_type . '_title', 'option' ) ?? get_the_archive_title(); ?></h1>
    <?php if ( get_field( $post_type . '_introduction', 'option' ) ): ?>
        <div class="content large pb-9 text-left">
            <?php echo wpautop( get_field( $post_type . '_introduction', 'option' ) ); ?>
        </div>
    <?php endif; ?>
    <?php get_template_part( 'templates/navigation/menu', 'custom-taxonomies', [ 'taxonomy' => $post_type . '_category' ] ); ?>
</div>
<?php
//get the post for this monday make an exception for sunday
if ( wp_date( 'l', current_time( 'timestamp' ) ) !== 'Sunday' ):
    $monday = date( 'Y-m-d', strtotime( 'Monday this week' ) );
else:
    $monday = date( 'Y-m-d', strtotime( "last Monday" ) );
endif;

$args = [
    'post_type'      => 'week',
    'posts_per_page' => 1,
    'meta_query'     => array(
        array(
            'key'     => 'event_week_day',
            'value'   => $monday,
            'type'    => 'DATE',
            'compare' => '=',
        )
    ),
];

$latest_posts = new WP_Query( $args );
if ( $latest_posts->have_posts() ) :
    while ( $latest_posts->have_posts() ) : $latest_posts->the_post();

        $start_date = get_field( 'event_week_day' );
        $days_of_the_week = [
            'monday'    => [
                'name' => 'Monday',
                'date' => date( 'l jS F', strtotime( $start_date ) )
            ],
            'tuesday'   => [
                'name' => 'Tuesday',
                'date' => date( 'jS F', strtotime( $start_date . ' +1 day' ) )
            ],
            'wednesday' => [
                'name' => 'Wednesday',
                'date' => date( 'jS F', strtotime( $start_date . ' +2 day' ) )
            ],
            'thursday'  => [
                'name' => 'Thursday',
                'date' => date( 'jS F', strtotime( $start_date . ' +3 day' ) )
            ],
            'friday'    => [
                'name' => 'Friday',
                'date' => date( 'jS F', strtotime( $start_date . ' +4 day' ) )
            ],
            'saturday'  => [
                'name' => 'Saturday',
                'date' => date( 'jS F', strtotime( $start_date . ' +5 day' ) )
            ]
        ]
        ?>
        <section class="">
            <div class=" w-full max-w-content mx-auto"> <?php // xl:max-w-content ?>
                <?php
                $args = [
                    'next' => 'Next Week',
                    'prev' => 'Previous Week',
                    'week_start' => date('jS F',strtotime($start_date))
                ];
                get_template_part( 'templates/navigation/menu', 'next-previous-week',$args );
                ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-8 ">
                    <div class="col-span-2 grid grid-cols-2 gap-4 lg:gap-8">
                        <?php foreach ( $days_of_the_week as $key => $day ): ?>
                            <?php
                            $card_args = [
                                'key'       => $key,
                                'name'      => $day[ 'name' ],
                                'date'      => $day[ 'date' ],
                                'is_sunday' => false,
                            ];
                            ?>
                            <?php get_template_part( 'templates/components/cards/card', 'week-day-events', $card_args ); ?>
                        <?php endforeach; ?>
                        <div class="col-span-2">
                            <div class="flex card-week-feature-art">
                                <div class=" w-1/2 overflow-hidden">
                                    <?php
                                    $attachment_id = get_field('image');
                                    $img_atts = wp_get_attachment_image_src( $attachment_id, 'medium_large' );
                                    ?>
                                    <img class="object-cover" src="<?php echo $img_atts[0]; ?>" />
                                </div>
                                <div class="w-1/2">
                                    <h4 class="mb-4"><?php echo get_field('section_title'); ?></h4>
                                    <h3><?php echo get_field('title'); ?></h3>
                                    <?php echo get_field('content');?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="">
                        <?php
                        $show_day = get_field( 'show_sunday_section' ) ?? false;
                        $card_args = [
                            'key'       => 'sunday',
                            'name'      => 'Sunday',
                            'date'      => date( 'jS F', strtotime( $start_date . ' +6 day' ) ),
                            'is_sunday' => true,
                        ];
                        ?>
                        <?php get_template_part( 'templates/components/cards/card', 'week-day-events', $card_args ); ?>
                    </div>
                </div>
            </div>
        </section>

    <?php
    endwhile;
endif;

// Reset Post Data
wp_reset_postdata();
?>