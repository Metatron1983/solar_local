<?php
require_once dirname(__FILE__) . "/Admin_main_banner_ctrl.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_structure_part/Admin_page_structure_part.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_img_input/Admin_page_img_input.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_text_input/Admin_page_text_input.php";

class Admin_main_banner_view {
    private string $page_slug = 'admin_main_banner_slug'; 
    private string $page_group = 'main_banner_group'; 
    private string $section_slug = 'admin_main_banner_section_slug'; 
    private Admin_main_banner_ctrl $admin_main_banner_ctrl;
    private string $folder_image_name = 'main-banner/';

    public function __construct() {
        $this->admin_main_banner_ctrl = new Admin_main_banner_ctrl();
        add_menu_page('Главный баннер', 'Главный баннер', 'edit_others_pages', $this->page_slug, array($this, 'show_admin_main_banner_page'), 'dashicons-cover-image');
        add_action('admin_init', array($this, 'add_setting_section'));
    }
    public function show_admin_main_banner_page() {
        new Admin_page_structure_part('Cтраница настроек секции "Главный баннер"', 
                                      "main-banner_title",
                                      "main-banner_form",
                                      $this->page_group,
                                      $this->page_slug );
    }
    public function add_setting_section() {
        add_settings_section( $this->section_slug, 'Выполните настройки секции "Главный баннер"', '',  $this->page_slug);
        
        $main_banner_fields_arr = [
            ['admin_main_banner_logo_id', 'Выбрать изображение логотипа (182 Х 51)'],
            ['admin_main_banner_image_PC1xJPG_id', 'Выбрать изображение главного баннера PC 1x jpg (1920 x 900)'],
            ['admin_main_banner_image_Tablet1xJPG_id', 'Выбрать изображение главного баннера Tablet 1x jpg'],
            ['admin_main_banner_image_Mobile1xJPG_id', 'Выбрать изображение главного баннера Mobile 1x jpg'],
            ['admin_main_banner_top_title_id', 'Ведите текст верхнего заголовка'],
            ['admin_main_banner_middle_title_id', 'Ведите текст среднего заголовка'],
            ['admin_main_banner_bottom_title_id', 'Ведите текст нижнего заголовка'],
            ['admin_main_banner_btn_title_id', 'Ведите текст ссылки "Оставить заявку"'],
            ['admin_main_banner_social_instagram_img_id', 'Выбрать изображение иконки Instagram (30 x 30)'],
            ['admin_main_banner_social_instagram_link_id', 'Ведите текст ссылки Instagram'],
            ['admin_main_banner_social_telegram_img_id', 'Выбрать изображение иконки Telegram (30 x 30)'],
            ['admin_main_banner_social_telegram_link_id', 'Ведите текст ссылки Telegram'],
            ['admin_main_banner_social_whatsapp_img_id', 'Выбрать изображение иконки WhatsApp (30 x 30)'],
            ['admin_main_banner_social_whatsapp_link_id', 'Ведите номер WhatsApp'],
            ['admin_main_banner_social_facebook_img_id', 'Выбрать изображение иконки Facebook (30 x 30)'],
            ['admin_main_banner_social_facebook_link_id', 'Ведите текст ссылки Facebook']
        ];

        foreach($main_banner_fields_arr as [$id, $title]) {
            add_settings_field($id, $title, array($this, 'add_main_banner_item'), $this->page_slug, $this->section_slug, $id);
            register_setting( $this->page_group, $id);
        }
    }

