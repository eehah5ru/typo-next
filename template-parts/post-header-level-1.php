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
