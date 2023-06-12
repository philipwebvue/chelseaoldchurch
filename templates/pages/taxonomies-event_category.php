<?php
    $term = get_queried_object();
?>

<div class="banner-intro-block bg-white max-w-content-desktop mx-auto py-4 lg:py-9 relative text-center">
    <h1 class="heading font-prata text-3xl text-center mb-4 lg:mb-5"><?php echo get_field( 'event_title', 'option' ) ?? $term->name; ?></h1>
    <?php if ( get_field( 'event_introduction', 'option' ) ): ?>
        <div class="content large pb-9 text-left">
            <?php echo wpautop( get_field( 'event_introduction', 'option' ) ); ?>
        </div>
    <?php endif; ?>
    <?php get_template_part( 'templates/navigation/menu', 'custom-taxonomies', [ 'taxonomy' => 'event_category' ] ); ?>
</div>
<section class="events-listview">
    <div class="w-full max-w-content-desktop mx-auto px-5"> <?php // xl:max-w-content ?>
        <?php if(have_posts()): ?>
            <div>
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <?php
                    $card_args = [
                        'show_date' => true,
                    ];
                    get_template_part( 'templates/components/cards/card', get_post_type(), $card_args );
                    ?>
                <?php endwhile; ?>
            </div>
        <?php else:?>
            <div class="flex justify-center">
                <div>No events found in <strong><?php echo get_the_archive_title();?></strong></div>
            </div>
        <?php endif; ?>
    </div>
</section>
