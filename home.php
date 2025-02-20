<?php get_header(); ?>
<header class="text-white bg-white">
        <nav class="navbar navbar-expand-lg w-75 mx-auto py-3 d-flex flex-row justify-content-between">
            <!-- لوگو در موبایل سمت راست -->
            <a class="navbar-brand" href="/">
                <img class="w-100" src="<?php echo zba_image('logo.png') ?>">
            </a>

                <!-- دکمه‌ی همبرگر -->
                <button class="navbar-toggler ms-4 bg-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="w-100 mt-2 ms-4">
                <!-- منو -->
                <div class="w-100 collapse navbar-collapse" id="navbarNav">
                    <!-- <?php
                        wp_nav_menu([
                            'theme_location' => 'main-menu', // نامی که در register_nav_menus تعریف کردی
                            'container'      => false,       // چون خودش div داره، نمی‌خواهیم یه div اضافی بیاد
                            'menu_class'     => 'navbar-nav text-center container-fluid d-flex flex-column flex-md-row justify-content-between align-items-center',
                            'fallback_cb'    => false,                   // اگر فهرستی تنظیم نشد، چیزی نمایش نده
                            'depth'          => 2,                       // اگر منوی تو در تو داشته باشی، سطح دوم رو هم پشتیبانی می‌کنه
                            'walker'         => new Custom_Nav_Walker(), // برای ساختار بوت‌استرپ نیاز به Walker داریم (اختیاری)
                         ]);
                    ?> -->



                </div>

            </div>
        </nav>
    </header>






<?php get_footer();