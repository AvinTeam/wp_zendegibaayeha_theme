<?php get_header();

    require_once ZBA_VIEWS . 'home/slider.php';

    $clock_mr_setting = get_option('mr_setting_clock');

    $setting_group = ($clock_mr_setting[ 'setting' ]) ? 1 : 0;
    $setting_tv    = ($clock_mr_setting[ 'setting_tv' ]) ? 1 : 0;

?>







<div class="next-slider position-relative  overflow-hidden">
    <div class="zba-row mx-auto my-3 py-5">
        <div class="d-flex flex-column flex-lg-row gap-3 justify-content-around align-items-center text-white">
            <div class="col-12 col-lg-4 rounded-3 position-relative  overflow-hidden"
                style="background-color: #FFCE5B;">
                <div
                    class=" d-flex flex-row gap-2 justify-content-around align-items-center  w-100 py-3 z-3 position-relative">

                    <div class="">
                        <img class="w-100" style="height: 115px;" src="<?php echo zba_image('tabestan.png') ?>">

                    </div>
                    <div class="py-4">
                        <h3 class="fw-900">آیات تابستانه</h3>
                        <p class="f-17px">10 فراز قرآنی متناسب با مناسبت های تابستان</p>
                        <a href="#" style="background-color: #FFA200;"
                            class="btn btn-warning rounded-bottom-2 text-white">توضیحات بیشتر</a>

                    </div>
                </div>
                <img class="position-absolute head-cart" src="<?php echo zba_image('tabestan1.png') ?>">
            </div>

            <div class="col-12 col-lg-4 rounded-3 position-relative  overflow-hidden"
                style="background-color: #DBBBE8;">
                <div
                    class=" d-flex flex-row gap-2 justify-content-around align-items-center  w-100 py-3 z-3 position-relative">
                    <div class="">
                        <img class="w-100" style="height: 115px;" src="<?php echo zba_image('student.png') ?>">
                    </div>
                    <div class="py-4">
                        <h3 class="fw-900">گام اول برای
                            دانش آموزان ابتدایی</h3>
                        <p class="f-17px">10 فراز قرآنی متناسب با مناسبت های تابستان</p>
                        <a href="#" style="background-color: #FFA200;"
                            class="btn btn-warning rounded-bottom-2 text-white">توضیحات بیشتر</a>
                    </div>
                </div>
                <img class="position-absolute head-cart" src="<?php echo zba_image('student1.png') ?>">
            </div>

            <div class="col-12 col-lg-4 rounded-3 position-relative  overflow-hidden"
                style="background-color: #77D4D6;">
                <div
                    class=" d-flex flex-row gap-2 justify-content-around align-items-center  w-100 py-3 z-3 position-relative">
                    <div class="">
                        <img class="w-100" style="height: 115px;" src="<?php echo zba_image('keramat.png') ?>">
                    </div>
                    <div class="py-4">
                        <h3 class="fw-900">آیات کرامت</h3>
                        <p class="f-17px">حفظ و فهم 7 فراز متناسب با دهه کرامت</p>
                        <a href="#" style="background-color: #FFA200;"
                            class="btn btn-warning rounded-bottom-2 text-white">توضیحات بیشتر</a>
                    </div>
                </div>
                <img class="position-absolute head-cart" src="<?php echo zba_image('keramat1.png') ?>">
            </div>

        </div>

    </div>

    <div class="py-0 py-md-5 position-relative z-3">

        <div class="zba-row mx-auto d-flex flex-column flex-lg-row justify-content-between align-items-center">

            <div class="col-12 col-lg-6">
                <div class="d-flex flex-row justify-content-start align-items-center gap-2" style="height: 52px;">
                    <div class="me-2"
                        style="width: 11px; height: 52px; background: linear-gradient(180deg, rgba(130,195,65,1) 0%, rgba(55,190,193,1) 100%); ">
                    </div>
                    <h2 class="text-primary fw-900 m-0 f-40px">چطور در مسابقه شرکت کنم ؟ </h2>
                </div>

                <p class="text-justify mt-3 deck">در پویش ملی "زندگی با آیه ها" به صورت روزانه مسابقه های متنوعی خواهیم
                    داشت و به صورت روزانه به مخاطبان و برندگان جوایزی اهدا می شود.</p>


                <div class="row row-cols-1 row-cols-md-2 justify-content-around row-gap-2 all-match ">


                    <a href="https://ayeh.tv/"
                        class="w-395px col d-flex flex-row align-items-center h-108px bg-white rounded-4 shadow ">
                        <div class="w-25 text-center"><img class="all-match-img"
                                src="<?php echo zba_image('tv.svg') ?>">
                        </div>
                        <div class=" w-75 text-center text-primary d-flex flex-column justify-content-around">
                            <span class="f-22px fw-900">مسابقات تلویزیونی</span>
                            <span id="mr_element"></span>
                        </div>
                    </a>

                    <a href="https://ayeh.net/"
                        class="w-395px col d-flex flex-row align-items-center h-108px bg-white rounded-4 shadow ">
                        <div class="w-25 text-center"><img class="all-match-img"
                                src="<?php echo zba_image('group.svg') ?>"></div>
                                <div class=" w-75 text-center text-primary d-flex flex-column justify-content-around">

                            <span class="f-22px fw-900">مسابقه گروهی</span>
                            <span id="mr_element1"></span>
                        </div>
                    </a>


                    <a href="https://ayeh.online/"
                        class="w-395px col d-flex flex-row align-items-center h-108px bg-white rounded-4 shadow ">
                        <div class="w-25 text-center"><img class="all-match-img"
                                src="<?php echo zba_image('oni.svg') ?>">
                        </div>
                        <span class=" w-75 text-center text-primary f-22px fw-900">مسابقات لحظه ای</span>
                    </a>

                    <a href="https://ayeh.info/"
                        class="w-395px col d-flex flex-row align-items-center h-108px bg-white rounded-4 shadow ">
                        <div class="w-25 text-center"><img class="all-match-img"
                                src="<?php echo zba_image('qu.svg') ?>"></div>
                        <span class=" w-75 text-center text-primary f-22px fw-900">آزمون زندگی با آیه ها</span>
                    </a>


                    <a href="https://app.ayeh.net/"
                        class="w-395px col d-flex flex-row align-items-center h-108px bg-white rounded-4 shadow ">
                        <div class="w-25 text-center"><img class="all-match-img"
                                src="<?php echo zba_image('interneti.svg') ?>">
                        </div>
                        <span class=" w-75 text-center text-primary f-22px fw-900">مسابقه اینترنتی</span>
                    </a>

                    <a href="https://app.ayeh.net/prize"
                        class="w-395px col d-flex flex-row align-items-center h-108px bg-white rounded-4 shadow ">
                        <div class="w-25 text-center"><img class="all-match-img"
                                src="<?php echo zba_image('luck.svg') ?>"></div>
                        <span class=" w-75 text-center text-primary f-22px fw-900">گردونه شانش</span>
                    </a>
                </div>

            </div>
            <div class="col-12 col-lg-4 mt-3 mt-gl-0 ">
                <div class="w-75 mx-auto text-center">
                    <img class="w-50" src="<?php echo zba_image('zba-logo.png') ?>">
                    <p class="f-40px fw-900 text-white">مجمـوعه مسابقــات
                        زندگی با آیه ها</p>
                </div>
            </div>
        </div>
    </div>

    <img class="position-absolute" style="width: 1087px;  left: -143px;  bottom: -88px;"
        src="<?php echo zba_image('next-slider.png') ?>">

    <div style="height: 270px;"></div>


