<?php
get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                }
                ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>

            <div class="entry-content">
                <?php
                the_content();

                $state = get_field('state');
                $college_link = get_field('college_link');
                $type_1 = get_field('type_1');
                $type_2 = get_field('type_2');
                $religious = get_field('religious');
                $accredited = get_field('accredited');
                $presence = get_field('presence');
                $notes = get_field('notes');

                if ($state) {
                    echo '<p>State: ' . esc_html(get_term($state)->name) . '</p>';
                }
                if ($college_link) {
                    echo '<p>College Link: <a href="' . esc_url($college_link) . '">' . esc_html($college_link) . '</a></p>';
                }
                if ($type_1) {
                    echo '<p>Type 1: ' . esc_html($type_1) . '</p>';
                }
                if ($type_2) {
                    echo '<p>Type 2: ' . esc_html($type_2) . '</p>';
                }
                if ($religious) {
                    echo '<p>Religious: ' . ($religious ? 'Yes' : 'No') . '</p>';
                }
                if ($accredited) {
                    echo '<p>Accredited: ' . ($accredited ? 'Yes' : 'No') . '</p>';
                }
                if ($presence) {
                    echo '<p>Presence: ' . esc_html($presence) . '</p>';
                }
                if ($notes) {
                    echo '<p>Notes: ' . esc_html($notes) . '</p>';
                }
                ?>
            </div>
        </article>
        <?php
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
    endwhile;
    ?>
</main>

<?php
get_footer();