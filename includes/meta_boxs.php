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

    function submenu_zba_aparat_callable($post)
    {

        $zba_aparat = get_post_meta($post->ID, '_zba_aparat', true);

        update_post_meta($post->ID, '_zba_aparat', esc_html($zba_aparat));

        include_once ZBA_VIEWS . 'metabox/aparat.php';

    }

    add_meta_box(
        'zba_ayeh_exel',
        'اکسل آیه ها',
        'submenu_zba_ayeh_callable',
        'page',
        'normal',
        'high',
    );

    function submenu_zba_ayeh_callable($post)
    {

        include_once ZBA_VIEWS . 'metabox/ayeh.php';

    }

}

add_action('save_post', 'zba_save_bax', 1, 3);

function zba_save_bax($post_id, $post, $updata)
{
    if (isset($_POST[ 'zba_aparat' ])) {
        update_post_meta($post_id, '_zba_aparat', esc_html($_POST[ 'zba_aparat' ]));
    }

}

function append_metabox_to_page_content($post_id)
{
    // جلوگیری از ذخیره خودکار
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (! current_user_can('edit_post', $post_id)) {
        return;
    }

    $meta_value = '';
    if (isset($_FILES[ 'zba_exel_ayeh' ]) && ! empty($_FILES[ 'zba_exel_ayeh' ][ 'name' ])) {

        include_once ZBA_INCLUDES . 'import-file.php';

    } elseif (isset($_FILES[ 'zba_exel_winners' ]) && ! empty($_FILES[ 'zba_exel_winners' ][ 'name' ])) {

        include_once ZBA_INCLUDES . 'import-winners.php';

    } else {
        return;
    }

    $post = get_post($post_id);

    $new_content = $post->post_content . "\n" . $meta_value;

    remove_action('save_post', 'append_metabox_to_page_content');

    wp_update_post([
        'ID'           => $post_id,
        'post_content' => $new_content,
     ]);

    // افزودن مجدد اکشن پس از به‌روزرسانی
    add_action('save_post', 'append_metabox_to_page_content');
}
add_action('save_post', 'append_metabox_to_page_content');