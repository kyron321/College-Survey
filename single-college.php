<?php get_header(); ?>

<main id="main" class="site-main styled-layout" role="main">
    <?php while (have_posts()):
        the_post(); ?>
        <section class="hero-section" style = "background-image: url('<?php echo esc_url(
            'http://35.176.89.77/wp-content/uploads/2024/12/Untitled-design-3.png'
        ); ?>');">
            <div class="hero-text">
                <h1 class="college-title"><?php the_title(); ?></h1>
                <p class="college-subtitle">
    <?php the_field('type_1'); ?> 
    <?php
    $is_religious = get_field('religious'); // Check if the college is religious
    if ($is_religious):
        echo 'Religious';
    endif;
    ?> 
    College in <?php echo esc_html(get_term(get_field('state'))->name); ?>
</p>

<div class="single-presence">
              
                <p class="<?php echo strtolower(get_field('presence')); ?>">
    <?php echo esc_html(get_field('presence')); ?>
</p>
            </div>
            </div>
        </section>

        <div class="content-grid">
            <!-- Column 1 -->
            <div class="column column-one">
                <h2>About <?php the_title(); ?></h2>
                <p><?php the_title(); ?> is a <?php the_field('type_1'); ?> 
                <?php
                $is_religious = get_field('religious'); // Check if the college is religious
                if ($is_religious):
                    echo 'Religious';
                endif;
                ?> college located in <?php echo esc_html(get_term(get_field('state'))->name); ?>. 
                <?php echo esc_html(get_field('description')); ?>
                <?php
                $website_url = get_field('college_link'); // Assuming 'website' is the field name
                if ($website_url): ?>
                    Visit the college website: <a href="<?php echo esc_url($website_url); ?>" target="_blank">
                        <?php the_title(); ?>
                    </a>
                <?php endif; ?>
                </p>
                <div class="notes">
                    <p>Notes:</p>
                    <ul>
                        <?php
                        $notesArray = explode(';', get_field('notes'));
                        foreach ($notesArray as $note) {
                            $note = trim($note);
                            if (!empty($note)) {
                                $formattedNote = ucfirst(rtrim($note, '.')) . '.';
                                echo '<li>' . htmlspecialchars($formattedNote) . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                <p><strong>Freedom from Gender Ideology:</strong></p>
                <div class="single-presence-two">
                    <p class="<?php echo strtolower(get_field('presence')); ?>">
                        <?php echo esc_html(get_field('presence')); ?>
                    </p>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="column column-two">
                <h2>What parents and students are saying:</h2>
                <div class="comments-container">
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
                </div>
            </div>
        </div>

        <!-- Feedback Form -->
        <div class="feedback-form-container">
            <h2>Leave Feedback for <?php the_title(); ?></h2>
            <p>We’d love to hear about your experiences with <?php the_title(); ?>. Please use this form to share feedback, insights, or interactions you’ve had with this college.</p>
            <div class="feedback-form">
                <?php comment_form(); ?>
            </div>
        </div>
    <?php
    endwhile; ?>
</main>

<?php get_footer(); ?>
