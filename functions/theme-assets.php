<?php
// Define theme version
define('THEME_VERSION', '1.0.4');

// Enqueue scripts and main styles
function theme_enqueue_assets()
{
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/dist/css/style.css', [], THEME_VERSION);
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/dist/js/main.js', [], THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');

// Enqueue custom admin styles
function enqueue_custom_admin_styles()
{
    wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/dist/css/admin.css', [], THEME_VERSION);
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_styles');

// Add custom fonts
function custom_enqueue_fonts()
{
    wp_enqueue_style(
        'custom-google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap',
        false
    );
}
add_action('wp_enqueue_scripts', 'custom_enqueue_fonts');

// Add custom login logo
function custom_login_logo()
{
    $site_logo = get_field('site_logo', 'option');

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