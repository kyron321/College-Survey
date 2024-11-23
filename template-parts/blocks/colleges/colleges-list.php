<?php
/*
Template Name: College List
*/

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
            // Retrieve ACF fields
            $state = get_field('state', get_the_ID());
            $college_link = get_field('college_link', get_the_ID());
            $type_1 = get_field('type_1', get_the_ID());
            $religious = get_field('religious', get_the_ID());
            $presence = get_field('presence', get_the_ID());
            $notes = get_field('notes', get_the_ID());

            include get_stylesheet_directory() . '/template-parts/blocks/colleges/college-list-item.php';
        endwhile;
        wp_reset_postdata();
    else :
    ?>
        <p>No colleges found.</p>
    <?php endif; ?>
</main>
