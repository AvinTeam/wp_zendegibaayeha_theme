<?php (defined('ABSPATH')) || exit; ?>
<div class="zba_slider text-primary d-flex flex-column justify-content-around align-items-center">
    <div class="swiper sliderSwiper0 w-100">
        <div class="swiper-wrapper p-0">

            <div class="swiper-slide">
                <div id="slider-app"
                    class="position-relative d-flex flex-row justify-content-center align-items-center">
                    <div class="col-5 d-none d-lg-block"></div>
                    <div class="col-12 col-lg-4  p-3">
                        <h2 class="f-40px fw-900">اپلیکیشن زندگی با آیه ها</h2>
                        <span>اینجا میخوایم 110 آیه را بخوانیم، حفظ و زندگی کنیم همراه با هدایای مادی و معنویی</span>
                        <br>
                        <span>(حج عمره، عتبات، مشهد مقدس و هزاران هدیه دیگر)</span>
                        <div class="mt-3">
                            <a href="https://app.ayeh.net/" class="btn btn-warning text-white mx-1"
                                style="background-color: #FFA200; ">توضیحات
                                بیشتر</a>
                            <a href="#" class="btn btn-success text-white mx-1" style="background-color: #73C259;"
                                data-bs-toggle="modal" data-bs-target="#download_app">دانلود</a>
                        </div>
                    </div>

                    <div class="col-3 d-none d-lg-block">

                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div> -->
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="download_app" tabindex="-1" aria-labelledby="download_appLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="download_appLabel">دانلود</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <!-- تب‌های بالای صفحه -->
                <ul class="nav nav-tabs" id="appTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="android-tab" data-bs-toggle="tab" data-bs-target="#android"
                            type="button" role="tab" aria-controls="android" aria-selected="true">
                            <i class="bi bi-android2"></i>
                            <span class="tab-text mx-1">Android</span> <!-- متن برند -->
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="ios-tab" data-bs-toggle="tab" data-bs-target="#ios" type="button"
                            role="tab" aria-controls="ios" aria-selected="false">
                            <i class="bi bi-apple"></i>
                            <span class="tab-text mx-1">iOS</span> <!-- متن برند -->
                        </button>
                    </li>
                </ul>
                <!-- محتوای تب‌ها -->
                <div class="tab-content mt-3" id="appTabsContent">
                    <div class="tab-pane fade show active" id="android" role="tabpanel" aria-labelledby="android-tab">

                        <div class=" row row-cols-1 row-cols-lg-2">
                            <!-- <a href="<?php echo get_option('android_link') ?>" target="_blank" class="col p-1"> -->
                            <a href="https://zendegibaayeha.ir/app/zba.apk" target="_blank" class="col p-1">
                                <div class="w-100 d-flex flex-row align-items-center bg-white rounded-4 shadow py-2  ">
                                    <span class=" w-75 text-center text-primary f-17px fw-900">لینک مستقیم</span>
                                    <div class="w-25 text-center"><img loading="lazy" class="download-icon"
                                            src="<?php echo zba_image('download.svg') ?>">
                                    </div>
                                </div>
                            </a>

                            <a href="https://app.ayeh.net/" target="_blank" class="col p-1">
                                <div class="w-100 d-flex flex-row align-items-center bg-white rounded-4 shadow py-2  ">
                                    <span class=" w-75 text-center text-primary f-17px fw-900">وب اپلیکیشن</span>
                                    <div class="w-25 text-center"><img loading="lazy" class="download-icon"
                                            src="<?php echo zba_image('download-pwa.svg') ?>">
                                    </div>
                                </div>
                            </a>


                            <a href="https://cafebazaar.ir/app/com.zendegi_ba_ayeha" target="_blank" class="col p-1">
                                <div class="w-100 d-flex flex-row align-items-center bg-white rounded-4 shadow py-2  ">
                                    <span class=" w-75 text-center text-primary f-17px fw-900">کافه بازار</span>
                                    <div class="w-25 text-center"><img loading="lazy" class="download-icon"
                                            src="<?php echo zba_image('download-cafebazaar.svg') ?>">
                                    </div>
                                </div>
                            </a>

                            <a href="https://myket.ir/app/com.zendegi_ba_ayeha" target="_blank" class="col p-1">
                                <div class="w-100 d-flex flex-row align-items-center bg-white rounded-4 shadow py-2  ">
                                    <span class=" w-75 text-center text-primary f-17px fw-900">مایکت</span>
                                    <div class="w-25 text-center"><img loading="lazy" class="download-icon"
                                            src="<?php echo zba_image('download-myket.svg') ?>">
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="ios" role="tabpanel" aria-labelledby="ios-tab">

                        <div class=" row row-cols-1 row-cols-lg-2">

                            <a href="https://app.ayeh.net/" target="_blank" class="col p-1">
                                <div class="w-100 d-flex flex-row align-items-center bg-white rounded-4 shadow py-2  ">
                                    <span class=" w-75 text-center text-primary f-17px fw-900">وب اپلیکیشن</span>
                                    <div class="w-25 text-center"><img loading="lazy" class="download-icon"
                                            src="<?php echo zba_image('download-pwa.svg') ?>">
                                    </div>
                                </div>
                            </a>
