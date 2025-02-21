<?php get_header(); ?>

<style>
body {
    background-color: red;
}
</style>



<div style="height: 600px;">
    <div class="zba-row mx-auto bg-white rounded-4 text-primary text-center py-5 d-flex flex-column justify-content-around  gap-2 ">
        <div>
            <h2 class="fw-900 f-28px">جوایز و برندگان </h2>
            <p class="f-21px" style="color: #C7CEE2;">فیلم ، عکس و صوت های مربوط به پویش زندگی با آیه ها</p>
        </div>
        <div class="swiper giftSwiper w-100 zba-row mx-auto" style="padding-bottom: 70px;">
            <div class="swiper-wrapper f-21px" style="color: #9BA1B2;">

                <div class="swiper-slide">
                    <img src="<?php echo zba_image('gift/haj.png') ?>" class="card-img-top rounded shadow">
                    <p>حج عمره</p>
                </div>

                <div class="swiper-slide">
                    <img src="<?php echo zba_image('gift/karbala.png') ?>" class="card-img-top rounded shadow">
                    <p>کربلای معلی</p>
                </div>

                <div class="swiper-slide">
                    <img src="<?php echo zba_image('gift/mashhad.png') ?>" class="card-img-top rounded shadow">
                    <p>مشهد مقدس</p>
                </div>

                <div class="swiper-slide">
                    <img src="<?php echo zba_image('gift/laptop.png') ?>" class="card-img-top rounded shadow">
                    <p>لپ تاب</p>
                </div>

                <div class="swiper-slide">
                    <img src="<?php echo zba_image('gift/tablet.png') ?>" class="card-img-top rounded shadow">
                    <p>تبلت</p>
                </div>

                <div class="swiper-slide">
                    <img src="<?php echo zba_image('gift/earpad.png') ?>" class="card-img-top rounded shadow">
                    <p>ایرپاد</p>
                </div>
            </div>
            <div class=" swiper-pagination"></div>
        </div>


    </div>
</div>














<?php get_footer();