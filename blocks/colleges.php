<?php

$hide_filters = get_field('hide_filters');
$hide_search = get_field('hide_search');
$hide_sort_by = get_field('hide_sort_by');
?>

<section class="colleges">
    <div class="column-one">
        <h3>Filters<h3>
                <?php if (!$hide_search): ?>
                    <?php get_template_part(
                        'template-parts/blocks/colleges/search'
                    ); ?>
                <?php endif; ?>

                <?php if (!$hide_filters): ?>
                    <?php get_template_part(
                        'template-parts/blocks/colleges/filters'
                    ); ?>
                <?php endif; ?>
    </div>

    <div class="column-two">
        <?php if (!$hide_sort_by): ?>
            <?php get_template_part(
                'template-parts/blocks/colleges/sort-by'
            ); ?>
        <?php endif; ?>
        <div class="college-info-container">
            <p class="college-name">College</p>
            <p class="type-one">Type</p>
            <p class="religious">Religious</p>
            <p class="state">State</p>
            <p class="presence">Freedom</p>
            <p class="more-info"></p>
        </div>

        <?php get_template_part(
            'template-parts/blocks/colleges/colleges-list'
        ); ?>
    </div>
</section>