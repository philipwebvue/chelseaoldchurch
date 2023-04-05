<?php
    if ( is_archive() || is_home() ){
        $title = get_the_archive_title();
    }else{
        $title = get_the_title();
    }
?>

<div class="py-4 lg:py-9 px-6 text-center">
    <h1 class=" "><?php echo $title; ?></h1>
</div>