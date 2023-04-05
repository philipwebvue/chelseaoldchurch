<?php
/**
 * menu-onpage-links.php
 *
 *
 * @package stalbans
 * @author Philip Bradbury
 * @created 05/04/2023 22:17
 * @since 1.0
 * @updated 1.0
 */
$default_args = [
    'position' => 'bottom',
];
$args = array_merge( $default_args, $args );

$show_onpage_links = get_field( 'show_page_links' ) ?? false;
$is_top = get_field( 'page_link_position' ) ?? false;
$show_links = false;

if ( $show_onpage_links )
{
    if ( ( $is_top && $args[ 'position' ] === 'top' ) || ( ! $is_top && $args[ 'position' ] === 'bottom' ) )
    {
        $show_links = true;
    }
}

?>

<?php if ( $show_links ): ?>
    <?php if ( have_rows( 'page_links' ) ): ?>
        <section id="on-page-links">
            <div class=" w-full max-w-content mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-4 gap-4 lg:gap-8 ">
                    <?php while ( have_rows( 'page_links' ) ) : the_row(); ?>
                        <?php
                        global $post;
                        $post = get_sub_field( 'add_page_links' );
                        setup_postdata( $post );
                        $args = [
                            'show_body' => false,
                            'show_date' => false,
                        ];

                        get_template_part( 'templates/components/cards/card', get_post_type(), $args );
                        wp_reset_postdata(); ?>
                    <?php endwhile; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
