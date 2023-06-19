<?php
/**
 * Banner Intro Template.
 */

$postID = get_the_ID();
$class_name = '';

$container_width = get_field('intro_container_width', $postID);

$content_width = get_field('intro_content_width',$postID);

$title = get_field('intro_title', $postID);
$title_class = 'heading font-prata text-3xl text-center';

$title_class .= ' mb-4 lg:mb-5';

$heading = !empty($title) ? '<h1 class="'.$title_class.'">'.$title.'</h1>' : null;
$content = get_field('introduction_content',$postID);

$content_class = "content mx-auto";
if($content_width=='single'):
    $content_class .= " single";
elseif($content_width=='large'):
    $content_class .= " large";
else:
    $content_class .="";
endif;

$show_background_image = get_field('show_background_image',$postID);
$header_image = get_field('header_image',$postID);

if(!empty($title) || !empty($content)):
    $postType = get_post_type();
?>
<div class="banner-intro mx-auto bg-white pt-4 lg:pt-9 relative<?php echo !empty($container_width) ? " max-w-[90vw] lg:max-w-content-left 2xl:max-w-".$container_width : ""?> <?php echo $show_background_image && !empty($header_image) ? 'has-banner' : 'no-banner'; ?>">
    <div class="flex justify-center">
        <?php echo custom_breadcrumbs(['separator'=>'<span class="px-1.5">/</span>']);?>
    </div>
    <?php if($postType=='event' || $postType=='post' || $postType=='news' || $postType=='story'):
        if($postType==='event'):
            echo '<h2 class="text-primary text-center mb-3.5">Upcoming Event</h2>';
            $date = date('jS F Y',strtotime(get_field('event_date_time', $postID)));
        else:
            $date = get_the_date('jS F Y');
        endif;
        ?>
        <div class="flex justify-center font-light font-theme text-lg mb-3.5 pt-0.5"><?php echo $date;?></div>
        <?php
    endif;
    ?>
    <?php if($heading!=null):?>
        <?php echo $heading;?>
    <?php endif;?>
    <div class="<?php echo $content_class;?>">
        <?php echo $content;?>
    </div>
</div>
<?php
endif;
?>