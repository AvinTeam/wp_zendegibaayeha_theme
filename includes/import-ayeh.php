<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

// بررسی آپلود فایل
if (isset($_FILES[ 'cat_ayeh_file' ]) && !empty($_FILES['cat_ayeh_file']['name']) && $_FILES[ 'cat_ayeh_file' ][ 'error' ] === UPLOAD_ERR_OK) {


    $fileTmpPath   = $_FILES[ 'cat_ayeh_file' ][ 'tmp_name' ];
    $fileName      = $_FILES[ 'cat_ayeh_file' ][ 'name' ];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // بررسی فرمت فایل
    $allowedExtensions = [ 'xls', 'xlsx' ];
    if (! in_array($fileExtension, $allowedExtensions)) {
        die("فرمت فایل پشتیبانی نمی‌شود. لطفاً یک فایل اکسل انتخاب کنید.");
    }

    $args = [
        'post_type'      => 'content_ayeh', // نوع پست سفارشی شما
        'posts_per_page' => -1,             // دریافت همه پست‌ها
        'fields'         => 'ids',          // فقط IDها را برگردان
        'tax_query'      => [
            [
                'taxonomy' => 'cat_ayeh',
                'field'    => 'term_id',
                'terms'    => $term_id,
             ],
         ],
     ];

    $post_ids = get_posts($args);

    try {
        // خواندن فایل اکسل
        $spreadsheet = IOFactory::load($fileTmpPath);
        $sheet       = $spreadsheet->getActiveSheet();          // شیت فعال
        $data        = $sheet->toArray(null, true, true, true); // تبدیل به آرایه

        $m = 0;
        foreach ($data as $rowIndex => $row) {

            if ($rowIndex === 1) {continue;}

            if (isset($post_ids[ $m ])) {

                $post_id = $post_ids[ $m ];

                $title    = get_the_title($post_id);
                $ayeh     = get_post_meta($post_id, '_ayeh_ayeh', true);
                $tarjomeh = get_post_meta($post_id, '_ayeh_tarjomeh', true);
                $address  = get_post_meta($post_id, '_ayeh_address', true);

                if (
                    trim($title) == trim($row[ 'A' ])
                    &&
                    trim($ayeh) == trim($row[ 'B' ])
                    &&
                    trim($tarjomeh) == trim($row[ 'C' ])
                    &&
                    trim($address) == trim($row[ 'D' ])

                ) {continue;}

                $updated_post = [
                    'ID'         => $post_ids[ $m ],
                    'post_title' => trim($row[ 'A' ]),
                 ];

                // اعمال تغییرات
                wp_update_post($updated_post);

            } else {
                $post_data = [
                    'post_title'  => trim($row[ 'A' ]),
                    'post_type'   => 'content_ayeh',
                    'post_status' => 'publish',
                    'post_author' => get_current_user_id(),
                 ];
                $post_id = wp_insert_post($post_data);

            }

            if (! is_wp_error($post_id)) {
                update_post_meta($post_id, '_ayeh_ayeh', trim($row[ 'B' ]));
                update_post_meta($post_id, '_ayeh_tarjomeh', trim($row[ 'C' ]));
                update_post_meta($post_id, '_ayeh_address', trim($row[ 'D' ]));

                update_post_meta($post_id, '_ayeh_sound_list', [  ]);
                update_post_meta($post_id, '_ayeh_video_list', [  ]);

                update_post_meta($post_id, '_vote_ayeh', 0);

                $category = get_term($term_id, 'cat_ayeh');

                if ($category && ! is_wp_error($category)) {
                    $categories_to_add = [ $term_id ];

                    if ($category->parent) {
                        $categories_to_add[  ] = $category->parent;
                    }

                    wp_set_post_terms($post_id, $categories_to_add, 'cat_ayeh');

                }
            }
            $m++;
        }

        for ($i = $m; $i < sizeof($post_ids) + 2; $i++) {

            if (isset($post_ids[ $i ])) {

                wp_delete_post($post_ids[ $i ], true);

            }

        }

    } catch (Exception $e) {
        die("خطا در خواندن فایل اکسل: " . $e->getMessage());
    }
}