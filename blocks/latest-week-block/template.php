<?php
/**
 * Latest Week Block Template.
 *
 * @param   array $block The block settings and attributes.
 */

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}
$class_name = 'latest-week-block relative';

$latest_event=get_field('latest_event');
$link_more_events=get_field('link_more_events');
$leftcol_title = get_field('title');
$leftcol_image = get_field('image');
$links_left_col = get_field('links_left_col');

$links_right_col = get_field('links_right_col');
$firstday = date('jS', strtotime("this week"));
$lastday = date('jS M Y', strtotime("sunday 0 week"));

$qargs = [
    'post_type'=>['week'],
    'post_status'=>['publish' ],
    'posts_per_page' => 1,
    'meta_query'=>[
        [
            'key'=>'event_week_day',
            'value'=>date('Ymd', strtotime("this week")),
        ]
    ]
];

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container mx-auto 3xl:max-w-content lg:px-5 3xl:px-0 pt-4 lg:pt-9 border-t-2 border-secondary">
        <?php if(!empty($latest_event)):?>
        <div class="flex flex-col justify-center lg:flex-row lg:items-start mb-9">
            <div class="text-center text-xl lg:text-right font-prata text-primary w-full lg:w-auto lg:min-w-max">Latest</div>
            <div class="text-center text-lg lg:text-left w-full lg:w-auto lg:pl-2.5 lg:pr-6 xl:pr-10 lg:self-center"><?php echo $latest_event;?></div>
            <?php if($link_more_events):?>
            <div class="text-center lg:text-left w-full lg:w-auto lg:min-w-max">
                <?php echo get_acflink_html($link_more_events,'button');?>
            </div>
            <?php endif;?>
        </div>
        <?php endif;?>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
            <div class="col-left">
                <div class="image-wrapper w-full relative aspect-square">
                    <?php
                    $img_atts = wp_get_attachment_image_src( $leftcol_image, 'medium_large' );
                    ?>
                    <img class="object-cover absolute top-0 left-0 w-full h-full" src="<?php echo $img_atts[0]; ?>" />
                    <div class="absolute w-full h-full left-0 top-0 flex flex-col justify-between pt-7 pb-7 xl:pt-9 xl:pb-11 pl-7 pr-7 xl:pl-11 xl:pr-11 text-white">
                        <div class="w-full font-prata text-4xl leading-none"><?php echo $leftcol_title;?></div>
                        <div class="flex flex-col items-end">
                            <?php if(isset($links_left_col['link_primary']) && !empty($links_left_col['link_primary'])):?>
                            <div><?php echo get_acflink_html($links_left_col['link_primary'],'button-with-arrow white text-right');?></div>
                            <?php endif;?>
                            <?php if(isset($links_left_col['link_secondary']) && !empty($links_left_col['link_secondary'])):?>
                            <div><?php echo get_acflink_html($links_left_col['link_secondary'],'button-with-arrow white text-right');?></div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-right bg-primary pt-7 pb-7 xl:pt-9 xl:pb-11 pl-7 pr-3 xl:pl-11 xl:pr-11 flex flex-col text-white">
                <div class="flex flex-wrap items-end pb-6 md:pb-8 xl:pb-12 border-b-[1px] border-b-white/[.5] mb-2.5">
                    <div class="w-full sm:w-auto font-prata text-4xl mb-2 sm:mb-0 sm:mr-5 lg:mr-8 2xl:mr-20 leading-none">This week</div>
                    <div class="w-full sm:w-auto font-theme text-lg leading-none pb-1"><?php echo $firstday.' - '.$lastday;?></div>
                </div>
                <div class="latest-week-events flex-1">
                    <?php
                    $weekquery = new WP_Query($qargs);
                    if($weekquery->have_posts(  )):
                    ?>
                    <ul>
                        <?php
                        while($weekquery->have_posts(  )):
                            $weekquery->the_post();
                            $weekID = get_the_ID();
                            $start_date = get_field( 'event_week_day',$weekID );

                            $days_of_the_week = [
                                'monday'    => [
                                    'name' => 'Monday',
                                    'date' => date( 'l jS F', strtotime( $start_date ) )
                                ],
                                'tuesday'   => [
                                    'name' => 'Tuesday',
                                    'date' => date( 'l jS F', strtotime( $start_date . ' +1 day' ) )
                                ],
                                'wednesday' => [
                                    'name' => 'Wednesday',
                                    'date' => date( 'l jS F', strtotime( $start_date . ' +2 day' ) )
                                ],
                                'thursday'  => [
                                    'name' => 'Thursday',
                                    'date' => date( 'l jS F', strtotime( $start_date . ' +3 day' ) )
                                ],
                                'friday'    => [
                                    'name' => 'Friday',
                                    'date' => date( 'l jS F', strtotime( $start_date . ' +4 day' ) )
                                ],
                                'saturday'  => [
                                    'name' => 'Saturday',
                                    'date' => date( 'l jS F', strtotime( $start_date . ' +5 day' ) )
                                ],
                                'sunday'  => [
                                    'name' => 'Sunday',
                                    'date' => date( 'l jS F', strtotime( $start_date . ' +6 day' ) )
                                ]
                            ];
                            
                            foreach ( $days_of_the_week as $key => $day ): 
                                $events_data = get_field( $key . '_day_events',$weekID ) ?? [];
                                if ( is_array( $events_data ) && sizeof($events_data) > 0 ):
                                ?>
                                <li>
                                    <div class="text-xl font-prata mb-1"><?php echo $day[ 'date' ];?></div>                                    
                                    <?php foreach ( $events_data as $event_data ): ?>
                                        <div class="font-theme text-lg font-light">
                                            <span class="font-medium"><?php echo wp_date( 'h:ia', strtotime( get_field( 'event_date_time', $event_data->ID ) ) ); ?> <?php echo $event_data->post_title; ?></span> <?php echo get_field( 'event_meta', $event_data->ID ); ?>
                                        </div>
                                    <?php endforeach; ?>                            
                                </li>
                                <?php endif;?>
                            <?php endforeach; ?>
                            <?php
                        endwhile;
                        /*
                        ?>
                        <li>
                            <div class="text-xl font-prata mb-1">Thursday 9th February</div>
                            <div class="font-theme text-lg font-light"><span class="font-medium">8.00 am: Holy Communion</span> Revd Max Bayliss</div>                            
                        </li>
                        <li>
                            <div class="text-xl font-prata mb-1">Sunday 5th February</div>
                            <div class="font-theme text-lg italic font-light">Septuagesima (3rd Sunday before Lent)</div>
                            <div class="font-theme text-lg font-light"><span class="font-medium mr-2.5">8.00 am: Holy Communion</span> Revd Max Bayliss</div>
                            <div class="font-theme text-lg font-light"><span class="font-medium mr-2.5">8.00 am: Holy Communion</span> Revd Max Bayliss</div>
                            <div class="font-theme text-lg font-light"><span class="font-medium mr-2.5">8.00 am: Holy Communion</span> Revd Max Bayliss</div>
                            <div class="font-theme text-lg font-light"><span class="font-medium mr-2.5">8.00 am: Holy Communion</span> Revd Max Bayliss</div>
                            <div class="font-theme text-lg font-light"><span class="font-medium mr-2.5">8.00 am: Holy Communion</span> Revd Max Bayliss</div>
                            <div class="font-theme text-lg font-light"><span class="font-medium mr-2.5">8.00 am: Holy Communion</span> Revd Max Bayliss</div>
                        </li>
                        <?php */ ?>
                    </ul>
                    <?php
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="flex flex-col items-end pr-4 lg:pr-0">
                    <?php if(isset($links_right_col['link_primary']) && !empty($links_right_col['link_primary'])):?>
                    <div><?php echo get_acflink_html($links_right_col['link_primary'],'button-with-arrow white text-right');?></div>
                    <?php endif;?>
                    <?php if(isset($links_right_col['link_secondary']) && !empty($links_right_col['link_secondary'])):?>
                    <div><?php echo get_acflink_html($links_right_col['link_secondary'],'button-with-arrow white text-right');?></div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>