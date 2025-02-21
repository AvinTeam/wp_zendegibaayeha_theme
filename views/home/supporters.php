<div class="supporters text-primary text-center d-flex flex-column justify-content-around align-items-center pt-3">
    <div>
        <h2 class="fw-900 f-28px">حامیان پویش</h2>
        <p class="f-21px">فیلم ، عکس و صوت های مربوط به پویش زندگی با آیه ها</p>
    </div>

    <div class="swiper supportersSwiper w-100 zba-row mx-auto" style="padding-bottom: 70px;">
        <div class="swiper-wrapper">
            <?php

                $array = glob(ZBA_PATH . 'assets/image/supporters/*');

                foreach ($array as $x) {

                    $next = explode('/', $x);

                if (! end($next)) {continue;}?>

            <div class="swiper-slide">
                <img src="<?php echo zba_image('supporters/' . end($next)) ?>" class="card-img-top rounded shadow">
            </div>

            <?php }
            ?>
        </div>
        <div class=" swiper-pagination"></div>
    </div>


</div>