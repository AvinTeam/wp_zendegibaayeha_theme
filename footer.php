
<footer>
    <div class="top-footer pt-5">
        <div
            class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center zba-row mx-auto py-2 py-md-5">
            <img style="height: 150px;" src="<?php echo zba_image('logo.png') ?>">
            <div class="w-50"></div>
            <div class="text-center  text-md-start" >
                <p class="f-17px">پویش ملی تبیین و حفظ ۵۰ فراز زندگی ساز قرآن کریم</p>
                <p style="font-size:15px">مسابقات روزانه در ماه مبارک رمضان برای نوجوانان و بزرگسالان همراه با جوایز
                    متنوع از جمله سفر حج عمره، کربلای معلی، مشهد مقدس و ...</p>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div
            class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center zba-row mx-auto py-3 gap-2 gap-md-0 text-center">
            <div >
                 <a class="mx-2" target="_blank" href="https://eitaa.com/joinchat/2527134304Ccdba67771f"><img src="<?php echo zba_image('eitaa.png')?>" alt="ایتا"></a>
                 <a class="mx-2" target="_blank" href="https://ble.ir/join/BBTz8iGZLf"><img src="<?php echo zba_image('bale.png')?>" alt="بله"></a>
                 <a class="mx-2" target="_blank" href="https://rubika.ir/zendegibaayeha"><img src="<?php echo zba_image('rubika.png')?>" alt="روبیکا"></a>
            </div>
            <div>Copyright © 2023 Zendegi ba ayeha. All rights reserved.</div>
        </div>
    </div>
</footer>

<!-- مودال جستجو -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="searchModalLabel">جست و جو</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
      </div>
      <div class="modal-body">
        <!-- فرم جستجو -->
        <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
          <div class="mb-3">
            <input type="text" name="s" class="form-control" id="s" placeholder="متن جستجو" value="<?php echo get_search_query(); ?>">
          </div>
          <!-- تعیین نوع پست به عنوان تنها نوع جستجو -->
          <input type="hidden" name="post_type" value="post">
          <button type="submit" class="btn btn-primary">جست و جو</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- لودر تمام صفحه -->
<div class="overlay" id="overlay">
    <div class="loader"></div>
</div>

<?php wp_footer()?>
</body>

</html>