<?php
get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php while (have_posts()):
        the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail('full');
            } ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>

            <div class="entry-content">
                <?php
                the_content();

                $state = get_field('state');
                $college_link = get_field('college_link');
                $type_1 = get_field('type_1');
                $religious = get_field('religious');
                $presence = get_field('presence');
                $notes = get_field('notes');
                ?>

                <?php if ($state): ?>
                    <p>State: <?php echo esc_html(
                        get_term($state)->name
                    ); ?></p>
                <?php endif; ?>

                <?php if ($college_link): ?>
                    <p>College Link: <a href="<?php echo esc_url(
                        $college_link
                    ); ?>"><?php echo esc_html($college_link); ?></a></p>
                <?php endif; ?>

                <?php if ($type_1): ?>
                    <p>Type: <?php echo esc_html($type_1); ?></p>
                <?php endif; ?>

                <?php if ($religious): ?>
                    <p>Religious: <?php echo $religious ? 'Yes' : 'No'; ?></p>
                <?php endif; ?>

                <?php if ($presence): ?>
                <p>Freedom: <?php echo esc_html($presence); ?></p>
                <?php else: ?>
                    <p>Freedom: N/A</p>
                <?php endif; ?>

                <?php if ($notes): ?>
                    <p>Notes: <?php echo esc_html($notes); ?></p>
                <?php endif; ?>
            </div>
        </article>
        <div  id="all-comments" class="comments-container" >
                <p>What people are saying:</p>
                <?php
                $comments = get_comments([
                    'post_id' => get_the_ID(),
                    'status' => 'approve',
                ]);

                if ($comments) {
                    echo '<div class="comment-list">';
                    wp_list_comments(
                        [
                            'style' => 'div',
                            'short_ping' => true,
                            'avatar_size' => 50,
                        ],
                        $comments
                    );
                    echo '</div>';
                } else {
                    echo '<p>No comments yet.</p>';
                }
                ?>
                <div id="comments-form" class="comment-form">
                <p>We’d love to hear about your experiences with <?php echo get_the_title(); ?> - <?php echo esc_html(
     get_term(get_field('state'))->name
 ); ?>. Please use this form to share any feedback, insights, or interactions you’ve had with this college.</p>

                <?php comment_form(); ?>
        </div>
            </div>
            <?php
    endwhile; ?>

    
</main>

<?php get_footer();
