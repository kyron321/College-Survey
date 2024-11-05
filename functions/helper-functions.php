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

function enqueue_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');

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

add_theme_support('comments');

// Add custom ACF radio button field to the comment form
add_filter('comment_form_fields', function ($fields) {
	$field = get_field_object('comment_custom_fields'); // Matches your ACF field name
	if ($field) {
		$fields['comment_custom_fields'] = '<p class="comment-form-radio">';
		$fields['comment_custom_fields'] .= '<label for="comment_custom_fields">' . esc_html($field['label']) . '</label><br>';
		foreach ($field['choices'] as $value => $label) {
			$fields['comment_custom_fields'] .= '<input type="radio" id="comment_custom_fields_' . esc_attr($value) . '" name="comment_custom_fields" value="' . esc_attr($value) . '"> ' . esc_html($label) . '<br>';
		}
		$fields['comment_custom_fields'] .= '</p>';
	}
	return $fields;
});

// Save the custom field data when a comment is posted
add_action('comment_post', function ($comment_id) {
	if (isset($_POST['comment_custom_fields'])) {
		update_comment_meta($comment_id, 'comment_custom_fields', sanitize_text_field($_POST['comment_custom_fields']));
	}
});

// Display the saved custom field data with the comment
add_filter('comment_text', function ($comment_text, $comment) {
	$comment_option = get_comment_meta($comment->comment_ID, 'comment_custom_fields', true);
	if ($comment_option) {
		$comment_text .= '<p><strong>Role:</strong> ' . esc_html($comment_option) . '</p>';
	}
	return $comment_text;
}, 10, 2);

add_filter('comment_form_default_fields', function ($fields) {
	// Remove the name and email fields
	unset($fields['author']);
	unset($fields['email']);
	unset($fields['url']);
	unset($fields['cookies']);

	return $fields;
});

add_filter('comment_form_defaults', function ($defaults) {
	// Change the default comment form title if needed
	$defaults['title_reply'] = 'Leave Feedback for This College';
	return $defaults;
});

add_filter('comment_form_logged_in', function () {
	// Return an empty string to prevent displaying the logged-in user's information
	return '';
});

add_filter('comment_form_logged_in_as', function () {
	// Return an empty string to prevent showing "Logged in as [username]" message
	return '';
});

add_action('pre_comment_on_post', function () {
	// Force the comment author and email fields to be anonymous
	$_POST['author'] = 'Anonymous';
	$_POST['email'] = 'anonymous@example.com';
});
