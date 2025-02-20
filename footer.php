<?php wp_footer()?>
<footer class="mt-5 ">
    <div class="top-footer">
        <div
            class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center zba-row mx-auto py-5">
            <img src="<?php echo zba_image('footer-logo.svg') ?>">
            <div class="w-50"></div>
            <div>
                <p class="f-17px">پویش ملی تبیین و حفظ ۵۰ فراز زندگی ساز قرآن کریم</p>
                <p style="font-size:15px">مسابقات روزانه در ماه مبارک رمضان برای نوجوانان و بزرگسالان همراه با جوایز
                    متنوع از جمله سفر حج عمره، کربلای معلی، مشهد مقدس و ...</p>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div
            class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center zba-row mx-auto py-3">
            <div>
                <?php wp_nav_menu([
                        'theme_location' => 'footer-menu',
                        'container'      => false,
                        'menu_class'     => '',
                        'depth'          => 2,
                        'items_wrap'     => '%3$s', // فقط آیتم‌های منو
                        'walker'         => new Footer_Menu_Walker(),
                 ]); ?>
            </div>
            <div>Copyright © 2023 Zendegi ba ayeha. All rights reserved.</div>
        </div>
    </div>
</footer>

<!-- لودر تمام صفحه -->
<div class="overlay" id="overlay">
    <div class="loader"></div>
</div>
</body>

</html>