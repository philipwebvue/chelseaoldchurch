<?php
/**
 * Container Block Template.
 *
 * @param   array $block The block settings and attributes.
 * This block will usefull to add any content inside assigned container width.
 */

$anchor = $block['id'];
if ( ! empty( $block['anchor'] ) ) {
    $anchor = esc_attr( $block['anchor'] );
}
$class_name = 'container-block px-5 lg:px-0';
if(!empty($block['backgroundColor'])){
    $class_name .= ' background-'.$block['backgroundColor'];
}
if(!empty($block['textColor'])){
    $class_name .= ' text-'.$block['textColor'];
}
$container_class="mx-auto px-5";
$container_width = get_field('container_width');
$container_class.= " max-w-".$container_width;

$spacing = get_field('spacing');

if(!empty($spacing)){
    if(isset($spacing['top_padding']) && $spacing['top_padding']==1){
        $class_name .= ' !pt-0'; 
    }
    else{
        $class_name .= ' pt-9';
    }
    if(isset($spacing['bottom_padding']) && $spacing['bottom_padding']==1){
        $class_name .= ' !pb-0'; 
    }
    else{
        $class_name .= ' pb-9';
    }
}
else{
    $class_name .= ' pt-9 pb-9';
}
?>
<div id="<?php echo $anchor; ?>" class="<?php echo $class_name;?>">
    <div class="<?php echo $container_class;?>">
        <InnerBlocks />
    </div>
</div>