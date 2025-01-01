<?php
// Get the ACF fields
$twitter_x = get_field('twitter__x', 'option');
$facebook = get_field('facebook', 'option');
$youtube = get_field('youtube', 'option');
$linkedin = get_field('linkedin', 'option');
$instagram = get_field('instagram', 'option');
?>

<footer>
    <div class="footer-logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url(
                get_template_directory_uri() .
                    '/dist/images/socials/footer-logo.svg'
            ); ?>" alt="Site Logo" class="site-logo-img">
        </a>
    </div>

    <nav class="footer-menu">
        <?php wp_nav_menu([
            'theme_location' => 'main-menu',
            'menu_id' => 'main-menu',
            'container' => false,
            'exclude_from_footer' => true,
        ]); ?>
    </nav>

    <div class="social-links">
        <?php if ($twitter_x): ?>
            <a href="<?php echo esc_url(
                $twitter_x['url']
            ); ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo esc_url(
                    get_template_directory_uri() .
                        '/dist/images/socials/twitter.svg'
                ); ?>" alt="Twitter / X">
            </a>
        <?php endif; ?>

        <?php if ($facebook): ?>
            <a href="<?php echo esc_url(
                $facebook['url']
            ); ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo esc_url(
                    get_template_directory_uri() .
                        '/dist/images/socials/facebook.svg'
                ); ?>" alt="Facebook">
            </a>
        <?php endif; ?>

        <?php if ($youtube): ?>
            <a href="<?php echo esc_url(
                $youtube['url']
            ); ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo esc_url(
                    get_template_directory_uri() .
                        '/dist/images/socials/youtube.svg'
                ); ?>" alt="YouTube">
            </a>
        <?php endif; ?>

        <?php if ($linkedin): ?>
            <a href="<?php echo esc_url(
                $linkedin['url']
            ); ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo esc_url(
                    get_template_directory_uri() .
                        '/dist/images/socials/linkedin.svg'
                ); ?>" alt="LinkedIn">
            </a>
        <?php endif; ?>

        <?php if ($instagram): ?>
            <a href="<?php echo esc_url(
                $instagram['url']
            ); ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo esc_url(
                    get_template_directory_uri() .
                        '/dist/images/socials/instagram.svg'
                ); ?>" alt="Instagram">
            </a>
        <?php endif; ?>
    </div>

    <div class="privacy-policy">
        <a href="<?php echo esc_url(
            home_url('/privacy-policy')
        ); ?>">Privacy Policy</a>
    </div>
    <div class="footer-copy">College Ratings    &copy; <?php echo date(
        'Y'
    ); ?></div>
</footer>