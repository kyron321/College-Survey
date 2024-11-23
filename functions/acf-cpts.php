<?php
function register_colleges_cpt()
{
    $labels = [
        'name' => _x('Colleges', 'Post type general name', 'textdomain'),
        'singular_name' => _x(
            'College',
            'Post type singular name',
            'textdomain'
        ),
        'menu_name' => _x('Colleges', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('College', 'Add New on Toolbar', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'add_new_item' => __('Add New College', 'textdomain'),
        'new_item' => __('New College', 'textdomain'),
        'edit_item' => __('Edit College', 'textdomain'),
        'view_item' => __('View College', 'textdomain'),
        'all_items' => __('All Colleges', 'textdomain'),
        'search_items' => __('Search Colleges', 'textdomain'),
        'parent_item_colon' => __('Parent Colleges:', 'textdomain'),
        'not_found' => __('No colleges found.', 'textdomain'),
        'not_found_in_trash' => __('No colleges found in Trash.', 'textdomain'),
        'featured_image' => _x(
            'College Cover Image',
            'Overrides the “Featured Image” phrase for this post type. Added in 4.3',
            'textdomain'
        ),
        'set_featured_image' => _x(
            'Set cover image',
            'Overrides the “Set featured image” phrase for this post type. Added in 4.3',
            'textdomain'
        ),
        'remove_featured_image' => _x(
            'Remove cover image',
            'Overrides the “Remove featured image” phrase for this post type. Added in 4.3',
            'textdomain'
        ),
        'use_featured_image' => _x(
            'Use as cover image',
            'Overrides the “Use as featured image” phrase for this post type. Added in 4.3',
            'textdomain'
        ),
        'archives' => _x(
            'College archives',
            'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4',
            'textdomain'
        ),
        'insert_into_item' => _x(
            'Insert into college',
            'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4',
            'textdomain'
        ),
        'uploaded_to_this_item' => _x(
            'Uploaded to this college',
            'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4',
            'textdomain'
        ),
        'filter_items_list' => _x(
            'Filter colleges list',
            'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4',
            'textdomain'
        ),
        'items_list_navigation' => _x(
            'Colleges list navigation',
            'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4',
            'textdomain'
        ),
        'items_list' => _x(
            'Colleges list',
            'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4',
            'textdomain'
        ),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'college'],
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => [
            'title',
            'thumbnail',
            'revisions',
            'custom-fields',
            'comments',
        ],
        'show_in_rest' => false,
    ];

    register_post_type('college', $args);
}
add_action('init', 'register_colleges_cpt');
