<?php
// Get the ACF fields
$heading = get_field('heading');
$text = get_field('text');
$background_color = get_field('background_color');
?>

<section class="one-column-text bg-<?php echo esc_attr($background_color); ?>">
    <div class="container">
        <div class="column-text">
            <?php if ($heading): ?>
            <h2><?php echo $heading; ?></h2>
            <?php endif; ?>
            <?php if ($text): ?>
            <p><?php echo $text; ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>