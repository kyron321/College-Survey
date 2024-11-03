<article id="post-<?php the_ID(); ?>" <?php post_class('college-row'); ?>>
    <div class="college-name column">
        <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    </div>

    <div class="column type-one">
        <?php if ($type_1): ?>
            <p><?php echo esc_html($type_1); ?></p>
        <?php else: ?>
            <p>N/A</p>
        <?php endif; ?>
    </div>

    <div class="column type-two">
        <?php if ($type_2): ?>
            <p><?php echo esc_html($type_2); ?></p>
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

    <div class="column accredited">
        <?php if ($accredited !== null): ?>
            <p><?php echo $accredited ? 'Yes' : 'No'; ?></p>
        <?php else: ?>
            <p>N/A</p>
        <?php endif; ?>
    </div>

    <div class="column presence">
        <?php if ($presence): ?>
            <p><?php echo esc_html($presence); ?></p>
        <?php else: ?>
            <p>N/A</p>
        <?php endif; ?>
    </div>
</article>