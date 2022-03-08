<?php
/*

   render children as list in parent post/page

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

    <?php
    while ($children_query->have_posts()) {
        $children_query->the_post();

        get_template_part(
            "template-parts/child-content-{$args['layout']}",
            get_post_type(),
            array(
                'child_post_level' => 2
            )
        );
    }
    wp_reset_postdata();
    ?>

<?php
else :
?>
    <h2>no children!</h2>
<?php
endif;
?>
