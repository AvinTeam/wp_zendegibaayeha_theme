<?php

use zbaclass\ZBADB;

(defined('ABSPATH')) || exit;

add_action('init', function (): void {

    if (wp_is_json_request()) {
        zba_cookie();
    }

    if (isset($_POST[ 'act' ]) && $_POST[ 'act' ] == "vote_ayeh") {

        // print_r($_POST);
        // exit;
        $massage = '';

        if (wp_verify_nonce($_POST[ '_wpnonce' ], 'zba_nonce_captcha' . zba_to_english($_POST[ 'captcha' ]))) {

            $phone = sanitize_phone($_POST[ 'phone' ]);

            if (! isset($_POST[ 'vote_ayeh' ])) {
                $massage .= '<div class="alert alert-danger" role="alert">هیچ آیه ای انتخاب نشده است.</div>';
            }
            if (empty($phone) || ! is_mobile($phone)) {
                $massage .= '<div class="alert alert-danger" role="alert">شماره موبایل شما درست نمی باشد</div>';
            }

            if (empty($massage)) {
                $zbadb = new ZBADB('vote');

                if ($zbadb->num([ 'mobile' => $phone ])) {
                    $massage .= '<div class="alert alert-danger" role="alert">شما قبلا رای خود را ثبت کردید</div>';
                } else {

                    $ayeh = zba_to_english(intval($_POST[ 'vote_ayeh' ]));

                    $insert = $zbadb->insert([
                        'mobile' => $phone,
                        'ayeh'   => $ayeh,

                     ]);

                    if ($insert) {

                        $massage .= '<div class="alert alert-success" role="alert">رای شما ثبت شده است با تشکر از شما</div>';

                        update_post_meta($ayeh, '_vote_ayeh', intval($zbadb->num([ 'ayeh' => $ayeh ])));

                    } else {
                        $massage .= '<div class="alert alert-danger" role="alert">لطفا دوباره تلاش کنید</div>';
                    }

                }

            }

        } else {
            $massage .= '<div class="alert alert-danger" role="alert">سوال امنیتی را اشتباه جواب دادید</div>';

        }

        set_transient('zba_transient', $massage, MINUTE_IN_SECONDS);

        wp_redirect($_POST[ '_wp_http_referer' ]);
        exit;

    }

});

add_action('no_created_user', 'fun_no_created_user');

function fun_no_created_user($mobile)
{
    $massage = '';

    $zbadb = new ZBADB('winners');

    $arg = [
        'data' => [
            'mobile' => $mobile,

         ],

     ];

    $all_win = $zbadb->select($arg);

    if ($all_win) {

        $gift = "";
        foreach ($all_win as $key => $win) {
            if ($key) {$gift .= '، ';}
            $gift .= $win->gift;
        }

        $massage .= '<div class="alert alert-success" role="alert">';
        $massage .= '<p><h2 class="text-center text-bold">تبریک شما برنده شده اید.</h2></p>';
        $massage .= '<p ><b>جایزه:</b> ' . $gift.'</p>';
        $massage .= '<p ><b>وضعیت:</b> در حال پردازش و اقدام</p>';
        $massage .= '</div>';

    } else {
        $massage .= '<div class="alert alert-danger" role="alert">شما تاکنون در قرعه کشی پویش زندگی با آیه ها برنده جایزه نشده اید. امیدواریم در پویش های بعدی شما نیز برنده شوید.</div>';
    }

    set_transient('zba_transient', $massage, 10 * MINUTE_IN_SECONDS);

}