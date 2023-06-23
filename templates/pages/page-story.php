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
    <div id="post-content" class="mx-auto max-w-content-left px-6 lg:px-8">
        <?php the_content(); 

        //View all events page link
        $storyPageID = get_field('story_overview_page','option');
        if($storyPageID):
        ?>
        <div class="flex justify-center">
            <div class="px-5">
                <a href="<?php echo get_permalink( $storyPageID );?>" class="button">View all stories</a>
            </div>
        </div>
        <?php
        endif;
        ?>
    </div>
</div>
