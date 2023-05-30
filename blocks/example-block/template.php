<?php

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_name = 'example-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$exampleTitle             = get_field( 'example-title' ) ?: 'Your title here...';
?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <div class="example-title"><?php echo esc_html( $exampleTitle ); ?></div>
</div>