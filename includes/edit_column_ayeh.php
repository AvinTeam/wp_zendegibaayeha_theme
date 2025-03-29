<?php

(defined('ABSPATH')) || exit;

// 1. اضافه کردن ستون تعداد رای
add_filter('manage_content_ayeh_posts_columns', 'add_vote_count_column');
add_action('manage_content_ayeh_posts_custom_column', 'show_vote_count_column', 10, 2);
add_filter('manage_edit-content_ayeh_sortable_columns', 'make_vote_count_sortable');
add_action('pre_get_posts', 'sort_by_vote_count');

// 2. اضافه کردن فیلتر دسته‌بندی
add_action('restrict_manage_posts', 'add_category_filter_dropdown');

// توابع مربوطه
function add_vote_count_column($columns)
{
    $columns[ 'vote_count' ] = 'تعداد رای';
    return $columns;
}

function show_vote_count_column($column, $post_id)
{
    if ($column === 'vote_count') {
        $vote_count = get_post_meta($post_id, '_vote_ayeh', true);

        if (! $vote_count) {update_post_meta($post_id, '_vote_ayeh', 0);}
        echo $vote_count ? $vote_count : 0;
    }
}

function make_vote_count_sortable($columns)
{
    $columns[ 'vote_count' ] = '_vote_ayeh';
    return $columns;
}

function sort_by_vote_count($query)
{
    if (! is_admin() || ! $query->is_main_query()) {
        return;
    }

    if ($query->get('orderby') === '_vote_ayeh') {
        $query->set('meta_key', '_vote_ayeh');
        $query->set('orderby', 'meta_value_num');
    }
}

function add_category_filter_dropdown($post_type)
{
    if ('content_ayeh' !== $post_type) {
        return;
    }

    $taxonomy = 'cat_ayeh';
    $selected = isset($_GET[ $taxonomy ]) ? $_GET[ $taxonomy ] : '';
    wp_dropdown_categories([
        'show_option_all' => 'همه سال ها',
        'taxonomy'        => $taxonomy,
        'name'            => $taxonomy,
        'value_field'     => 'slug',
        'selected'        => $selected,
        'hierarchical'    => true,
        'hide_empty'      => false,
     ]);
}
