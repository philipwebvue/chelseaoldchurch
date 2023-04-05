<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package webvue
 */

get_header();
if (is_front_page()):
    get_template_part('templates/headers/header', 'home');
else:
    get_template_part('templates/headers/header');
endif;
?>
    <div id="banner-container" >
        <?php
        $post_type = get_queried_object()->name??get_post_type();

        if (is_front_page()):
            get_template_part('templates/banners/banner', 'home');
        elseif(is_search() || is_404()):
            get_template_part('templates/banners/banner','search');
        elseif(is_archive() || is_home()):
            get_template_part('templates/banners/banner','archive-'.$post_type);
        else:
            get_template_part('templates/banners/banner',$post_type);
        endif;
        ?>
    </div>
    <div id="content" class="site-content">
        <main id="primary" class="site-main  min-h-default">
            <?php
            if (is_front_page()):
                get_template_part('templates/pages/home');
            elseif(is_404()):
                get_template_part('templates/pages/404');
            elseif(is_search()):
                get_template_part('templates/pages/page','search');
            elseif(is_tax()):
                get_template_part('templates/pages/taxonomies',get_queried_object()->taxonomy);
            elseif(is_archive() || is_home()):
                get_template_part('templates/pages/archive',get_post_type());
            else:
                get_template_part('templates/pages/page',get_post_type());
            endif;
            ?>

        </main><!-- #main -->
    </div>

<?php

get_footer();
