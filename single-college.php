<?php get_header(); ?>

<?php
$background_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
if (!$background_url) {
    $background_url = '/wp-content/uploads/2024/12/Untitled-design-3.png';
}
?>

<main id="main" class="site-main styled-layout" role="main">
    <?php while (have_posts()): the_post(); ?>
    <section class="hero-section" style="background-image: url('<?php echo esc_url($background_url); ?>');">


        <div class="hero-text">
            <h1 class="college-title"><?php the_title(); ?></h1>
<p class="college-subtitle">
    <?php 
    $type_1 = get_field('type_1');
    echo ucfirst($type_1); 
    ?>

    <?php
    $is_religious = get_field('religious'); 
    if ($is_religious):
        echo ucfirst('Religious'); 
    endif;
    ?>

    College in <?php 
    $state = esc_html(get_term(get_field('state'))->name);
    echo ucfirst($state); 
    ?>
</p>
            <div class="single-presence">
                <p class="<?php echo strtolower(get_field('presence')); ?>">
                <?php echo ucfirst(esc_html(get_field('presence'))); ?> 
                </p>
            </div>
        </div>
    </section>
<section>
<div class="social-sharing">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.instagram.com/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-icon"><i class="fab fa-pinterest"></i></a>
                <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.reddit.com/submit?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-icon"><i class="fab fa-reddit-alien"></i></a>
                <a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-icon"><i class="fab fa-tumblr"></i></a>
                <a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site <?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-icon"><i class="fas fa-envelope"></i></a>
            </div>
</section>
    <div class="content-grid">
        <!-- Column 1 -->
        <div class="column column-one">
            <h2>About <?php the_title(); ?></h2>
            <p>            <?php echo strtolower(get_the_title()); ?> is a <?php echo strtolower(get_field('type_1')); ?>
                <?php
                    $is_religious = get_field('religious'); // Check if the college is religious
                    if ($is_religious):
                        echo 'religious';
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
            <p><strong>Freedom from Trans Ideology:</strong></p>
            <div class="single-presence-two">
                <p class="<?php echo strtolower(get_field('presence')); ?>">
                <?php echo ucfirst(esc_html(get_field('presence'))); ?> 
                </p>
            </div>
        </div>

        <!-- Column 2 -->
        <div class="column column-two">
        <h2>What parents, students, and staff are saying:</h2>
            <div class="comments-container">
                <?php
                    $comments = get_comments([
                        'post_id' => get_the_ID(),
                        'status' => 'approve',
                    ]);
                    if ($comments) {
                        echo '<div class="comment-list">';
                        wp_list_comments([
                            'style' => 'div',
                            'short_ping' => true,
                            'avatar_size' => 50,
                        ], $comments);
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
        <p>We’d love to hear about your experiences with <?php the_title(); ?>. Please use this form to share feedback,
            insights, or interactions you’ve had with this college.</p>
        <div class="feedback-form">
            <?php comment_form(); ?>
        </div>
    </div>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>