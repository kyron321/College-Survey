<?php
function register_acf_blocks()
{
    // Check if function exists and hook into setup.
    if (function_exists('acf_register_block_type')) {
        // Register a banner block.
        acf_register_block_type([
            'name' => 'banner',
            'title' => __('Banner'),
            'description' => __('A custom banner block.'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['banner', 'custom'],
        ]);
        // Register a two column block.
        acf_register_block_type([
            'name' => 'two-column',
            'title' => __('Two Column'),
            'description' => __('A custom two column block.'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['two column', 'custom'],
        ]);
        // Register a colleges block.
        acf_register_block_type([
            'name' => 'colleges',
            'title' => __('Colleges'),
            'description' => __('A custom colleges block.'),
            'render_callback' => 'theme_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['colleges', 'custom'],
        ]);
    }
}

// Automatically include block template files.
function theme_block_render_callback($block)
{
    $slug = str_replace('acf/', '', $block['name']);
    if (file_exists(get_theme_file_path("/blocks/{$slug}.php"))) {
        include get_theme_file_path("/blocks/{$slug}.php");
    }
}

add_action('acf/init', 'register_acf_blocks');
