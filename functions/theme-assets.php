<?php
// Enqueue assets
function theme_enqueue_assets() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/dist/css/style.css');
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/dist/js/main.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');