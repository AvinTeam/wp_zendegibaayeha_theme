<div id="sound_list">
    <?php foreach ($ayeh_sound_list as $sound):

            $new_sound = explode('|==|', $sound);

        ?>

    <div class="zba-row-meta-box w-100">
        <textarea class="" style="opacity: 0; width: 0px; height: 0px;  " type="hidden"
            name="ayeh[sound][]"><?php echo $sound ?></textarea>
        <div class="w-100">
            <p class="w-100"><?php echo $new_sound[ 0 ] ?></p>
            <a class="button w-100" href="<?php echo $new_sound[ 1 ] ?>"><?php echo $new_sound[ 1 ] ?></a>
        </div>
        <audio controls preload="auto">
            <source id="zba-source-sound" src="<?php echo $new_sound[ 1 ] ?>" type="audio/mpeg">
            مرورگر شما از تگ audio پشتیبانی نمی‌کند.
        </audio>
        <button type="button" class="button button-error zba_btn_remove">حذف</button>
    </div>
    <?php endforeach; ?>

</div>
<div class="zba-row-meta-box w-100">
    <input class=" w-100" id="zba-add-sound-title" placeholder="قاری">
    <input class=" w-100 d-ltr" id="zba-add-sound-url" placeholder="لینک">

    <button type="button" id="zba-add-sound" class="button button-success ">افزودن</button>
</div>

