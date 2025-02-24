<?php

    if (! defined('ABSPATH')) {
        exit;
}?>
<script>
document.getElementById("post").enctype = "multipart/form-data";
</script>
<p>اکسل آیه ها</p>
<div >
    <input name="zba_exel_ayeh" type="file" style="direction: ltr;" accept=".xlsx, .xls">
</div>


<p>اکسل برنده ها</p>
<div>
    <input name="zba_row_title" type="text" placeholder="عنوان سطر" class="regular-text">
    <input name="zba_exel_ayeh" type="file" style="direction: ltr;" accept=".xlsx, .xls">
</div>