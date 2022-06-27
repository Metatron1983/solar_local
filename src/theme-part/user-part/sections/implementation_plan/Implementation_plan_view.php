<?php
require_once dirname(__FILE__) . '/Implementation_plan_ctrl.php';

$plan = new Implementation_plan_ctrl;
?>

<section class="implementation-plan js-lazy-load-section">
    <div class="container">
        <div class="implementation-plan__inner">
            <div class="implementation-plan__text-holder">
                <?php $plan->show_main_title('implementation-plan__main-title') ?>
                <div class="implementation-plan__text-box-wrapper">
                    <div class="implementation-plan__text-box implementation-plan__text-box-1">
                        <?php $plan->show_step_1_title("implementation-plan__title implementation-plan__title-1") ?>
                        <?php $plan->show_step_1_text("implementation-plan__text implementation-plan__text-1") ?>
                    </div>
                    <div class="implementation-plan__text-box implementation-plan__text-box-2">
                        <?php $plan->show_step_2_title("implementation-plan__title implementation-plan__title-2") ?>
                        <?php $plan->show_step_2_text("implementation-plan__text implementation-plan__text-2") ?>
                    </div>
                    <div class="implementation-plan__text-box implementation-plan__text-box-3">
                        <?php $plan->show_step_3_title("implementation-plan__title implementation-plan__title-3") ?>
                        <?php $plan->show_step_3_text("implementation-plan__text implementation-plan__text-3") ?>
                    </div>
                    <div class="implementation-plan__text-box implementation-plan__text-box-4">
                        <?php $plan->show_step_4_title("implementation-plan__title implementation-plan__title-4") ?>
                        <?php $plan->show_step_4_text("implementation-plan__text implementation-plan__text-4") ?>
                    </div>
                    <div class="implementation-plan__text-box implementation-plan__text-box-5">
                        <?php $plan->show_step_5_title("implementation-plan__title implementation-plan__title-5") ?>
                        <?php $plan->show_step_5_text("implementation-plan__text implementation-plan__text-5") ?>
                    </div>
                </div>
            </div>
            <picture class="implementation-plan__picture">
                <source class="implementation-plan__image" media="(max-width: 425px)"  data-srcset="<?php $plan->get_image_Mobile1xWEBP_src() ?>" type="image/webp">
                <source class="implementation-plan__image" media="(max-width: 960px)" data-srcset="<?php $plan->get_image_Tablet1xWEBP_src() ?>" type="image/webp">
                <source class="implementation-plan__image" data-srcset="<?php $plan->get_image_PC1xWEBP_src() ?>" type="image/webp">

                <source class="implementation-plan__image" media="(max-width: 425px)"  data-srcset="<?php $plan->get_image_Mobile1xJPG_src() ?>">
                <source class="implementation-plan__image" media="(max-width: 960px)" data-srcset="<?php $plan->get_image_Tablet1xJPG_src() ?>">
                <img class="implementation-plan__image animated__fadein-left__1s" data-src="<?php $plan->get_image_PC1xJPG_src() ?>" alt="implementation plan image">
            </picture>
        </div>
    </div>
</section>