<?php

function cswv_get_previous_posts_link( $label = null )
{
    $attr='';
    global $paged;

    if ( null === $label )
    {
        $label = __( '&laquo; Previous Page' );
    }

    if ( ! is_single() && $paged > 1 )
    {
        return '<a href="' . previous_posts( false ) . "\" $attr>" . preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label ) . '</a>';
    }
}

function cswv_get_next_posts_link( $label = null, $max_page = 0 )
{
    global $paged, $wp_query;
    $attr='';

    if ( ! $max_page )
    {
        $max_page = $wp_query->max_num_pages;
    }

    if ( ! $paged )
    {
        $paged = 1;
    }

    $nextpage = (int) $paged + 1;

    if ( null === $label )
    {
        $label = __( 'Next Page &raquo;' );
    }

    if ( ! is_single() && ( $nextpage <= $max_page ) )
    {

        return '<a href="' . next_posts( $max_page, false ) . "\" $attr>" . preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label ) . '</a>';
    }
}

function ottra_numeric_posts_count_nav( $query = null )
{
    $single_left = '<img class="rotate-180" src="'.get_child_image_asset_with_fallback_url('/assets/images/svg/primary/chevron.svg').'" />';
    $double_left ='<img class="rotate-180 mr-4" src="'.get_child_image_asset_with_fallback_url('/assets/images/svg/primary/dchevron.svg').'" />';
    $single_right = '<img src="'.get_child_image_asset_with_fallback_url('/assets/images/svg/primary/chevron.svg').'" />';
    $double_right ='<img class="ml-4" src="'.get_child_image_asset_with_fallback_url('/assets/images/svg/primary/dchevron.svg').'" />';
    if ( empty( $query ) )
    {
        global $wp_query;
        $query = $wp_query;
    }
    $offset = $query->query_vars[ 'posts_per_page' ];

    //if( is_singular() )
    //return;


    /** Stop execution if there's only 1 page */
    if ( $query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max = intval( $query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 )
    {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max )
    {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul class="inline-flex flex-wrap items-center">' . "\n";

    if ( $paged != 1 )
        echo '<li class="page-num page-num-first"><a href=' . get_pagenum_link( 1 ) . '><span class="double-chevron" >'.$double_left.'</span></a></li>';

    /** Previous Post Link */
    if ( cswv_get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", cswv_get_previous_posts_link( '<span class="single-chevron" >'.$single_left.'</span>' ) ); //;

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) )
    {
        $class = 1 == $paged ? ' class="active text-22 font-300 font-Montserrat font-400 px-2"' : ' class="text-22 font-300 font-Montserrat text-gray-300 font-400 px-2"';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1-' . $offset );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link )
    {
        $class = $paged == $link ? ' class="active text-22 font-300 font-Montserrat font-400 px-2"' : ' class="text-22 font-300 font-Montserrat text-gray-300 font-400 px-2"';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $offset * ( $link - 1 ) + 1 . '-' . $offset * $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) )
    {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active text-22 font-300 font-Montserrat font-400 px-2"' : ' class="text-22 font-300 font-Montserrat text-gray-300 font-400  px-2"';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $offset * ( $max - 1 ) + 1 . '-' . $offset * $max );
    }

    /** Next Post Link */
    if ( cswv_get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", cswv_get_next_posts_link( '<span class="single-chevron" >'.$single_right.'</span>' ) ); //

    if ( $paged != $max )
        echo '<li class="page-num page-num-last"><a class="" href=' . get_pagenum_link( $max ) . '><span class="double-chevron" >'.$double_right.'</span></a></li>';

    echo '</ul></div>' . "\n";

}

?>