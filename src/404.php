<?php
require_once dirname(__FILE__) . "/theme-part/user-part/sections/main_banner/Main_banner_ctrl.php";
$main_banner = new Main_banner_ctrl();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php bloginfo('name') ?></title>
    <meta name="description" content="Solar - Солнечные электростанции">

    <meta name="googlebot" content="noindex, nofollow">

    <meta name="subject" content="Зеленая энергетика, солнечные батареи">

    <meta content="Solar - Солнечные электростанции. Страница не найдена">


    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="apple-mobile-web-app-title" content="solar exe">
    <meta name="application-name" content="solar exe">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="<?php print(content_url() . '/themes/solar/asset/style/main-404.min.css') ?>">
</head>

<body>
    <main>
        <section class="page404 main-banner js-lazy-load-section">
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
                <h1 class="main-banner__middle-title animated__fadein-right__1s">
                    Страница не найдена 
                </h1>
                <a href="http://www.solar.local" class="page404__link main-banner__bottom-title animated__fadein-left__1s">вернуться на главную</a>
                <?php
                
                $main_banner->show_social_box();
                ?>

            </div>

        </section>
    </main>
    <script src="<?php print(content_url('/themes/solar/asset/script/main-404.min.js'))?>"></script>
</body>

</html>