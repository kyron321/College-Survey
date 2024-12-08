<?php
// Define theme version
define('THEME_VERSION', '1.0.0');

// Enqueue assets
function theme_enqueue_assets() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/dist/css/style.css', [], THEME_VERSION);
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/dist/js/main.js', [], THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');

function enqueue_custom_admin_styles() {
    wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/dist/css/admin.css', [], THEME_VERSION);
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_styles');

function custom_login_logo()
{
    // Get the site logo URL from ACF options
    $site_logo = get_field('site_logo', 'option'); // Adjust the field name and options page as needed

    if ($site_logo) {
        $logo_url = esc_url($site_logo['url']); ?>
        <style type="text/css">
            body.login h1 a {
                background-image: url('<?php echo $logo_url; ?>');
                background-size: 100%;
                height: 84px;
                width: 100%;
            }
        </style>
        <?php
    }
}
add_action('login_enqueue_scripts', 'custom_login_logo');
