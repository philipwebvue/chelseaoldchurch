<?php
/**
 * modal-search.php
 *
 *
 * @package stalbans
 * @author Philip Bradbury
 * @created 05/04/2023 11:24
 * @since 1.0
 * @updated 1.0
 */

?>

<div class="search-modal-area hidden ">
    <div id=""
         class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 z-50 flex items-center justify-center">
        <i class="close-search-modal cursor-pointer absolute text-4xl top-4 right-4 text-white fa fa-times"
           aria-hidden="true"></i>
        <div class="w-2/3 xl:w-1/2 2xl:w-1/3">
            <?php get_template_part('templates/components/forms/form', 'search'); ?>
        </div>
    </div>
</div>
