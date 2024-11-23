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
                'post_title' => $row['NAME'],  // Use the 'NAME' column for the post title
                'post_status' => 'publish'
            ]);

            if (is_wp_error($post_id)) {
                WP_CLI::warning("Failed to insert post for {$row['NAME']}");
                continue;
            }

            // Format the state name: capitalize the first letter and lowercase the rest
            $state_name = ucfirst(strtolower($row['STATE']));
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
update_field('type_1', $row['TYPE'], $post_id); // Update 'TYPE'
$religious_value = strtolower($row['RELIGIOUS']) === 'yes' ? true : false;
update_field('religious', $religious_value, $post_id); // Update 'RELIGIOUS'

// Map CSV values to ACF select field options for 'presence'
$presence_mapping = [
    'Poor' => 'Poor',
    'Moderate' => 'Moderate',
    'Excellent' => 'Excellent'
];

$presence_value = $row['FREEDOM FROM TRANS IDEOLOGY'];
$presence_acf_value = isset($presence_mapping[$presence_value]) ? $presence_mapping[$presence_value] : 'N/A';
update_field('presence', $presence_acf_value, $post_id); // Update 'IDEOLOGY PRESENCE'

update_field('notes', $row['NOTES'], $post_id); // Update 'NOTES'
update_field('college_link', $row['WEBSITE'], $post_id); // Update 'WEBSITE'

WP_CLI::success("Imported {$row['NAME']} successfully.");
        }

        fclose($handle);
    });
}

