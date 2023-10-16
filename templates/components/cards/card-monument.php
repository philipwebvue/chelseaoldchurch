<?php
/**
 * card.php
 *
 *
 * @package ottra
 * @author Philip Bradbury
 * @created 20/04/2022 14:00
 * @since 1.0
 * @updated 1.0
 */

$default_args = [
    'ID' => get_the_ID(),
    'show_title' => true,
    'show_body' => true,
    'show_image' => true,
    'show_date' => false,
    'date_format' => get_option('date_format')
];
$args = array_merge($default_args, $args);

$image = apply_filters('cs_display_featured_image',$args['ID']);
$maincontent = get_the_content($args['ID']);
$terms_list = get_the_terms( $args['ID'], 'monument_category' );

$termClasses = [];
if($terms_list):
    foreach($terms_list as $sterms):
        $termClasses[]=$sterms->slug;
    endforeach;
endif;
?>
<div class="card-wide card-monument relative <?php echo implode(" ",$termClasses);?>">
    <?php if ($args['show_image']):
        if($maincontent!=""):
        ?>
        <a href="#<?php echo sanitize_title(get_the_title());?>" class="card-header monumenthead-m-popup"">
            <div class="image-wrapper">
                <?php echo $image; ?>
            </div>
        </a>
        <?php else: ?>
            <div class="image-wrapper">
                <?php echo $image; ?>
            </div>
        <?php endif;?>
    <?php endif; ?>
    <div class="card-body">
        <?php if ($args['show_title']): ?>
            <h3 class="title">
                <?php if($maincontent!=""): ?>
                <a href="#<?php echo sanitize_title(get_the_title());?>" class="open-mm-popup">
                    <?php the_title(); ?>
                </a>
                <?php else: ?>
                    <?php the_title(); ?>
                <?php endif;?>
            </h3>
        <?php endif; ?>
        <?php if ($args['show_body']): ?>
            <div class="excerpt">
                <?php
                    $excerpt = get_field('custom_excerpt',$args['ID']);
                    if($maincontent!=""):
                        $excerpt.=sprintf(' <a href=%s class="monument-more-popup">%s</a>','#'.sanitize_title(get_the_title()),'Find Out More');
                    else:
                        $excerpt.=sprintf(' <a href=%s class="monument-more-popup hidden">%s</a>','#'.sanitize_title(get_the_title()),'');
                    endif;                   
                    echo $excerpt;
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<div id="<?php echo sanitize_title(get_the_title());?>" class="bg-white mfp-hide max-w-content-single mx-auto monument-popup-content">
    <div class="monument-popup-container">
        <div class="image-wrapper "><?php //echo $image; ?> <?php echo get_the_post_thumbnail( $args['ID'], 'large', [] ); ?> </div>
        <h3 class="title"><?php the_title(); ?></h3>
        <?php the_content();?>        
    </div>
</div>