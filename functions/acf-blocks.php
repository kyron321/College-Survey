<?php
function register_acf_blocks() {
    // Check if function exists and hook into setup.
    if (function_exists('acf_register_block_type')) {
        // Register a banner block.
        acf_register_block_type(array(
            'name'              => 'banner',
            'title'             => __('Banner'),
            'description'       => __('A custom banner block.'),
            'render_callback'   => 'render_banner_block',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('banner', 'custom'),
            'enqueue_assets'    => function(){
                wp_enqueue_style('banner-block', get_template_directory_uri() . '/blocks/banner.css', array(), '1.0.0');
                wp_enqueue_script('banner-block', get_template_directory_uri() . '/blocks/banner.js', array(), '1.0.0', true);
            },
        ));
        // Register a two column block.
        acf_register_block_type(array(
            'name'              => 'two-column',
            'title'             => __('Two Column'),
            'description'       => __('A custom two column block.'),
            'render_callback'   => 'render_two_column_block',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('two column', 'custom'),
            'enqueue_assets'    => function(){
                wp_enqueue_style('two-column-block', get_template_directory_uri() . '/blocks/two-column.css', array(), '1.0.0');
                wp_enqueue_script('two-column-block', get_template_directory_uri() . '/blocks/two-column.js', array(), '1.0.0', true);
            },
        ));
    }
}
add_action('acf/init', 'register_acf_blocks');
