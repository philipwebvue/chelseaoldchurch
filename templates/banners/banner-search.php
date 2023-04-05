<?php
if(is_404()){
    $title="Page Not Found";
}else{
    $title="Search";
}
?>
<div class="grid banner-default relative  grid-cols-1 lg:grid-cols-2 gap-0 bg-theme-blue-dark text-white">
    <div class="relative self-center">
        <div class="whitespace-nowrap px-6 lg:px-8 py-3 ">
            <h2 class="text-theme-yellow text-22 sm:text-30 lg:text-40 m-0 p-0 leading-none"><?php echo $title; ?></h2>
        </div>
        <div class="hidden xl:block bottom-0 left-6 absolute z-10 w-full h-full bg-cover bg-no-repeat"
             style="background-size: 70px;background-position:left 50%; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/images/background-waves.svg' ?>)"></div>
    </div>
    <div class="hidden text-theme-blue lg:flex px-6 lg:px-8 py-3 self-center  text-22 font-normal">
        <?php
        $args = ['classes' => 'mb-0'];

        get_template_part('templates/components/share', 'icons', $args);
        ?>
    </div>
</div>
