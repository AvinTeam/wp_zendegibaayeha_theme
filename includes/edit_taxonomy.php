<?php

    // افزودن فیلد آپلود فایل به فرم ویرایش/ایجاد دسته‌بندی
    //add_action('cat_ayeh_add_form_fields', 'add_cat_ayeh_file_field', 10, 2);
    add_action('cat_ayeh_edit_form_fields', 'add_cat_ayeh_file_field', 10, 2);

    function add_cat_ayeh_file_field($term)
{?>
<table class="form-table" role="presentation">
    <tbody>
        <tr class="form-field term-description-wrap">
            <th scope="row"><label for="description">آپلود فایل</label></th>
            <td><input type="file" id="cat_ayeh_file" name="cat_ayeh_file" accept=".xls,.xlsx,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"/>
            </td>
        </tr>
    </tbody>
</table>
<?php
    }

    // ذخیره فایل آپلود شده
    add_action('edited_cat_ayeh', 'save_cat_ayeh_file');

    function save_cat_ayeh_file($term_id)
    {
        require_once ZBA_INCLUDES . '/import-ayeh.php';

}