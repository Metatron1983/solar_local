<?php

require_once dirname(__FILE__) . "/Admin_implementation_plan_ctrl.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_structure_part/Admin_page_structure_part.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_img_input/Admin_page_img_input.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_text_input/Admin_page_text_input.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_textarea/Admin_page_textarea.php";

class Admin_implementation_plan_view {
    private string $page_slug = 'admin_implementation_plan_slug'; 
    private string $page_group = 'admin_implementation_plan_group'; 
    private string $section_slug = 'admin_implementation_plan_section_slug'; 
    private string $folder_image_name = 'implementation_plan/';
    private Admin_implementation_plan_ctrl $ctrl;

    public function __construct() {
        $this->ctrl = new Admin_implementation_plan_ctrl();
        add_menu_page('5 шагов', '5 шагов', 'edit_others_pages', $this->page_slug, array($this, 'show_page'), 'dashicons-cover-image');
        add_action('admin_init', array($this, 'add_setting_section'));
    }
    public function show_page() {
        new Admin_page_structure_part('Cтраница настроек секции "5 шагов к собственной электростанции"', 
                                      "implementation-plan_title",
                                      "implementation-plan_form",
                                      $this->page_group,
                                      $this->page_slug );
    }
    public function add_setting_section() {
        add_settings_section( $this->section_slug, 'Выполните настройки секции "5 шагов к собственной электростанции"', '',  $this->page_slug);
        
        $fields_arr = [
            ['admin_implementation_plan_main_title_id', 'Укажите заголовок секции "5 шагов к собственной электростанции"'],
            ['admin_implementation_plan_step_1_title_id', 'Укажите заголовок 1 шага'],
            ['admin_implementation_plan_step_1_text_id', 'Укажите текст 1 шага'],
            ['admin_implementation_plan_step_2_title_id', 'Укажите заголовок 2 шага'],
            ['admin_implementation_plan_step_2_text_id', 'Укажите текст 2 шага'],
            ['admin_implementation_plan_step_3_title_id', 'Укажите заголовок 3 шага'],
            ['admin_implementation_plan_step_3_text_id', 'Укажите текст 3 шага'],
            ['admin_implementation_plan_step_4_title_id', 'Укажите заголовок 4 шага'],
            ['admin_implementation_plan_step_4_text_id', 'Укажите текст 4 шага'],
            ['admin_implementation_plan_step_5_title_id', 'Укажите заголовок 5 шага'],
            ['admin_implementation_plan_step_5_text_id', 'Укажите текст 5 шага'],
            ['admin_implementation_plan_image_PC1xJPG_id', 'Выбрать изображение баннера PC 1x jpg (1920 x 500)'],
            ['admin_implementation_plan_image_Tablet1xJPG_id', 'Выбрать изображение баннера Tablet 1x jpg'],
            ['admin_implementation_plan_image_Mobile1xJPG_id', 'Выбрать изображение баннера Mobile 1x jpg'],
        ];

        foreach($fields_arr as [$id, $title]) {
            add_settings_field($id, $title, array($this, 'add_item'), $this->page_slug, $this->section_slug, $id);
            register_setting( $this->page_group, $id);
        }
    }

    public function add_item(string $data) {
        $data_arr = [
            'admin_implementation_plan_main_title_id', 
            'admin_implementation_plan_step_1_title_id',
            'admin_implementation_plan_step_1_text_id', 
            'admin_implementation_plan_step_2_title_id',
            'admin_implementation_plan_step_2_text_id', 
            'admin_implementation_plan_step_3_title_id', 
            'admin_implementation_plan_step_3_text_id', 
            'admin_implementation_plan_step_4_title_id', 
            'admin_implementation_plan_step_4_text_id', 
            'admin_implementation_plan_step_5_title_id', 
            'admin_implementation_plan_step_5_text_id', 
            'admin_implementation_plan_image_PC1xJPG_id',
            'admin_implementation_plan_image_Tablet1xJPG_id', 
            'admin_implementation_plan_image_Mobile1xJPG_id', 
        ];
        switch($data) {
            case $data_arr[0]:
                new Admin_page_text_input("implementation-plan_main-title", "implementation-plan[main-title]", $this->ctrl->get_main_title());
                break;
            case $data_arr[1]:
                new Admin_page_text_input("implementation-plan_step-1-title", "implementation-plan[step-1-title]", $this->ctrl->get_step_1_title());
                break;
            case $data_arr[2]:
                new Admin_page_textarea("implementation-plan_step-1-text", "implementation-plan[step-1-text]", $this->ctrl->get_step_1_text());
                break;
            case $data_arr[3]:
                new Admin_page_text_input("implementation-plan_step-2-title", "implementation-plan[step-2-title]", $this->ctrl->get_step_2_title());
                break;
            case $data_arr[4]:
                new Admin_page_textarea("implementation-plan_step-2-text", "implementation-plan[step-2-text]", $this->ctrl->get_step_2_text());
                break;
            case $data_arr[5]:
                new Admin_page_text_input("implementation-plan_step-3-title", "implementation-plan[step-3-title]", $this->ctrl->get_step_3_title());
                break;
            case $data_arr[6]:
                new Admin_page_textarea("implementation-plan_step-3-text", "implementation-plan[step-3-text]", $this->ctrl->get_step_3_text());
                break;
            case $data_arr[7]:
                new Admin_page_text_input("implementation-plan_step-4-title", "implementation-plan[step-4-title]", $this->ctrl->get_step_4_title());
                break;
            case $data_arr[8]:
                new Admin_page_textarea("implementation-plan_step-4-text", "implementation-plan[step-4-text]", $this->ctrl->get_step_4_text());
                break;
            case $data_arr[9]:
                new Admin_page_text_input("implementation-plan_step-5-title", "implementation-plan[step-5-title]", $this->ctrl->get_step_5_title());
                break;
            case $data_arr[10]:
                new Admin_page_textarea("implementation-plan_step-5-text", "implementation-plan[step-5-text]", $this->ctrl->get_step_5_text());
                break;
            case $data_arr[11]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_PC1xJPG(); 
                new Admin_page_img_input("implementation-plan_image-PC1xJPG-img", "implementation plan image-PC1xJPG", "implementation-plan[image-PC1xJPG]", $img_src);
                break;
            case $data_arr[12]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_Tablet1xJPG(); 
                new Admin_page_img_input("implementation-plan_image-Tablet1xJPG-img", "implementation plan image-Tablet1xJPG", "implementation-plan[image-Tablet1xJPG]", $img_src);
                break;
            case $data_arr[13]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_Mobile1xJPG();
                new Admin_page_img_input("implementation-plan_image-Mobile1xJPG-img", "implementation plan image-Mobile1xJPG", "implementation-plan[image-Mobile1xJPG]", $img_src);
                break;  
        }
    }
}

?>