<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <script async defer src="https://tianji.ayeh.net/tracker.js" data-website-id="cm807nd8s48srul657mxap2vr"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg zba-row mx-auto d-flex flex-row justify-content-between">
            <!-- لوگو در موبایل سمت راست -->
            <a class="navbar-brand" href="/">
                <img loading="lazy" class="logo " src="<?php echo zba_image('logo.png') ?>">
            </a>

            <!-- دکمه‌ی همبرگر -->
            <button class="navbar-toggler ms-4 bg-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="w-100 mt-2 ms-4 d-flex flex-row justify-content-start align-items-center ">
                <!-- منو -->
                <div class="w-100 collapse navbar-collapse" id="navbarNav">
                    <?php
                        wp_nav_menu([
                            'theme_location' => 'main-menu',
                            'container'      => false,
                            'menu_class'     => 'navbar-nav text-center container-fluid d-flex flex-column flex-md-row justify-content-start align-items-center',
                            'fallback_cb'    => false,
                            'depth'          => 2,
                            'walker'         => new Custom_Nav_Walker(),
                         ]);
                    ?>

                    <div class="d-flex flex-row justify-content-center align-items-center gap-3 text-primary">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="bi bi-search text-primary"></i></button>
                        <span>|</span>
                        <a href="tel:02192003978 " class="btn btn-tel" style="width: 170px !important;">
                            <span>02192003978</span>
                            <i class="bi bi-telephone"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>