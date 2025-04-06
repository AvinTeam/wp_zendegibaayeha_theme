<?php

    use zbaclass\List_Table;
    use zbaclass\ZBADB;
    use zbaclass\ZBAOption;

    (defined('ABSPATH')) || exit;

    add_action('admin_menu', 'zba_admin_menu');

    /**
     * Fires before the administration menu loads in the admin.
     *
     * @param string $context Empty context.
     */
    function zba_admin_menu(string $context): void
    {

        $list_suffix = add_menu_page(
            'لیست برندگان',
            'لیست برندگان',
            'manage_options',
            'winners',
            'winners_excel',
            'dashicons-smiley',
            2
        );


        function winners_excel()
        {
            require_once ZBA_VIEWS . 'menu/add_file.php';

        }

        add_action('load-' . $list_suffix, 'zba__winners');

        function zba__winners()
        {

            if (isset($_POST[ 'zba_act' ]) && $_POST[ 'zba_act' ] == "zba__import") {

                if (wp_verify_nonce($_POST[ '_wpnonce' ], 'zba_nonce' . get_current_user_id())) {

                    require_once ZBA_INCLUDES . 'import-winners-menu.php';

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

            if (isset($_GET[ 'mrclockid' ])) {

                $mr_times = get_option('mr_add_clock');

                unset($mr_times[ $_GET[ 'mrclockid' ] ]);

                update_option('mr_add_clock', $mr_times);

            }

            if (isset($_POST[ 'act' ]) && $_POST[ 'act' ] == 'add' && $_POST[ 'mrdata' ] != '' && $_POST[ 'mrtime' ] != 'add') {

                $datetime = tarikh($_POST[ 'mrdata' ]) . ' ' . $_POST[ 'mrtime' ];

                $timeid = strtotime($datetime);

                $newtime = [
                    'ID'   => $timeid,
                    'date' => $_POST[ 'mrdata' ],
                    'time' => $_POST[ 'mrtime' ],
                 ];

                $mr_times            = get_option('mr_add_clock');
                $mr_times            = (is_array($mr_times)) ? $mr_times : [  ];
                $mr_times[ $timeid ] = $newtime;

                foreach ($mr_times as $key => $value) {

                    if (intval($key) + ZBA_TIME_STAMP < time()) {

                        unset($mr_times[ $key ]);
                    }

                }

                ksort($mr_times);

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

            if (isset($_POST[ 'act' ]) && $_POST[ 'act' ] == 'mr_setting') {
                time_update_option($_POST);

            }
            $clock_mr_setting = mr_time_start_working();

            include_once ZBA_VIEWS . 'menu_setting.php';

        }

    }

    // اضافه کردن منوی تنظیمات برای تصویر پیش‌فرض
    function default_featured_image_menu()
    {
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
    //add_action('admin_menu', 'default_featured_image_menu');

    // نمایش صفحه تنظیمات
    function default_featured_image_settings_page()
    {
        // بررسی دسترسی کاربر
        if (! current_user_can('manage_options')) {
            return;
        }

        // ذخیره تنظیمات
        if (isset($_POST[ 'submit' ]) && isset($_FILES[ 'default_featured_image' ])) {
            $uploaded_image_id = media_handle_upload('default_featured_image', 0);
            if (! is_wp_error($uploaded_image_id)) {
                update_option('default_featured_image_id', $uploaded_image_id);
            }
        }

        // گرفتن آیدی و URL تصویر پیش‌فرض
        $default_image_id  = get_option('default_featured_image_id', 0);
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
                    <img loading="lazy" src="<?php echo esc_url($default_image_url); ?>" alt="تصویر پیش‌فرض"
                        style="max-width: 300px; display: block; margin-bottom: 10px;">
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