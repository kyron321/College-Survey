<?php
// Get the ACF fields
$paragraph = get_field('paragraph');
$image = get_field('image');
$flip_block = get_field('flip_block');
$image_to_text_ratio = get_field('image_to_text_ratio');
$background_colour = get_field('background_colour');
?>

<!-- <div class="two-column-block<?php echo $flip_block ? ' flip' : ''; ?> ratio-<?php echo esc_attr($image_to_text_ratio); ?> bg-<?php echo esc_attr($background_colour); ?>">
    <div class="column column-text">
        <?php if ($paragraph): ?>
            <p><?php echo esc_html($paragraph); ?></p>
        <?php endif; ?>
    </div>
    <div class="column column-image">
        <?php if ($image): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    </div>
</div> -->