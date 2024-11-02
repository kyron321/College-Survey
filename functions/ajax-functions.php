<?php
function enqueue_ajax_filter_scripts() {
    wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/dist/js/main.js', array('jquery'), null, true);
    wp_localize_script('ajax-filter', 'ajaxfilter', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_filter_scripts');

function ajax_filter_colleges() {
    $state_filter = isset($_POST['state']) ? $_POST['state'] : array();
    $type_1_filter = isset($_POST['type_1']) ? $_POST['type_1'] : array();
    $type_2_filter = isset($_POST['type_2']) ? $_POST['type_2'] : array();
    $religious_filter = isset($_POST['religious']) ? $_POST['religious'] : null;
    $accredited_filter = isset($_POST['accredited']) ? $_POST['accredited'] : array();
    $presence_filter = isset($_POST['presence']) ? $_POST['presence'] : array();
    $sort_order = isset($_POST['sort_order']) ? $_POST['sort_order'] : 'a-z';

    $args = array(
        'post_type' => 'college',
        'posts_per_page' => -1,
        'meta_query' => array(
            'relation' => 'AND',
        ),
        'tax_query' => array(
            'relation' => 'AND',
        ),
    );

    if (!empty($state_filter)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'state',
            'field' => 'slug',
            'terms' => $state_filter,
        );
    }

    if (!empty($type_1_filter)) {
        $args['meta_query'][] = array(
            'key' => 'type_1',
            'value' => $type_1_filter,
            'compare' => 'IN',
        );
    }

    if (!empty($type_2_filter)) {
        $args['meta_query'][] = array(
            'key' => 'type_2',
            'value' => $type_2_filter,
            'compare' => 'IN',
        );
    }

    if ($religious_filter !== null) {
        $args['meta_query'][] = array(
            'key' => 'religious',
            'value' => $religious_filter,
            'compare' => '=',
        );
    }

    if (!empty($accredited_filter)) {
        $args['meta_query'][] = array(
            'key' => 'accredited',
            'value' => $accredited_filter,
            'compare' => 'IN',
        );
    }

    if (!empty($presence_filter)) {
        $args['meta_query'][] = array(
            'key' => 'presence',
            'value' => $presence_filter,
            'compare' => 'IN',
        );
    }

    // Add sorting parameters
    if ($sort_order === 'a-z') {
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
    } elseif ($sort_order === 'z-a') {
        $args['orderby'] = 'title';
        $args['order'] = 'DESC';
    }

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
    <?php endif;

    wp_die();
}
add_action('wp_ajax_filter_colleges', 'ajax_filter_colleges');
add_action('wp_ajax_nopriv_filter_colleges', 'ajax_filter_colleges');