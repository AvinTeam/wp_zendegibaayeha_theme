<div id="wpbody-content">


    <div class="wrap nosubsub">
        <h1 class="wp-heading-inline">افزودن زمان مسابقه</h1>


        <hr class="wp-header-end">


        <div id="col-container" class="wp-clearfix">

            <div id="col-left">
                <div class="col-wrap">

                    <div class="form-wrap">
                        <h2>افزودن زمان تازه</h2>
                        <form id="addtag" method="post" action="" class="validate">
                            <div class="form-field term-slug-wrap">
                                <label for="mrdata">تاریخ</label>
                                <input name="mrdata" id="mrdata" type="text" class="regular-text" size="40"
                                    aria-describedby="slug-description" data-jdp="" data-jdp-only-date="">
                            </div>

                            <div class="form-field term-slug-wrap">
                                <label for="mrtime">ساعت</label>
                                <input name="mrtime" id="mrtime" type="text" class="regular-text" size="40"
                                    aria-describedby="mrtime-description" data-jdp="" data-jdp-only-time="">
                            </div>


                            <p class="submit">

                                <button type="submit" name="act" id="submit" class="button button-primary"
                                    value="add">افزودن</button> <span class="spinner"></span>
                            </p>
                        </form>
                    </div>
                </div>
            </div><!-- /col-left -->

            <div id="col-right">
                <div class="col-wrap">



                    <?php

$mraparatListTable = new Mr_clock_List_Tabel;
$mraparatListTable->prepare_items();
$mraparatListTable->display();

?>

                </div>
            </div><!-- /col-right -->

        </div><!-- /col-container -->

    </div><!-- /wrap -->

    <div class="clear"></div>
</div>