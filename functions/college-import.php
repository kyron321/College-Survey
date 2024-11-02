<?php
if (defined('WP_CLI') && WP_CLI) {
    WP_CLI::add_command('import_csv', function () {
        // Clear existing 'college' posts
        $existing_posts = get_posts([
            'post_type' => 'college',
            'numberposts' => -1,
            'post_status' => 'any',
        ]);

        foreach ($existing_posts as $post) {
            wp_delete_post($post->ID, true);
        }

        WP_CLI::success("All existing 'college' posts have been deleted.");

        // Dynamically get the file path using get_stylesheet_directory()
        $file = get_stylesheet_directory() . '/data/all_states_college_survey_full.csv';

        if (!file_exists($file) || !is_readable($file)) {
            WP_CLI::error("File not found or not readable.");
        }

        $handle = fopen($file, 'r');
        if ($handle === false) {
            WP_CLI::error("Unable to open file.");
        }

        // Get headers
        $headers = fgetcsv($handle);

        while (($data = fgetcsv($handle)) !== false) {
            $row = array_combine($headers, $data);

            // Create a new post for each row
            $post_id = wp_insert_post([
                'post_type' => 'college',
                'post_title' => $row['College Name'],  // Replace with your CSV column
                'post_status' => 'publish'
            ]);

            if (is_wp_error($post_id)) {
                WP_CLI::warning("Failed to insert post for {$row['College Name']}");
                continue;
            }

            // Format the state name to match the taxonomy term
            $state_name = ucwords(strtolower($row['State']));
            $state_term = get_term_by('name', $state_name, 'state'); // Replace 'state' with the correct taxonomy name

            if ($state_term) {
                // Update the ACF field with the term ID
                update_field('state', $state_term->term_id, $post_id);
                
                // Set the taxonomy term on the post
                wp_set_post_terms($post_id, [$state_term->term_id], 'state');
            } else {
                WP_CLI::warning("State '{$state_name}' not found in taxonomy.");
            }

            // Update other ACF fields
            update_field('type_1', $row['Type I'], $post_id);
            update_field('type_2', $row['Type II'], $post_id);
            update_field('religious', $row['Religious'], $post_id);
            update_field('accredited', $row['Accredited'], $post_id);
            update_field('presence', $row['Presence'], $post_id);
            update_field('notes', $row['Notes'], $post_id);

            WP_CLI::success("Imported {$row['College Name']} successfully.");
        }

        fclose($handle);
    });
}
