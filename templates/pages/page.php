<?php
/**
 * page.php
 *
 *
 * @package stalbans
 * @author Philip Bradbury
 * @created 03/04/2023 14:08
 * @since 1.0
 * @updated 1.0
 */
?>

<?php
//$position = get_post_meta(get_the_ID(),'featured_image_position',true)??0;
//$position_class=$position?'object-'.$position:'object-center';
//echo get_the_post_thumbnail( get_the_ID(), 'large', array( 'class'=>$position_class ) );
?>
<section id="page-content" class="">
        <div id="post-content" class="max-w-content-single mx-auto">
            <?php the_content(); ?>
        </div>
</section>
