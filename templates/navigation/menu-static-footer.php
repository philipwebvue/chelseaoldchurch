<?php if ( has_nav_menu( 'footer' ) ) : ?>
    <nav aria-label="<?php esc_attr_e( 'Footer menu', 'creativestream' ); ?>" id="footer-navigation">
        <ul class="inline-flex flex-row ">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer',
                    'items_wrap'     => '%3$s',
                    'container'      => false,
                    'depth'          => 1,
                    'link_before'    => '<span class="">',
                    'link_after'     => '</span>',
                    'fallback_cb'    => false,
                )
            );
            ?>
        </ul><!-- .footer-navigation-wrapper -->
    </nav><!-- .footer-navigation -->
<?php endif; ?>
