<?php if ( has_nav_menu( 'header' ) ) : ?>
    <nav id="top-navigation" class="top-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top menu', 'chelseaoldchurch' ); ?>">
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'header',
                'menu_class'      => 'menu-wrapper',
                'depth'          => 1,
                'container_class' => 'top-menu-container',
                'items_wrap'      => '<ul id="secondary-menu-list" class="%2$s inline-flex">%3$s</ul>',
                'link_before'    => '',
                'link_after'     => '',
                'fallback_cb'     => false,
            )
        );
        ?>
    </nav><!-- #site-navigation -->
<?php endif; ?>