<?php

use zbaclass\ZBADB;

(defined('ABSPATH')) || exit;

function zba_js($path)
{
    return ZBA_JS . $path . '?ver=' . ZBA_VERSION;
}

function zba_css($path)
{
    return ZBA_CSS . $path . '?ver=' . ZBA_VERSION;
}

function zba_image($path)
{
    return ZBA_IMAGE . $path . '?ver=' . ZBA_VERSION;
}

function zba_remote(string $url)
{
    $res = wp_remote_get(
        $url,
        [
            'timeout' => 1000,
         ]);

    if (is_wp_error($res)) {
        $result = [
            'code'   => 1,
            'result' => $res->get_error_message(),
         ];
    } else {
        $result = [
            'code'   => 0,
            'result' => json_decode($res[ 'body' ]),
         ];
    }

    return $result;
}

function zba_cookie(): string
{

    if (! is_user_logged_in()) {

        if (! isset($_COOKIE[ "setcookie_zba_nonce" ])) {

            $is_key_cookie = wp_generate_password('15', true, true);
            ob_start();

            setcookie("setcookie_zba_nonce", $is_key_cookie, time() + 1800, "/");

            ob_end_flush();

            header("Refresh:0");
            exit;

        } else {
            $is_key_cookie = $_COOKIE[ "setcookie_zba_nonce" ];
        }
    } else {

        $is_key_cookie = get_current_user_id();

    }
    return $is_key_cookie;
}

function zba_mask_mobile($mobile)
{
    // بررسی طول شماره موبایل
    if (strlen($mobile) === 11) {
        $masked = substr($mobile, -3) . '****' . substr($mobile, 0, 4);
        return $masked;
    }
    return "شماره موبایل نامعتبر است.";
}

function tarikh($data, $type = '')
{

    $data_array = explode(" ", $data);

    $data = $data_array[ 0 ];
    $time = (sizeof($data_array) >= 2) ? $data_array[ 1 ] : 0;

    $has_mode = (strpos($data, '-')) ? '-' : '/';

    list($y, $m, $d) = explode($has_mode, $data);

    $ch_date = (strpos($data, '-')) ? gregorian_to_jalali($y, $m, $d, '/') : jalali_to_gregorian($y, $m, $d, '-');

    if ($type == 'time') {
        $new_date = $time;
    } elseif ($type == 'date') {
        $new_date = $ch_date;
    } else {
        $new_date = ($time === 0) ? $ch_date : $ch_date . ' ' . $time;
    }

    return $new_date;

}

function get_current_relative_url()
{
    // گرفتن مسیر فعلی بدون دامنه
    $path = esc_url_raw(wp_unslash($_SERVER[ 'REQUEST_URI' ]));

                                                // حذف دامنه و فقط نگه داشتن مسیر نسبی + پارامترها
    $relative_url = strtok($path, '?');         // مسیر قبل از پارامترها
    $query_string = $_SERVER[ 'QUERY_STRING' ]; // پارامترهای GET

    // اگر پارامتر وجود داره، به مسیر اضافه کن
    if ($query_string) {
        $relative_url .= '?' . $query_string;
    }

    return $relative_url;
}

function zba_to_enghlish($text)
{

    $western = [ '0', '1', '2', '3', '4', '5', '6', '7', '8', '9' ];
    $persian = [ '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' ];
    $arabic  = [ '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩' ];
    $text    = str_replace($persian, $western, $text);
    $text    = str_replace($arabic, $western, $text);
    return $text;

}

function zba_to_persian($text)
{

    $western = [ '0', '1', '2', '3', '4', '5', '6', '7', '8', '9' ];
    $persian = [ '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' ];
    $arabic  = [ '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩' ];
    $text    = str_replace($western, $persian, $text);
    $text    = str_replace($arabic, $persian, $text);
    return $text;

}

function sanitize_text_no_item($item)
{
    $new_item = [  ];

    foreach ($item as $value) {
        if (empty($value)) {continue;}
        $new_item[  ] = sanitize_text_field($value);
    }

    return $new_item;

}

function generate_uuid()
{
    // تولید UUID به فرمت استاندارد
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

function linktocode($input)
{
    if (preg_match('/^[a-zA-Z0-9]+$/', $input)) {
        return $input; // ورودی همان کد است
    }

    if (preg_match('/aparat\.com\/v\/([a-zA-Z0-9]+)/', $input, $matches)) {
        return $matches[ 1 ]; // کد ویدیو را برگردان
    }

    return null;
}

function mr_time_start_working()
{
    $clock_mr_setting = get_option('mr_setting_clock');

    if (! isset($clock_mr_setting[ 'version' ]) || version_compare(ZBA_VERSION, $clock_mr_setting[ 'version' ], '>')) {

        update_option(
            'mr_setting_clock',
            [
                'version'    => ZBA_VERSION,

                'setting'    => (isset($clock_mr_setting[ 'setting' ])) ? absint($clock_mr_setting[ 'setting' ]) : 0,
                'setting_tv' => (isset($clock_mr_setting[ 'setting_tv' ])) ? absint($clock_mr_setting[ 'setting_tv' ]) : 0,
                'clock_decs' => (isset($clock_mr_setting[ 'clock_decs' ])) ? sanitize_text_field($clock_mr_setting[ 'clock_decs' ]) : '',
                'timestamp'  => (isset($clock_mr_setting[ 'timestamp' ])) ? absint($clock_mr_setting[ 'timestamp' ]) : 5,

             ]

        );

    }

    return get_option('mr_setting_clock');

}

function time_update_option($data)
{

    $clock_mr_setting = get_option('mr_setting_clock');

    $clock_mr_setting = [
        'version'    => ZBA_VERSION,

        'setting'    => (isset($data[ 'setting' ])) ? absint($data[ 'setting' ]) : $clock_mr_setting[ 'setting' ],
        'setting_tv' => (isset($data[ 'setting_tv' ])) ? absint($data[ 'setting_tv' ]) : $clock_mr_setting[ 'setting_tv' ],
        'clock_decs' => (isset($data[ 'clock_decs' ])) ? sanitize_text_field($data[ 'clock_decs' ]) : $clock_mr_setting[ 'clock_decs' ],
        'timestamp'  => (isset($data[ 'timestamp' ])) ? absint($data[ 'timestamp' ]) : $clock_mr_setting[ 'timestamp' ],

     ];

    update_option('mr_setting_clock', $clock_mr_setting);

}
