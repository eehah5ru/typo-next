<article class=" post">
  <header>
    <?php the_category(', '); ?>
  </header>

  <?php typo_next_post_thumbnail(); ?>
  <h2>
    <a href="<?php echo get_permalink(); ?>">
       <?php the_title(); ?>
    </a>
  </h2>
</article>
