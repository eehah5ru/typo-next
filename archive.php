<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Typo_Next
 */

get_header();
?>

<main id="primary" class="site-main category-page">
    <section class="category-about">
      <?php
      $post_id = get_option('page_on_front');

      echo get_the_content(null, false, $post_id);
      ?>

    </section>

    <section class="category-events">
        <header class="event-header">
            <?php
            the_archive_title('<a class="page-title">', '</a>');
            /* the_archive_description('<div class="archive-description">', '</div>'); */
            ?>
        </header>

        <div class="events-container">
            <?php
            $args = array(
                'posts_per_page'   => 20,
                'post_type'        => 'post',
            );
            $wp_query = new WP_Query($args);

            while (have_posts()) :
                the_post();
                get_template_part('template-parts/index', 'item');
            endwhile; // End of the loop.
            ?>
        </div>
    </section>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
