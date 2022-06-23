'use strict'

import {show_uploaded_image} from '../../common/admin_page_img_input/admin_page_img_input';

// отображение изображений (фото) при ыборе input type file;
const main_banner_form = document.querySelector(".main-banner_form");

if(main_banner_form) {
    const main_banner_arr = [
        '.main-banner_logo-img',
        '.main-banner_image-PC1xJPG',
        '.main-banner_image-Tablet1xJPG',
        '.main-banner_image-Mobile1xJPG',
        '.main-banner_image-instagram',
        '.main-banner_image-telegram',
        '.main-banner_image-whatsapp',
        '.main-banner_image-facebook',
    ];

    show_uploaded_image(main_banner_arr);
}