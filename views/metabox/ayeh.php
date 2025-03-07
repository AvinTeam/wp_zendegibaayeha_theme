<?php

    if (! defined('ABSPATH')) {
        exit;
}?>
<script>
document.getElementById("post").enctype = "multipart/form-data";
</script>
<!-- <h3>اکسل آیه ها</h3>
<div>
    <input name="zba_exel_ayeh" type="file" style="direction: ltr;" accept=".xlsx, .xls">
</div>
<hr>
<p>یا</p>
<hr> -->
<h3>اکسل برنده ها</h3>
<div>
    <input name="zba_row_title" type="text" placeholder="عنوان سطر" class="regular-text">
    <br>
    <input name="zba_exel_winners" type="file" style="direction: ltr;" accept=".xlsx, .xls">
</div>