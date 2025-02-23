<?php get_header(); ?>

<div class="zba-header-post text-center py-5">
    <div class="container d-flex flex-row justify-content-between align-items-center">


        <h1 style="font-size: 34px; " class="text-white fw-900"><?php the_archive_title(); ?></h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-white"><a class=" text-white" href="<?php echo home_url(); ?>">خانه</a></li>
                <li class="breadcrumb-item text-white-50 active" aria-current="page"><?php the_archive_title(); ?></li>
            </ol>
        </nav>
    </div>
</div>






<div class="container mt-4">



    <div class="row">
        <!-- لیست پست‌ها -->
        <div class="col-md-8">
            <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
            <div class="post-item mb-4">
                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="post-meta text-muted mb-2">
                    <span><?php the_time('j F Y'); ?></span>
                    <?php
                          // نمایش دسته‌بندی‌ها به صورت لینک (در صورت وجود)
                          $categories = get_the_category();
                          if (! empty($categories)) {
                              echo ' | ';
                              foreach ($categories as $category) {
                                  $category_link = esc_url(get_category_link($category->term_id));
                                  echo '<a href="' . $category_link . '">' . esc_html($category->name) . '</a> ';
                              }
                          }
                      ?>
                </div>
                <div class="post-excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </div>
            <?php endwhile; ?>

            <!-- صفحه‌بندی -->
            <?php
            global $wp_query;
            $big        = 999999999; // یک عدد بزرگ به عنوان جایگزین
            $pagination = paginate_links([
                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'    => '?paged=%#%',
                'current'   => max(1, get_query_var('paged')),
                'total'     => $wp_query->max_num_pages,
                'type'      => 'array',
                'prev_text' => __('قبلی'),
                'next_text' => __('بعدی'),
            ]);
            if (is_array($pagination)) {
                echo '<nav aria-label="Page navigation">';
                echo '<ul class="pagination justify-content-center">';
                foreach ($pagination as $page) {
                    // در صورتی که صفحه فعلی است
                    if (strpos($page, 'current') !== false) {
                        echo '<li class="page-item active">' . str_replace('page-numbers', 'page-link', $page) . '</li>';
                    } else {
                        echo '<li class="page-item">' . str_replace('page-numbers', 'page-link', $page) . '</li>';
                    }
                }
                echo '</ul>';
                echo '</nav>';
            }
        ?>

            <?php else: ?>
            <p>هیچ پستی یافت نشد.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>