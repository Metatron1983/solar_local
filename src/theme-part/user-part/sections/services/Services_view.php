<?php
require_once dirname(__FILE__) . '/Services_ctrl.php';
$services = new Services_ctrl;
?>

<section class="services js-lazy-load-section">
    <div class="container">
        <?php $services->show_main_title() ?>
        <div class="services__content-wrapper">
            <div class="services__text-inner">
                <div class="services__text-box">
                    <?php $services->show_content_title_1() ?>
                    <div class="content__text-wrapper">
                        <?php $services->show_content_text_1() ?>
                    </div>
                </div>
                <div class="services__text-box">
                    <?php $services->show_content_title_2() ?>
                    <div class="content__text-wrapper">
                        <?php $services->show_content_text_2() ?>
                    </div>
                </div>
                <div class="services__text-box">
                    <?php $services->show_content_title_3() ?>
                    <div class="content__text-wrapper">
                        <?php $services->show_content_text_3() ?>
                    </div>
                </div>
                <div class="services__text-box">
                    <?php $services->show_content_title_4() ?>
                    <div class="content__text-wrapper">
                        <?php $services->show_content_text_4() ?>
                    </div>
                </div>
            </div>
            <picture class="services__picture">

                <source class="services__image" media="(max-width: 425px)" data-srcset="<?php $services->get_image_Mobile1xWEBP_src() ?>" type="image/webp">
                <source class="services__image" media="(max-width: 960px)" data-srcset="<?php $services->get_image_Tablet1xWEBP_src() ?>" type="image/webp">
                <source class="services__image" data-srcset="<?php $services->get_image_PC1xWEBP_src() ?>" type="image/webp">
                
                <source class="services__image" media="(max-width: 425px)" data-srcset="<?php $services->get_image_Mobile1xJPG_src() ?>">
                <source class="services__image" media="(max-width: 960px)" data-srcset="<?php $services->get_image_Tablet1xJPG_src() ?>">
                <img class="services__image animated__fadein-left__1s" data-src="<?php $services->get_image_PC1xJPG_src() ?>" alt="services img">
            </picture>
        </div>
    </div>
</section>