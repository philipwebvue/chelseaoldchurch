<?php
$term = get_queried_object();
?>
<div class="banner-intro-block bg-white max-w-content-desktop mx-auto py-4 lg:py-9 relative text-center">
    <div class="flex justify-center">
        <?php echo custom_breadcrumbs(['separator'=>'<span class="px-1.5">/</span>']);?>
    </div>
    <h1 class="heading font-prata text-3xl text-center mb-4 lg:mb-5"><?php echo get_field( 'story_title', 'option' ) ?? $term->name; ?></h1>
    <?php if ( get_field( 'story_introduction', 'option' ) ): ?>
        <div class="content large pb-9 text-left">
            <?php echo wpautop( get_field( 'story_introduction', 'option' ) ); ?>
        </div>
    <?php endif; ?>
    <?php get_template_part( 'templates/navigation/menu', 'custom-taxonomies', [ 'taxonomy' => 'story_category' ] ); ?>
</div>
<section class="stories-listview">
    <div class=" w-full max-w-content-desktop mx-auto px-5"> <?php // xl:max-w-content ?>
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
        <?php endif; ?>
    </div>
</section>
