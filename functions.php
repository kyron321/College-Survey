<?php
function theme_enqueue_assets() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/js/main.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');