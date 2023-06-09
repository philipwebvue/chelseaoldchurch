<?php if ( has_nav_menu( 'primary' ) ) : ?>
    <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'chelseaoldchurch' ); ?>">
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'primary',
                'menu_class'      => 'menu-wrapper',
                'container_class' => 'primary-menu-container',
                'items_wrap'      => '<ul id="primary-menu-list" class="%2$s inline-flex">%3$s</ul>',
                'fallback_cb'     => false,
                'walker'=> new Chelseoldchurch_Nav_Walker()
            )
        );
        ?>
    </nav><!-- #site-navigation -->
<?php endif; ?>