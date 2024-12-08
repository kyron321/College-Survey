<form id="filter-form" method="GET" action="">
    <!-- State Filter -->
    <div class="filter-group">
        <input type="checkbox" id="mobile-toggle-state" class="accordion-toggle">
        <label for="mobile-toggle-state" class="accordion-label">
            State <i class="fa fa-chevron-down"></i>
        </label>
        <div class="accordion-content">
            <?php $states = get_terms([
                'taxonomy' => 'state',
                'hide_empty' => false,
            ]); ?>
            <?php if (!empty($states) && !is_wp_error($states)): ?>
            <?php foreach ($states as $state): ?>
            <div class="checkbox">
                <label for="state_<?php echo esc_attr($state->slug); ?>">
                    <input type="checkbox" name="state[]" class="filter-input"
                        id="state_<?php echo esc_attr($state->slug); ?>" value="<?php echo esc_attr($state->slug); ?>">
                    <?php echo esc_html($state->name); ?>
                </label>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Type 1 Filter -->
    <div class="filter-group">
        <input type="checkbox" id="mobile-toggle-type_1" class="accordion-toggle">
        <label for="mobile-toggle-type_1" class="accordion-label">
            Type <i class="fa fa-chevron-down"></i>
        </label>
        <div class="accordion-content">
            <?php $type_1_choices = [
                'public' => 'Public',
                'private' => 'Private',
            ]; ?>
            <?php foreach ($type_1_choices as $value => $label): ?>
            <div class="checkbox">
                <label for="type_1_<?php echo esc_attr($value); ?>">
                    <input type="checkbox" name="type_1[]" class="filter-input"
                        id="type_1_<?php echo esc_attr($value); ?>" value="<?php echo esc_attr($value); ?>">
                    <?php echo esc_html($label); ?>
                </label>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Religious Filter -->
    <div class="filter-group">
        <input type="checkbox" id="mobile-toggle-religious" class="accordion-toggle">
        <label for="mobile-toggle-religious" class="accordion-label">Religious <i
                class="fa fa-chevron-down"></i></label>
        <div class="accordion-content">
            <div class="checkbox">
                <label for="religious_yes">
                    <input type="checkbox" name="religious" class="filter-input" id="religious_yes" value="1">
                    Yes
                </label>
            </div>
            <div class="checkbox">
                <label for="religious_no">
                    <input type="checkbox" name="religious" class="filter-input" id="religious_no" value="0">
                    No
                </label>
            </div>
        </div>
    </div>

    <!-- Presence Filter -->
    <div class="filter-group">
        <input type="checkbox" id="mobile-toggle-presence" class="accordion-toggle">
        <label for="mobile-toggle-presence" class="accordion-label">
            Presence <i class="fa fa-chevron-down"></i>
        </label>
        <div class="accordion-content">
            <?php $presence_choices = [
                'poor' => 'Poor',
                'moderate' => 'Moderate',
                'excellent' => 'Excellent',
            ]; ?>
            <?php foreach ($presence_choices as $value => $label): ?>
            <div class="checkbox">
                <label for="mobile-presence_<?php echo esc_attr($value); ?>">
                    <input type="checkbox" name="presence[]" class="filter-input"
                        id="presence_<?php echo esc_attr($value); ?>" value="<?php echo esc_attr($value); ?>">
                    <?php echo esc_html($label); ?>
                </label>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <button id="clear-filters" type="submit" class="button">Clear all filters</button>
</form>