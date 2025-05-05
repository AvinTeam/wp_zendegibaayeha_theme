<?php

(defined('ABSPATH')) || exit;

function zba_taxonomies()
{
    $labels = [
        'name'                  => 'دسته آیه ها',
        'singular_name'         => 'دسته آیه ها',
        'search_items'          => 'جست و جو دسته آیه ها',
        'popular_items'         => 'دسته آیه ها محبوب',
        'all_items'             => 'دسته آیه ها',
        'edit_item'             => 'ویرایش دسته آیه ',
        'update_item'           => 'بروزرسانی دسته آیه ',
        'add_new_item'          => 'افزودن دسته آیه ',
        'new_item_name'         => 'نام دسته آیه جدید',
        'add_or_remove_items'   => 'اضافه کردن یا حذف دسته آیه ',
        'choose_from_most_used' => 'از میان دسته آیه ها پرکاربرد انتخاب کنید',
        'not_found'             => 'دسته آیه ی را یافت نشد',
        'menu_name'             => 'دسته آیه ها',
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
