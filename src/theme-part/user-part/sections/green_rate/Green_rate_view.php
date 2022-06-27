<?php
require_once dirname(__FILE__) . '/Green_rate_ctrl.php';

$green_rate = new Green_rate_ctrl;
?>

<section class="green-rate js-lazy-load-section">
    <div class="container">
        <div class="green-rate__top-subsection ">
            <?php $green_rate->show_main_title() ?>
            <p class="green-rate__main-description animated__fadein__1s">
                <?php $green_rate->get_explanation_text() ?>
            </p>
        </div>
        <div class="green-rate__bottom-subsection">
            <div class="green-rate__left-wrapper">
                <div class="green-rate__main-advantage-inner">
                    <picture class="green-rate__main-advantage-picture">
                        <source class="green-rate__main-advantage-image" data-srcset="<?php $green_rate->get_main_advantage_image_WEBP_src() ?>" type="image/webp">
                        <img data-src="<?php $green_rate->get_main_advantage_image_src() ?>" alt="main advantage image" class="green-rate__main-advantage-image animated__fadein-right__1s">
                    </picture>
                    <p class="green-rate__main_advantage_text animated__fadein-up__1s">
                        <?php $green_rate->get_main_advantage_text() ?>
                    </p>
                </div>
                <div class="green-rate__advantages-inner">
                    <div class="green-rate__advantages-textbox">
                        <?php $green_rate->get_advantage_1_title('green-rate__advantages-title green-rate__advantages-1-title') ?>
                        <?php $green_rate->get_advantage_1_text('green-rate__advantages-text green-rate__advantages-1-text') ?>
                    </div>
                    <div class="green-rate__advantages-textbox">
                        <?php $green_rate->get_advantage_2_title('green-rate__advantages-title green-rate__advantages-2-title') ?>
                        <?php $green_rate->get_advantage_2_text('green-rate__advantages-text green-rate__advantages-2-text') ?>
                    </div>
                    <div class="green-rate__advantages-textbox">
                        <?php $green_rate->get_advantage_3_title('green-rate__advantages-title green-rate__advantages-3-title') ?>
                        <?php $green_rate->get_advantage_3_text('green-rate__advantages-text green-rate__advantages-3-text') ?>
                    </div>
                    <div class="green-rate__advantages-textbox">
                        <?php $green_rate->get_advantage_4_title('green-rate__advantages-title green-rate__advantages-4-title') ?>
                        <?php $green_rate->get_advantage_4_text('green-rate__advantages-text green-rate__advantages-4-text') ?>
                    </div>

                </div>
            </div>
            <div class="green-rate__right-wrapper">
                <picture class="green-rate__picture">
                    <source class="green-rate__image" media="(max-width: 425px)" data-srcset="<?php $green_rate->get_explanation_image_Mobile1xWEBP_src() ?>" type="image/webp">
                    <source class="green-rate__image" media="(max-width: 960px)" data-srcset="<?php $green_rate->get_explanation_image_Tablet1xWEBP_src() ?>" type="image/webp">
                    <source class="green-rate__image" data-srcset="<?php $green_rate->get_explanation_image_PC1xWEBP_src() ?>" type="image/webp">

                    <source class="green-rate__image" media="(max-width: 425px)" data-srcset="<?php $green_rate->get_explanation_image_Mobile1xJPG_src() ?>">
                    <source class="green-rate__image" media="(max-width: 960px)" data-srcset="<?php $green_rate->get_explanation_image_Tablet1xJPG_src() ?>">
                    <img data-src="<?php $green_rate->get_explanation_image_PC1xJPG_src() ?>" alt="advantages image" class="green-rate__image animated__fadein-left__1s">
                </picture>
            </div>
        </div>
    </div>
</section>