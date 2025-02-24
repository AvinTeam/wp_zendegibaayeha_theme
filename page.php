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

<!-- 
    <div class="mb-3">
        <div class="d-flex align-items-center mb-3">
            <div class="flex-grow-1  bg-primary-400" style="height: 1px;"></div>
            <span class="mx-3">برندگان کمک هزینه سفر به مشهد مقدس</span>
            <div class="flex-grow-1 bg-primary-400" style="height: 1px;"></div>

        </div>
        <div class="row row-cols-lg-3 row-cols-md-2  row-cols-1 winner1 ">

            <div class="col px-2 my-2">
                <div class="d-flex flex-row align-items-center justify-content-between border border-2 rounded-3  border-secondary m-0 p-0 overflow-hidden"
                    style="height: 40px;">
                    <div class="w-100 d-flex flex-row align-items-center justify-content-start h-100">
                        <span
                            class="row-count h-100 d-flex flex-row align-items-center justify-content-center text-white fw-900 px-3">30</span>
                        <span
                            class="bg-gradient h-100 w-100 d-flex flex-row align-items-center justify-content-center text-white fw-900">تورج
                            کرمعلی</span>
                    </div>
                    <span
                        class="mobile h-100 d-flex flex-row align-items-center justify-content-center fw-900"><?php echo zba_mask_mobile('09113078966') ?></span>
                </div>
            </div>


            <div class="col px-2 my-2">
                <div class="d-flex flex-row align-items-center justify-content-between border border-2 rounded-3  border-secondary m-0 p-0 overflow-hidden"
                    style="height: 40px;">
                    <div class="w-100 d-flex flex-row align-items-center justify-content-start h-100">
                        <span
                            class="row-count h-100 d-flex flex-row align-items-center justify-content-center text-white fw-900 px-3">1</span>
                        <span
                            class="bg-gradient h-100 w-100 d-flex flex-row align-items-center justify-content-center text-white fw-900">تورج
                            کرمعلی</span>
                    </div>
                    <span
                        class="mobile h-100 d-flex flex-row align-items-center justify-content-center fw-900"><?php echo zba_mask_mobile('09113078966') ?></span>
                </div>
            </div>


            <div class="col px-2 my-2">
                <div class="d-flex flex-row align-items-center justify-content-between border border-2 rounded-3  border-secondary m-0 p-0 overflow-hidden"
                    style="height: 40px;">
                    <div class="w-100 d-flex flex-row align-items-center justify-content-start h-100">
                        <span
                            class="row-count h-100 d-flex flex-row align-items-center justify-content-center text-white fw-900 px-3">1</span>
                        <span
                            class="bg-gradient h-100 w-100 d-flex flex-row align-items-center justify-content-center text-white fw-900">تورج
                            کرمعلی</span>
                    </div>
                    <span
                        class="mobile h-100 d-flex flex-row align-items-center justify-content-center fw-900"><?php echo zba_mask_mobile('09113078966') ?></span>
                </div>
            </div>




        </div>
    </div>


    <div class="mb-3">
        <div class="d-flex align-items-center mb-3">
            <div class="flex-grow-1  bg-primary-400" style="height: 1px;"></div>
            <span class="mx-3">برندگان کمک هزینه سفر به مشهد مقدس</span>
            <div class="flex-grow-1 bg-primary-400" style="height: 1px;"></div>

        </div>
        <div class="row row-cols-lg-3 row-cols-md-2  row-cols-1">

            <div class="col px-2 my-2">
                <div class="d-flex flex-column align-items-center justify-content-between border border-2 rounded-3  border-secondary m-0 p-0 overflow-hidden"
                    style="height: 140px;">
                    <span
                        class="row-count h-100 w-100 d-flex flex-row align-items-center justify-content-center text-white fw-900 px-3">کمک
                        هزینه سفر به مشهد</span>
                    <span
                        class="bg-gradient h-100 w-100 d-flex flex-row align-items-center justify-content-center text-white fw-900">تورج
                        کرمعلی</span>
                    <span
                        class="mobile h-100 d-flex flex-row align-items-center justify-content-center fw-900"><?php echo zba_mask_mobile('09113078966') ?></span>
                </div>
            </div>


            <div class="col px-2 my-2">
                <div class="d-flex flex-column align-items-center justify-content-between border border-2 rounded-3  border-secondary m-0 p-0 overflow-hidden"
                    style="height: 140px;">
                    <span
                        class="row-count h-100 w-100 d-flex flex-row align-items-center justify-content-center text-white fw-900 px-3">کمک
                        هزینه سفر به مشهد</span>
                    <span
                        class="bg-gradient h-100 w-100 d-flex flex-row align-items-center justify-content-center text-white fw-900">تورج
                        کرمعلی</span>
                    <span
                        class="mobile h-100 d-flex flex-row align-items-center justify-content-center fw-900"><?php echo zba_mask_mobile('09113078966') ?></span>
                </div>
            </div>


            <div class="col px-2 my-2">
                <div class="d-flex flex-column align-items-center justify-content-between border border-2 rounded-3  border-secondary m-0 p-0 overflow-hidden"
                    style="height: 140px;">
                    <span
                        class="row-count h-100 w-100 d-flex flex-row align-items-center justify-content-center text-white fw-900 px-3">کمک
                        هزینه سفر به مشهد</span>
                    <span
                        class="bg-gradient h-100 w-100 d-flex flex-row align-items-center justify-content-center text-white fw-900">تورج
                        کرمعلی</span>
                    <span
                        class="mobile h-100 d-flex flex-row align-items-center justify-content-center fw-900"><?php echo zba_mask_mobile('09113078966') ?></span>
                </div>
            </div>


        </div>
    </div>
 -->




    <div class="content"><?php the_content(); ?></div>
</div>

<?php get_footer(); ?>