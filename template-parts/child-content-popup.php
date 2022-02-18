<?php

/**
 * Template part for displaying child posts as popups
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Typo_Next
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("child-post post-popup column"); ?>>
    <?php
    /* the_title('<h1 class="entry-title">', '</h1>'); */

    typo_next_post_thumbnail(); ?>

</article><!-- #post-<?php the_ID(); ?> -->
