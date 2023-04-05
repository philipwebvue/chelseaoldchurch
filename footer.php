<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter-theme
 * @since v1.0.0
 */


?>

    <footer class="">
        <?php get_template_part('templates/footers/footer',get_post_type()); ?>
    </footer>

    </div><!-- #page -->

<?php if (!is_404() && !is_search()): ?>
    <?php get_template_part('templates/components/modals/modal', 'search'); ?>
<?php endif; ?>

<?php wp_footer(); ?>

    </body>
    </html>


<?php

/*
 <div class="container-fluid">
        <div class="inline-flex flex-wrap">
            <div class="md:w-full w-7/12  inline-flex flex-wrap">
                <h6 class="3xl:text-32 2xl:text-30 xl:text-28 lg:text-26 md:text-24 sm:text-20 sm:tracking-normal  text-pink text-34 font-600 font-Montserrat uppercase tracking-wider"><?php echo $business['name']; ?></h6>
                <a class="no-underline md:text-24 lg:pt-3 sm:text-20 text-30 font-400 font-Cormorant-Garamond text-white inline-flex items-center"
                   href="//southwell.anglican.org/" target="_blank">Return to Diocese home <img class="pl-6"
                                                                                                src="<?php echo get_stylesheet_directory_uri() . '/assets/image/white-small-right-arrow.png'; ?>"/></a>
                <p class="font-400 md:hidden text-16 text-white pt-4 leading-8 "><?php echo $business['copyright']; ?>
                    <?php foreach ($pages as $page): ?>
                        <?php if ($page): ?>
                            <?php $page_obj = get_page_by_path('/' . $page, OBJECT, 'page'); ?>
                            <span class="ml-1 mr-1">|</span>
                            <a class="text-white no-underline"
                               href="<?php echo home_url($page); ?>"><?php echo $page_obj->post_title; ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    A charitable company limited by guarantee: Company No <?php echo $business['reg_number']; ?>
                    England, Charity No <?php echo $business['charity_number']; ?>
                </p>
            </div>
            <div class="xl:flex-wrap xl:pl-10 md:w-full md:justify-center md:p-0 md:pb-10 md:pt-8 md:flex-nowrap sm:pb-6 sm:pb-4 w-5/12  justify-end  inline-flex items-baseline ">
                <div class="md:px-2">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/image/footer-2.png'; ?>" alt=""
                         title="">
                </div>
                <div class="xl:pl-0 xl:pt-8 3xl:pl-10 md:p-0 md:px-2  pl-12  ">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/image/footer-1.png'; ?>" alt=""
                         title="">
                </div>
            </div>
            <div class="md:block hidden">
                <p class="font-400 sm:text-14 xs:text-12 xs:leading-6   text-16 text-white leading-8 "><?php echo $business['copyright']; ?>
                    <?php foreach ($pages as $page): ?>
                        <?php if ($page): ?>
                            <?php $page_obj = get_page_by_path('/' . $page, OBJECT, 'page'); ?>
                            <span class="ml-1 mr-1">|</span>
                            <a class="text-white no-underline"
                               href="<?php echo home_url($page); ?>"><?php echo $page_obj->post_title; ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    A charitable company limited by guarantee: Company No <?php echo $business['reg_number']; ?>
                    England, Charity No <?php echo $business['charity_number']; ?> </p>
            </div>
        </div>
    </div>
 */
?>