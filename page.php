<?php get_header(); ?>

<div class="zba-header-post text-center py-5">
    <div class="container d-flex flex-row justify-content-between align-items-center">
        <h1 style="font-size: 34px; " class="text-white fw-900"><?php the_title(); ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-white"><a class=" text-white" href="<?php echo home_url(); ?>">خانه</a>
                </li>
                <li class="breadcrumb-item text-white-50 active" aria-current="page"><?php the_title(); ?></li>
            </ol>
        </nav>
    </div>
</div>



<div class="container mt-5">
    <div class="content"><?php the_content(); ?></div>
</div>

<?php get_footer(); ?>