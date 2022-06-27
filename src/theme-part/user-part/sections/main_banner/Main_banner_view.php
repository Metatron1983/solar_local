<?php
require_once dirname(__FILE__) . "/Main_banner_ctrl.php";
$main_banner = new Main_banner_ctrl();
?>

<section class="main-banner js-lazy-load-section">
    <picture class="main-banner__picture">
        <source class="main-banner__image" media="(max-width: 425px)" data-srcset="<?php $main_banner->get_image_Mobile1xWEBP_src() ?>" type="image/webp">
        <source class="main-banner__image" media="(max-width: 960px)" data-srcset="<?php $main_banner->get_image_Tablet1xWEBP_src() ?>" type="image/webp">
        <source class="main-banner__image" data-srcset="<?php $main_banner->get_image_PC1xWEBP_src() ?>" type="image/webp">
        <source class="main-banner__image" media="(max-width: 425px)" data-srcset="<?php $main_banner->get_image_Mobile1xJPG_src() ?>">
        <source class="main-banner__image" media="(max-width: 960px)" data-srcset="<?php $main_banner->get_image_Tablet1xJPG_src() ?>">
        <img class="main-banner__image animated__scale-right__3s" data-src="<?php $main_banner->get_image_PC1xJPG_src(); ?>" alt="main banner">
    </picture>
    <div class="container">
        <?php $main_banner->show_logo() ?>
        <h2 class="main-banner__top-title animated__fadein-left__1s">
            <?php $main_banner->get_top_title_text() ?>
        </h2>
        <h1 class="main-banner__middle-title animated__fadein-right__1s">
            <?php $main_banner->get_middle_title_text() ?>
        </h1>
        <h2 class="main-banner__bottom-title animated__fadein-left__1s">
            <?php $main_banner->get_bottom_title_text() ?>
        </h2>
        <?php
        $main_banner->show_request_btn_title();
        $main_banner->show_social_box();
        ?>

    </div>

</section>