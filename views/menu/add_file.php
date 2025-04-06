<?php
    (defined('ABSPATH')) || exit;
    global $title;

?>

<div id="wpbody-content">
    <div class="wrap zba_menu">
        <h1><?php echo esc_html($title) ?></h1>


        <hr class="wp-header-end">

        <form method="post" action="" novalidate="novalidate" enctype="multipart/form-data">
            <?php wp_nonce_field('zba_nonce' . get_current_user_id()); ?>

            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row"><label for="excel_file">فایل اکسل</label></th>
                        <td><input type="file" name="excel_file" id="excel_file" accept=".xlsx, .xls" required> </td>
                    </tr>
                </tbody>
            </table>


            <p class="submit">
                <button type="submit" name="zba_act" value="zba__import" id="submit"
                    class="button button-primary">ثبت برنده ها</button>
            </p>
        </form>

    </div>


    <div class="clear"></div>
</div>