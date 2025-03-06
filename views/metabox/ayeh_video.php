<div id="video_list">
    <?php foreach ($ayeh_video_list as $video):

            $new_video = explode('|==|', $video);

        ?>

    <div class="zba-row-meta-box w-100">
        <textarea class="" style="opacity: 0; width: 0px; height: 0px;  " type="hidden"
            name="ayeh[video][]"><?php echo $video ?></textarea>
        <div class="w-100">
            <p class="w-100"><?php echo $new_video[0] ?></p>
            <a class="button w-100" href="<?php echo $new_video[1] ?>"><?php echo $new_video[1] ?></a>
        </div>
        <video controls preload="auto">
            <source src="<?php echo $new_video[1] ?>" type="video/mp4">
            مرورگر شما از تگ video پشتیبانی نمی‌کند.
        </video>
        <button type="button" class="button button-error zba_btn_remove">حذف</button>
    </div>


    <?php endforeach; ?>

</div>
<div class="zba-row-meta-box w-100">
    <input class=" w-100" id="zba-add-video-title" placeholder="عنوان">
    <input class=" w-100 d-ltr" id="zba-add-video-url" placeholder="لینک">

    <button type="button" id="zba-add-video" class="button button-success ">افزودن</button>
</div>



