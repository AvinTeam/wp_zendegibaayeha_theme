
<footer>
    <div class="top-footer pt-5">
        <div
            class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center zba-row mx-auto py-2 py-md-5">
            <img loading="lazy" style="height: 150px;" src="<?php echo zba_image('logo-footer.png') ?>">
            <div class="w-50"></div>
            <div class="text-center  text-md-start" >
                <p class="f-17px">پویش ملی تبیین و حفظ 100 فراز زندگی ساز قرآن کریم</p>
                <p style="font-size:15px">مسابقات روزانه برای نوجوانان و بزرگسالان همراه با جوایز
                    متنوع از جمله سفر حج عمره، کربلای معلی، مشهد مقدس و ...</p>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div
            class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center zba-row mx-auto py-3 gap-2 gap-md-0 text-center">
            <div >
                 <a class="mx-2" target="_blank" href="https://eitaa.com/joinchat/2527134304Ccdba67771f"><img loading="lazy" src="<?php echo zba_image('eitaa.png') ?>" alt="ایتا"></a>
                 <a class="mx-2" target="_blank" href="https://ble.ir/join/BBTz8iGZLf"><img loading="lazy" src="<?php echo zba_image('bale.png') ?>" alt="بله"></a>
                 <a class="mx-2" target="_blank" href="https://rubika.ir/zendegibaayeha"><img loading="lazy" src="<?php echo zba_image('rubika.png') ?>" alt="روبیکا"></a>
                 <a class="mx-2" target="_blank" href="https://www.aparat.com/zendegibaayeha"><img loading="lazy" src="<?php echo zba_image('aparat.png') ?>" alt="آپارات"></a>
                 <a class="mx-2" target="_blank" href="http://www.youtube.com/@zendegibaayeha"><img loading="lazy" src="<?php echo zba_image('youtube.png') ?>" alt="یوتیوب"></a>
            </div>
            <div>Copyright © 2023 Zendegi ba ayeha. All rights reserved.</div>
        </div>
        <div class="w-100 text-center py-2"><a href="https://avinmedia.ir/" target="_blank" >طراحی و پشتیبانی: گروه هنری رسانه ای آوین</a></div>
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
<script type="text/javascript">;!(function(w,d) {'use strict';d.write('<div class="opacity-0 d-none" id="amarfa-stats-13367" style="display: inline-block height: 0px; width: 0px;  "></div>');d.write('<'+'sc'+'ript type="text/javasc'+'ri'+'pt" src="//amarfa.ir/stats/13367.js" async><'+'/'+'scri'+'pt>');})(this,document);</script>
<?php wp_footer()?>
</body>

</html>