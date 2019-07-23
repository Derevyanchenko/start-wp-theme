<?php

add_action('wp_enqueue_scripts', 'finex_styles');
add_action('wp_enqueue_scripts', 'finex_scripts');
add_action('acf/init', 'my_acf_init');
add_action("init", "register_post_type_services");

add_filter('excerpt_more', function ($more) {
    return '...';
});

add_filter('excerpt_length', function () {
    return 40;
});


add_theme_support('custom-logo', array(
    'height' => 85,
    'width' => 85,
    'flex-width' => true,
    'flex-height' => true,
));


register_nav_menus(array(
    "main_menu" => esc_html__("top", "clean"),
));

add_theme_support("post-thumbnails");

function my_acf_init()
{

    if (function_exists('acf_add_options_page')) {

        $option_page = acf_add_options_page(array(
            'page_title' => 'Настройки темы',
            'menu_title' => 'Настройки темы',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
            'position' => '76',
            'post_id' => 'theme-general-settings',
        ));

    }

}

// post type "services"

function register_post_type_services()
{
    register_post_type('services', array(
        'labels' => array(
            'name' => 'Услуги', // Основное название типа записи
            'singular_name' => 'Услуга', // отдельное название записи типа Book
            'add_new' => 'Добавить услугу',
            'add_new_item' => 'Добавить новую услугу',
            'edit_item' => 'Редактировать услугу',
            'new_item' => 'Новая услуга',
            'view_item' => 'Посмотреть услугу',
            'search_items' => 'Найти услугу',
            'not_found' => 'Услуг не найдено',
            'not_found_in_trash' => 'В корзине услугу не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Услуги',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'taxonomies' => array(""),
        'rewrite' => array('slug' => 'uslugi', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => false,
        'menu_icon' => 'dashicons-media-default',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}



function finex_styles()
{
    wp_enqueue_style('finex-style', get_stylesheet_uri());
    wp_enqueue_style('jquery-ui-style', get_template_directory_uri() . "/assets/css/main.css");
}

function finex_scripts()
{
    /*wp_deregister_script("jquery");*/
    wp_enqueue_script("main-script", get_template_directory_uri() . "/assets/js/main.js", array("jquery"), "", true);

  /*  wp_localize_script('main-script', 'mm_ajax_object',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'templ_dir_uri' => get_template_directory_uri(),
            'uploads_dir_uri' => wp_upload_dir()['baseurl'],
            'home_url' => home_url()
        ));*/

}

/*include "includes/ajax.php";*/

