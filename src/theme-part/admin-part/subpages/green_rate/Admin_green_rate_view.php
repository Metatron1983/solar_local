<?php
require_once dirname(__FILE__) . "/Admin_green_rate_ctrl.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_structure_part/Admin_page_structure_part.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_img_input/Admin_page_img_input.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_text_input/Admin_page_text_input.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_textarea/Admin_page_textarea.php";

class Admin_green_rate_view {
    private string $page_slug = 'admin_green_rate_slug'; 
    private string $page_group = 'admin_green_rate_group'; 
    private string $section_slug = 'admin_green_rate_section_slug'; 
    private string $folder_image_name = 'green_rate/';
    private Admin_green_rate_ctrl $admin_green_rate_ctrl;

    public function __construct() {
        $this->admin_green_rate_ctrl = new Admin_green_rate_ctrl();
        add_menu_page('Зеленый тариф', 'Зеленый тариф', 'edit_others_pages', $this->page_slug, array($this, 'show_page'), 'dashicons-cover-image');
        add_action('admin_init', array($this, 'add_setting_section'));
    }
    public function show_page() {
        new Admin_page_structure_part('Cтраница настроек секции "Зеленый тариф', 
                                      "green_rate_title",
                                      "green_rate_form",
                                      $this->page_group,
                                      $this->page_slug );
    }
    public function add_setting_section() {
        add_settings_section( $this->section_slug, 'Выполните настройки секции "Зеленый тариф"', '',  $this->page_slug);
        
        $main_banner_fields_arr = [
            ['admin_green_rate_main_title_id', 'Введите заголовок секции'],
            ['admin_green_rate_main_advantage_image_id', 'Выбрать иллюстрацию основного преимущества "Зеленый тариф" (235 x 200)'],
            ['admin_green_rate_main_advantage_text_id', 'Введите текст основного преимущества "Зеленый тариф"'],
            ['admin_green_rate_advantage_1_title_id', 'Введите заголовок первого преимущества'],
            ['admin_green_rate_advantage_1_text_id', 'Введите текст первого преимущества'],
            ['admin_green_rate_advantage_2_title_id', 'Введите заголовок второго преимущества'],
            ['admin_green_rate_advantage_2_text_id', 'Введите текст второго преимущества'],
            ['admin_green_rate_advantage_3_title_id', 'Введите заголовок третьего преимущества'],
            ['admin_green_rate_advantage_3_text_id', 'Введите текст третьего преимущества'],
            ['admin_green_rate_advantage_4_title_id', 'Введите заголовок четвертого преимущества'],
            ['admin_green_rate_advantage_4_text_id', 'Введите текст четвертого преимущества'],
            ['admin_green_rate_explanation_text_id', 'Введите текст описания "Зеленый тариф"'],
            ['admin_green_rate_explanation_image_PC1xJPG_id', 'Выбрать изображение описания "Зеленый тариф" PC 1x jpg (600 x 525)'],
            ['admin_green_rate_explanation_image_Tablet1xJPG_id', 'Выбрать изображение описания "Зеленый тариф" Tablet 1x jpg'],
            ['admin_green_rate_explanation_image_Mobile1xJPG_id', 'Выбрать изображение описания "Зеленый тариф" Mobile 1x jpg'],
        ];

        foreach($main_banner_fields_arr as [$id, $title]) {
            add_settings_field($id, $title, array($this, 'add_main_banner_item'), $this->page_slug, $this->section_slug, $id);
            register_setting( $this->page_group, $id);
        }
    }

