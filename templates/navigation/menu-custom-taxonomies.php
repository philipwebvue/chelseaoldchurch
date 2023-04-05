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
    'hide_empty' => false,
];
$args = array_merge( $default_args, $args );

?>


<?php if ( taxonomy_exists( $args[ 'taxonomy' ] ) ): ?>
    <?php
    $categories = get_terms( $args );
    ?>
    <?php if(!empty($categories)): ?>
    <ul class="taxonomy-list inline-flex">
    <?php foreach ( $categories as $category ): ?>
        <li class="mr-4"><a href="<?php echo get_term_link($category,$category->taxonomy);?>"><?php echo $category->name ?></a> </li>

    <?php endforeach; ?>
        <li><a href="#">Select All</a></li>
    </ul>
<?php endif; ?>
<?php endif; ?>