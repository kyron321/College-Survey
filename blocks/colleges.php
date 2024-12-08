<?php

$hide_filters = get_field('hide_filters');
$hide_search = get_field('hide_search');
$hide_sort_by = get_field('hide_sort_by');
?>

<section class="colleges">
    <div class="column-one">
        <h3>Filters<h3>
                <?php if (!$hide_search): ?>
                    <?php get_template_part('template-parts/blocks/colleges/search'); ?>
                <?php endif; ?>

                <?php if (!$hide_filters): ?>
                    <?php get_template_part('template-parts/blocks/colleges/filters'); ?>
                <?php endif; ?>
    </div>

    <div class="modal" id="filtersModal">
        <button class="close-modal" id="closeModalBtn">
            <i class="fas fa-times"></i>
        </button>
        <h3>Filters</h3>
        <?php if (!$hide_filters): ?>
            <?php get_template_part('template-parts/blocks/colleges/filters-mobile'); ?>
        <?php endif; ?>
    </div>
    <div class="modal-overlay" id="modalOverlay"></div>
    <button id="openModalBtn">
        <i class="fas fa-filter"></i> Open Filters
    </button>

    <div class="column-two">
        <?php if (!$hide_sort_by): ?>
            <?php get_template_part(
                'template-parts/blocks/colleges/sort-by'
            ); ?>
        <?php endif; ?>
        <div class="search-section">
            <?php if (!$hide_search): ?>
                <?php get_template_part('template-parts/blocks/colleges/search'); ?>
            <?php endif; ?>
        </div>
        <div class="college-info-container">
            <p class="college-name">College</p>
            <p class="type-one">Type</p>
            <p class="religious">Religious</p>
            <p class="state">State</p>
            <p class="presence">
                Freedom
                <i class="fa fa-info-circle tooltip-icon" aria-hidden="true"></i>
                <span class="tooltip-text">A rating for each college, ranging from Excellent to Moderate to Poor, based
                    on how free it is from trans ideology.</span>
            </p>
            <p class="more-info"></p>
        </div>

        <?php get_template_part(
            'template-parts/blocks/colleges/colleges-list'
        ); ?>
    </div>
</section>