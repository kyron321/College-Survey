<?php
// Get the ACF fields
$site_logo = get_field('site_logo', 'option');
$company_email = get_field('company_email', 'option');
$company_number = get_field('company_number', 'option');
$top_nav_links = get_field('top_nav_links', 'option');
?>

<header class="header">
    <?php if ($top_nav_links): ?>
        <nav class="nav top-navigation">
            <ul class="nav-list">
                <?php foreach ($top_nav_links as $link): ?>
                    <li class="nav-item">
                        <?php if ($link['icon']): ?>
                            <img class="nav-icon" src="<?php echo esc_url($link['icon']['url']); ?>" alt="<?php echo esc_attr($link['icon']['alt']); ?>" />
                        <?php endif; ?>
                        <a class="nav-link" href="<?php echo esc_url($link['link']['url']); ?>">
                            <?php echo esc_html($link['link']['title']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    <?php endif; ?>

    <div class="logo-nav-wrapper">
        <?php if ($site_logo): ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo-link">
                <img src="<?php echo esc_url($site_logo['url']); ?>" alt="<?php echo esc_attr($site_logo['alt']); ?>" class="site-logo-img" />
            </a>
        <?php endif; ?>

        <nav class="footer-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'menu_id'        => 'main-menu',
                'container'      => false,
            ));
            ?>
        </nav>
    </div>

</header>