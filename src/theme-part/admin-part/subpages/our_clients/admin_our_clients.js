'use strict'

import {show_uploaded_image} from '../../common/admin_page_img_input/admin_page_img_input';

const our_clients = document.querySelector(".our-clients_form");

if(our_clients) {
    const arr = [
        '.our-clients_image-1-PC1xJPG-img',
        '.our-clients_image-2-PC1xJPG-img',
        '.our-clients_image-3-PC1xJPG-img',
        '.our-clients_image-1-Tablet1xJPG-img',
        '.our-clients_image-2-Tablet1xJPG-img',
        '.our-clients_image-3-Tablet1xJPG-img',
        '.our-clients_image-1-Mobile1xJPG-img',
        '.our-clients_image-2-Mobile1xJPG-img',
        '.our-clients_image-3-Mobile1xJPG-img',
    ];

    show_uploaded_image(arr);
}