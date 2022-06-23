'use strict'

import {show_uploaded_image} from '../../common/admin_page_img_input/admin_page_img_input';

// отображение изображений (фото) при ыборе input type file;
const implamentation_plan = document.querySelector(".implementation-plan_form");

if(implamentation_plan) {
    const arr = [
        '.implementation-plan_image-PC1xJPG-img',
        '.implementation-plan_image-Tablet1xJPG-img',
        '.implementation-plan_image-Mobile1xJPG-img',
    ];

    show_uploaded_image(arr);
}