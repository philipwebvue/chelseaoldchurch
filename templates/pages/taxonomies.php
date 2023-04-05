<section class="">
    <div class=" w-full max-w-content mx-auto px-6 lg:px-8"> <?php // xl:max-w-content ?>
        <?php if(have_posts()): ?>
            <div id=""
                 class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 lg:gap-8 ">
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
