<?php
$menu_name = 'primary'; //menu slug

?>

<div id="menu-button" class="flex flex-col items-center hover:opacity-60 duration-300 cursor-pointer">
    <?php get_template_part('templates/components/buttons/button','menu');?>
</div>
<div id="offcanvas-menu-container"
     class="hidden h-screen max-w-full md:max-w-3/5 lg:max-w-1/2 2xl:max-w-1/3 w-full bg-primary fixed h-screen top-0 right-0 z-50 overflow-y-scroll" >
    <div id="main-menu" class="main-menu px-4 lg:px-12 py-6 lg:py-6">
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-36 lg:text-46 font-light leading-none">Main Menu</h3>
            <i class="text-40 close-menu hover:opacity-60 duration-300 cursor-pointer fas fa-times"></i>
        </div>
        <div class="mb-2">
            <h3 class="text-30 lg:text-44 inline-flex mb-5">
                <a class="!text-black font-medium flex items-center"
                   href="<?php echo home_url( '/' ); ?>">
                    <i class="fas text-30 text-theme-blue-dark fa-home mr-4"></i>Home
                </a>
            </h3>

        </div>
        <div class="menu-items">
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => $menu_name,
                    'menu_class'      => 'menu-wrapper',
                    'depth'          => 1,
                    'container_class' => $menu_name.'-menu-container',
                    'items_wrap'      => '<ul id="'.$menu_name.'-menu-list" class="%2$s ">%3$s</ul>',
                    'link_before'    => '<span class="">',
                    'link_after'     => '</span>',
                    'fallback_cb'     => false,
                )
            );
            ?>

        </div>

    </div>

</div>