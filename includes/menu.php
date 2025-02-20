<?php

use zbaclass\List_Table;
use zbaclass\ZBADB;
use zbaclass\ZBAOption;

(defined('ABSPATH')) || exit;

//add_action('admin_menu', 'zba_admin_menu');

/**
 * Fires before the administration menu loads in the admin.
 *
 * @param string $context Empty context.
 */
function zba_admin_menu(string $context): void
{

    $list_suffix = add_menu_page(
        'مسابقه آنی',
        'مسابفه آنی',
        'manage_options',
        'oni',
        'list_ayeh',
        'dashicons-hammer',
        2
    );

    add_submenu_page(
        'oni',
        'لیست آیه ها',
        'لیست آیه ها',
        'manage_options',
        'oni',
        'list_ayeh',
    );

    function list_ayeh()
    {

        if (isset($_GET[ 'update_item' ]) && absint($_GET[ 'update_item' ])) {

            $GLOBALS[ 'title' ] = 'ویرایش';
            $onidb              = new ZBADB('question');

            $ayeh = $onidb->get([ 'id' => absint($_GET[ 'update_item' ]) ], ARRAY_A);

            require_once ZBA_VIEWS . 'menu/add.php';

        } else {

            $ZBAOption    = new ZBAOption();
            $zba_option   = $ZBAOption->get();
            $oniListTable = new List_Table;

            require_once ZBA_VIEWS . 'menu/list.php';
        }
    }

    $add_ayeh_suffix = add_submenu_page(
        'oni',
        'افزودن آیه ',
        'افزودن آیه ',
        'manage_options',
        'add_ayeh',
        'add_ayeh',
    );

    function add_ayeh()
    {
        $ZBAOption  = new ZBAOption();
        $zba_option = $ZBAOption->get();
        global $ayeh;

        if ($ayeh == null) {

            $ayeh = [
                'question' => '',
                'option1'  => '',
                'option2'  => '',
                'option3'  => '',
                'option4'  => '',
                'answer'   => 0,
             ];
        }
        require_once ZBA_VIEWS . 'menu/add.php';

    }

    $add_file_ayeh_suffix = add_submenu_page(
        'oni',
        'افزودن با اکسل',
        'افزودن با اکسل',
        'manage_options',
        'add_file_ayeh',
        'add_file_ayeh',
    );

    function add_file_ayeh()
    {
        $ZBAOption  = new ZBAOption();
        $zba_option = $ZBAOption->get();
        require_once ZBA_VIEWS . 'menu/add_file.php';

    }

    $setting_suffix = add_submenu_page(
        'oni',
        'تنظیمات',
        'تنظیمات',
        'manage_options',
        'zba_setting',
        'setting_panels',
    );

    function setting_panels()
    {
        $ZBAOption  = new ZBAOption();
        $zba_option = $ZBAOption->get();
        require_once ZBA_VIEWS . 'menu/setting.php';

    }

    $sms_panels_suffix = add_submenu_page(
        'oni',
        'تنظیمات پنل پیامک',
        'تنظیمات پنل پیامک',
        'manage_options',
        'sms_panels',
        'zba_sms_panels',
    );

    function zba_sms_panels()
    {
        $ZBAOption  = new ZBAOption();
        $zba_option = $ZBAOption->get();
        require_once ZBA_VIEWS . 'menu/setting_sms_panels.php';

    }

    add_action('load-' . $list_suffix, 'zba__list');
    add_action('load-' . $add_ayeh_suffix, 'zba__submit_add');
    add_action('load-' . $setting_suffix, 'zba__submit');
    add_action('load-' . $sms_panels_suffix, 'zba__submit');
    add_action('load-' . $add_file_ayeh_suffix, 'zba__add_file');

    function zba__submit()
    {

        if (isset($_POST[ 'zba_act' ]) && $_POST[ 'zba_act' ] == 'zba__submit') {

            if (wp_verify_nonce($_POST[ '_wpnonce' ], 'zba_nonce' . get_current_user_id())) {
                if (isset($_POST[ 'tsms' ])) {
                    $_POST[ 'tsms' ] = array_map('sanitize_text_field', $_POST[ 'tsms' ]);
                }
                if (isset($_POST[ 'ghasedaksms' ])) {
                    $_POST[ 'ghasedaksms' ] = array_map('sanitize_text_field', $_POST[ 'ghasedaksms' ]);
                }

                $ZBAOption = new ZBAOption();
                $ZBAOption->set($_POST);

                wp_admin_notice(
                    'تغییر شما با موفقیت ثبت شد',
                    [
                        'id'          => 'message',
                        'type'        => 'success',
                        'dismissible' => true,
                     ]
                );

            } else {
                wp_admin_notice(
                    'ذخیره سازی به مشکل خورده دوباره تلاش کنید',
                    [
                        'id'          => 'zba_message',
                        'type'        => 'error',
                        'dismissible' => true,
                     ]
                );

            }

        }

    }

    function zba__submit_add()
    {

        if (isset($_POST[ 'zba_act' ]) && $_POST[ 'zba_act' ] == 'zba__submit_question') {

            if (wp_verify_nonce($_POST[ '_wpnonce' ], 'zba_nonce' . get_current_user_id())) {

                $error = false;

                if (empty($_POST[ 'question' ])) {
                    $error = true;

                    wp_admin_notice(
                        'سوال مسابقه را وارد کنید',
                        [
                            'id'          => 'zba_message_question',
                            'type'        => 'error',
                            'dismissible' => true,
                         ]
                    );
                }

                if (empty($_POST[ 'option1' ])) {
                    $error = true;

                    wp_admin_notice(
                        'گزینه اول را وارد نکردید',
                        [
                            'id'          => 'zba_message_option1',
                            'type'        => 'error',
                            'dismissible' => true,
                         ]
                    );
                }

                if (empty($_POST[ 'option2' ])) {
                    $error = true;

                    wp_admin_notice(
                        'گزینه دوم را وارد نکردید',
                        [
                            'id'          => 'zba_message_option2',
                            'type'        => 'error',
                            'dismissible' => true,
                         ]
                    );
                }

                if (empty($_POST[ 'option3' ])) {
                    $error = true;

                    wp_admin_notice(
                        'گزینه سوم را وارد نکردید',
                        [
                            'id'          => 'zba_message_option3',
                            'type'        => 'error',
                            'dismissible' => true,
                         ]
                    );
                }

                if (empty($_POST[ 'option4' ])) {
                    $error = true;

                    wp_admin_notice(
                        'گزینه چهارم را وارد نکردید',
                        [
                            'id'          => 'zba_message_option4',
                            'type'        => 'error',
                            'dismissible' => true,
                         ]
                    );
                }

                if (! absint($_POST[ 'answer' ])) {

                    $error = true;

                    wp_admin_notice(
                        'پاسخ درست را وارد نکردید',
                        [
                            'id'          => 'zba_message_answer',
                            'type'        => 'error',
                            'dismissible' => true,
                         ]
                    );
                }

                if (! $error) {

                    $onidb = new ZBADB('question');

                    $unsert_num = $onidb->insert([
                        'question' => sanitize_textarea_field($_POST[ 'question' ]),
                        'option1'  => sanitize_text_field($_POST[ 'option1' ]),
                        'option2'  => sanitize_text_field($_POST[ 'option2' ]),
                        'option3'  => sanitize_text_field($_POST[ 'option3' ]),
                        'option4'  => sanitize_text_field($_POST[ 'option4' ]),
                        'answer'   => (isset($_POST[ 'answer' ])) ? absint($_POST[ 'answer' ]) : 0,
                     ]);

                    if ($unsert_num) {

                        wp_admin_notice(
                            'سوال شما با موفقیت ثبت شده است.  <a href="' . admin_url('admin.php?page=oni&update_item=' . $unsert_num) . '">ویرایش  سوال</a>',
                            [
                                'id'          => 'zba_message',
                                'type'        => 'success',
                                'dismissible' => true,
                             ]
                        );

                    } else {
                        wp_admin_notice(
                            'ثبت سوال به مشکل خورده دوباره تلاش کنید',
                            [
                                'id'          => 'zba_message',
                                'type'        => 'error',
                                'dismissible' => true,
                             ]
                        );

                    }

                } else {

                    $GLOBALS[ 'ayeh' ] = [
                        'question' => sanitize_textarea_field($_POST[ 'question' ]),
                        'option1'  => sanitize_text_field($_POST[ 'option1' ]),
                        'option2'  => sanitize_text_field($_POST[ 'option2' ]),
                        'option3'  => sanitize_text_field($_POST[ 'option3' ]),
                        'option4'  => sanitize_text_field($_POST[ 'option4' ]),
                        'answer'   => (isset($_POST[ 'answer' ])) ? absint($_POST[ 'answer' ]) : 0,
                     ];
                }

            } else {
                wp_admin_notice(
                    'ذخیره سازی به مشکل خورده دوباره تلاش کنید',
                    [
                        'id'                 => 'zba_message',
                        'type'               => 'error',
                        'additional_classes' => [ '' ],
                        'dismissible'        => true,
                     ]
                );

            }

        }

    }

    function zba__list()
    {

        if (isset($_POST[ 'action2' ])) {

            $onidb = new ZBADB('question');

            if (sanitize_text_field($_POST[ 'action2' ]) == 'delete') {

                foreach ($_POST[ 'zba_row' ] as $row) {

                    $onidb->delete(
                        [
                            'id' => intval($row),
                         ]
                    );

                }

                wp_admin_notice(
                    'سوال های انتخابی حدف شدند',
                    [
                        'id'                 => 'zba_message',
                        'type'               => 'success',
                        'additional_classes' => [ '' ],
                        'dismissible'        => true,
                     ]
                );

            }

        }

        if (isset($_POST[ 's' ])) {
            $redirect = '';
            if (! empty($_POST[ 's' ])) {
                $redirect = '&s=' . $_POST[ 's' ];
            }

            wp_redirect(admin_url('admin.php?page=oni' . $redirect));
        }

        if (isset($_POST[ 'zba_act' ]) && $_POST[ 'zba_act' ] == 'zba__submit_question' && isset($_GET[ 'update_item' ]) && absint($_GET[ 'update_item' ])) {

            if (wp_verify_nonce($_POST[ '_wpnonce' ], 'zba_nonce' . get_current_user_id())) {

                $error = false;

                if (empty($_POST[ 'question' ])) {
                    $error = true;

                    wp_admin_notice(
                        'سوال مسابقه را وارد کنید',
                        [
                            'id'          => 'zba_message_question',
                            'type'        => 'error',
                            'dismissible' => true,
                         ]
                    );
                }

                if (empty($_POST[ 'option1' ])) {
                    $error = true;

                    wp_admin_notice(
                        'گزینه اول را وارد نکردید',
                        [
                            'id'          => 'zba_message_option1',
                            'type'        => 'error',
                            'dismissible' => true,
                         ]
                    );
                }

                if (empty($_POST[ 'option2' ])) {
                    $error = true;

                    wp_admin_notice(
                        'گزینه دوم را وارد نکردید',
                        [
                            'id'          => 'zba_message_option2',
                            'type'        => 'error',
                            'dismissible' => true,
                         ]
                    );
                }

                if (empty($_POST[ 'option3' ])) {
                    $error = true;

                    wp_admin_notice(
                        'گزینه سوم را وارد نکردید',
                        [
                            'id'          => 'zba_message_option3',
                            'type'        => 'error',
                            'dismissible' => true,
                         ]
                    );
                }

                if (empty($_POST[ 'option4' ])) {
                    $error = true;

                    wp_admin_notice(
                        'گزینه چهارم را وارد نکردید',
                        [
                            'id'          => 'zba_message_option4',
                            'type'        => 'error',
                            'dismissible' => true,
                         ]
                    );
                }

                if (! absint($_POST[ 'answer' ])) {

                    $error = true;

                    wp_admin_notice(
                        'پاسخ درست را وارد نکردید',
                        [
                            'id'          => 'zba_message_answer',
                            'type'        => 'error',
                            'dismissible' => true,
                         ]
                    );
                }

                if (! $error) {

                    $onidb = new ZBADB('question');

                    $unsert_num = $onidb->update([
                        'question' => sanitize_textarea_field($_POST[ 'question' ]),
                        'option1'  => sanitize_text_field($_POST[ 'option1' ]),
                        'option2'  => sanitize_text_field($_POST[ 'option2' ]),
                        'option3'  => sanitize_text_field($_POST[ 'option3' ]),
                        'option4'  => sanitize_text_field($_POST[ 'option4' ]),
                        'answer'   => (isset($_POST[ 'answer' ])) ? absint($_POST[ 'answer' ]) : 0,
                     ],
                        [
                            'id' => absint($_GET[ 'update_item' ]),

                         ]
                    );

                    if ($unsert_num) {

                        wp_admin_notice(
                            'سوال با موفقیت ویرایش شد',
                            [
                                'id'                 => 'zba_message',
                                'type'               => 'success',
                                'additional_classes' => [ '' ],
                                'dismissible'        => true,
                             ]
                        );

                    } else {
                        wp_admin_notice(
                            'ویرایش سوال به مشکل خورده دوباره تلاش کنید',
                            [
                                'id'          => 'zba_message',
                                'type'        => 'error',
                                'dismissible' => true,
                             ]
                        );

                    }

                } else {

                    $GLOBALS[ 'ayeh' ] = [
                        'question' => sanitize_textarea_field($_POST[ 'question' ]),
                        'option1'  => sanitize_text_field($_POST[ 'option1' ]),
                        'option2'  => sanitize_text_field($_POST[ 'option2' ]),
                        'option3'  => sanitize_text_field($_POST[ 'option3' ]),
                        'option4'  => sanitize_text_field($_POST[ 'option4' ]),
                        'answer'   => (isset($_POST[ 'answer' ])) ? absint($_POST[ 'answer' ]) : 0,
                     ];
                }

            } else {
                wp_admin_notice(
                    'ذخیره سازی به مشکل خورده دوباره تلاش کنید',
                    [
                        'id'                 => 'zba_message',
                        'type'               => 'error',
                        'additional_classes' => [ '' ],
                        'dismissible'        => true,
                     ]
                );

            }

        }

    }

    function zba__add_file()
    {

        if (isset($_POST[ 'zba_act' ]) && $_POST[ 'zba_act' ] == "zba__import") {

            if (wp_verify_nonce($_POST[ '_wpnonce' ], 'zba_nonce' . get_current_user_id())) {

                require_once ZBA_INCLUDES . 'import-file.php';

                if ($count_row) {
                    wp_admin_notice(
                        "تعداد $count_row سوال از اکسل فراخوانی شد.",
                        [
                            'id'          => 'zba_message',
                            'type'        => 'success',
                            'dismissible' => true,
                         ]
                    );
                } else {
                    wp_admin_notice(
                        'استخراج به مشکل خورده لطفا اکسل رو بررسی کنید و دوباره امتحان کنید',
                        [
                            'id'                 => 'zba_message',
                            'type'               => 'error',
                            'additional_classes' => [ '' ],
                            'dismissible'        => true,
                         ]
                    );
                }

            }
        }
    }

}
