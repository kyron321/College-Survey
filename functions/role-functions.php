<?php
// Add "Role" dropdown to the comment form
function add_custom_role_field_to_comment_form($comment_field)
{
    $custom_field = '
    <div class="comment-form-role-container">
    <p class="comment-form-role">
        <select name="user_role" id="user_role" required>
            <option value="">Select your role</option>
            <option value="student">Student</option>
            <option value="parent">Parent</option>
            <option value="staff">Staff</option>
        </select>
    </p>
    <p class="comment-form-student-status" style="display:none;">
        <select name="student_status" id="student_status">
            <option value="">Select your class</option>';
    for ($year = 24; $year >= 12; $year--) {
        $custom_field .= '<option value="class_of_' . $year . '">Class of 20' . $year . '</option>';
    }
    $custom_field .= '
        </select>
    </p>
    </div>
    ';
    return $comment_field . $custom_field;
}
add_filter(
    'comment_form_field_comment',
    'add_custom_role_field_to_comment_form'
);

// Save the "Role" and "Student Status" fields when a comment is posted
function save_custom_role_field($comment_id)
{
    if (isset($_POST['user_role']) && !empty($_POST['user_role'])) {
        $role = sanitize_text_field($_POST['user_role']);
        add_comment_meta($comment_id, 'user_role', $role, true);
    }
    if (isset($_POST['student_status']) && !empty($_POST['student_status'])) {
        $status = sanitize_text_field($_POST['student_status']);
        add_comment_meta($comment_id, 'student_status', $status, true);
    }
}
add_action('comment_post', 'save_custom_role_field');

// Append the user role and student status to the comment text
function append_role_to_comment_text($comment_text, $comment)
{
    $role = get_comment_meta($comment->comment_ID, 'user_role', true);
    $status = get_comment_meta($comment->comment_ID, 'student_status', true);
    if ($role) {
        $comment_text .= ' ~ <strong>' . esc_html(ucfirst($role)) . '</strong>';
    }
    if ($status) {
        // Extract the year from the status and format it as a full year
        if (preg_match('/class_of_(\d{2})/', $status, $matches)) {
            $year = '20' . $matches[1];
            $status = 'Class of ' . $year;
        }
        $comment_text .= ' (' . esc_html(str_replace('_', ' ', ucfirst($status))) . ')';
    }
    return $comment_text;
}
add_filter('comment_text', 'append_role_to_comment_text', 10, 2);