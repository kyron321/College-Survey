<article id="post-<?php the_ID(); ?>" <?php post_class('college-row'); ?>>
    <div class="container-one">
    <div class="college-name column">
                         <h4 class="entry-title">
                <a href="<?php echo esc_url(
                    $college_link ? $college_link : get_permalink()
                ); ?>" target="_blank">
                    <?php the_title(); ?>
                </a>
            </h4>
    </div>

    <div class="column type-one">
        <?php if ($type_1): ?>
            <p><?php echo esc_html($type_1); ?></p>
        <?php else: ?>
            <p>N/A</p>
        <?php endif; ?>
    </div>

    <div class="column religious">
        <?php if ($religious !== null): ?>
            <p><?php echo $religious ? 'Yes' : 'No'; ?></p>
        <?php else: ?>
            <p>N/A</p>
        <?php endif; ?>
    </div>

    <div class="column state">
        <?php
        $state = get_field('state', get_the_ID());
        if ($state) {
            echo '<p>' . esc_html(get_term($state)->name) . '</p>';
        } else {
            echo '<p>N/A</p>';
        }
        ?>
    </div>

    <div class="column presence">
        <?php if ($presence): ?>
            <p><?php echo esc_html($presence); ?></p>
        <?php else: ?>
            <p>N/A</p>
        <?php endif; ?>
</div>
<div class="column more-info">
        <div onclick="toggleDropdown(<?php the_ID(); ?>)" style="cursor: pointer;">
            <i id="chevron-<?php the_ID(); ?>" class="fa fa-chevron-down"></i> <!-- Chevron starts as down -->
        </div>
    </div>
</div>
<div class="dropdown-container">
    <div id="dropdown-<?php the_ID(); ?>" class="dropdown-content" style="display: none;">
    <p>Additional information about the college goes here.</p>
    </div>
</div>

</article>