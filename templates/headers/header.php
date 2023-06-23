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
<header id="masthead" class="absolute">
    <div class="flex justify-between xl:justify-start site-header w-full py-2.5 lg:py-4 px-4 lg:px-8 relative">
        <div id="site-branding" class="site-branding-col flex md:pt-1 lg:pt-2">
            <div id="logo-container" class="logo-container md:mb-1 lg:mb-2.5">
                <?php the_custom_logo(); ?>
            </div>
        </div><!-- #site-branding -->
        <div class="site-navigation-col flex xl:justify-center items-center">
            <div id="header-navigation" class="flex self-center xl:self-end xl:mb-2.5">
                <div class="mobile-navigation flex xl:hidden items-center">
                    <div class="mobile-search-box mr-4">
                        <?php  get_template_part( 'templates/components/buttons/button', 'search' ); ?>
                    </div>
                        <?php get_template_part( 'templates/navigation/menu', 'offcanvas-mobile' ); ?>
                </div>

                <div class="desktop-main-navigation hidden xl:flex w-full mx-auto items-center justify-end">
                    <?php get_template_part( 'templates/navigation/menu', 'static-primary' ); ?>
                </div>
            </div>
        </div>
        <div class="hidden xl:flex justify-end pt-0.5 absolute top-2.5 lg:top-4 right-4 lg:right-8">
            <div class="mobile-search-box mr-4">
                <?php  get_template_part( 'templates/components/buttons/button', 'search' ); ?>
            </div>
            <?php get_template_part( 'templates/navigation/menu', 'static-secondary' ); ?>
        </div>
    </div>
</header><!-- #masthead -->