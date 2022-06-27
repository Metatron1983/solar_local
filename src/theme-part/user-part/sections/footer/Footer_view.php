<?php
require_once dirname(__FILE__, 1) . '/Footer_ctrl.php';
$footer = new Footer_ctrl;
?>

</main>
<footer id="footer" class="footer js-lazy-load-section">
    <div class="container">
        <div class="footer__top">
            <div class="footer-request">
                <?php $footer->show_request_title('footer-request__title') ?>
                <form method="post" class="footer-request__form" enctype="multipart/form-data">
                    <div class="footer-request__input-wrapper footer-request__input-wrapper-name animated__fadein-up__1s">
                        <input type="text" name="request[name]" class="footer-request__input footer-request__input-name" placeholder="<?php $footer->get_placeholder_name() ?>" maxlength="50">
                    </div>
                    <div class="footer-request__input-wrapper footer-request__input-wrapper-phone animated__fadein-up__1s">
                        <input type="tel" name="request[phone]" class="footer-request__input footer-request__input-phone" placeholder="<?php $footer->get_placeholder_phone() ?>" maxlength="40">
                    </div>
                    <button type="submit" class="footer-request__btn-submit request_btn animated__fadein__1s">
                        <?php $footer->get_btn_value() ?>
                    </button>
                </form>
            </div>
            <div class="footer-contacts">
                <?php $footer->show_contacts_title('footer-contacts__title') ?>
                <div class="footer-contacts__content-box animated__fadein-up__1s">
                    <p class="footer-contacts__content">Центральный офис:</p>
                    <p class="footer-contacts__content"><?php $footer->get_central_office_address() ?></p>
                </div>
                <div class="footer-contacts__content-box animated__fadein-up__1s">
                    <p class="footer-contacts__content">Центральное представительство:</p>
                    <p class="footer-contacts__content"><?php $footer->get_representative_offices_address() ?></p>
                </div>
                <div class="footer-contacts__content-box animated__fadein-up__1s">
                    <p class="footer-contacts__content">Представительства в <?php $footer->get_representative_offices_citys() ?></p>
                </div>
                <div class="footer-contacts__content-box animated__fadein-up__1s">
                    <p class="footer-contacts__content"><?php $footer->get_phone_number_1() ?></p>
                    <p class="footer-contacts__content"><?php $footer->get_phone_number_2() ?></p>
                </div>
                <div class="footer-contacts__content-box animated__fadein-up__1s">
                    <p class="footer-contacts__content"><?php $footer->get_work_schedule() ?></p>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <a href="<?php $footer->get_file_private_policy_src() ?>" class="footer__private-policy animated__fadein__1s"><?php $footer->get_placeholder_private_policy() ?></a>
            <?php $footer->show_logo('footer__logo') ?>
            <?php $footer->show_social_box() ?>
        </div>
    </div>
    <div class="footer__main-background-wrapper">
    <picture class="footer__background-picture">
        <source class="footer__background-image" data-srcset="<?php $footer->get_main_background_WEBP_src() ?>" type="image/webp">
        <img class="footer__background-image" data-src="<?php $footer->get_main_background_src() ?>" alt="footer background">
    </picture>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>