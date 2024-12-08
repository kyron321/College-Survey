<?php
function register_state_taxonomy()
{
    $labels = [
        'name' => _x('States', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('State', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Search States', 'textdomain'),
        'all_items' => __('All States', 'textdomain'),
        'parent_item' => __('Parent State', 'textdomain'),
        'parent_item_colon' => __('Parent State:', 'textdomain'),
        'edit_item' => __('Edit State', 'textdomain'),
        'update_item' => __('Update State', 'textdomain'),
        'add_new_item' => __('Add New State', 'textdomain'),
        'new_item_name' => __('New State Name', 'textdomain'),
        'menu_name' => __('States', 'textdomain'),
    ];

    $args = [
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'state'],
        'public' => false,
        'publicly_queryable' => false,
    ];

    register_taxonomy('state', ['college'], $args);
}

add_action('init', 'register_state_taxonomy');
