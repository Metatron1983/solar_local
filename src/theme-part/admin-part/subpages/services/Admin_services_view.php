<?php

require_once dirname(__FILE__) . "/Admin_services_ctrl.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_structure_part/Admin_page_structure_part.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_img_input/Admin_page_img_input.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_text_input/Admin_page_text_input.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_textarea/Admin_page_textarea.php";

class Admin_services_view {
    private string $page_slug = 'admin_services_slug'; 
    private string $page_group = 'admin_services_group'; 
    private string $section_slug = 'admin_services_section_slug'; 
    private string $folder_image_name = 'services/'; 
    private Admin_services_ctrl $admin_services_ctrl;

    public function __construct() {
        $this->admin_services_ctrl = new Admin_services_ctrl();
        add_menu_page('Наши услуги', 'Наши услуги', 'edit_others_pages', $this->page_slug, array($this, 'show_admin_services_page'), 'dashicons-cover-image');
        add_action('admin_init', array($this, 'add_setting_section'));
    }
    public function show_admin_services_page() {
        new Admin_page_structure_part('Cтраница настроек секции "Наши услуги"', 
                                      "services_title",
                                      "services_form",
                                      $this->page_group,
                                      $this->page_slug );
    }
    public function add_setting_section() {
        add_settings_section( $this->section_slug, 'Выполните настройки секции "Наши услуги"', '',  $this->page_slug);
        
        $main_banner_fields_arr = [
            ['admin_services_main_title_id', 'Введите заголовок секции'],
            ['admin_services_service_1_title_id', 'Введите заголовок первой услуги'],
            ['admin_services_service_1_text_id', 'Введите текст первой услуги'],
            ['admin_services_service_2_title_id', 'Введите заголовок второй услуги'],
            ['admin_services_service_2_text_id', 'Введите текст второй услуги'],
            ['admin_services_service_3_title_id', 'Введите заголовок третьей услуги'],
            ['admin_services_service_3_text_id', 'Введите текст третьей услуги'],
            ['admin_services_service_4_title_id', 'Введите заголовок четвертой услуги'],
            ['admin_services_service_4_text_id', 'Введите текст четвертой услуги'],
            ['admin_services_image_PC1xJPG_id', 'Выбрать изображение секции PC 1x jpg (600 x 670)'],
            ['admin_services_image_Tablet1xJPG_id', 'Выбрать изображение секции Tablet 1x jpg'],
            ['admin_services_image_Mobile1xJPG_id', 'Выбрать изображение секции Mobile 1x jpg'],
        ];

        foreach($main_banner_fields_arr as [$id, $title]) {
            add_settings_field($id, $title, array($this, 'add_main_banner_item'), $this->page_slug, $this->section_slug, $id);
            register_setting( $this->page_group, $id);
        }
    }

    public function add_main_banner_item(string $data) {
        $data_arr = [
            'admin_services_main_title_id',
            'admin_services_service_1_title_id',
            'admin_services_service_1_text_id',
            'admin_services_service_2_title_id',
            'admin_services_service_2_text_id',
            'admin_services_service_3_title_id',
            'admin_services_service_3_text_id',
            'admin_services_service_4_title_id',
            'admin_services_service_4_text_id',
            'admin_services_image_PC1xJPG_id',
            'admin_services_image_Tablet1xJPG_id',
            'admin_services_image_Mobile1xJPG_id',
        ];
        switch($data) {
            case $data_arr[0]:
                new Admin_page_text_input("services_main-title", "services[main-title]", $this->admin_services_ctrl->get_main_title());
                break; 
            case $data_arr[1]:
                new Admin_page_text_input("services_service-1-title", "services[service-1-title]", $this->admin_services_ctrl->get_service_1_title());
                break;  
            case $data_arr[2]:
                new Admin_page_textarea("services_service-1-text", "services[service-1-text]", $this->admin_services_ctrl->get_service_1_text());
                break;  
            case $data_arr[3]:
                new Admin_page_text_input("services_service-2-title", "services[service-2-title]", $this->admin_services_ctrl->get_service_2_title());
                break;         
            case $data_arr[4]:
                new Admin_page_textarea("services_service-2-text", "services[service-2-text]", $this->admin_services_ctrl->get_service_2_text());
                break;           
            case $data_arr[5]:
                new Admin_page_text_input("services_service-3-title", "services[service-3-title]", $this->admin_services_ctrl->get_service_3_title());
                break;          
            case $data_arr[6]:
                new Admin_page_textarea("services_service-3-text", "services[service-3-text]", $this->admin_services_ctrl->get_service_3_text());
                break;           
            case $data_arr[7]:
                new Admin_page_text_input("services_service-4-title", "services[service-4-title]", $this->admin_services_ctrl->get_service_4_title());
                break;          
            case $data_arr[8]:
                new Admin_page_textarea("services_service-4-text", "services[service-4-text]", $this->admin_services_ctrl->get_service_4_text());
                break;      
            case $data_arr[9]:
                $img_src = $this->folder_image_name . $this->admin_services_ctrl->get_services_image_PC1xJPG();
                new Admin_page_img_input("services_image_PC1xJPG-img", "services image PC", "services[image-PC1xJPG]", $img_src);
                break;
            case $data_arr[10]:
                $img_src = $this->folder_image_name . $this->admin_services_ctrl->get_services_image_Tablet1xJPG();
                new Admin_page_img_input("services_image_Tablet1xJPG-img", "services_image Tablet", "services[image-Tablet1xJPG]", $img_src);
                break;
            case $data_arr[11]:
                $img_src = $this->folder_image_name . 
                $this->admin_services_ctrl->get_services_image_Mobile1xJPG();
                new Admin_page_img_input("services_image_Mobile1xJPG-img", "services image Mobile", "services[image-Mobile1xJPG]", $img_src);
                break;         
        }
    }
    
}
?>