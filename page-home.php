<?php

/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();
?>

<main id="primary" class="site-main home-page">
    <section class="home-about">
        <?php /*var_dump(get_option('page_on_front'));*/ ?>
        <?php /*var_dump($post);*/ ?>

        <?php the_content(); ?>
    </section>

    <section class="home-events">
        <header class="events-header">
            <a href="">
                сейчас
            </a>
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

        <header class="events-header">
            <a href="">
                СКОРО
            </a>
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
