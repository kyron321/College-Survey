<?php
// Get the ACF fields
$heading = get_field('heading');
$paragraph = get_field('paragraph');
$image = get_field('image');
$flip_block = get_field('flip_block');
$image_to_text_ratio = get_field('image_to_text_ratio');
$background_colour = get_field('background_colour');
?>

<section class="two-column-block bg-<?php echo esc_attr($background_colour); ?>">
    <div class="two-column-block-container <?php echo $flip_block ? 'flip' : ''; ?> ratio-<?php echo esc_attr($image_to_text_ratio); ?>">
        <div class="column column-text">
            <?php if ($heading): ?>
                <h2><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>
            <?php if ($paragraph): ?>
                <p><?php echo $paragraph; ?></p>
            <?php endif; ?>
        </div>
        <div class="column column-image">
            <?php if ($image): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </div>
    </div>
</section>