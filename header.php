<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage st_albans_diocese
 * @since St Albans Diocese 1.0
 */

?>
<!doctype html>
<html class="font-theme" <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() . "/assets/images/favicon/apple-touch-icon.png" ?>" >
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() . "/assets/images/favicon/favicon-32x32.png" ?>" >
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() . "/assets/images/favicon/favicon-16x16.png" ?>" >
    <link rel="manifest" href="<?php echo get_template_directory_uri() . "/assets/images/favicon/site.webmanifest" ?>" >
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() . "/assets/images/favicon/safari-pinned-tab.svg" ?>"  color="#164a84">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . "/assets/images/favicon/favicon.ico" ?>" >
    <meta name="msapplication-TileColor" content="#164a84">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri() . "/assets/images/favicon/browserconfig.xml" ?>" >
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>
</head>

<body <?php body_class('font-theme text-base leading-normal'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">


