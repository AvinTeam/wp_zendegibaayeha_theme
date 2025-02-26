<?php
    get_header();

    $image      = (has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '';
    $zba_aparat = get_post_meta(get_the_ID(), '_zba_aparat', true);

    if ($zba_aparat) {
        $zba_aparat = zba_remote('https://www.aparat.com/etc/api/video/videohash/' . esc_html(linktocode($zba_aparat)));

        if ($zba_aparat[ 'code' ] == 0) {
            $zba_aparat = $zba_aparat[ 'result' ];
            $file_link  = $zba_aparat->video->file_link;
        } else {
            $zba_aparat = '';
        }
    }
?>


<div class="zba-header-post text-center py-5">
    <div class=" d-flex flex-row justify-content-center align-items-center gap-3 mb-5">
        <?php
            $categories = get_the_category();
            if (! empty($categories)) {
                foreach ($categories as $category) {
                    $category_link = esc_url(get_category_link($category->term_id));
                    $category_name = esc_html($category->name);
                    echo "<a class='btn btn-primary' href='{$category_link}'>{$category_name}</a>";
                }
            }
        ?>
    </div>
    <h1 style="font-size: 34px; " class="text-white fw-900"><?php echo get_the_title(); ?></h1>

</div>

<div>
    <div class="zba-row mx-auto d-flex flex-column justify-content-center align-items-center gap-5">

        <div class="zba-content-post">
            <div
                class="zba-content-post-image mx-auto d-flex flex-column justify-content-center align-items-center my-3">

                <?php if ($zba_aparat): ?>

                <video class=" w-100 rounded-3" controls src="<?php echo $file_link ?>"></video>

                <a href="<?php echo $file_link ?>" target="_blank"
                    class="btn btn-primary btn-gradient mt-3 w-100 ">دانلود</a>


                <?php else: ?>
                <img src="<?php echo $image; ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid  h-100">

                <?php endif; ?>
            </div>
            <div class="zba-content-post-text">
                <?php the_content(); ?>
            </div>
        </div>

    </div>
</div>

<?php get_footer();