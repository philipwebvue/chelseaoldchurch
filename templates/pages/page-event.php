<?php
/**
 * page-event.php
 *
 */
?>

<?php
//$position = get_post_meta(get_the_ID(),'featured_image_position',true)??0;
//$position_class=$position?'object-'.$position:'object-center';
//echo get_the_post_thumbnail( get_the_ID(), 'large', array( 'class'=>$position_class ) );
?>
<div id="page-content">
    <?php the_content(); 

    //View all events page link
    $eventPageID = get_field('events_overview_page','option');
    if($eventPageID):
    ?>
    <div class="flex justify-center">
        <div class="px-5">
            <a href="<?php echo get_permalink( $eventPageID );?>" class="button">View all events</a>
        </div>
    </div>
    <?php
    endif;?>
</div>