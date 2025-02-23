<?php
if (! defined('ABSPATH')) {
    exit;
}

add_action('add_meta_boxes', 'zba_add_meta_boxes');

function zba_add_meta_boxes(): void
{

    add_meta_box(
        'zba_aparat_link',
        'لینک ویدیو از آپارات',
        'submenu_zba_aparat_callable',
        'post',
        'normal',
        'high',
    );

}

function submenu_zba_aparat_callable($post)
{

    $zba_aparat = get_post_meta($post->ID, '_zba_aparat', true);

    update_post_meta($post->ID, '_zba_aparat', esc_html($zba_aparat));

    include_once ZBA_VIEWS . 'metabox/aparat.php';

}

add_action('save_post', 'zba_save_bax', 10, 3);

function zba_save_bax($post_id, $post, $updata)
{
    update_post_meta($post_id, '_zba_aparat', esc_html($_POST[ 'zba_aparat' ]));

}