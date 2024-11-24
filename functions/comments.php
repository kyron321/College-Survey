<?php
function remove_comment_label($fields)
{
    // Customize the comment field without the label
    $fields['comment_field'] =
        '<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required></textarea>';
    return $fields;
}
add_filter('comment_form_defaults', 'remove_comment_label');

function change_comment_button_text($defaults)
{
    $defaults['label_submit'] = 'Post Feedback'; // Change the button text
    return $defaults;
}
add_filter('comment_form_defaults', 'change_comment_button_text');
function custom_comment_callback($comment, $args, $depth)
{
    ?>
    <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-author">
            <?php echo get_avatar($comment, 50);// Display author avatar
    ?>
            <strong><?php echo get_comment_author($comment); ?></strong>
        </div>
        <div class="comment-date">
            <?php echo get_comment_date('F j, Y');// Display date only
    ?>
        </div>
        <div class="comment-text">
            <?php comment_text();// Display comment content
    ?>
        </div>
    </div>
    <?php
}
// Add this to your theme's functions.php file or a custom plugin

function remove_at_in_comment_date($translated_text, $text, $domain)
{
    // Check if the text matches the date-time format string
    if ('%1$s at %2$s' === $text) {
        // Replace it with just the date part
        $translated_text = '%1$s';
    }
    return $translated_text;
}
add_filter('gettext', 'remove_at_in_comment_date', 20, 3);

function always_moderate_comments($approved, $commentdata)
{
    // Force all comments to require moderation
    return '0'; // 0 means "not approved"
}
add_filter('pre_comment_approved', 'always_moderate_comments', 99, 2);

function remove_comment_author_name($author)
{
    return ''; // Return an empty string
}
add_filter('get_comment_author', 'remove_comment_author_name');

function remove_comment_metadata($comment_text)
{
    $comment_text = preg_replace(
        '/(data-author="[^"]+"|data-userid="\d+")/',
        '',
        $comment_text
    );
    return $comment_text;
}
add_filter('comment_text', 'remove_comment_metadata');

function add_feedback_submitted_message($post_id)
{
    if (isset($_GET['feedback_submitted'])) {
        echo '<p class="feedback-notice" style="color: green; margin: 10px 0;">Your feedback has been submitted successfully and is pending moderation.</p>';
    }
}
add_action('comment_form_after', 'add_feedback_submitted_message');

function redirect_after_comment_submission($location)
{
    return add_query_arg('feedback_submitted', '1', $location) . '#commentform';
}
add_filter('comment_post_redirect', 'redirect_after_comment_submission');

function enqueue_comment_submission_script() {
    wp_enqueue_script(
        'comment-feedback-js',
        get_template_directory_uri() . '/js/comment-feedback.js',
        array('jquery'),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_comment_submission_script');

?>


