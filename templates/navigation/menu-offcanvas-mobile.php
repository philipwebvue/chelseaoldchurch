<?php
$menu_name = 'primary'; //menu slug

?>
<div id="menu-button" class="flex flex-col items-center hover:opacity-60 duration-300 cursor-pointer">
    <?php get_template_part('templates/components/buttons/button','menu');?>
</div>
<div id="offcanvas-menu-container"
     class="hidden h-screen w-full bg-white fixed h-screen top-0 -left-full z-50 overflow-y-auto" >
    <div id="main-menu" class="main-menu px-4 lg:px-12 py-6 lg:py-6">
        <div class="flex justify-between items-center mb-8">
            <div class="support-link">
                <?php
                $support_link = get_field('support_link','option');
                echo get_acflink_html($support_link,'');
                ?>
                <?php get_template_part( 'templates/navigation/menu', 'static-secondary' ); ?>
            </div>
            <div class="flex absolute top-5 right-7 z-[1000]">
                <div class="mobile-search-box mr-4">
                    <?php  get_template_part( 'templates/components/buttons/button', 'search' ); ?>
                </div>
                <i class="text-40 close-menu hover:opacity-60 duration-300 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.759" height="21.824" viewBox="0 0 21.759 21.824">
                        <path data-name="close X" d="M23.057,20.871l8.238-8.16a1.632,1.632,0,0,0,.155-2.1,1.477,1.477,0,0,0-2.332-.155L20.881,18.7l-8.238-8.238a1.477,1.477,0,0,0-2.332.155,1.632,1.632,0,0,0,.155,2.1l8.238,8.16-8.238,8.16a1.632,1.632,0,0,0-.155,2.1,1.477,1.477,0,0,0,2.332.155l8.238-8.238,8.238,8.238a1.477,1.477,0,0,0,2.332-.155,1.632,1.632,0,0,0-.155-2.1Z" transform="translate(-10.001 -9.959)" fill="#900942"/>
                    </svg>
                </i>
            </div>
        </div>
        <div class="menu-items">
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => $menu_name,
                    'menu_class'      => 'menu-wrapper',
                    'menu_id' => 'mobile-menu-menu',
                    'container_class' => $menu_name.'-menu-container',
                    //'items_wrap'      => '<ul id="'.$menu_name.'-menu-list" class="%2$s ">%3$s</ul>',
                    'link_after' => '<i class="icon"></i>',
                    'fallback_cb'     => false,
                    'walker'=> new MobileMenuWalker(),
                )
            );
            ?>

        </div>

    </div>

</div>