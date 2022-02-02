<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Typo_Next
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'typo-next'); ?></a>

        <?php get_template_part('template-parts/website-header'); ?>

        <div class="modal" id="modal-menu">
            <div class="modal-background"></div>
            <div class="modal-content">
                <?php get_template_part(
                    'template-parts/website-header',
                    null,
                    array("is-modal-menu" => true)
                ); ?>

                <main id="menu-primary" class="site-main home-page">
                    <section class="home-about">
                        <?php
                        $post_id = get_option('page on front');
                        $post = get_post($post_id);

                        echo the_content();
                        ?>
                    </section>
                    <section class="menu-image">
                        <?php the_post_thumbnail(); ?>
                    </section>
            </div>
            <!-- <button class="modal-close is-large" aria-label="close"></button> -->
        </div>
