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
$business[ 'telephone_number' ] = get_theme_mod( 'creativestream_telephone_number' );
$business[ 'email' ] = get_theme_mod( 'creativestream_email_address' );
$contatPageLink['link_text'] = get_theme_mod('creativestream_contact_link_text') ?? 'Contact Form';
$contatPageLink['link'] = get_theme_mod('creativestream_contact_url');
?>

<div id="" class="grid grid-cols-12 w-full max-w-content px-6 mx-auto pt-14 items-center">
<!--    <div id="footer-logo" class="col-span-12 lg:col-span-3 2xl:col-span-2 mb-6 order-1 lg:order-0">-->
<!--        <div class="logo-container w-2/3 mx-auto lg:w-full">-->
<!--            <div class="text-4xl font-prata text-primary text-center lg:text-left">Contact us</div>-->
<!--        </div>-->
<!--    </div>-->

    <div id="footer-quick-links" class="col-span-12 xl:col-span-9 2xl:col-span-10 mb-0 sm:mb-6 order-2 xl:flex justify-center xl:justify-between">
        <ul class="flex flex-col lg:flex-row justify-center lg:justify-center xl:justify-start">
        <?php if($business[ 'telephone_number' ] ):?>
            <?php echo '<li>'.$business[ 'telephone_number' ].'</li><li class="separator">|</li>'; ?>
        <?php endif;?>
        <?php if($business[ 'email' ] ):?>
            <li><a href="mailto:<?php echo $business['email'];?>"><?php echo $business[ 'email' ];?></a></li><li class="separator">|</li>
        <?php endif;?>
        <?php if ( $business[ 'address' ] ): ?>
            <?php echo '<li>'.$business[ 'address' ].'</li>'; ?>
        <?php endif; ?>
        </ul>
        <?php if($contatPageLink['link']):?>
            <div class="text-center"><?php /* <a href="<?php echo $contatPageLink['link'];?>" class="contact-page-link button"><?php echo $contatPageLink['link_text'];?></a> */ ?></div>
        <?php endif;?>
    </div>

    <div class="col-span-12 lg:col-span-12 xl:col-span-3 2xl:col-span-2 mb-6 order-0 lg:order-3">
        <ul class="social-links flex w-full justify-center xl:justify-end">
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>        
        </ul>
    </div>
</div>
<div class=" site-info flex flex-col lg:flex-row justify-between items-center lg:items-stretch w-full max-w-content my-4 px-6 mx-auto text-base">
    <p class="mb-4 lg:mb-0 text-center lg:text-left text-base">
        Copyright &copy; <?php echo date( 'Y' ); ?> <?php echo $business[ 'name' ]; ?> <span class="px-2">|</span>
        <?php get_template_part( 'templates/navigation/menu', 'static-footer' ); ?>
    </p>
    <p class="mb-4 lg:mb-0 flex flex-col xl:flex-row items-center text-base text-center">
        Website design by
        <a class="no-underline flex items-center ml-1" href="//creativestream.co.uk" target="_blank">
            <img class="mt-2 lg:-mt-1"
                 src="<?php echo get_template_directory_uri() . '/assets/images/creativestream-logo-2021.svg' ?>"
                 alt="Creativestream logo"
                 title="Creativestream logo"/>
        </a>
    </p>
</div>
