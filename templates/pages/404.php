<?php
/**
 * Created by PhpStorm.
 * Filename: layout-sidebar.php
 * Description:
 * User: philipbradbury
 * Date: 01/04/2021
 * Time: 10:51
 */
?>

<section class="">
    <div class="max-w-content m-auto ">
        <p class="w-full text-center mb-8"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links in the menu or a search?', 'starter-theme' ); ?></p>
        <div class="w-full md:w-2/3 lg:w-1/2 m-auto">
                <?php echo get_template_part( 'templates/forms/search', 'general' ); ?>
        </div>
    </div>
</section>


