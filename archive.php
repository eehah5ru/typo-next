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
        <p>
            «Типография» — это центр современного искусства.
        </p>
        <p>
            Мы делаем <a>выставки</a>, <a>кино</a>, <a>лекции</a>, создаём <a>архив</a> современного искусства Краснодара. В «Типографии» работает <a>библиотека</a>, <a>коворкинг</a>, <a>галерея RedGift</a>, <a>детская лаборатория творчества</a>, винтажный магазин <a>Santa Rrrita</a> и, конечно, <a>Краснодарский институт современного искусства</a> — регулярный образовательный курс по современному искусству. Ещё у нас можно <a>провести мероприятие</a>. Подробнее <a>про нас</a>.
        </p>
        <p>
            Вы можете <a>поддержать</a> нас.
        </p>
        <p>
            Мы работаем с 12:00 до 21:00 по адресу Краснодар, Зиповская 5 к33.
        </p>
        <p>
            Следите за нами в наших социальных сетях: <a>Facebook</a>, <a>Instagram</a>, <a>Vkontakte</a>.
        </p>
    </section>

    <section class="category-events">
        <header class="event-header">
            <?php
            the_archive_title('<a class="page-title">', '<a>');
            the_archive_description('<div class="archive-description">', '</div>');
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
