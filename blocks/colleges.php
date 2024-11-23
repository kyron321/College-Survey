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
            <p class="presence">
                Freedom
                <i class="fa fa-info-circle tooltip-icon" aria-hidden="true"></i>
                <span class="tooltip-text">A rating for each college, ranging from Excellent to Moderate and Poor, based on how free students are from gender ideology.</span>
            </p>
            <p class="more-info"></p>
        </div>
    
        <?php get_template_part(
            'template-parts/blocks/colleges/colleges-list'
        ); ?>
    </div>
    </section>

<style>
.tooltip-text {
    visibility: hidden;
    width: 250px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    padding: 10px;
    position: absolute;
    z-index: 1;
    bottom: 125%; /* Position above the icon */
    left: 50%;
    transform: translateX(-50%);
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    font-size: 12px;
    line-height: 1.5;
    white-space: normal;
}

.tooltip-icon {
    margin-left: 5px;
    cursor: pointer;
    color: #888;
    font-size: 14px;
    position: relative;
}

.presence {
    position: relative; 
    cursor: pointer;
    padding: 0 10px;
}

.presence:hover .tooltip-text {
    visibility: visible;
    opacity: 1;
}
</style>