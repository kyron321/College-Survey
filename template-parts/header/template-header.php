<?php
// Get the ACF fields
$site_logo = get_field('site_logo', 'option');
$company_email = get_field('company_email', 'option');
$company_number = get_field('company_number', 'option');
$top_nav_links = get_field('top_nav_links', 'option');
?>

<header>
<?php if ($site_logo): ?>
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url($site_logo['url']); ?>" alt="<?php echo esc_attr($site_logo['alt']); ?>" />
    </a>
<?php endif; ?>

    <?php if ($company_email): ?>
        <p>Email: <?php echo esc_html($company_email); ?></p>
    <?php endif; ?>

    <?php if ($company_number): ?>
        <p>Phone: <?php echo esc_html($company_number); ?></p>
    <?php endif; ?>

    <?php if ($top_nav_links): ?>
        <nav>
            <ul>
                <?php foreach ($top_nav_links as $link): ?>
                    <li>
                        <?php if ($link['icon']): ?>
                            <img src="<?php echo esc_url($link['icon']['url']); ?>" alt="<?php echo esc_attr($link['icon']['alt']); ?>" />
                        <?php endif; ?>
                        <a href="<?php echo esc_url($link['link']['url']); ?>">
                            <?php echo esc_html($link['link']['title']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    <?php endif; ?>
</header>