<?php
get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php
    // Custom query to get all 'college' posts in alphabetical order
    $args = array(
        'post_type' => 'college',
        'posts_per_page' => -1, // Adjust the number of posts as needed
        'orderby' => 'title',
        'order' => 'ASC',
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>

                <div class="entry-content">
                    <?php
                    // Retrieve ACF fields
                    $state = get_field('state', get_the_ID());
                    $college_link = get_field('college_link', get_the_ID());
                    $type_1 = get_field('type_1', get_the_ID());
                    $type_2 = get_field('type_2', get_the_ID());
                    $religious = get_field('religious', get_the_ID());
                    $accredited = get_field('accredited', get_the_ID());
                    $presence = get_field('presence', get_the_ID());
                    $notes = get_field('notes', get_the_ID());
                    ?>

                    <?php if ($state): ?>
                        <?php $state_term = get_term($state); ?>
                        <?php if (!is_wp_error($state_term)): ?>
                            <p>State: <?php echo esc_html($state_term->name); ?></p>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($college_link): ?>
                        <p>College Link: <a href="<?php echo esc_url($college_link); ?>"><?php echo esc_html($college_link); ?></a></p>
                    <?php endif; ?>

                    <?php if ($type_1): ?>
                        <p>Type 1: <?php echo esc_html($type_1); ?></p>
                    <?php endif; ?>

                    <?php if ($type_2): ?>
                        <p>Type 2: <?php echo esc_html($type_2); ?></p>
                    <?php endif; ?>

                    <?php if ($religious !== null): ?>
                        <p>Religious: <?php echo $religious ? 'Yes' : 'No'; ?></p>
                    <?php endif; ?>

                    <?php if ($accredited !== null): ?>
                        <p>Accredited: <?php echo $accredited ? 'Yes' : 'No'; ?></p>
                    <?php endif; ?>

                    <?php if ($presence): ?>
                        <p>Presence: <?php echo esc_html($presence); ?></p>
                    <?php endif; ?>

                    <?php if ($notes): ?>
                        <p>Notes: <?php echo esc_html($notes); ?></p>
                    <?php endif; ?>
                </div>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        ?>
        <p>No colleges found.</p>
    <?php endif; ?>
</main>

<?php
get_footer();