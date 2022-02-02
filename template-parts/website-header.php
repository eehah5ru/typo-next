<?php
/*
/
/ shared header between pages and pop-up menu
/
/ */

?>
<header id="masthead" class="site-header">
    <div class="menu-button tablet">
        <a href="#" class="js-modal-trigger" data-target="modal-menu">
            меню
        </a>
    </div>

    <?php if (array_search("is-modal-menu", $args)) : ?>

        <div class="close-menu-button tablet" aria-label="close">
            <a href="#">
                <?php echo file_get_contents(get_template_directory_uri() . "/images/close-button.svg") ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="about-button">
        <a href="">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/about-button.svg") ?>
        </a>
    </div>

    <div class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/typography-logo.svg") ?>
        </a>
    </div>

    <div class="menu-button mobile">
        <a href="#" class="js-modal-trigger" data-target="modal-menu">
            <?php echo file_get_contents(get_template_directory_uri() . "/images/menu-button.svg") ?>
        </a>
    </div>

    <div class="search-lang-buttons">
        <a class="search-button" href="">
            поиск
        </a>
        |
        <a class="lang-button" href="">
            EN
        </a>
        |
        <a class="lang-button" href="">
            RU
        </a>
    </div>


    <!-- <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'typo-next'); ?></button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    )
                );
                ?>
            </nav><!-- #site-navigation -->
</header><!-- #masthead -->
<header class="now-in-typography">
    <span>
        Сейчас в Типографии
    </span>
    <a href="">
        Ты меня найдешь до 31 марта
    </a>
    <span>
        |
    </span>
    <a href="">
        Unaimed sessions with League of Tenders
    </a>
    <span>
        |
    </span>
    <a href="">
        Тренинг Фантазия
    </a>
    <span>
        |
    </span>
    <span>
        Сейчас в Типографии
    </span>
    <a href="">
        Ты меня найдешь до 31 марта
    </a>
    <span>
        |
    </span>
    <a href="">
        Unaimed sessions with League of Tenders
    </a>
    <span>
        |
    </span>
    <a href="">
        Тренинг Фантазия
    </a>

</header>
