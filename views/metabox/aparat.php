<?php

    if (! defined('ABSPATH')) {
        exit;
}?>

<style>
.zba_aparat_meta_box {
    display: flex;
    justify-content: space-between;
    align-items: center;

}


.h_iframe-aparat_embed_frame {
  position: relative;
  width: 200px;
  margin-top: 5px;
  margin-right: 5px;
  min-height: 100px;
}

.h_iframe-aparat_embed_frame .ratio {
  display: block;
  width: 100%;
  height: auto;
}

.h_iframe-aparat_embed_frame iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 10px;
}


</style>
<div class="zba_aparat_meta_box">
    <div class="">

        <input name="zba_aparat" type="text" class="regular-text" id="zba_aparat"
            value="<?php echo esc_html($zba_aparat) ?>" style="direction: ltr;">
    </div>

    <div class="">
        <?php if (! empty($zba_aparat)): ?>
        <div class="h_iframe-aparat_embed_frame"><span style="display: block;padding-top: 57%"></span>
            <div id="zba_iframe">
                <iframe
                    src="https://www.aparat.com/video/video/embed/videohash/<?php echo esc_html(linktocode($zba_aparat)) ?>/vt/frame"
                    allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true">
                </iframe>
            </div>

        </div>
        <?php endif; ?>
    </div>
</div>