</div>

<div style="margin: -240px 0; position: relative;">
    <div style="height: 480px;  border-radius: 54px;"
        class="zba-row mx-auto bg-white text-primary text-center py-5 d-flex flex-column justify-content-around  gap-2 ">
        <div>
            <h2 class="fw-900 f-28px">جوایز و برندگان </h2>
        </div>
        <div class="swiper giftSwiper w-100 container">
            <div class="swiper-wrapper f-21px" style="color: #9BA1B2;">

                <div class="swiper-slide">
                    <img src="<?php echo zba_image('gift/haj.png') ?>" class="card-img-top rounded shadow">
                </div>

                <div class="swiper-slide">
                    <img src="<?php echo zba_image('gift/karbala.png') ?>" class="card-img-top rounded shadow">
                </div>

                <div class="swiper-slide">
                    <img src="<?php echo zba_image('gift/mashhad.png') ?>" class="card-img-top rounded shadow">
                </div>

                <div class="swiper-slide">
                    <img src="<?php echo zba_image('gift/laptop.png') ?>" class="card-img-top rounded shadow">
                </div>

                <div class="swiper-slide">
                    <img src="<?php echo zba_image('gift/tablet.png') ?>" class="card-img-top rounded shadow">
                </div>

                <div class="swiper-slide">
                    <img src="<?php echo zba_image('gift/earpad.png') ?>" class="card-img-top rounded shadow">
                </div>
            </div>
            <div class=" swiper-pagination"></div>
        </div>


    </div>
</div>

