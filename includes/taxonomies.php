<?php

(defined('ABSPATH')) || exit;

function zba_taxonomies()
{
    $labels = [
        'name'                  => 'سال ها',
        'singular_name'         => 'سال ها',
        'search_items'          => 'جست و جو سال ها',
        'popular_items'         => 'سال ها محبوب',
        'all_items'             => 'سال ها',
        'edit_item'             => 'ویرایش سال ',
        'update_item'           => 'بروزرسانی سال ',
        'add_new_item'          => 'افزودن سال ',
        'new_item_name'         => 'نام سال جدید',
        'add_or_remove_items'   => 'اضافه کردن یا حذف سال ',
        'choose_from_most_used' => 'از میان سال ها پرکاربرد انتخاب کنید',
        'not_found'             => 'سال ی را یافت نشد',
        'menu_name'             => 'سال ها',
     ];

    $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'public'            => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'cat_ayeh', 'with_front' => false ],
     ];

    register_taxonomy('cat_ayeh', 'content_ayeh', $args);

}

add_action('init', 'zba_taxonomies');
