<?php
$taxonomies = get_taxonomies(array('public' => true), 'objects');
?>

<?php if (!empty($taxonomies)): ?>
    <div class="filters">
        <form>
            <?php foreach ($taxonomies as $taxonomy): ?>
                <?php if ($taxonomy->name === 'state'): ?>
                    <?php
                    $terms = get_terms(array(
                        'taxonomy' => $taxonomy->name,
                        'hide_empty' => false,
                    ));
                    ?>
                    <?php if (!empty($terms) && !is_wp_error($terms)): ?>
                        <div class="filter-group">
                            <input type="checkbox" id="toggle-<?php echo esc_attr($taxonomy->name); ?>" class="accordion-toggle">
                            <label for="toggle-<?php echo esc_attr($taxonomy->name); ?>" class="accordion-label">
                                <?php echo esc_html($taxonomy->label); ?>
                            </label>
                            <div class="accordion-content">
                                <?php foreach ($terms as $term): ?>
                                    <div class="checkbox">
                                        <label for="<?php echo esc_attr($taxonomy->name . '_' . $term->slug); ?>">
                                            <input type="checkbox" name="<?php echo esc_attr($taxonomy->name); ?>[]" id="<?php echo esc_attr($taxonomy->name . '_' . $term->slug); ?>" value="<?php echo esc_attr($term->slug); ?>">
                                            <?php echo esc_html($term->name); ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </form>
    </div>
<?php endif; ?>