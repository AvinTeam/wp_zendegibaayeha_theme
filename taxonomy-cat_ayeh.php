<?php     get_header(); ?>

<div class="zba-header-post text-center py-5">
    <div class="zba-row mx-auto d-flex flex-column-reverse flex-md-row justify-content-between align-items-center">
        <h1 style="font-size: 34px; " class="text-white fw-900">محتوای آیه های <?php the_archive_title(); ?></h1>
        <?php

            $current_category = get_queried_object();

            echo '<nav aria-label="breadcrumb ">';
            echo '<ol class="breadcrumb m-0">';

            // لینک به صفحه اصلی
            echo '<li class="breadcrumb-item p-0"><a class=" text-white" href="' . home_url() . '">صفحه نخست</a></li>';

            // دریافت والدهای دسته به صورت آرایه (شناسه‌ها)
            $ancestors = get_ancestors($current_category->term_id, 'category');
            if ($ancestors) {
                // آرایه والدها از ریشه به شاخه مرتب می‌شود
                $ancestors = array_reverse($ancestors);
                foreach ($ancestors as $ancestor_id) {
                    $ancestor = get_category($ancestor_id);
                    echo '<li class="breadcrumb-item  p-0"><a class=" text-white" href="' . esc_url(get_category_link($ancestor_id)) . '">محتوای آیه های ' . esc_html($ancestor->name) . '</a></li>';
                }
            }

            // دسته فعلی به عنوان آیتم فعال
            echo '<li class="breadcrumb-item active text-white-50 p-0" aria-current="page">' . esc_html($current_category->name) . '</li>';
            echo '</ol>';
            echo '</nav>';

        ?>
    </div>
</div>

<div class="zba-row mx-auto mt-4">
    <!-- لیست پست‌ها -->
    <div class="zba-row mx-auto">
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
                    'terms'    => $term->slug, // اسلاگ تاکسونومی فعلی
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
        <div class="py-2 zba-page-ayeha">
            <div class="zba-row mx-auto d-flex flex-column">
                <p class="mb-5">
                    <span class="bg-success p-3 text-white f-17px rounded"><?php the_title(); ?></span>
                </p>
                <p class="zba_ayeh text-primary fw-900 f-40px text-justify lh-lg"><?php echo $ayeh_ayeh; ?></p>

                <div class="ayeh-address d-flex align-items-center flex-row-reverse">
                    <span class="pe-3 text-primary"><?php echo $ayeh_address; ?></span>
                </div>

                <p class="f-17px py-3 text-justify"><?php echo $ayeh_tarjomeh; ?></p>
                <div class="text-end">
                    <a class="btn btn-outline-primary" target="_blank" href="<?php the_permalink(); ?>">محتوای آیه</a>
                </div>

                <div class="w-100 divider-separator"></div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
        <p>هیچ آیه ای یافت نشد.</p>
        <?php endif;
        wp_reset_postdata(); // بازنشانی کوئری
    ?>
    </div>
</div>

<?php
get_footer();
?>