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
 * @package chelseaoldchurch
 */

get_header();

if (is_front_page()):
    get_template_part('templates/headers/header', 'home');

else:
    get_template_part('templates/headers/header');
endif;

$post_type = get_queried_object()->name??get_post_type();

//Some global overview page created using gutenberg and load banner-intro based on those pages.
$events_overview_page = get_field('events_overview_page','option');
$story_overview_page = get_field('story_overview_page','option');
$news_overview_page = get_field('news_overview_page','option');
$staff_overview_page = get_field('staff_overview_page','option');
$is_archieve = false;

if($post_type=='page' && ($events_overview_page==get_the_ID() || $story_overview_page==get_the_ID() || $news_overview_page==get_the_ID() || $staff_overview_page==get_the_ID())):
    $is_archieve=true;
endif;
?>
    <div id="banner-container" class="banner-container">
        <?php
        if (is_front_page()):
           get_template_part('templates/banners/banner', 'home');
        elseif(is_search() || is_404()):
            get_template_part('templates/banners/banner','search');
        elseif(is_tax('event_category')):
            get_template_part('templates/banners/banner-archive','event_category');
        elseif(is_tax('story_category')):
            get_template_part('templates/banners/banner-archive','story_category');
        elseif(is_archive() || is_home()):
            get_template_part('templates/banners/banner-archive',$post_type);        
        else:
            get_template_part('templates/banners/banner',$post_type);
        endif;
        ?>
    </div>
    <div id="content" class="site-content mx-auto ">
        <main id="primary" class="site-main  min-h-default">
            <?php 
            if(is_page() || is_singular('event') || is_singular( 'news' ) || is_single( ) || is_singular( 'story' )):
                get_template_part('templates/banners/banner','intro',['is_archieve'=>$is_archieve]); 
            endif; ?>
            <?php get_template_part('templates/navigation/menu','onpage-links',['position'=>'top']); ?>
            <?php
            if (is_front_page()):
                get_template_part('templates/pages/page','home');
            elseif(is_404()):
                get_template_part('templates/pages/404');
            elseif(is_search()):
                get_template_part('templates/pages/page','search');
            elseif(is_tax()):
                get_template_part('templates/pages/taxonomies',get_queried_object()->taxonomy);
            elseif(is_archive() || is_home()):
                get_template_part('templates/pages/archive',get_queried_object()->name??null);
            else:
                get_template_part('templates/pages/page',get_post_type(),['is_archieve'=>$is_archieve]);
            endif;
            ?>
            <?php get_template_part('templates/navigation/menu','onpage-links',['position'=>'bottom']); ?>
        </main><!-- #main -->
    </div>

<?php

get_footer();
