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
    'taxonomy'   => 'monument_category',
    'hide_empty' => true,
];
$args = array_merge( $default_args, $args );
?>


<?php if ( taxonomy_exists( $args[ 'taxonomy' ] ) ): ?>
    <?php
    $categories = get_terms( $args );
    ?>
    <?php if(!empty($categories)): ?>
    <ul class="taxonomy-list flex flex-wrap justify-center">
    <?php foreach ( $categories as $category ): 
        $active = "";
        if(is_tax()){
            $term = get_queried_object();
            $active = $category->term_id == $term->term_id ? 'active' : '';            
        }
        ?>
        <li class="mr-5"><a href="#<?php echo $category->slug;?>" data-slug=".<?php echo $category->slug;?>" class="monument-filter <?php echo $active;?>"><?php echo $category->name ?></a> </li>
    <?php endforeach; ?>
        <li><a href="#" data-slug=".*" class="monument-filter active">Select All</a></li>
    </ul>
<?php endif; ?>
<?php endif; ?>