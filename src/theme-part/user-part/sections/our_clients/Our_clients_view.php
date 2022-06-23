<?php
require_once dirname(__FILE__) . '/Our_clients_ctrl.php';

$our_clients = new Our_clients_ctrl;
?>

<section class="our-clients">
    <div class="container">
        <?php $our_clients->show_main_title_text() ?>
        <div class="our-clients__slider slider">
            <div class="our-clients__slider-inner">
                <div class="our-clients__slider-item our-clients__slider-item-1 js-lazy-load-section">
                    <div class="our-clients__slider-img-box">
                        <picture class="our-clients__picture ">
                            <source media="(max-width: 425px)" data-srcset="<?php $our_clients->get_image_1_Mobile1xJPG_src() ?>" class="our-clients__image">
                            <source media="(max-width: 960px)" data-srcset="<?php $our_clients->get_image_1_Tablet1xJPG_src() ?>" class="our-clients__image">
                            <img data-src="<?php $our_clients->get_image_1_PC1xJPG_src() ?>" alt="our clients image" class="our-clients__image animated__fadein__1s">
                        </picture>
                    </div>
                    <div class="our-clients__slider-content-box">
                        <?php $our_clients->show_content_title_1_text() ?>
                        <ul class="our-clients__text-list our-clients__text-list animated__fadein-up__1s">
                            <li class="our-clients__text-item">
                                <?php $our_clients->get_location_1_text() ?>
                            </li>
                            <li class="our-clients__text-item">
                                <?php $our_clients->get_income_1_text() ?>
                            </li>
                            <li class="our-clients__text-item">
                                <?php $our_clients->get_end_of_works_1_text() ?>
                            </li>
                            <li class="our-clients__text-item">
                                <?php $our_clients->get_lifetime_1_text() ?>
                            </li>
                        </ul>
                        <div class="our-clients__request-btn-wrapper">
                            <?php $our_clients->show_request_btn() ?>
                        </div>
                    </div>
                </div>
                <div class="our-clients__slider-item our-clients__slider-item-2 js-lazy-load-section display-none">
                    <div class="our-clients__slider-img-box">
                        <picture class="our-clients__picture">
                            <source media="(max-width: 425px)" data-srcset="<?php $our_clients->get_image_2_Mobile1xJPG_src() ?>" class="our-clients__image">
                            <source media="(max-width: 960px)" data-srcset="<?php $our_clients->get_image_2_Tablet1xJPG_src() ?>" class="our-clients__image">
                            <img data-src="<?php $our_clients->get_image_2_PC1xJPG_src() ?>" alt="our clients image" class="our-clients__image animated__fadein__1s">
                        </picture>
                    </div>
                    <div class="our-clients__slider-content-box">
                        <?php $our_clients->show_content_title_2_text() ?>
                        <ul class="our-clients__text-list our-clients__text-list animated__fadein-up__1s">
                            <li class="our-clients__text-item">
                                <?php $our_clients->get_location_2_text() ?>
                            </li>
                            <li class="our-clients__text-item">
                                <?php $our_clients->get_income_2_text() ?>
                            </li>
                            <li class="our-clients__text-item">
                                <?php $our_clients->get_end_of_works_2_text() ?>
                            </li>
                            <li class="our-clients__text-item">
                                <?php $our_clients->get_lifetime_2_text() ?>
                            </li>
                        </ul>
                        <div class="our-clients__request-btn-wrapper">
                            <?php $our_clients->show_request_btn() ?>
                        </div>
                    </div>
                </div>
                <div class="our-clients__slider-item our-clients__slider-item-3 js-lazy-load-section display-none">
                    <div class="our-clients__slider-img-box">
                        <picture class="our-clients__picture">
                            <source media="(max-width: 425px)" data-srcset="<?php $our_clients->get_image_3_Mobile1xJPG_src() ?>" class="our-clients__image">
                            <source media="(max-width: 960px)" data-srcset="<?php $our_clients->get_image_3_Tablet1xJPG_src() ?>" class="our-clients__image">
                            <img data-src="<?php $our_clients->get_image_3_PC1xJPG_src() ?>" alt="our clients image" class="our-clients__image animated__fadein__1s">
                        </picture>
                    </div>
                    <div class="our-clients__slider-content-box">
                        <?php $our_clients->show_content_title_3_text() ?>
                        <ul class="our-clients__text-list our-clients__text-list animated__fadein-up__1s">
                            <li class="our-clients__text-item">
                                <?php $our_clients->get_location_3_text() ?>
                            </li>
                            <li class="our-clients__text-item">
                                <?php $our_clients->get_income_3_text() ?>
                            </li>
                            <li class="our-clients__text-item">
                                <?php $our_clients->get_end_of_works_3_text() ?>
                            </li>
                            <li class="our-clients__text-item">
                                <?php $our_clients->get_lifetime_3_text() ?>
                            </li>
                        </ul>
                        <div class="our-clients__request-btn-wrapper">
                            <?php $our_clients->show_request_btn() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-clients__slider-arrow-box">
                <button class="our-clients__left-arrow">
                    <img src="<?php $our_clients->get_left_arrow_src()?>" alt="left arrow" class="our-clients__left-arrow-img js-arrow-left">
                    <img src="<?php $our_clients->get_left_arrow_hover_src()?>" alt="left arrow" class="our-clients__left-arrow-img js-arrow-left-hover display-none">
                </button>
                <button class="our-clients__right-arrow">
                    <img src="<?php $our_clients->get_right_arrow_src()?>" alt="right arrow" class="our-clients__right-arrow-img js-arrow-right">
                    <img src="<?php $our_clients->get_right_arrow_hover_src()?>" alt="right arrow" class="our-clients__right-arrow-img js-arrow-right-hover display-none">
                </button>
            </div>
        </div>
    </div>
</section>