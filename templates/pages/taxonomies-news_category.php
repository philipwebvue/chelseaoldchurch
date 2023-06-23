<?php
$term = get_queried_object();
?>
<div class="banner-intro archive-intro mx-auto bg-white pt-4 lg:pt-9 relative has-banner">
    <div class="flex justify-center px-3">
        <?php echo custom_breadcrumbs(['separator'=>'<span class="px-1.5">/</span>']);?>
    </div>
    <div class="content mx-auto max-w-content-left px-3 lg:px-8">
        <h1 class="heading font-prata text-3xl text-center mb-4 lg:mb-5"><?php echo get_field( 'news_title', 'option' ) ?? $term->name; ?></h1>
        <?php if ( get_field( 'news_introduction', 'option' ) ): ?>
            <div class="text-content">
                <?php echo wpautop( get_field( 'news_introduction', 'option' ) ); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php get_template_part( 'templates/navigation/menu', 'custom-taxonomies', [ 'taxonomy' => 'news_category' ] ); ?>
</div>
<section class="news-listview">
    <div class=" w-full max-w-content-desktop mx-auto px-6 lg:px-8"> <?php // xl:max-w-content ?>
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
