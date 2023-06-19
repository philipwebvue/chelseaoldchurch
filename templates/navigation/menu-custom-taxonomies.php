<?php
/**
 * menu-custom-taxonomies.php
 *
 *
 * @package stalbans
 * @author Philip Bradbury
 * @created 06/04/2023 00:01
 * @since 1.0
 * @updated 1.0
 */

$default_args = [
    'taxonomy'   => 'story_category',
    'hide_empty' => true,
];
$args = array_merge( $default_args, $args );

if($args['taxonomy']=='story_category'):
    $allLinkPageID = get_field('story_overview_page','option');
elseif($args['taxonomy']=='news_category'):
    $allLinkPageID = get_field('news_overview_page','option');
elseif($args['taxonomy']=='event_category'):
    $allLinkPageID = get_field('events_overview_page','option');
endif;
?>
<?php if ( taxonomy_exists( $args[ 'taxonomy' ] ) ): ?>
    <?php
    $categories = get_terms( $args );
    ?>
    <?php if(!empty($categories)): ?>
    <ul class="taxonomy-list inline-flex">
    <?php foreach ( $categories as $category ): 
        $active = "";
        if(is_tax()){
            $term = get_queried_object();
            $active = $category->term_id == $term->term_id ? 'active' : '';            
        }
        ?>
        <li class="mr-5"><a href="<?php echo get_term_link($category,$category->taxonomy);?>" class="<?php echo $active;?>"><?php echo $category->name ?></a> </li>
    <?php endforeach; ?>
    <?php if($allLinkPageID):?>
        <li><a href="<?php echo get_permalink( $allLinkPageID);?>">Select All</a></li>
    <?php endif;?>
    </ul>
<?php endif; ?>
<?php endif; ?>