    public function add_main_banner_item(string $data) {
        $data_arr = [
            'admin_green_rate_main_title_id',
            'admin_green_rate_main_advantage_image_id', 
            'admin_green_rate_main_advantage_text_id',
            'admin_green_rate_advantage_1_title_id',
            'admin_green_rate_advantage_1_text_id',
            'admin_green_rate_advantage_2_title_id',
            'admin_green_rate_advantage_2_text_id',
            'admin_green_rate_advantage_3_title_id',
            'admin_green_rate_advantage_3_text_id',
            'admin_green_rate_advantage_4_title_id',
            'admin_green_rate_advantage_4_text_id',
            'admin_green_rate_explanation_text_id',
            'admin_green_rate_explanation_image_PC1xJPG_id',
            'admin_green_rate_explanation_image_Tablet1xJPG_id',
            'admin_green_rate_explanation_image_Mobile1xJPG_id',
        ];
        switch($data) {
            case $data_arr[0]:
                new Admin_page_text_input("green-rate_main-title", "green-rate[main-title]", $this->admin_green_rate_ctrl->get_main_title());
                break; 
            case $data_arr[1]:
                $img_src = $this->folder_image_name . $this->admin_green_rate_ctrl->get_main_advantage_image();
                new Admin_page_img_input("green_rate_main_advantage_image-img", "green rate main advantage image", "green-rate[main-advantage-image]", $img_src);
                break;
            case $data_arr[2]:
                new Admin_page_textarea("green-rate_main-advantage-text", "green-rate[main-advantage-text]", $this->admin_green_rate_ctrl->get_main_advantage_text());
                break;  
            case $data_arr[3]:
                new Admin_page_text_input("green-rate_advantage-1-title", "green-rate[advantage-1-title]", $this->admin_green_rate_ctrl->get_advantage_1_title());
                break;         
            case $data_arr[4]:
                new Admin_page_textarea("green-rate_advantage-1-text", "green-rate[advantage-1-text]", $this->admin_green_rate_ctrl->get_advantage_1_text());
                break;           
            case $data_arr[5]:
                new Admin_page_text_input("green-rate_advantage-2-title", "green-rate[advantage-2-title]", $this->admin_green_rate_ctrl->get_advantage_2_title());
                break;             
            case $data_arr[6]:
                new Admin_page_textarea("green-rate_advantage-2-text", "green-rate[advantage-2-text]", $this->admin_green_rate_ctrl->get_advantage_2_text());
                break;           
            case $data_arr[7]:
                new Admin_page_text_input("green-rate_advantage-3-title", "green-rate[advantage-3-title]", $this->admin_green_rate_ctrl->get_advantage_3_title());
                break;           
            case $data_arr[8]:
                new Admin_page_textarea("green-rate_advantage-3-text", "green-rate[advantage-3-text]", $this->admin_green_rate_ctrl->get_advantage_3_text());
                break;     
            case $data_arr[9]:
                new Admin_page_text_input("green-rate_advantage-4-title", "green-rate[advantage-4-title]", $this->admin_green_rate_ctrl->get_advantage_4_title());
                break; 
            case $data_arr[10]:
                new Admin_page_textarea("green-rate_advantage-4-text", "green-rate[advantage-4-text]", $this->admin_green_rate_ctrl->get_advantage_4_text());
                break; 
            case $data_arr[11]:
                new Admin_page_textarea("green-rate_explanation-text", "green-rate[explanation-text]", $this->admin_green_rate_ctrl->get_explanation_text());
                break;  
            case $data_arr[12]:
                $img_src = $this->folder_image_name . $this->admin_green_rate_ctrl->get_explanation_image_PC1xJPG(); 
                new Admin_page_img_input("green-rate_explanation-image-PC1xJPG-img", "green rate explanation image PC1xJPG", "green-rate[explanation-image-PC1xJPG]", $img_src);
                break;
            case $data_arr[13]:
                $img_src = $this->folder_image_name . $this->admin_green_rate_ctrl->get_explanation_image_Tablet1xJPG(); 
                new Admin_page_img_input("green-rate_explanation-image-Tablet1xJPG-img", "green rate explanation image Tablet1xJPG", "green-rate[explanation-image-Tablet1xJPG]", $img_src);
                break;
            case $data_arr[14]:
                $img_src = $this->folder_image_name . $this->admin_green_rate_ctrl->get_explanation_image_Mobile1xJPG();
                new Admin_page_img_input("green-rate_explanation-image-Mobile1xJPG-img", "green rate explanation image Mobile1xJPG", "green-rate[explanation-image-Mobile1xJPG]", $img_src);
                break;
        }
    }
}
?>