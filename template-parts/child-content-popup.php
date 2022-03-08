<?php

/**
 * Template part for displaying child posts as popups
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Typo_Next
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("child-post post-popup column is-one-third"); ?>>

    <a href="#" class="js-modal-trigger" data-target="modal-post-<?php the_ID(); ?>">
        <?php
        /* the_title('<h1 class="entry-title">', '</h1>'); */


        typo_next_post_thumbnail(); ?>
    </a>
</article><!-- #post-<?php the_ID(); ?> -->

<div class="modal modal-post" id="modal-post-<?php the_ID(); ?>">
    <div class="modal-background"></div>
    <div class="modal-content">
        <?php get_template_part(
            'template-parts/website-header',
            null,
            array("is-modal-menu" => true)
        ); ?>

        <main id="modal-primary-<?php the_ID(); ?>" class="modal-primary site-main home-page">
            <article id="post-<?php the_ID(); ?>" <?php post_class("child-post"); ?>>
                <div class="entry-content">
                    <?php
                    the_content(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'typo-next'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post(get_the_title())
                        )
                    );
                    ?>
                </div>

            </article>
        </main>

    </div>
</div>