<!-- 
                            <a href="#" target="_blank" class="col p-1">
                                <div class="w-100 d-flex flex-row align-items-center bg-white rounded-4 shadow py-2  ">
                                    <span class=" w-75 text-center text-primary f-17px fw-900">سیب اپ</span>
                                    <div class="w-25 text-center"><img loading="lazy" class="download-icon"
                                            src="<?php echo zba_image('download-sibapp.svg') ?>">
                                    </div>
                                </div>
                            </a>

                            <a href="#" target="_blank" class="col p-1">
                                <div class="w-100 d-flex flex-row align-items-center bg-white rounded-4 shadow py-2  ">
                                    <span class=" w-75 text-center text-primary f-17px fw-900">انار دونی</span>
                                    <div class="w-25 text-center"><img loading="lazy" class="download-icon"
                                            src="<?php echo zba_image('download-anardoni.svg') ?>">
                                    </div>
                                </div>
                            </a>

                            <a href="#" target="_blank" class="col p-1">
                                <div class="w-100 d-flex flex-row align-items-center bg-white rounded-4 shadow py-2  ">
                                    <span class=" w-75 text-center text-primary f-17px fw-900">سیبچه</span>
                                    <div class="w-25 text-center"><img loading="lazy" class="download-icon"
                                            src="<?php echo zba_image('download-sibche.svg') ?>">
                                    </div>
                                </div>
                            </a>

                            <a href="#" target="_blank" class="col p-1">
                                <div class="w-100 d-flex flex-row align-items-center bg-white rounded-4 shadow py-2  ">
                                    <span class=" w-75 text-center text-primary f-17px fw-900">آی‌اپس</span>
                                    <div class="w-25 text-center"><img loading="lazy" class="download-icon"
                                            src="<?php echo zba_image('download-iapps.svg') ?>">
                                    </div>
                                </div>
                            </a>

                            <a href="#" target="_blank" class="col p-1">
                                <div class="w-100 d-flex flex-row align-items-center bg-white rounded-4 shadow py-2  ">
                                    <span class=" w-75 text-center text-primary f-17px fw-900">اپ‌استار</span>
                                    <div class="w-25 text-center"><img loading="lazy" class="download-icon"
                                            src="<?php echo zba_image('download-app-star.svg') ?>">
                                    </div>
                                </div>
                            </a>

                            <a href="#" target="_blank" class="col p-1">
                                <div class="w-100 d-flex flex-row align-items-center bg-white rounded-4 shadow py-2  ">
                                    <span class=" w-75 text-center text-primary f-17px fw-900">سیب‌ایرانی</span>
                                    <div class="w-25 text-center"><img loading="lazy" class="download-icon"
                                            src="<?php echo zba_image('download-sibirani.svg') ?>">
                                    </div>
                                </div>
                            </a> -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>