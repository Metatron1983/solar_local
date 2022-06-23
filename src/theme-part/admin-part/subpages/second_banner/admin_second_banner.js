'use strict'

import {show_uploaded_image} from '../../common/admin_page_img_input/admin_page_img_input';

// отображение изображений (фото) при ыборе input type file;
const second_banner = document.querySelector(".second-banner_form");

if(second_banner) {
    const arr = [
        '.second-banner_image-PC1xJPG-img',
        '.second-banner_image-Tablet1xJPG-img',
        '.second-banner_image-Mobile1xJPG-img',
    ];

    show_uploaded_image(arr);
}