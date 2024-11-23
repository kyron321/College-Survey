<form id="filter-form" method="GET" action="">
    <!-- State Filter -->
    <div class="filter-group">
        <input type="checkbox" id="toggle-state" class="accordion-toggle">
        <label for="toggle-state" class="accordion-label">State</label>
        <div class="accordion-content">
            <?php
            $states = get_terms(array('taxonomy' => 'state', 'hide_empty' => false));
            ?>
            <?php if (!empty($states) && !is_wp_error($states)): ?>
                <?php foreach ($states as $state): ?>
                    <div class="checkbox">
                        <label for="state_<?php echo esc_attr($state->slug); ?>">
                            <input type="checkbox" name="state[]" class="filter-input" id="state_<?php echo esc_attr($state->slug); ?>" value="<?php echo esc_attr($state->slug); ?>">
                            <?php echo esc_html($state->name); ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Type 1 Filter -->
    <div class="filter-group">
        <input type="checkbox" id="toggle-type_1" class="accordion-toggle">
        <label for="toggle-type_1" class="accordion-label">Type</label>
        <div class="accordion-content">
            <?php $type_1_choices = array('public' => 'Public', 'private' => 'Private'); ?>
            <?php foreach ($type_1_choices as $value => $label): ?>
                <div class="checkbox">
                    <label for="type_1_<?php echo esc_attr($value); ?>">
                        <input type="checkbox" name="type_1[]" class="filter-input" id="type_1_<?php echo esc_attr($value); ?>" value="<?php echo esc_attr($value); ?>">
                        <?php echo esc_html($label); ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Religious Filter -->
    <div class="filter-group">
        <input type="checkbox" id="toggle-religious" class="accordion-toggle">
        <label for="toggle-religious" class="accordion-label">Religious</label>
        <div class="accordion-content">
            <div class="checkbox">
                <label for="religious_yes">
                    <input type="checkbox" name="religious" class="filter-input" id="religious_yes" value="yes">
                    Yes
                </label>
            </div>
            <div class="checkbox">
                <label for="religious_no">
                    <input type="checkbox" name="religious" class="filter-input" id="religious_no" value="no">
                    No
                </label>
            </div>
        </div>
    </div>

    <!-- Presence Filter -->
    <div class="filter-group">
        <input type="checkbox" id="toggle-presence" class="accordion-toggle">
        <label for="toggle-presence" class="accordion-label">Presence</label>
        <div class="accordion-content">
            <?php $presence_choices = array('none' => 'None', 'moderate' => 'Moderate', 'strong' => 'Strong'); ?>
            <?php foreach ($presence_choices as $value => $label): ?>
                <div class="checkbox">
                    <label for="presence_<?php echo esc_attr($value); ?>">
                        <input type="checkbox" name="presence[]" class="filter-input" id="presence_<?php echo esc_attr($value); ?>" value="<?php echo esc_attr($value); ?>">
                        <?php echo esc_html($label); ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</form>