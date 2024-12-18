<article id="post-<?php the_ID(); ?>" <?php post_class('college-row'); ?>>
    <div class="container-one" onclick="toggleDropdown(<?php the_ID(); ?>); event.stopPropagation();"
        style="cursor: pointer;">
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
            <p><?php echo ucfirst(strtolower(esc_html($type_1))); ?></p>
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
            <p><?php echo ucfirst(strtolower(esc_html($presence))); ?></p>
            <?php else: ?>
            <p>N/A</p>
            <?php endif; ?>
        </div>

        <div class="column more-info">
            <div>
                <i id="chevron-<?php the_ID(); ?>" class="fa fa-chevron-down"></i>
            </div>
        </div>
    </div>
    <div class="dropdown-container">
        <div id="dropdown-<?php the_ID(); ?>" class="dropdown-content" style="display: none;">
            <div class="freedom">
                <p>Freedom from Trans Activism:</p>
                <p class="<?php echo strtolower($presence); ?>">
                    <?php echo ucfirst(strtolower(esc_html($presence))); ?>
                </p>
            </div>
            <div class="notes">
                <p>Notes:</p>
                <ul>
                    <?php
                    $notesArray = explode(';', $notes);
                    foreach ($notesArray as $note) {
                        $note = trim($note);
                        if (!empty($note)) {
                            $formattedNote = ucfirst(rtrim($note, '.')) . '.';
                            echo '<li>' .
                                htmlspecialchars($formattedNote) .
                                '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="comments-container">
                <p>What people are saying:</p>
                <?php
                $comments = get_comments([
                    'post_id' => get_the_ID(),
                    'status' => 'approve',
                    'number' => 2,
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
                $comments_count = get_comments_number();
                if ($comments_count > 2) {
                    $comments_link = get_permalink() . '#all-comments';

                    echo '<a href="' .
                        esc_url($comments_link) .
                        '" class="feedback-button">View all feedback</a>';
                }
                ?>
            </div>

            <div class="navigate-container">
                <p class="feedback-text">
                    If you have noticed any misrepresentations or missing information for this college, or if you have
                    links or resources you'd like us to review, please share the details
                    <a
                        href="http://college-survey.local/feedback-form/?article_name=<?php echo urlencode(get_the_title()); ?>&state=<?php echo urlencode(get_term($state)->name); ?>">
                        here
                    </a>.
                </p>
                <div class="navigate-button">
                    <a href="<?php echo esc_url(get_permalink() . '#comments-form'); ?>" class="button">
                        College Details
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>