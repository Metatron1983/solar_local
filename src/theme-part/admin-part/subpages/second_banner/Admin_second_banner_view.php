<?php
require_once dirname(__FILE__) . "/Admin_second_banner_ctrl.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_structure_part/Admin_page_structure_part.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_img_input/Admin_page_img_input.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_text_input/Admin_page_text_input.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_textarea/Admin_page_textarea.php";

class Admin_second_banner_view {
    private string $page_slug = 'admin_second_banner_slug'; 
    private string $page_group = 'admin_second_banner_group'; 
    private string $section_slug = 'admin_second_banner_section_slug'; 
    private string $folder_image_name = 'second_banner/';
    private Admin_second_banner_ctrl $ctrl;

    public function __construct() {
        $this->ctrl = new Admin_second_banner_ctrl();
        add_menu_page('Второй баннер', 'Второй баннер', 'edit_others_pages', $this->page_slug, array($this, 'show_page'), 'dashicons-cover-image');
        add_action('admin_init', array($this, 'add_setting_section'));
    }
    public function show_page() {
        new Admin_page_structure_part('Cтраница настроек секции "Второй баннер', 
                                      "second-banner_title",
                                      "second-banner_form",
                                      $this->page_group,
                                      $this->page_slug );
    }
    public function add_setting_section() {
        add_settings_section( $this->section_slug, 'Выполните настройки секции "Второй баннер"', '',  $this->page_slug);
        
        $fields_arr = [
            ['admin_second_banner_image_PC1xJPG_id', 'Выбрать изображение баннера PC 1x jpg (1920 x 500)'],
            ['admin_second_banner_image_Tablet1xJPG_id', 'Выбрать изображение баннера Tablet 1x jpg'],
            ['admin_second_banner_image_Mobile1xJPG_id', 'Выбрать изображение баннера Mobile 1x jpg'],
            ['admin_second_banner_main_title_id', 'Введите текст секции "Второй баннер"'],
        ];

        foreach($fields_arr as [$id, $title]) {
            add_settings_field($id, $title, array($this, 'add_item'), $this->page_slug, $this->section_slug, $id);
            register_setting( $this->page_group, $id);
        }
    }

    public function add_item(string $data) {
        $data_arr = [
            'admin_second_banner_image_PC1xJPG_id',
            'admin_second_banner_image_Tablet1xJPG_id',
            'admin_second_banner_image_Mobile1xJPG_id',
            'admin_second_banner_main_title_id',
        ];
        switch($data) {
            case $data_arr[0]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_PC1xJPG(); 
                new Admin_page_img_input("second-banner_image-PC1xJPG-img", "second banner image-PC1xJPG", "second-banner[image-PC1xJPG]", $img_src);
                break;
            case $data_arr[1]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_Tablet1xJPG(); 
                new Admin_page_img_input("second-banner_image-Tablet1xJPG-img", "second banner image-Tablet1xJPG", "second-banner[image-Tablet1xJPG]", $img_src);
                break;
            case $data_arr[2]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_Mobile1xJPG();
                new Admin_page_img_input("second-banner_image-Mobile1xJPG-img", "second banner image-Mobile1xJPG", "second-banner[image-Mobile1xJPG]", $img_src);
                break;
            case $data_arr[3]:
                new Admin_page_text_input("second-banner_main-title", "second-banner[main-title]", $this->ctrl->get_main_title());
                break;         
        }
    }
}

?>