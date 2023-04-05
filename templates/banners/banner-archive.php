<?php $post_type = get_queried_object()->name; ?>
<div class="pt-4 lg:pt-9  text-center">
    <div class="bg-white max-w-content-single mx-auto px-4 lg:px-12">
        <h1 class="py-9 "><?php echo get_field( $post_type . '_title', 'option' ) ?? get_the_archive_title(); ?></h1>
        <?php if ( get_field( $post_type . '_introduction', 'option' ) ): ?>
            <div class="pb-9">
                <?php echo wpautop( get_field( $post_type . '_introduction', 'option' ) ); ?>
            </div>
        <?php endif; ?>
        <?php get_template_part( 'templates/navigation/menu', 'custom-taxonomies', [ 'taxonomy' => $post_type . '_category' ] ); ?>
    </div>
</div>