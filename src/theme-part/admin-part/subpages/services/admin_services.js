'use strict'

import {show_uploaded_image} from '../../common/admin_page_img_input/admin_page_img_input';

// отображение изображений (фото) при ыборе input type file;
const service_form = document.querySelector(".services_form");

if(service_form) {
    const service_arr = [
        '.services_image_PC1xJPG-img',
        '.services_image_Tablet1xJPG-img',
        '.services_image_Mobile1xJPG-img',
    ];

    show_uploaded_image(service_arr);
}