    public function add_main_banner_item(string $data) {
        $data_arr = [
            'admin_main_banner_logo_id',
            'admin_main_banner_image_PC1xJPG_id',
            'admin_main_banner_image_Tablet1xJPG_id', 
            'admin_main_banner_image_Mobile1xJPG_id', 
            'admin_main_banner_top_title_id', 
            'admin_main_banner_middle_title_id', 
            'admin_main_banner_bottom_title_id',
            'admin_main_banner_btn_title_id',
            'admin_main_banner_social_instagram_img_id', 
            'admin_main_banner_social_instagram_link_id',
            'admin_main_banner_social_telegram_img_id',
            'admin_main_banner_social_telegram_link_id',
            'admin_main_banner_social_whatsapp_img_id',
            'admin_main_banner_social_whatsapp_link_id',
            'admin_main_banner_social_facebook_img_id',
            'admin_main_banner_social_facebook_link_id',
        ];
        switch($data) {
            case $data_arr[0]:
                $img_src = $this->folder_image_name . $this->admin_main_banner_ctrl->get_logo_src();
                new Admin_page_img_input("main-banner_logo-img", "LOGO", "main_banner[logo]",  $img_src);
                break;
            case $data_arr[1]:
                $img_src = $this->folder_image_name . $this->admin_main_banner_ctrl->get_image_PC1xJPG();
                new Admin_page_img_input("main-banner_image-PC1xJPG", "Главный баннер PC1xJPG", "main_banner[image-PC1xJPG]", $img_src);
                break;   
            case $data_arr[2]:
                $img_src = $this->folder_image_name . $this->admin_main_banner_ctrl->get_image_Tablet1xJPG();
                new Admin_page_img_input("main-banner_image-Tablet1xJPG", "Главный баннер Tablet1xJPG", "main_banner[image-Tablet1xJPG]", $img_src);
                break;         
            case $data_arr[3]:
                $img_src = $this->folder_image_name . $this->admin_main_banner_ctrl->get_image_Mobile1xJPG();
                new Admin_page_img_input("main-banner_image-Mobile1xJPG", "Главный баннер Mobile1xJPG", "main_banner[image-Mobile1xJPG]", $img_src);
                break;         
            case $data_arr[4]:
                new Admin_page_text_input("main-banner_top-title", "main_banner[top-title]", $this->admin_main_banner_ctrl->get_top_title());
                break;         
            case $data_arr[5]:
                new Admin_page_text_input("main-banner_middle-title", "main_banner[middle-title]", $this->admin_main_banner_ctrl->get_middle_title());
                break;         
            case $data_arr[6]:
                new Admin_page_text_input("main-banner_bottom-title", "main_banner[bottom-title]", $this->admin_main_banner_ctrl->get_bottom_title());
                break;         
            case $data_arr[7]:
                new Admin_page_text_input("main-banner_btn-title", "main_banner[btn-title]", $this->admin_main_banner_ctrl->get_btn_title());
                break;         
            case $data_arr[8]:
                $img_src = $this->folder_image_name . $this->admin_main_banner_ctrl->get_instagram_img();
                new Admin_page_img_input("main-banner_image-instagram", "Лого instagram", "main_banner[image-instagram]", $img_src);
                break;         
            case $data_arr[9]:
                new Admin_page_text_input("main-banner_link-instagram", "main_banner[link-instagram]", $this->admin_main_banner_ctrl->get_instagram_link());
                break;         
            case $data_arr[10]:
                $img_src = $this->folder_image_name . $this->admin_main_banner_ctrl->get_telegram_img();
                new Admin_page_img_input("main-banner_image-telegram", "Лого telegram", "main_banner[image-telegram]", $img_src);
                break;         
            case $data_arr[11]:
                new Admin_page_text_input("main-banner_link-telegram", "main_banner[link-telegram]", $this->admin_main_banner_ctrl->get_telegram_link());
                break;         
            case $data_arr[12]:
                $img_src = $this->folder_image_name . $this->admin_main_banner_ctrl->get_whatsapp_img();
                new Admin_page_img_input("main-banner_image-whatsapp", "Лого whatsapp", "main_banner[image-whatsapp]", $img_src);
                break;         
            case $data_arr[13]:
                new Admin_page_text_input("main-banner_link-whatsapp", "main_banner[link-whatsapp]", $this->admin_main_banner_ctrl->get_whatsapp_link());
                break;         
            case $data_arr[14]:
                $img_src = $this->folder_image_name . $this->admin_main_banner_ctrl->get_facebook_img();
                new Admin_page_img_input("main-banner_image-facebook", "Лого facebook", "main_banner[image-facebook]", $img_src);
                break;         
            case $data_arr[15]:
                new Admin_page_text_input("main-banner_link-facebook", "main_banner[link-facebook]", $this->admin_main_banner_ctrl->get_facebook_link());
                break;         
        }
    }
}
?>