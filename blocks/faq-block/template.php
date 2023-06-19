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
?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <?php if(have_rows('faqs')):?>
        <div class="faqs-list">
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