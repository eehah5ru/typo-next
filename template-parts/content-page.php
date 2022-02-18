<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Typo_Next
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <style>
        .site-main>article.post {
            /* .text-headers:after,
        h2:after,
        h3:after */
            <?php typo_next_post_gradient(); ?>
        }
    </style>

    <header class="entry-header">
        <?php typo_next_post_thumbnail(); ?>
        <div class="text-headers">
            <?php
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;
            ?>

            <div class="event-dates">
                <?php typo_next_event_dates(); ?>
            </div>

            <div class="categories">
                <?php typo_next_entry_categories(); ?>
            </div>
        </div>

    </header><!-- .entry-header -->


    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'typo-next'),
                'after'  => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
