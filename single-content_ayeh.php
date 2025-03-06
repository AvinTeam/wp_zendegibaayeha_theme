<?php
    get_header();

    $ayeh_ayeh     = get_post_meta($post->ID, '_ayeh_ayeh', true);
    $ayeh_tarjomeh = get_post_meta($post->ID, '_ayeh_tarjomeh', true);
    $ayeh_address  = get_post_meta($post->ID, '_ayeh_address', true);

    $ayeh_video_list = get_post_meta($post->ID, '_ayeh_video_list', true);

    $ayeh_sound_list = get_post_meta($post->ID, '_ayeh_sound_list', true);

?>

<div class="zba-header-post text-center py-5">
    <div class=" d-flex flex-row justify-content-center align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <?php

                    // صفحه اصلی
                    echo '<li class="breadcrumb-item text-white"><a class=" text-white" href="' . esc_url(home_url()) . '">خانه</a></li>';

                    // دسته‌بندی‌های cat_ayeh
                    $terms = get_the_terms(get_the_ID(), 'cat_ayeh');
                    if ($terms && ! is_wp_error($terms)) {
                        $term = array_shift($terms); // اولین دسته‌بندی را انتخاب می‌کند
                        echo '<li class="breadcrumb-item"><a class=" text-white" href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
                    }

                    // عنوان پست فعلی
                    echo '<li class="breadcrumb-item active  text-white-50" aria-current="page">' . esc_html(get_the_title()) . '</li>';
                ?>
            </ol>
        </nav>
    </div>

</div>

<div>
    <div class="zba-row mx-auto d-flex flex-column justify-content-start align-items-center gap-5">

        <div class="zba-content-post">

            <div class="zba-content-post-text mt-3">
                <div class="py-2 zba-page-ayeha ">
                    <div class="zba-row mx-auto d-flex flex-column">
                        <p class="mb-5"><span
                                class="bg-success p-3 text-white f-17px rounded  "><?php echo get_the_title() ?></span>
                        </p>
                        <p class="zba_ayeh text-primary fw-900 f-40px  text-justify lh-lg"><?php echo $ayeh_ayeh ?></p>


                        <div class="ayeh-address d-flex align-items-center flex-row-reverse"><span
                                class="pe-3 text-primary"><?php echo $ayeh_address ?></span>
                        </div>

                        <p class="f-17px py-3 text-justify"><?php echo $ayeh_tarjomeh ?></p>

                        <div class="w-100 divider-separator "></div>
                    </div>
                    <div class="zba-row mx-auto row mt-2">

                        <div class="col-12 col-md-3">
                            <h3 class="text-center">قرائت</h3>
                            <div class="row row-cols-1">


                                <?php foreach ($ayeh_sound_list as $sound):
                                    $sound = explode('|==|', $sound); ?>

                                <div class="col p-2">
                                    <div class="rounded shadow p-2">
                                        <p class="text-center w-100 fw-bold">قاری: <?php echo $sound[ 0 ] ?></p>
                                        <audio class="w-100 rounded" controls preload="auto" loading="lazy">
                                            <source id="zba-source-sound" src="<?php echo $sound[ 1 ] ?>"
                                                type="audio/mpeg">
                                            مرورگر شما از تگ audio پشتیبانی نمی‌کند.
                                        </audio>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>

                        <div class="col-12 col-md-9">
                            <h3 class="text-center">ویدئو</h3>
                            <div class="row row-cols-1 row-cols-lg-2">


                                <?php foreach ($ayeh_video_list as $video):
                                    $video = explode('|==|', $video); ?>

                                <div class="col p-2">
                                    <div class="rounded shadow p-2">

                                        <p class="text-center fw-bold"><?php echo $video[ 0 ] ?></p>

                                        <video class="w-100 rounded" controls preload="auto" loading="lazy">
                                            <source src="<?php echo $video[ 1 ] ?>" type="video/mp4">
                                            مرورگر شما از تگ video پشتیبانی نمی‌کند.
                                        </video>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>








                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php get_footer();