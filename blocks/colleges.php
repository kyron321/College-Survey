<?php
// Get the ACF fields
$hide_filters = get_field('hide_filters');
$hide_search = get_field('hide_search');
$hide_sort_by = get_field('hide_sort_by');
?>

<section class="colleges">
    <div>
    <?php if (!$hide_search): ?>
        <?php get_template_part('template-parts/blocks/colleges/search'); ?>
    <?php endif; ?>

    <?php if (!$hide_filters): ?>
        <?php get_template_part('template-parts/blocks/colleges/filters'); ?>
    <?php endif; ?>

    <?php if (!$hide_sort_by): ?>
        <?php get_template_part('template-parts/blocks/colleges/sort-by'); ?>
    <?php endif; ?>
    </div>
    <div>
        <?php get_template_part('template-parts/blocks/colleges/colleges-list'); ?>
    </div>
</section>