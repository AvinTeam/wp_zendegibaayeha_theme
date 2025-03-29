<?php
    /*
Template Name: نظرسنجی
*/
    get_header();

    $number1 = rand(0, 9);
    $number2 = rand(0, 9);

    $captcha_code = $number1 + $number2;
?>

<div class="zba-header-post text-center py-5">
    <div class="zba-row mx-auto d-flex flex-column-reverse flex-md-row justify-content-between align-items-center">
        <h1 style="font-size: 34px; " class="text-white fw-900"><?php the_title(); ?></h1>

    </div>
</div>

<div class="zba-row mx-auto mt-4">
    <!-- لیست پست‌ها -->
    <div class="zba-row mx-auto">
        <?php the_content();

            echo zba_transient();

        ?>




        <form id="zba-ayeh-form" method="post" class="needs-validation d-flex flex-column" novalidate>

            <?php

                $term = get_queried_object();

                $args = [
                    'post_type'      => 'content_ayeh', // نوع پست تایپ
                    'posts_per_page' => -1,
                    'orderby'        => 'date', // مرتب‌سازی بر اساس تاریخ
                    'order'          => 'ASC',  // از قدیم به جدید
                    'tax_query'      => [
                        [
                            'taxonomy' => 'cat_ayeh', // نام تاکسونومی
                            'field'    => 'slug',
                            'terms'    => 1403, // اسلاگ تاکسونومی فعلی
                         ],
                     ],
                 ];

                $query = new WP_Query($args);

                if ($query->have_posts()):
                    while ($query->have_posts()): $query->the_post();
                        $ayeh_ayeh     = get_post_meta(get_the_ID(), '_ayeh_ayeh', true);
                        $ayeh_tarjomeh = get_post_meta(get_the_ID(), '_ayeh_tarjomeh', true);
                        $ayeh_address  = get_post_meta(get_the_ID(), '_ayeh_address', true);
                    ?>

            <label for="ayeh<?php echo get_the_ID() ?>" style="cursor: pointer;" class="py-2 zba-page-ayeha">
                <div class="d-flex flex-column">
                    <p
                        class="zba_ayeh text-primary fw-900 f-40px text-justify lh-lg d-flex flex-row align-items-center gap-3">

                        <input id="ayeh<?php echo get_the_ID() ?>" class="form-check-input" name="vote_ayeh"
                            value="<?php echo get_the_ID() ?>" type="radio">

                        <?php echo $ayeh_ayeh; ?>
                    </p>

                    <div class="ayeh-address d-flex align-items-center flex-row-reverse">
                        <span class="pe-3 text-primary"><?php echo $ayeh_address; ?></span>
                    </div>

                    <p class="f-17px py-3 text-justify"><?php echo $ayeh_tarjomeh; ?></p>

                    <div class="w-100 divider-separator"></div>
                </div>
            </label>
            <?php endwhile; ?>
            <?php else: ?>
            <p>هیچ آیه ای یافت نشد.</p>
            <?php endif;
                wp_reset_postdata(); // بازنشانی کوئری
            ?>

            <?php wp_nonce_field('zba_nonce_captcha' . $captcha_code); ?>
            <div class="my-3">
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col mb-3">
                        <label for="phone" class="form-label">شماره موبایل <span class="text-danger">*</span></label>
                        <input type="text" class="form-control onlyNumbersInput" maxlength="11"
                            placeholder="09123456789" inputmode="numeric" pattern="\d*" id="phone" name="phone"
                            required>
                    </div>

                    <div class="col mb-3 captcha-container">
                        <label for="captcha" class="form-label">
                            <?php echo "سوال امنیتی: $number2 + $number1 = ؟" ?> <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control onlyNumbersInput" id="captcha" name="captcha"
                            inputmode="numeric" pattern="\d*" required>
                    </div>

                </div>

                <input name="act" value="vote_ayeh" type="hidden">
                <div id="form-alert-vote-ayeh">


                </div>
                <button type="submit" class="btn btn-primary">ارسال</button>
            </div>

        </form>
    </div>
</div>

<?php
get_footer();
?>