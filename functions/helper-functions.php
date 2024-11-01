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

add_theme_support( 'menus' );