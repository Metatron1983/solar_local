'use strict'

import {show_uploaded_image} from '../../common/admin_page_img_input/admin_page_img_input';

// отображение изображений (фото) при ыборе input type file;
const green_rate_form = document.querySelector(".green_rate_form");

if(green_rate_form) {
    const arr = [
        '.green_rate_main_advantage_image-img',
        '.green-rate_explanation-image-PC1xJPG-img',
        '.green-rate_explanation-image-Tablet1xJPG-img',
        '.green-rate_explanation-image-Mobile1xJPG-img',
    ];

    show_uploaded_image(arr);
}