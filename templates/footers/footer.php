<?php
/**
 * footer.php
 *
 *
 * @package stalbans
 * @author Philip Bradbury
 * @created 03/04/2023 16:02
 * @since 1.0
 * @updated 1.0
 */

$business[ 'name' ] = get_theme_mod( 'creativestream_business_name' );
$business[ 'address' ] = get_theme_mod( 'creativestream_business_address' );
$business[ 'reg_number' ] = get_theme_mod( 'creativestream_business_number' );
$business[ 'vat_number' ] = get_theme_mod( 'creativestream_vat_number' );
$business[ 'charity_number' ] = get_theme_mod( 'creativestream_charity_number' );
?>

<div id="" class="grid grid-cols-12 w-full max-w-content px-6 mx-auto pt-14">
    <div id="footer-logo" class="col-span-12 lg:col-span-3 mb-6">
        <div class="logo-container w-2/3 mx-auto lg:w-full">
            <a href="<?php echo home_url( '/' ); ?>">
                <img class=" mx-auto lg:ml-0"
                     src="<?php echo get_theme_mod( 'footer_logo' ); ?>"
                     alt="Footer logo">
            </a>
        </div>
    </div>

    <div id="footer-quick-links"
         class="col-span-12 lg:col-span-9 xl:col-span-6 flex justify-center lg:justify-end xl:justify-center mb-0 sm:mb-6">
        <?php get_template_part( 'templates/navigation/menu', 'static-footer' ); ?>
    </div>
    <div id="" class="col-span-12 lg:col-span-3 mb-6">
        <?php if ( $business[ 'address' ] ): ?>
            <h2>Address</h2>
            <?php echo wpautop( $business[ 'address' ] ); ?>
        <?php endif; ?>
    </div>
</div>
<div id=""
     class=" site-info flex flex-col lg:flex-row justify-between items-center lg:items-stretch  text-sm w-full max-w-content  my-4 px-6 mx-auto text-sm lg:text-base">
    <p class="mb-4 lg:mb-0 text-center lg:text-left text-sm">
        Copyright &copy; <?php echo date( 'Y' ); ?> <?php echo $business[ 'name' ]; ?> <span class="px-2">|</span>
        <?php if ( $business[ 'reg_number' ] ): ?>
            Company number: <?php echo $business[ 'reg_number' ]; ?> <span class="px-2">|</span>
        <?php endif; ?>
        <?php if ( $business[ 'vat_number' ] ): ?>
            Vat number: <?php echo $business[ 'vat_number' ]; ?> <span class="px-2">|</span>
        <?php endif; ?>
        All rights reserved.
    </p>
    <p class="mb-4 lg:mb-0 flex flex-col lg:flex-row text-sm text-center">
        Website design by
        <a class="no-underline flex items-center ml-1" href="//creativestream.co.uk" target="_blank">
            <img class="mt-2 lg:-mt-1"
                 src="<?php echo get_template_directory_uri() . '/assets/images/creativestream-logo-2021.svg' ?>"
                 alt="Creativestream logo"
                 title="Creativestream logo"/>
        </a>
    </p>
</div>
