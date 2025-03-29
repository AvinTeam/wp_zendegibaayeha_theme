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

    add_meta_box(
        'zba_ayeh_details',
        'اطلاعات آیه ها',
        'submenu_zba_ayeh_details_callable',
        'content_ayeh',
        'normal',
        'high',
    );

    function submenu_zba_ayeh_details_callable($post)
    {
        $ayeh_ayeh     = get_post_meta($post->ID, '_ayeh_ayeh', true);
        $ayeh_tarjomeh = get_post_meta($post->ID, '_ayeh_tarjomeh', true);
        $ayeh_address  = get_post_meta($post->ID, '_ayeh_address', true);

        include_once ZBA_VIEWS . 'metabox/ayeh_details.php';
    }

    add_meta_box(
        'zba_ayeh_video',
        'ویدئو آیه ها',
        'submenu_zba_ayeh_video_callable',
        'content_ayeh',
        'normal',
        'high',
    );

    function submenu_zba_ayeh_video_callable($post)
    {

        $ayeh_video_list = get_post_meta($post->ID, '_ayeh_video_list', true);

        $ayeh_video_list = (is_array($ayeh_video_list)) ? $ayeh_video_list : [  ];

        include_once ZBA_VIEWS . 'metabox/ayeh_video.php';
    }

    add_meta_box(
        'zba_ayeh_sound',
        'صوت آیه ها',
        'submenu_zba_ayeh_sound_callable',
        'content_ayeh',
        'normal',
        'high',
    );

    function submenu_zba_ayeh_sound_callable($post)
    {

        $ayeh_sound_list = get_post_meta($post->ID, '_ayeh_sound_list', true);

        $ayeh_sound_list = (is_array($ayeh_sound_list)) ? $ayeh_sound_list : [  ];

        include_once ZBA_VIEWS . 'metabox/ayeh_sound.php';
    }

}

add_action('save_post', 'zba_save_bax', 1, 3);

function zba_save_bax($post_id, $post, $updata)
{
    if (isset($_POST[ 'zba_aparat' ])) {
        update_post_meta($post_id, '_zba_aparat', esc_html($_POST[ 'zba_aparat' ]));
    }
    if (isset($_POST[ 'ayeh' ])) {

        update_post_meta($post_id, '_ayeh_ayeh', $_POST[ 'ayeh' ][ 'ayeh' ]);
        update_post_meta($post_id, '_ayeh_tarjomeh', $_POST[ 'ayeh' ][ 'tarjomeh' ]);
        update_post_meta($post_id, '_ayeh_address', $_POST[ 'ayeh' ][ 'address' ]);
        update_post_meta($post_id, '_ayeh_sound_list', $_POST[ 'ayeh' ][ 'sound' ]);
        update_post_meta($post_id, '_ayeh_video_list', $_POST[ 'ayeh' ][ 'video' ]);
        update_post_meta($post_id, '_vote_ayeh', 0);

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
