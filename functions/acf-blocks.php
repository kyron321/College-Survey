<?php
function register_acf_blocks()
{
    // Check if function exists and hook into setup.
    if (function_exists('acf_register_block_type')) {
        // Register a banner block.
        acf_register_block_type(array(
            'name'              => 'banner',
            'title'             => __('Banner'),
            'description'       => __('A custom banner block.'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('banner', 'custom'),
            'enqueue_assets'    => function () {
                wp_enqueue_style('banner-block', get_template_directory_uri() . '/blocks/banner.css', array(), '1.0.0');
                wp_enqueue_script('banner-block', get_template_directory_uri() . '/blocks/banner.js', array(), '1.0.0', true);
            },
        ));
        // Register a two column block.
        acf_register_block_type(array(
            'name'              => 'two-column',
            'title'             => __('Two Column'),
            'description'       => __('A custom two column block.'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('two column', 'custom'),
            'enqueue_assets'    => function () {
                wp_enqueue_style('two-column-block', get_template_directory_uri() . '/blocks/two-column.css', array(), '1.0.0');
                wp_enqueue_script('two-column-block', get_template_directory_uri() . '/blocks/two-column.js', array(), '1.0.0', true);
            },
        ));
    }
}

// Automatically include block template files.
function theme_block_render_callback($block)
{
    $slug = str_replace('acf/', '', $block['name']);
    if (file_exists(get_theme_file_path("/blocks/{$slug}.php"))) {
        include(get_theme_file_path("/blocks/{$slug}.php"));
    }
}

add_action('acf/init', 'register_acf_blocks');