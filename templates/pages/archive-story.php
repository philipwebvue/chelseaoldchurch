<?php
$post_type = get_queried_object()->name;
?>
<div class="banner-intro archive-intro mx-auto bg-white pt-4 lg:pt-9 relative has-banner">
    <div class="flex justify-center px-3">
        <?php echo custom_breadcrumbs(['separator'=>'<span class="px-1.5">/</span>']);?>
    </div>
    <div class="content mx-auto max-w-content-left px-3 lg:px-8">
        <h1 class="heading font-prata text-3xl text-center mb-4 lg:mb-5"><?php echo get_field( $post_type . '_title', 'option' ) ?? get_the_archive_title(); ?></h1>
        <?php if ( get_field( $post_type . '_introduction', 'option' ) ): ?>
            <div class="text-content">
                <?php echo wpautop( get_field( $post_type . '_introduction', 'option' ) ); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="mb-4 lg:mb-14 pt-5 lg:pt-7 pb-0.5 flex justify-center flex-wrap">
        <?php get_template_part( 'templates/navigation/menu', 'custom-taxonomies', [ 'taxonomy' => $post_type . '_category' ] ); ?>
    </div>
</div>
<section class="stories-listview">
    <div class="w-full max-w-content-desktop mx-auto px-6 lg:px-8"> <?php // xl:max-w-content ?>
        <?php if ( have_posts() ): ?>
            <div>
                <?php while ( have_posts() ) : ?>
                    <?php the_post(); ?>
                    <?php
                    $args = [
                        'show_date' => true,
                    ];
                    
                    get_template_part( 'templates/components/cards/card', get_post_type(), $args );
                    ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <div class="pagination-container flex justify-center">
            <?php ottra_numeric_posts_nav(); ?>
        </div>
    </div>
</section>