<?php
/**
 * header.php
 *
 *
 * @package stalbans
 * @author Philip Bradbury
 * @created 03/04/2023 13:51
 * @since 1.0
 * @updated 1.0
 */
?>
<header id="masthead"
        class=" flex flex-col justify-between site-header w-full max-w-content mx-auto">

    <div id="" class="flex justify-between w-full items-center py-4 lg:py-8 px-4 lg:px-8 3xl:px-0 ">

        <div id="site-branding">
            <div id="logo-container" class="w-32 lg:w-40 xl:w-48">
                <a href="<?php echo home_url( '/' ); ?>">
                    <?php the_custom_logo(); ?>
                </a>
            </div>
        </div><!-- #site-branding -->

        <div id="header-navigation" class="flex self-start xl:self-end">

            <div class="mobile-navigation flex xl:hidden items-start">
                <div class="mobile-search-box mr-4">
                    <?php get_template_part( 'templates/components/buttons/button', 'search' ); ?>
                </div>
                    <?php get_template_part( 'templates/navigation/menu', 'offcanvas-mobile' ); ?>
            </div>

            <div class="desktop-main-navigation hidden xl:flex w-full mx-auto items-center justify-end">
                    <div class="desktop-search-box mr-4 ">
                        <?php get_template_part( 'templates/components/buttons/button', 'search' ); ?>
                    </div>
                    <?php get_template_part( 'templates/navigation/menu', 'static-primary' ); ?>
            </div>
        </div>
    </div>


</header><!-- #masthead -->