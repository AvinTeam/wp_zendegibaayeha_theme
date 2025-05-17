<?php

(defined('ABSPATH')) || exit;

/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function zba_content_ayeh_init()
{
    $labels = array(
        'name' => 'آیه',
        'singular_name' => 'content_ayeh',
        'menu_name' => 'آیه ها',
        'name_admin_bar' => 'آیه',
        'add_new' => 'اضافه کردن',
        'add_new_item' => 'اضافه کردن آیه',
        'new_item' => 'آیه جدید',
        'edit_item' => 'ویرایش آیه',
        'view_item' => 'نمایش آیه',
        'all_items' => 'همه آیه ها',
        'search_items' => 'جست و جو آیه',
        'parent_item_colon' => 'آیه والد: ',
        'not_found' => 'آیه یافت نشد',
        'not_found_in_trash' => 'آیه در سطل زباله یافت نشد',
        'featured_image' => 'کاور آیه',
        'set_featured_image' => 'انتخاب تصویر',
        'remove_featured_image' => 'حذف تصویر',
        'use_featured_image' => 'استفاده به عنوان کاور',
        'archives' => 'دسته بندی آیه',
        'insert_into_item' => 'در آیه درج کنید',
        'uploaded_to_this_item' => 'در این آیه درج کنید',
        'filter_items_list' => 'فیلتر آیه',
        'items_list_navigation' => 'پیمایش آیه',
        'items_list' => 'لیست آیه',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,        
        'menu_position' => 5,
        'query_var' => true,
        'menu_icon' => 'dashicons-text-page',
        'capability_type' => 'post',
        'supports' => array('title','editor', 'author','custom-fields'),
        'rewrite' => array('slug' => 'content_ayeh'),
        'has_archive' => true,
    );

    register_post_type('content_ayeh', $args);


}

add_action('init', 'zba_content_ayeh_init');
