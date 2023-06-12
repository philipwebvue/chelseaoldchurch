<?php
/**
 * FAQ Template.
 *
 * @param   array $block The block settings and attributes.
 */

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}
$class_name = 'faq-block ';
if(!empty( $block['className'])){
    $class_name .= $block['className'];
}

$title = get_field('title');
$title_class = 'heading font-prata text-2xl';
$content = get_field('content');
$heading = !empty($title) ? '<h2 class="'.$title_class.'">'.$title.'</h2>' : null;
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container max-w-content-single mx-auto">
        <?php if($heading!=null):?>
            <?php echo $heading;?>
        <?php endif;?>
        <?php if(!empty($content)):?>
            <div class="content">
                <?php echo $content;?>
            </div>
        <?php endif;?>
        <?php if(have_rows('faqs')):?>
            <div class="faqs-list pt-5">
                <?php while(have_rows('faqs')):
                    the_row();
                    $faqQuestion = get_sub_field('question');
                    $faqAnswer = get_sub_field('answer');
                    if(!empty($faqQuestion)):
                        ?>
                        <div class="faq-accordion">
                            <h3 class="faq-question"><?php echo $faqQuestion;?></h3>
                            <div class="faq-answer"><?php echo $faqAnswer;?></div>
                        </div>
                        <?php 
                    endif;
                endwhile;?>
            </div>
        <?php endif;?>
    </div>
</div>