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
    <section class="home-events">

        <?php
        $args = array(
            'posts_per_page'   => 20,
            'post_type'        => 'post',
        );
        $wp_query = new WP_Query($args);

        while (have_posts()) :
            the_post();
        ?>
            <article class=" post">
                <header>
                    <?php the_category(', '); ?>
                </header>

                <?php typo_next_post_thumbnail(); ?>
                <h2>
                    <?php the_title(); ?>
                </h2>
            </article>

        <?php
        endwhile; // End of the loop.
        ?>
    </section>

</main><!-- #main -->


<?php
get_sidebar();
get_footer();
