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
        <div class="hero-section" style="background-image: url('<?php echo esc_url(
            $banner_image['url']
        ); ?>');">
            <div class="text-container">
                <?php if ($banner_heading): ?>
                    <h1><?php echo esc_html($banner_heading); ?></h1>
                <?php endif; ?>

                <?php if ($banner_paragraph_1): ?>
                    <p class="banner-paragraph"><?php echo esc_html(
                        $banner_paragraph_1
                    ); ?></p>
                <?php endif; ?>

                <?php if ($banner_paragraph_2): ?>
                    <p class="banner-paragraph-2"><?php echo esc_html(
                        $banner_paragraph_2
                    ); ?></p>
                <?php endif; ?>

                <?php if ($banner_buttons): ?>
                    <div class="banner-buttons">
                        <?php foreach ($banner_buttons as $button): ?>
                            <div id="<?php echo esc_attr(
                                $button['button_color']
                            ); ?>" class="button">
                                <?php echo esc_html($button['button_text']); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>