<?php
/*

   render children as popup

 */

?>

<?php

global $post;

$parent_post = $post;

$children_args = array(
  'post_parent' => $post->ID,
  'post_type' => $post->post_type,
);


$children_query = new WP_Query($children_args);

if ($children_query->have_posts()) :
?>

    <section class="children-posts popup">
        <div class="columns is-multiline is-tablet">
            <?php
            while ($children_query->have_posts()) {
                $children_query->the_post();

                get_template_part(
                    "template-parts/child-content-{$args['layout']}",
                    get_post_type(),
                    array(
                        'child_post_level' => get_field("child_posts_level", $parent_post)
                    )
                );
            }
            wp_reset_postdata();
            ?>
        </div>
    </section>

<?php
else:
?>
    <h2>no children!</h2>
<?php
endif;
?>
