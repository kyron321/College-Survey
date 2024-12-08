<?php
function remove_comment_label($fields)
{
    $fields['comment_field'] =
        '<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required></textarea>';
    return $fields;
}
add_filter('comment_form_defaults', 'remove_comment_label');

function change_comment_button_text($defaults)
{
    $defaults['label_submit'] = 'Post Feedback';
    return $defaults;
}
add_filter('comment_form_defaults', 'change_comment_button_text');
function custom_comment_callback($comment, $args, $depth)
{
    ?>
    <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-author">
            <?php echo get_avatar($comment, 50); ?>
            <strong><?php echo get_comment_author($comment); ?></strong>
        </div>
        <div class="comment-date">
            <?php echo get_comment_date('F j, Y'); ?>
        </div>
        <div class="comment-text">
            <?php comment_text(); ?>
        </div>
    </div>
    <?php
}

function remove_at_in_comment_date($translated_text, $text, $domain)
{
    if ('%1$s at %2$s' === $text) {
        $translated_text = '%1$s';
    }
    return $translated_text;
}
add_filter('gettext', 'remove_at_in_comment_date', 20, 3);

function always_moderate_comments($approved, $commentdata)
{
    return '0';
}
add_filter('pre_comment_approved', 'always_moderate_comments', 99, 2);

function remove_comment_author_name($author)
{
    return '';
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
?>


