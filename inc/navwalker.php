<?php
class Chelseoldchurch_Nav_Walker extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $output .= ($depth == 0) ? "\n<ul class=\"dropdown-menu\">\n" . "\n<div class=\"megamenu-content\">\n" . "\n<div class=\"row\">\n" : "\n<ul class=\"elementy-ul\">\n";
    }
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $item_html = '';
        parent::start_el($item_html, $item, $depth, $args);
        
        if ($item->is_dropdown && ($depth === 0)) {
            $item_html = str_replace('<a', '<a class="dropdown-toggle"', $item_html);
            $item_html = str_replace('</a>', '</a>', $item_html);
        }
        elseif ($item->is_dropdown && ($depth === 1)) {
            $item_imageID = get_field('meun_image',$item);
            
            if(!empty($item_imageID)){
                $item_image_html = '<div class="menu-item-image-wrap overflow-hidden aspect-square relative mb-3">';
                $item_image_html .= wp_get_attachment_image( $item_imageID, 'medium', false, ['class'=>'object-cover absolute left-0 top-0 duration-300'] );
                $item_image_html .= '</div>';
                $newitem_html = '<a href="'.$item->url.'" class="menu-item-image-title">'.$item_image_html.'<span>'.$item->title.'</span></a>';
                $item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', $newitem_html, $item_html);
            }
        }
        elseif($depth===1){
            $item_imageID = get_field('meun_image',$item);            
            if(!empty($item_imageID)){
                $item_image_html = '<div class="menu-item-image-wrap overflow-hidden aspect-square relative mb-3">';
                $item_image_html .= wp_get_attachment_image( $item_imageID, 'medium', false, ['class'=>'object-cover absolute left-0 top-0 duration-300'] );
                $item_image_html .= '</div>';
                $newitem_html = '<a href="'.$item->url.'" class="menu-item-image-title">'.$item_image_html.'<span>'.$item->title.'</span></a>';
                $item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', $newitem_html, $item_html);
            }
        }
        /*elseif (stristr($item_html, 'li class="divider')) {
            $item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
        } elseif (stristr($item_html, 'li class="dropdown-header')) {
            $item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html);
        }*/
        $output .= $item_html;
    }
    public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        $element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));
        if ($element->is_dropdown) {
            $element->classes[] = 'dropdown';
        }
        if ($element && ($depth === 1)) {
            $element->classes[] = 'menu-col';
        }
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
        $output .= ($depth == 0) ? "\n</div>\n" . "\n</div>\n" . "\n<button type='button' class='close-megamenu'>Close Menu</button></ul>\n" : "\n</ul>\n";
    }
}

class MobileMenuWalker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = null ) {
		$classes = array( 'sub-menu' );
		$class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		if ( ! isset( $n ) ) :
			$n = '';
		endif;

		if ( ! isset( $indent ) ) :
			$indent = '';
		endif;

		$output .= "{$n}{$indent}";
		$output .= "<ul$class_names>{$n}";
		$output .= "<li><a href=# class='mob-menu-back js-mob-menu-back flex items-center'>";
		$output .= '<img class="object-contain mr-3" src="' . get_template_directory_uri() . '/assets/images/arrow-back.svg" width="47.63" height="6.156" alt="" />';
		$output .= 'Main Menu</a></li>';
		$output .= '<li><a class="js-parent-link" title="Back to main menu" href="#"><span></span>';
		//$output .= '<img class="object-fit contain" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="' . get_template_directory_uri() . '/assets/images/white-arrow-right.svg" width="17" height="11" alt="" />';
		$output .= '</a></li>';
	}
}