<div id="video_list">
    <?php foreach ($ayeh_video_list as $video):

            $new_video = explode('|==|', $video);

           $image_url = absint($new_video[ 2 ]) ? wp_get_attachment_url(absint($new_video[ 2 ])): '';

        ?>

    <div class="zba-row-meta-box w-100">
        <textarea class="" style="opacity: 0; width: 0px; height: 0px;  " type="hidden"
            name="ayeh[video][]"><?php echo $video ?></textarea>
        <div class="w-100">
            <p class="w-100"><?php echo $new_video[ 0 ] ?></p>
            <a class="button w-100" href="<?php echo $new_video[ 1 ] ?>"><?php echo $new_video[ 1 ] ?></a>
        </div>
        <video controls preload="auto" poster="<?php echo $image_url ?>">
            <source src="<?php echo $new_video[ 1 ] ?>" type="video/mp4">
            مرورگر شما از تگ video پشتیبانی نمی‌کند.
        </video>
        <button type="button" class="button button-error zba_btn_remove">حذف</button>
    </div>


    <?php endforeach; ?>

</div>
<div class="zba-row-meta-box w-100">
    <div class="zba-column-center w-100">
        <input class=" w-100" id="zba-add-video-title" placeholder="عنوان">
        <input class=" w-100 d-ltr" id="zba-add-video-url" placeholder="لینک">
    </div>

    <div class="field-image zba-row-meta-box w-100">
        <span class="zba-add-image-preview">
            <img id="zba-video-image" src="" style="width: auto; height: 100px; display: none;" />
        </span>
        <div class="zba-column-center">تصویر کاور<br>
            <button type="button" class="button button-secondary upload-menu-image">انتخاب
                تصویر</button>
            <button type="button" class="button button-secondary remove-menu-image">حذف
                تصویر</button>

            <input type="hidden" id="zba-add-image-id" />
        </div>

    </div>


    <button type="button" id="zba-add-video" class="button button-success ">افزودن</button>

</div>