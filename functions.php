<?php

/**
 * Typo_Next functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Typo_Next
 */

if (!defined('TYPO_NEXT_VERSION')) {
    // Replace the version number of the theme on each release.
    define('TYPO_NEXT_VERSION', '1.0.0');
}

if (!function_exists('typo_next_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function typo_next_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Typo_Next, use a find and replace
		 * to change 'typo-next' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('typo-next', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'typo-next'),
            )
        );

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'typo_next_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'typo_next_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function typo_next_content_width()
{
    $GLOBALS['content_width'] = apply_filters('typo_next_content_width', 640);
}
add_action('after_setup_theme', 'typo_next_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function typo_next_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'typo-next'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'typo-next'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'typo_next_widgets_init');


/**
 add menu order for posts
 **/
/* add_action('init', 'typo_next_custom_post_order_fn');
* add_action('admin_init', 'typo_next_custom_post_order_fn');
* 
* 
* function typo_next_custom_post_order_fn()
* {
*     add_post_type_support('post', 'page-attributes');
*     add_post_type_support('post', 'custom-fields');
* } */

/**
 * Enqueue scripts and styles.
 */
function typo_next_scripts()
{
    wp_enqueue_style('typo-next-style', get_stylesheet_uri(), array(), TYPO_NEXT_VERSION);
    wp_style_add_data('typo-next-style', 'rtl', 'replace');

    wp_enqueue_script('typo-next-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), TYPO_NEXT_VERSION, true);
    wp_enqueue_script('typo-next-jquery-marquee', get_template_directory_uri() . '/js/jquery.marquee.min.js', array(), TYPO_NEXT_VERSION, true);


    wp_enqueue_script('typo-next-navigation', get_template_directory_uri() . '/js/navigation.js', array(), TYPO_NEXT_VERSION, true);

    wp_enqueue_script('typo-next-main', get_template_directory_uri() . '/js/typo_next.js', array(), TYPO_NEXT_VERSION, true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'typo_next_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}


add_filter('render_block', 'debug_render_block', 10, 3);
function debug_render_block($block_content, $block)
{
    if ($block["blockName"] != "core/image") {
        return $block_content;
    }

    /* var_dump($block); */

    $block_id = $block['attrs']["id"];

    $before = <<<END
  <div class="modal" id="modal-wp-image-{$block_id}">
  <div class="modal-background"></div>
  <div class="modal-content">
END;

    $after = <<<END
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
  </div>
END;


    return $block_content . $before . $block_content . $after;
}
