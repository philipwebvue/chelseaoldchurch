<?php if ( has_nav_menu( 'footer' ) ) : ?>
    <?php
        echo strip_tags(wp_nav_menu(
            array(
                'theme_location' => 'footer',
                'items_wrap'     => '%3$s',
                'container'      => false,
                'depth'          => 1,
                'link_before'    => '',
                'link_after'     => '',
                'fallback_cb'    => false,
                'echo'            => false,
                'items_wrap'      => '%3$s',
                'depth'           => 0,
                'after'           => '<span class="px-2">|</span>',
            )
        ),'<a><span>');
        ?><!-- .footer-navigation-wrapper -->
<?php endif; ?>
