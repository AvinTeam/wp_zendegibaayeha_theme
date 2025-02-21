
<div class="news text-white text-center d-flex flex-column justify-content-center align-items-center">
    <h2 class="fw-900 f-28px">اخبار زندگی با آیه ها</h2>
    <p class="f-21px">فیلم ، عکس و صوت های مربوط به پویش زندگی با آیه ها</p>

    <div class="swiper mySwiper w-100 zba-row mx-auto">
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
                        <img height="260px"
                            src="<?php echo(has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '' ?>"
                            class="card-img-top rounded shadow" alt="<?php echo get_the_title() ?>">
                    </a>
                    <div class="d-flex flex-column mt-2 text-start ">
                        <a style="font-size: 23px;" class="nav-link card-hover-text fw-bolder" href="<?php echo get_permalink() ?>">
                                <?php echo get_the_title() ?>
                        </a>
                        <p style="font-size: 14px;" class="text-justify" > <?php echo get_the_excerpt() ?></p>
                        <a href="<?php echo get_permalink() ?>" style="background-color: #FFA200; width: 126px;"
                        class="btn btn-warning rounded-bottom-2 text-white " >توضیحات بیشتر</a>
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