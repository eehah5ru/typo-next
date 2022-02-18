<?php

/**
 * Template part for displaying child posts with 2nd level of headings
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Typo_Next
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("child-post"); ?>>
    <?php get_template_part("template-parts/post-header-level-" . $args['child_post_level'], get_post_type()); ?>

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

        /*
           displaying next level of children posts
         */
        global $post;
        $parent_post = $post;

        $children_args = array(
            'post_parent' => $post->ID
        );

        $children_query = new WP_Query($children_args);

        while ($children_query->have_posts()) :
            $children_query->the_post();

            get_template_part('template-parts/child-content', get_post_type());

        endwhile;

        $children_query->reset_postdata();
        $post = $parent_post;

        ?>
        <hr class="wp-block-separator" />
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
