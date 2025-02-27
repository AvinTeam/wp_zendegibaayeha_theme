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

add_action('admin_menu', 'mp_add_clock_menu');
function mp_add_clock_menu()
{
    add_menu_page(
        'ایجاد ساعت',
        'ایجاد ساعت',
        'manage_options',
        'mrrashidpour',
        'mr_add_clock_menu_view',
        'dashicons-clock',
        26
    );

    function mr_add_clock_menu_view()
    {

        // print_r($_POST);
        // exit;

        if (isset($_POST)) {
            foreach ($_POST as $key => $value) {
                $_POST[ $key ] = trim(sanitize_text_field($value));
            }

        }

        if (isset($_GET[ 'mrclockid' ])) {

            $mr_times = get_option('mr_add_clock');

            $m = 0;

            foreach ($mr_times as $row) {

                if ($_GET[ 'mrclockid' ] == $row[ 'ID' ]) {

                    unset($mr_times[ $m ]);
                }
                $m++;
            }

            sort($mr_times);

            update_option('mr_add_clock', $mr_times);

        }

        if (isset($_POST[ 'act' ]) && $_POST[ 'act' ] == 'add' && $_POST[ 'mrdata' ] != '' && $_POST[ 'mrtime' ] != 'add') {

            $timeid  = strtotime(tarikh($_POST[ 'mrdata' ]) . $_POST[ 'mrtime' ]);
            $newtime = [
                'ID'   => $timeid,
                'date' => $_POST[ 'mrdata' ],
                'time' => $_POST[ 'mrtime' ],
             ];

            $mr_times = get_option('mr_add_clock');

            if (is_array($mr_times)) {
                $error = 0;

                $m = 0;

                foreach ($mr_times as $row) {

                    $error = (in_array($timeid, $row)) ? 1 : 0;

                    if (time() - ZBA_TIME_STAMP > $row[ 'ID' ]) {

                        unset($mr_times[ $m ]);

                    }
                    $m++;

                }

                if ($error == 0 && time() <= $timeid) {
                    $mr_times[  ] = $newtime;
                }
            } else {
                $mr_times = [ $newtime ];
            }

            sort($mr_times);

            update_option('mr_add_clock', $mr_times);
        }

        include_once ZBA_VIEWS . 'clock_menu_view.php';
    }

    add_submenu_page(
        'mrrashidpour',
        'تنظیمات',
        'تنظیمات',
        'manage_options',
        'mrsetting',
        'mr_add_clock_setting_view'

    );

    function mr_add_clock_setting_view()
    {
        $clock_mr_setting = get_option('mr_setting_clock');

        if (isset($_POST)) {
            foreach ($_POST as $key => $value) {
                $_POST[ $key ] = trim(sanitize_text_field($value));
            }
        }

        if (isset($_POST[ 'act' ]) && $_POST[ 'act' ] == 'mr_setting') {

            $clock_mr_setting[ 'setting' ]    = (isset($_POST[ 'setting_start' ])) ? true : false;
            $clock_mr_setting[ 'setting_tv' ] = (isset($_POST[ 'setting_start_tv' ])) ? true : false;
            $clock_mr_setting[ 'clock_decs' ] = $_POST[ 'mrdecs' ];
            $clock_mr_setting[ 'timestamp' ]  = $_POST[ 'timestamp' ];

            update_option('mr_setting_clock', $clock_mr_setting);

        }

        $checked_mr_setting    = ($clock_mr_setting[ 'setting' ]) ? 'checked' : '';
        $checked_mr_setting_tv = ($clock_mr_setting[ 'setting_tv' ]) ? 'checked' : '';
        $clock_decs            = (isset($_POST[ 'mrdecs' ])) ? $_POST[ 'mrdecs' ] : $clock_mr_setting[ 'clock_decs' ];
        $timestamp             = (isset($_POST[ 'timestamp' ])) ? $_POST[ 'timestamp' ] : $clock_mr_setting[ 'timestamp' ];

        include_once ZBA_VIEWS . 'menu_setting.php';

    }



    

}


// اضافه کردن منوی تنظیمات برای تصویر پیش‌فرض
function default_featured_image_menu() {
    add_menu_page(
        'تنظیمات تصویر پیش‌فرض',
        'تصویر پیش‌فرض',
        'manage_options',
        'default-featured-image',
        'default_featured_image_settings_page',
        'dashicons-format-image',
        20
    );
}
add_action('admin_menu', 'default_featured_image_menu');

// نمایش صفحه تنظیمات
function default_featured_image_settings_page() {
    // بررسی دسترسی کاربر
    if (!current_user_can('manage_options')) {
        return;
    }

    // ذخیره تنظیمات
    if (isset($_POST['submit']) && isset($_FILES['default_featured_image'])) {
        $uploaded_image_id = media_handle_upload('default_featured_image', 0);
        if (!is_wp_error($uploaded_image_id)) {
            update_option('default_featured_image_id', $uploaded_image_id);
        }
    }

    // گرفتن آیدی و URL تصویر پیش‌فرض
    $default_image_id = get_option('default_featured_image_id', 0);
    $default_image_url = $default_image_id ? wp_get_attachment_url($default_image_id) : '';

    ?>
    <div class="wrap">
        <h1>تنظیمات تصویر پیش‌فرض</h1>
        <form method="post" enctype="multipart/form-data">
            <?php wp_nonce_field('default_featured_image', 'default_featured_image_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">تصویر پیش‌فرض</th>
                    <td>
                        <?php if ($default_image_url): ?>
                            <img src="<?php echo esc_url($default_image_url); ?>" alt="تصویر پیش‌فرض" style="max-width: 300px; display: block; margin-bottom: 10px;">
                        <?php endif; ?>
                        <input type="file" name="default_featured_image" />
                    </td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="ذخیره تغییرات">
            </p>
        </form>
    </div>
    <?php
}

