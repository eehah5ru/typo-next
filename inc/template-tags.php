<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Typo_Next
 */

if (!function_exists('typo_next_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function typo_next_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            /* translators: %s: post date. */
            esc_html_x('Posted on %s', 'post date', 'typo-next'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
endif;

if (!function_exists('typo_next_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function typo_next_posted_by()
    {
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x('by %s', 'post author', 'typo-next'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
endif;

/*
/ FOOTER
/*/
if (!function_exists('typo_next_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function typo_next_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'typo-next'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'typo-next') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'typo-next'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'typo-next') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'typo-next'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                )
            );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'typo-next'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

/*
/ categories list
/*/
if (!function_exists('typo_next_entry_categories')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function typo_next_entry_categories()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'typo-next'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links">' . esc_html__('%1$s', 'typo-next') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }

            /* TODO: tags are in footer function */
        }
    }
endif;


if (!function_exists('typo_next_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function typo_next_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    'post-thumbnail',
                    array(
                        'alt' => the_title_attribute(
                            array(
                                'echo' => false,
                            )
                        ),
                    )
                );
                ?>
            </a>

<?php
        endif; // End is_singular().
    }
endif;

if (!function_exists('wp_body_open')) :
    /**
     * Shim for sites older than 5.2.
     *
     * @link https://core.trac.wordpress.org/ticket/12563
     */
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
endif;

/*
/
/ print gradient for post
/
 */
if (!function_exists('typo_next_post_gradient')) :
    function typo_next_post_gradient()
    {
        global $post;

        $gradient = get_field('gradient');

        if ($gradient) :
            echo $gradient;
        else :
            echo "background-image: linear-gradient(
  315deg,
  hsl(345deg 100% 42%) 0%,
  hsl(15deg 90% 47%) 15%,
  hsl(44deg 81% 51%) 27%,
  hsl(74deg 71% 56%) 38%,
  hsl(107deg 81% 49%) 47%,
  hsl(141deg 91% 42%) 55%,
  hsl(175deg 100% 35%) 63%,
  hsl(195deg 93% 36%) 71%,
  hsl(215deg 86% 37%) 78%,
  hsl(235deg 79% 38%) 84%,
  hsl(245deg 86% 28%) 90%,
  hsl(256deg 93% 17%) 95%,
  hsl(267deg 100% 7%) 100%
);";
        endif;
    }
endif;


if (!function_exists('typo_next_event_dates')) :
  function typo_next_event_dates()
  {
    global $post;

    $begins = get_field('begins');
    $ends = get_field('ends');

    if ($begins && !$ends) {
      echo $begins;
      return;
    }

    if ($begins && $ends) :
      echo $begins . " &mdash; " . $ends;
    endif;
  }
endif;

if (!function_exists('typo_next_child_posts_title')) {
  function typo_next_child_posts_title() {
    $t = get_field("child_posts_title");

    if ($t) {
      echo $t;
      return;
    }

    echo "children posts";
  }
}
