<?php
function set_college_state_taxonomy($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if ('college' != get_post_type($post_id)) {
        return;
    }

    $state = get_field('state', $post_id);

    if ($state) {
        wp_set_post_terms($post_id, array($state), 'state');
    }
}
add_action('save_post', 'set_college_state_taxonomy');

function add_theme_supports() {
    add_theme_support('menus');
    remove_post_type_support('post', 'editor');
}
add_action('after_setup_theme', 'add_theme_supports');

function remove_default_post_type($args, $postType) {
    if ($postType === 'post') {
        $args['public']                = false;
        $args['show_ui']               = false;
        $args['show_in_menu']          = false;
        $args['show_in_admin_bar']     = false;
        $args['show_in_nav_menus']     = false;
        $args['can_export']            = false;
        $args['has_archive']           = false;
        $args['exclude_from_search']   = true;
        $args['publicly_queryable']    = false;
        $args['show_in_rest']          = false;
    }

    return $args;
}
add_filter('register_post_type_args', 'remove_default_post_type', 0, 2);

function enqueue_google_fonts() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Your+Font+Name:wght@400;700&display=swap', false);
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');

function register_my_menus() {
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu'),
        )
    );
}
add_action('init', 'register_my_menus');
