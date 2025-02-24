<?php
(defined('ABSPATH')) || exit;

function zba_title_filter($title)
{
    if (is_home() || is_front_page()) {
        $title = get_bloginfo('name');
    } elseif (is_single()) {
        $title = get_the_title() . " | " . get_bloginfo('name');
    } elseif (is_category()) {
        $title = single_cat_title('', false) . " | دسته‌بندی";
    } elseif (is_tag()) {
        $title = single_tag_title('', false) . " | برچسب";
    } elseif (is_search()) {
        $title = "نتایج جستجو برای " . get_search_query();
    } elseif (is_404()) {
        $title = get_bloginfo('name') . "صفحه پیدا نشد | ";
    } else {
        $title = get_bloginfo('name');
    }
    return $title;
}
add_filter('wp_title', 'zba_title_filter');

function custom_search_by_meta($search, $wp_query)
{
    global $wpdb;

    // فقط در جستجو اجرا شود و اگر عبارت جستجو خالی است از تغییر صرفنظر شود
    if (empty($search) || ! $wp_query->is_search()) {
        return $search;
    }

    // دریافت عبارت جستجو و ایجاد عبارت LIKE ایمن برای استفاده در کوئری
    $search_term = $wp_query->query_vars[ 's' ];
    $like        = '%' . $wpdb->esc_like($search_term) . '%';

    // ساخت یک کوئری سفارشی که عنوان، محتوا و متا را جستجو کند
    $search = $wpdb->prepare(" AND (
        ({$wpdb->posts}.post_title LIKE %s)
        OR ({$wpdb->posts}.post_content LIKE %s)
        OR EXISTS (
            SELECT 1 FROM {$wpdb->postmeta}
            WHERE {$wpdb->posts}.ID = {$wpdb->postmeta}.post_id
            AND {$wpdb->postmeta}.meta_value LIKE %s
        )
    )", $like, $like, $like);

    return $search;
}
add_filter('posts_search', 'custom_search_by_meta', 10, 2);