<div class="zba-media">
    <div style="height: 300px;"></div>
    <div class="mx-auto container">
        <h3 class="text-primary fw-900 text-center f-28px">چند رسانه ای</h3>
        <p class="text-white text-center f-21px">فیلم ، عکس و صوت های مربوط به پویش زندگی با آیه ها</p>
        <?php

            $parent_category_slug = 'media';                                                // اسلاگ دسته والد
            $parent_category      = get_term_by('slug', $parent_category_slug, 'category'); // دریافت اطلاعات دسته والد

            $all_posts = [  ];

            if ($parent_category) {

                $subcategories = get_categories([
                    'parent'     => $parent_category->term_id, // فقط زیر دسته‌های `gallery`
                    'hide_empty' => false,                     // نمایش دسته‌های خالی هم
                 ]);

                if (! empty($subcategories)) {

                    echo '<nav class="mpcategories">
        <button data-filter="all" class="mpcategory mpactive">همه</button>';
                    foreach ($subcategories as $term) {

                        echo '<button  data-filter="category' . $term->term_id . '" class="mpcategory">' . $term->name . '</button>';

                        $query = new WP_Query([
                            'cat'            => $term->term_id, // گرفتن پست‌های این زیر دسته
                            'posts_per_page' => 8,              // تعداد پست‌ها
                         ]);

                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $all_posts[  ] = [
                                    'id'        => get_the_ID(),
                                    'title'     => get_the_title(),
                                    'url'       => get_permalink(),
                                    'date'      => get_the_date('Y-m-d H:i:s'),
                                    'term_id'   => $term->term_id,
                                    'term_name' => $term->name,
                                    'image'     => (has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '',
                                 ];
                            }
                            wp_reset_postdata();
                        }
                    }
                    echo '</nav>';

                    usort($all_posts, function ($a, $b) {
                        return $b[ 'id' ] - $a[ 'id' ];
                    });

                    echo '<div class="mpgallery">';
                    foreach ($all_posts as $post) {

                        echo '
                        <div class="mpgallery-item"  data-category="category' . $post[ 'term_id' ] . '" data-title="' . $post[ 'title' ] . '" data-id="' . $post[ 'id' ] . '" >
                        <a href="' . $post[ 'url' ] . '">
                            <img src="' . $post[ 'image' ] . '" alt="' . $post[ 'title' ] . '">
                            <div class="title">' . $post[ 'title' ] . '</div>
                        </a>
                        </div>';
                    }

                    echo '</div></div>';
                }
            }

        ?>

        <div class="text-center w-100 my-5"><a href="<?php echo esc_url(home_url('/')); ?>/category/media/"
                class="btn btn-secondary">دیدین بیشتر</a></div>

    </div>
</div>

<div
    class="zba-ayeha text-primary text-center d-flex flex-column justify-content-center align-items-center h-100 py-5 ">
    <h2 class="fw-900 f-28px"> برای مسابقه کدام آیه ها را باید بخوانم؟ </h2>
    <p class="f-21px">نهضت ملی "زندگی با آیه ها" ۳۰ آیه قرآن کریم توسط جمع کثیری از اندیشمندان قرآنی کشور انتخاب شده اند
        که تسلط به آنها می تواند مبانی اعتقادی مخاطبین را مستحکم تر کند. </p>
    <div class="ayeh-swiper overflow-hidden position-relative ">
        <div class="swiper-wrapper">
            <div class="swiper-slide d-flex justify-content-center align-items-center"><img class="w-100"
                    src="<?php echo zba_image('ayeh.png') ?>" alt="1"></div>
            <div class="swiper-slide d-flex justify-content-center align-items-center"><img class="w-100"
                    src="<?php echo zba_image('ayeh.png') ?>" alt="2"></div>
            <div class="swiper-slide d-flex justify-content-center align-items-center"><img class="w-100"
                    src="<?php echo zba_image('ayeh.png') ?>" alt="3"></div>
            <div class="swiper-slide d-flex justify-content-center align-items-center"><img class="w-100"
                    src="<?php echo zba_image('ayeh.png') ?>" alt="4"></div>
            <div class="swiper-slide d-flex justify-content-center align-items-center"><img class="w-100"
                    src="<?php echo zba_image('ayeh.png') ?>" alt="5"></div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>

    </div>

</div>

<div class="news text-white text-center d-flex flex-column justify-content-center align-items-center">
    <h2 class="fw-900 f-28px">اخبار زندگی با آیه ها</h2>

    <div class="swiper mySwiper w-100 container">
        <div class="swiper-wrapper">
            <?php
                $args = [
                    'post_type'      => 'post',
                    'posts_per_page' => 12,
                    'category_name'  => 'news',
                 ];

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                    $query->the_post(); ?>
            <div class="swiper-slide">
                <div class="news-item p-2">
                    <a href="<?php echo get_permalink() ?>">
                        <img style="height: 260px;"
                            src="<?php echo(has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '' ?>"
                            class="card-img-top rounded shadow" alt="<?php echo get_the_title() ?>">
                    </a>
                    <div class="d-flex flex-column mt-2 text-start ">
                        <a style="font-size: 23px;" class="nav-link card-hover-text fw-bolder"
                            href="<?php echo get_permalink() ?>">
                            <?php echo get_the_title() ?>
                        </a>
                        <p style="font-size: 14px;" class="text-justify"> <?php echo get_the_excerpt() ?></p>
                        <a href="<?php echo get_permalink() ?>" style="background-color: #FFA200; width: 126px;"
                            class="btn btn-warning rounded-bottom-2 text-white ">توضیحات بیشتر</a>
                    </div>
                </div>
            </div>

            <?php
                }
                } else {
                    echo 'هیچ پستی در این دسته‌بندی پیدا نشد.';
                }

                wp_reset_postdata(); // بازنشانی کوئری

            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>


<div class="supporters text-primary text-center d-flex flex-column justify-content-around align-items-center py-3 gap-3">
    <div>
        <h2 class="fw-900 f-28px">حامیان نهضت</h2>
    </div>

    <div class="swiper supportersSwiper w-100 container">
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











<?php get_footer();