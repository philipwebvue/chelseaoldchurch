<?php
$terms = get_terms( 'category', array(
    'hide_empty' => true,
) );
$current_term = get_category( get_query_var( 'cat' ) );

?>
<section class="">
    <div class=" w-full max-w-content mx-auto"> <?php // xl:max-w-content ?>
        <?php if ( have_posts() ): ?>
            <div id=""
                 class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-4 gap-4 lg:gap-8 ">
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