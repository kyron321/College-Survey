<?php
// Add "Role" dropdown to the comment form
function add_custom_role_field_to_comment_form($comment_field)
{
    $custom_field = '
    <p class="comment-form-role">
        <select name="user_role" id="user_role" required>
            <option value="">Select your role</option>
            <option value="student">Student</option>
            <option value="parent">Parent</option>
            <option value="staff">Staff</option>
        </select>
    </p>';
    return $comment_field . $custom_field;
}
add_filter(
    'comment_form_field_comment',
    'add_custom_role_field_to_comment_form'
);

// Save the "Role" field when a comment is posted
function save_custom_role_field($comment_id)
{
    if (isset($_POST['user_role']) && !empty($_POST['user_role'])) {
        $role = sanitize_text_field($_POST['user_role']);
        add_comment_meta($comment_id, 'user_role', $role, true);
    }
}
add_action('comment_post', 'save_custom_role_field');

// Append the user role to the comment text
function append_role_to_comment_text($comment_text, $comment)
{
    $role = get_comment_meta($comment->comment_ID, 'user_role', true);
    if ($role) {
        $comment_text .= ' ~ <strong>' . esc_html(ucfirst($role)) . '</strong>';
    }
    return $comment_text;
}
add_filter('comment_text', 'append_role_to_comment_text', 10, 2);