<?php
// Get the ACF fields
$banner_image = get_field('banner_image');
$banner_heading = get_field('banner_heading');
$banner_paragraph_1 = get_field('banner_paragraph_1');
$banner_paragraph_2 = get_field('banner_paragraph_2');
$banner_buttons = get_field('banner_buttons');
?>

<div class="banner-block">
    <?php if ($banner_image): ?>
        <img src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr($banner_image['alt']); ?>" />
    <?php endif; ?>

    <?php if ($banner_heading): ?>
        <h1><?php echo esc_html($banner_heading); ?></h1>
    <?php endif; ?>

    <?php if ($banner_paragraph_1): ?>
        <p><?php echo esc_html($banner_paragraph_1); ?></p>
    <?php endif; ?>

    <?php if ($banner_paragraph_2): ?>
        <p><?php echo esc_html($banner_paragraph_2); ?></p>
    <?php endif; ?>

    <?php if ($banner_buttons): ?>
        <div class="banner-buttons">
            <?php foreach ($banner_buttons as $button): ?>
                <a href="#" id="<?php echo esc_attr($button['button_color']); ?>" class="button">
                    <?php echo esc_html($button['button_text']); ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>