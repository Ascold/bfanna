<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BF_Anna
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
    <header id="masthead" class="site-header" role="banner">
        <div class="container-inner">
            <div class="container-fluid">
                <div class="site-branding">
                    <a href="/">
                        <?php echo get_header_image_tag(array(
                            'width' => 200,
                            'height' => 95,
                            'alt' => 'Site Logo',
                        )) ?>
                    </a>
                </div><!-- .site-branding -->
                <nav class="lang-navigation">
                    <?php wp_nav_menu(array('theme_location' => 'menu-2', 'container_class' => 'lang-menu')); ?>
                </nav>
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <button class="menu-toggle" aria-controls="primary-menu"
                            aria-expanded="false"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></button>
                    <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'container_class' => 'main-nav-menu')); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
    </header><!-- #masthead -->
    <div id="content" class="site-content">
