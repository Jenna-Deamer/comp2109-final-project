<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo esc_url(home_url('/wp-content/themes/finalproject/assets/custom-styles.css'));?> ">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+3gZI6F/dJwxspXn9Ove2H6m2mVp5oN5t9q1fJb" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-JPjp14VmSS1TBBAJ4O1aEP3nq4PjrSn0V5g4PXP7oL+54aNaVy0NkfzrwgDg1UFS" crossorigin="anonymous"></script>
</head>
<body <?php body_class(); ?>>
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
                <img src="<?php echo esc_url(home_url('/wp-content/themes/finalproject/assets/logo.png')); ?>"
                     alt="header logo" class="logo" width="100" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                wp_nav_menu(array(
                    'menu' => 'Main Navigation',
                    'theme_location' => '',
                    'depth' => 1,
                    'fallback_cb' => false,
                    'menu_class' => 'navbar-nav'
                ));
                ?>
            </div>
        </div>
    </nav>
</header>
