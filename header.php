<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
    <?php wp_head(); ?>
    <?php echo '<!-- Header loaded -->'; ?>
</head>

<body <?php body_class(); ?>>

<?php get_template_part('template-parts/header/template', 'header'); ?>