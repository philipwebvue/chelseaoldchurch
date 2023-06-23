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
    <div class="hidden xl:flex justify-between items-center topbar px-8 pt-2 pb-3">
        <div class="support-link">
            <?php
            $support_link = get_field('support_link','option');
            echo get_acflink_html($support_link,'');
            ?>
        </div>
        <div class="flex self-end">
            <div class="mobile-search-box mr-4">
                <?php  get_template_part( 'templates/components/buttons/button', 'search' ); ?>
            </div>
            <?php get_template_part( 'templates/navigation/menu', 'static-secondary' ); ?>
        </div>
    </div>
    <div class="flex xl:flex-col justify-between items-center site-header w-full py-2.5 lg:py-4 xl:pt-8 xl:pb-5 px-4 lg:px-8">
        <div id="site-branding" class="flex xl:justify-center">
            <div id="logo-container" class="logo-container xl:mb-5">
                <a href="<?php echo home_url( '/' ); ?>">
                    <?php the_custom_logo(); ?>
                </a>
            </div>
        </div><!-- #site-branding -->
        <div id="" class="flex xl:justify-center xl:w-full items-center">
            <div id="header-navigation" class="flex self-start xl:self-end">
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
    </div>
</header><!-- #masthead -->