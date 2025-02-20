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

    wp_enqueue_style(
        'zba_style',
        ZBA_CSS . 'public.css',
        [ 'bootstrap.rtl', 'bootstrap.icons', 'select2', 'jalalidatepicker' ],
        ZBA_VERSION
    );

    wp_enqueue_script(
        'zba_js',
        ZBA_JS . 'public.js',
        [ 'jquery', 'bootstrap', 'select2', 'jalalidatepicker' ],
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