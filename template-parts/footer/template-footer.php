<?php
// Get the ACF fields
$twitter_x = get_field('twitter__x', 'option');
$facebook = get_field('facebook', 'option');
$youtube = get_field('youtube', 'option');
$linkedin = get_field('linkedin', 'option');
$instagram = get_field('instagram', 'option');
?>

<footer>
    <div class="social-links">
        <?php if ($twitter_x): ?>
            <a href="<?php echo esc_url($twitter_x['url']); ?>" target="_blank" rel="noopener noreferrer">
                Twitter / X
            </a>
        <?php endif; ?>

        <?php if ($facebook): ?>
            <a href="<?php echo esc_url($facebook['url']); ?>" target="_blank" rel="noopener noreferrer">
                Facebook
            </a>
        <?php endif; ?>

        <?php if ($youtube): ?>
            <a href="<?php echo esc_url($youtube['url']); ?>" target="_blank" rel="noopener noreferrer">
                YouTube
            </a>
        <?php endif; ?>

        <?php if ($linkedin): ?>
            <a href="<?php echo esc_url($linkedin['url']); ?>" target="_blank" rel="noopener noreferrer">
                LinkedIn
            </a>
        <?php endif; ?>

        <?php if ($instagram): ?>
            <a href="<?php echo esc_url($instagram['url']); ?>" target="_blank" rel="noopener noreferrer">
                Instagram
            </a>
        <?php endif; ?>
    </div>
</footer>
