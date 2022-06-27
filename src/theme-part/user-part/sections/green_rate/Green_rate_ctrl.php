<?php

require_once dirname(__FILE__, 3) . '/User_section_ctrl.php';
require_once dirname(__FILE__, 5) . '/config.php';

class Green_rate_ctrl extends User_section_ctrl {
    private Db_green_rate_tbl_field_name $fields_name;

    public function __construct() {
        $db_table_name = 'green_rate';
        $folder_img_name = 'green_rate/';
        $this->fields_name = new Db_green_rate_tbl_field_name;
        parent::__construct($db_table_name, $folder_img_name);
    }
    public function show_main_title() {
        $class_name = 'green-rate__main-title';
        $this->show_main_title_common($this->fields_name->main_title, $class_name);
    }
    public function get_explanation_text() {
        $data = $this->get_text_data($this->fields_name->explanation_text);
        return print($data);
    }
    public function get_main_advantage_text() {
        $data = $this->get_text_data($this->fields_name->main_advantage_text);
        return print($data);
    }
    public function get_main_advantage_image_src() {
        $data = $this->get_img_data($this->fields_name->main_advantage_image);
        return print($data);
    }
    public function get_main_advantage_image_WEBP_src() {
        $data = $this->get_img_data($this->fields_name->main_advantage_image);
        $data = $this->file_img_name_webp ($data);
        return print($data);
    }
    public function get_advantage_1_title(string $class_name) {
        $this->show_content_title($this->fields_name->advantage_1_title, $class_name);
    }
    public function get_advantage_1_text(string $class_name) {
        $this->show_content_text($this->fields_name->advantage_1_text, $class_name);
    }
    public function get_advantage_2_title(string $class_name) {
        $this->show_content_title($this->fields_name->advantage_2_title, $class_name);
    }
    public function get_advantage_2_text(string $class_name) {
        $this->show_content_text($this->fields_name->advantage_2_text, $class_name);
    }
    public function get_advantage_3_title(string $class_name) {
        $this->show_content_title($this->fields_name->advantage_3_title, $class_name);
    }
    public function get_advantage_3_text(string $class_name) {
        $this->show_content_text($this->fields_name->advantage_3_text, $class_name);
    }
    public function get_advantage_4_title(string $class_name) {
        $this->show_content_title($this->fields_name->advantage_4_title, $class_name);
    }
    public function get_advantage_4_text(string $class_name) {
        $this->show_content_text($this->fields_name->advantage_4_text, $class_name);
    }
    public function get_explanation_image_PC1xJPG_src() {
        $data = $this->get_img_data($this->fields_name->explanation_image_PC1xJPG);
        return print($data);
    }
    public function get_explanation_image_PC1xWEBP_src() {
        $data = $this->get_img_data($this->fields_name->explanation_image_PC1xJPG);
        $data = $this->file_img_name_webp ($data);
        return print($data);
    }
    public function get_explanation_image_Tablet1xJPG_src() {
        $data = $this->get_img_data($this->fields_name->explanation_image_Tablet1xJPG);
        return print($data);
    }
    public function get_explanation_image_Tablet1xWEBP_src() {
        $data = $this->get_img_data($this->fields_name->explanation_image_Tablet1xJPG);
        $data = $this->file_img_name_webp ($data);
        return print($data);
    }
    public function get_explanation_image_Mobile1xJPG_src() {
        $data = $this->get_img_data($this->fields_name->explanation_image_Mobile1xJPG);
        return print($data);
    }
    public function get_explanation_image_Mobile1xWEBP_src() {
        $data = $this->get_img_data($this->fields_name->explanation_image_Mobile1xJPG);
        $data = $this->file_img_name_webp ($data);
        return print($data);
    }

}

?>