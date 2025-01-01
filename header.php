<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <meta property="og:image" content="https://college.genspect.org/wp-content/uploads/2025/01/open-graph-card-1.png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php wp_title(''); ?>" />
    <meta name="twitter:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta name="twitter:image" content="https://college.genspect.org/wp-content/uploads/2025/01/open-graph-card-1.png" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body <?php body_class(); ?>>

    <?php get_template_part('template-parts/header/template', 'header'); ?>