<?php
require_once dirname(__FILE__) . '/Second_banner_ctrl.php';
$second_banner = new Second_banner_ctrl;
?>

<section class="second-banner js-lazy-load-section">
    <h2 class="second-banner__title "><?php $second_banner->get_main_title_text() ?></h2>
    <picture class="second-banner__picture">
        <source class="second-banner__image" media="(min-width: 425px)" data-srcset="<?php $second_banner->get_image_PC1xJPG_src() ?>">
        <source class="second-banner__image" media="(min-width: 960px)" data-srcset="<?php $second_banner->get_image_Tablet1xJPG_src() ?>">
        <img class="second-banner__image animated__fadein__1s" data-src="<?php $second_banner->get_image_PC1xJPG_src() ?>" alt="second banner image">
    </picture>
</section>