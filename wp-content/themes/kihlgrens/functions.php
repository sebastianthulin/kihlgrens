<?php
/**
 * Kihlgrens theme setup.
 */
if (!defined('KIHLGRENS_THEME_VERSION')) {
    $theme = wp_get_theme('kihlgrens');
    define('KIHLGRENS_THEME_VERSION', $theme->get('Version'));
}

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height' => 64,
        'width' => 240,
        'flex-height' => true,
        'flex-width' => true,
    ]);
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_editor_style('dist/output.css');

    register_nav_menus([
        'primary' => __('Primary Menu', 'kihlgrens'),
        'footer' => __('Footer Menu', 'kihlgrens'),
    ]);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('kihlgrens-style', get_stylesheet_uri(), [], KIHLGRENS_THEME_VERSION);
    wp_enqueue_style('kihlgrens-tailwind', get_theme_file_uri('dist/output.css'), ['kihlgrens-style'], KIHLGRENS_THEME_VERSION);
    wp_enqueue_script('kihlgrens-flowbite', get_theme_file_uri('dist/flowbite.min.js'), [], KIHLGRENS_THEME_VERSION, true);
});
