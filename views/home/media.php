<div class="zba-media">
    <div style="height: 300px;"></div>
    <div class="mx-auto zba-row">
        <h3 class="text-primary fw-900 text-center f-28px">چند رسانه ای</h3>
        <p class="text-white text-center f-21px" >فیلم ، عکس و صوت های مربوط به پویش زندگی با آیه ها</p>
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

        <div class="text-center w-100 my-5"><a class="btn btn-secondary">دیدین بیشتر</a></div>

    </div>
</div>
