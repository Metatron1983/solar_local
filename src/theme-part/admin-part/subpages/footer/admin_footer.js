'use strict'

import {show_uploaded_image} from '../../common/admin_page_img_input/admin_page_img_input';
import {show_uploaded_file} from '../../common/admin_page_file_input/admin_page_file_input';

// отображение изображений (фото) при ыборе input type file;
const footer = document.querySelector(".footer_form");

if(footer) {
    const arr_img = [
        '.footer_main-background-img',
        '.footer_instagram-img',
        '.footer_telegram-img',
        '.footer_whatsapp-img',
        '.footer_facebook-img',
    ];
 
    show_uploaded_image(arr_img);

    const arr_file = [
        '.footer_file-private-policy-file',
    ];

    show_uploaded_file(arr_file);
}