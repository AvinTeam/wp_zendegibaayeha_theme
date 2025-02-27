<?php
(defined('ABSPATH')) || exit;

add_action('init', function (): void {
    zba_cookie();
});






// تنظیم تصویر پیش‌فرض برای پست‌های بدون تصویر شاخص
function set_default_featured_image($post_id) {
    // بررسی اگر تصویر شاخص قبلاً تنظیم شده باشد
    if (has_post_thumbnail($post_id)) {
        return;
    }

    // گرفتن آیدی تصویر پیش‌فرض
    $default_image_id = get_option('default_featured_image_id', 0);
    if ($default_image_id) {
        set_post_thumbnail($post_id, $default_image_id);
    }
}
add_action('save_post', 'set_default_featured_image');
add_action('publish_post', 'set_default_featured_image');

    