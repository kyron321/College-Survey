<?php
function register_acf_options_page()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Site Options',
            'menu_title' => 'Site Options',
            'menu_slug' => 'site-options',
            'capability' => 'create_users',
            'redirect' => false,
            'position' => 2,
        ]);
    }
}
add_action('acf/init', 'register_acf_options_page');
