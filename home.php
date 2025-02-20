<?php get_header(); ?>


<div class="zba-row mx-auto my-3">
    <div class="d-flex flex-column flex-md-row gap-3 justify-content-around align-items-center text-white">
        <div class="col-12 col-md-4 rounded-3 position-relative  overflow-hidden" style="background-color: #FFCE5B;">
            <div
                class=" d-flex flex-row gap-2 justify-content-around align-items-center  w-100 py-3 z-3 position-relative">

                <div class="">
                    <img class="w-100" style="height: 115px;" src="<?php echo zba_image('tabestan.png') ?>">

                </div>
                <div class="py-4">
                    <h3 class="fw-900">آیات تابستانه</h3>
                    <p class="f-17px"><?php echo zba_to_persian('10 فراز قرآنی متناسب با مناسبت های تابستان')?></p>
                    <a href="#" style="background-color: #FFA200;"
                        class="btn btn-warning rounded-bottom-2 text-white">توضیحات بیشتر</a>

                </div>
            </div>
            <img class="position-absolute head-cart" src="<?php echo zba_image('tabestan1.png') ?>">
        </div>

        <div class="col-12 col-md-4 rounded-3 position-relative  overflow-hidden" style="background-color: #DBBBE8;">
            <div
                class=" d-flex flex-row gap-2 justify-content-around align-items-center  w-100 py-3 z-3 position-relative">
                <div class="">
                    <img class="w-100" style="height: 115px;" src="<?php echo zba_image('student.png') ?>">
                </div>
                <div class="py-4">
                    <h3 class="fw-900">گام اول برای
                        دانش آموزان ابتدایی</h3>
                    <p class="f-17px"><?php echo zba_to_persian('10 فراز قرآنی متناسب با مناسبت های تابستان')?></p>
                    <a href="#" style="background-color: #FFA200;"
                        class="btn btn-warning rounded-bottom-2 text-white">توضیحات بیشتر</a>
                </div>
            </div>
            <img class="position-absolute head-cart" src="<?php echo zba_image('student1.png') ?>">
        </div>

        <div class="col-12 col-md-4 rounded-3 position-relative  overflow-hidden" style="background-color: #77D4D6;">
            <div
                class=" d-flex flex-row gap-2 justify-content-around align-items-center  w-100 py-3 z-3 position-relative">
                <div class="">
                    <img class="w-100" style="height: 115px;" src="<?php echo zba_image('keramat.png') ?>">
                </div>
                <div class="py-4">
                    <h3 class="fw-900">آیات کرامت</h3>
                    <p class="f-17px"><?php echo zba_to_persian('حفظ و فهم 7 فراز متناسب با دهه کرامت')?></p>
                    <a href="#" style="background-color: #FFA200;"
                        class="btn btn-warning rounded-bottom-2 text-white">توضیحات بیشتر</a>
                </div>
            </div>
            <img class="position-absolute head-cart" src="<?php echo zba_image('keramat1.png') ?>">
        </div>

    </div>

</div>




<?php get_footer();