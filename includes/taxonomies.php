<?php

(defined('ABSPATH')) || exit;

function zba_taxonomies()
{
    $labels = [
        'name'                  => 'دسته ها',
        'singular_name'         => 'دسته ها',
        'search_items'          => 'جست و جو دسته ها',
        'popular_items'         => 'دسته ها محبوب',
        'all_items'             => 'دسته ها',
        'edit_item'             => 'ویرایش دسته ',
        'update_item'           => 'بروزرسانی دسته ',
        'add_new_item'          => 'افزودن دسته ',
        'new_item_name'         => 'نام دسته جدید',
        'add_or_remove_items'   => 'اضافه کردن یا حذف دسته ',
        'choose_from_most_used' => 'از میان دسته ها پرکاربرد انتخاب کنید',
        'not_found'             => 'دسته ی را یافت نشد',
        'menu_name'             => 'دسته ها',
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
