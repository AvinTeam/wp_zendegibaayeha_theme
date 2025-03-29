<?php

use zbaclass\ZBAOption;

(defined('ABSPATH')) || exit;

add_action('admin_enqueue_scripts', 'zba_admin_script');

function zba_admin_script()
{

    wp_register_style(
        'jalalidatepicker',
        ZBA_VENDOR . 'jalalidatepicker/jalalidatepicker.min.css',
        [  ],
        '0.9.6'
    );
    wp_register_script(
        'jalalidatepicker',
        ZBA_VENDOR . 'jalalidatepicker/jalalidatepicker.min.js',
        [  ],
        '0.9.6',
        true
    );

    wp_enqueue_style(
        'zba_admin',
        ZBA_CSS . 'admin.css',
        [ 'jalalidatepicker' ],
        ZBA_VERSION
    );

    wp_enqueue_media();

    wp_enqueue_script(
        'zba_admin',
        ZBA_JS . 'admin.js',
        [ 'jquery', 'jalalidatepicker' ],
        ZBA_VERSION,
        true
    );

    wp_localize_script(
        'zba_admin',
        'zba_js',
        [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('ajax-nonce'),
         ]
    );

}

add_action('wp_enqueue_scripts', 'zba_style');

function zba_style()
{
    wp_register_style(
        'bootstrap',
        ZBA_VENDOR . 'bootstrap/bootstrap.min.css',
        [  ],
        '5.3.3'
    );
    wp_register_style(
        'bootstrap.rtl',
        ZBA_VENDOR . 'bootstrap/bootstrap.rtl.min.css',
        [ 'bootstrap' ],
        '5.3.3'
    );
    wp_register_style(
        'bootstrap.icons',
        ZBA_VENDOR . 'bootstrap/bootstrap-icons.min.css',
        [ 'bootstrap' ],
        '1.11.3'
    );
    wp_register_script(
        'bootstrap',
        ZBA_VENDOR . 'bootstrap/bootstrap.min.js',
        [  ],
        '5.3.3',
        true
    );

    wp_register_style(
        'select2',
        ZBA_VENDOR . 'select2/select2.min.css',
        [ 'bootstrap' ],
        '4.1.0-rc.0'
    );
    wp_register_script(
        'select2',
        ZBA_VENDOR . 'select2/select2.min.js',
        [  ],
        '4.1.0-rc.0',
        true
    );

    wp_register_style(
        'jalalidatepicker',
        ZBA_VENDOR . 'jalalidatepicker/jalalidatepicker.min.css',
        [  ],
        '0.9.6'
    );
    wp_register_script(
        'jalalidatepicker',
        ZBA_VENDOR . 'jalalidatepicker/jalalidatepicker.min.js',
        [  ],
        '0.9.6',
        true
    );

    wp_register_style(
        'swiper',
        ZBA_VENDOR . 'swiper/swiper-bundle.min.css',
        [  ],
        '11.2.2',
    );

    wp_register_script(
        'swiper',
        ZBA_VENDOR . 'swiper/swiper-bundle.min.js',
        [  ],
        '11.2.2',

    );

    wp_enqueue_style(
        'zba_style',
        ZBA_CSS . 'public.css',
        [ 'bootstrap.rtl', 'bootstrap.icons', 'select2', 'jalalidatepicker', 'swiper' ],
        ZBA_VERSION
    );

    wp_enqueue_script(
        'zba_js',
        ZBA_JS . 'public.js',
        [ 'jquery', 'bootstrap', 'select2', 'jalalidatepicker', 'swiper' ],
        ZBA_VERSION,
        true
    );

    $ZBAOption = new ZBAOption();

    wp_localize_script(
        'zba_js',
        'zba_js',
        [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('ajax-nonce' . zba_cookie()),
            'option'  => $ZBAOption->get(),
         ]
    );

}


add_action('wp_enqueue_scripts', 'addMyStyle');

function addMyStyle()
{
    wp_enqueue_script(
        'mr-javascript',
        ZBA_JS . 'mr-javascript.js',
        [ 'jquery' ],
        ZBA_VERSION,
        true
    );

    $clock_time = get_option('mr_add_clock');
    $mr_clock = $mr_stamp_clock = [  ];
    $fersttime = $secendtime = 0;

    if (is_array($clock_time)) {


        foreach ($clock_time as $row) {

            $timeset = tarikh($row[ 'date' ], 1) . ' ' . $row[ 'time' ];

            $mr_clock[  ] = tarikh($row[ 'date' ], 1) . ' ' . $row[ 'time' ];
            $mr_stamp_clock[  ] = date("Y-m-d H:i:s", strtotime($timeset) + ZBA_TIME_STAMP);
        }

        $mr_clock[  ] = 0;
    }

    $clock_mr_setting = get_option('mr_setting_clock');


    wp_localize_script(
        'mr-javascript',
        'mr_param_script',
        [
            'isarray' => (is_array($clock_time)) ? 1 : 0,
            'setting' => ($clock_mr_setting[ 'setting' ]) ? 1 : 0,
            'setting_tv' => ($clock_mr_setting[ 'setting_tv' ]) ? 1 : 0,
            'clock_decs' => $clock_mr_setting[ 'clock_decs' ],
            'ajax_url' => admin_url('admin-ajax.php'),
            'clock_time' => $mr_clock,
            'mr_stamp_clock' => $mr_stamp_clock,

         ]
    );

}
