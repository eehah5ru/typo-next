<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Typo_Next
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php typo_next_post_thumbnail(); ?>

        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>
    </header><!-- .entry-header -->


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


        global $post;
        $parent_post = $post;

        $children_args = array(
            'post_parent' => $post->ID
        );

        $children_query = new WP_Query($children_args);

        while ($children_query->have_posts()) :
            $children_query->the_post();

            get_template_part('template-parts/content', get_post_type());

        endwhile;

        $children_query->reset_postdata();
        $popst = $parent_post;


        /* wp_link_pages(
*     array(
*         'before' => '<div class="page-links">' . esc_html__('Pages:', 'typo-next'),
*         'after'  => '</div>',
*     )
* ); */
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php typo_next_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
