<?php

/**
 * The main page template.
 */

get_header(); ?>

<main>
    <section>
        <h1><?php echo get_bloginfo('name'); ?></h1>
        <p><?php echo get_bloginfo('description'); ?></p>
    </section>
    <section>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php echo 'No posts found'; ?></p>
        <?php endif; ?>
    </section>

<?php get_footer(); ?>