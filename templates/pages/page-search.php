<section class="">
    <div class="xl:max-w-content m-auto ">
        <div class="">
            <div class="w-full md:w-2/3 lg:w-1/2 m-auto">
                    <?php echo get_template_part('templates/components/forms/form', 'search'); ?>
            </div>
        </div>
    </div>
</section>

<section class=" max-w-content mx-auto">
    <div class="">
        <?php if (have_posts()): ?>
            <div id=""
                 class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-8 ">
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <?php get_template_part('templates/components/cards/card', ''); ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <div class="pagination-container flex justify-center">
            <?php ottra_numeric_posts_nav(); ?>
        </div>
    </div>

</section>