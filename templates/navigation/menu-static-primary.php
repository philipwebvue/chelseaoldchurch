<?php if ( has_nav_menu( 'primary' ) ) : ?>
    <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'twentytwentyone' ); ?>">
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'primary',
                'menu_class'      => 'menu-wrapper',
                'depth'          => 1,
                'container_class' => 'primary-menu-container',
                'items_wrap'      => '<ul id="primary-menu-list" class="%2$s inline-flex">%3$s</ul>',
                'link_before'    => '<span class="">',
                'link_after'     => '</span>',
                'fallback_cb'     => false,
            )
        );
        ?>
    </nav><!-- #site-navigation -->
<?php endif; ?>

<?php $resource_image  = get_template_directory_uri() . '/assets/images/resource-image.jpg'; ?>
<style>
    #site-navigation #primary-menu-list .resources{
        background-image:url(<?php echo $resource_image; ?>)
    }
</style>