<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>

</head>
<body>
<header style="height: 130px;" class="">
    <nav class="navbar navbar-expand-lg zba-row mx-auto py-3 d-flex flex-row justify-content-between">
        <!-- لوگو در موبایل سمت راست -->
        <a class="navbar-brand" href="/">
            <img class="w-100" style="height: 100px;" src="<?php echo zba_image('logo.svg') ?>">
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
                        'theme_location' => 'main-menu', // نامی که در register_nav_menus تعریف کردی
                        'container'      => false,       // چون خودش div داره، نمی‌خواهیم یه div اضافی بیاد
                        'menu_class'     => 'navbar-nav text-center container-fluid d-flex flex-column flex-md-row justify-content-start align-items-center',
                        'fallback_cb'    => false,                   // اگر فهرستی تنظیم نشد، چیزی نمایش نده
                        'depth'          => 2,                       // اگر منوی تو در تو داشته باشی، سطح دوم رو هم پشتیبانی می‌کنه
                        'walker'         => new Custom_Nav_Walker(), // برای ساختار بوت‌استرپ نیاز به Walker داریم (اختیاری)
                     ]);
                ?>
                
            <div class="d-flex flex-row justify-content-center align-items-center gap-3 text-primary">
                <button class="btn text-primary"><i class="bi bi-search"></i></button>
                <span>|</span>
                <a href="tel:02191079321 " class="btn btn-tel" style="width: 150px !important;">
                    <span><?=zba_to_persian('02191079321-5')?></span>
                    <i class="bi bi-telephone"></i>
                </a>
            </div>
        </div>
            </div>


    </nav>
</header>


