<?php
require_once dirname(__FILE__,3) . '/User_section_ctrl.php';
require_once dirname(__FILE__,5) . '/config.php';

class Implementation_plan_ctrl extends User_section_ctrl {
    private Db_implementation_plan_tbl_field_name $fields_name;

    public function __construct() {
        $db_table_name = 'implementation_plan';
        $folder_img_name = 'implementation_plan/';
        parent::__construct($db_table_name, $folder_img_name);
        $this->fields_name = new Db_implementation_plan_tbl_field_name;
    }
    public function show_main_title($class_name) {
        $field_name = $this->fields_name->main_title;
        $this->show_main_title_common($field_name, $class_name);
    }
    public function show_step_1_title($class_name) {
        $field_name = $this->fields_name->step_1_title;
        $this->show_content_title($field_name, $class_name);
    }
    public function show_step_1_text($class_name) {
        $field_name = $this->fields_name->step_1_text;
        $this->show_content_text($field_name, $class_name);
    }
    public function show_step_2_title($class_name) {
        $field_name = $this->fields_name->step_2_title;
        $this->show_content_title($field_name, $class_name);
    }
    public function show_step_2_text($class_name) {
        $field_name = $this->fields_name->step_2_text;
        $this->show_content_text($field_name, $class_name);
    }
    public function show_step_3_title($class_name) {
        $field_name = $this->fields_name->step_3_title;
        $this->show_content_title($field_name, $class_name);
    }
    public function show_step_3_text($class_name) {
        $field_name = $this->fields_name->step_3_text;
        $this->show_content_text($field_name, $class_name);
    }
    public function show_step_4_title($class_name) {
        $field_name = $this->fields_name->step_4_title;
        $this->show_content_title($field_name, $class_name);
    }
    public function show_step_4_text($class_name) {
        $field_name = $this->fields_name->step_4_text;
        $this->show_content_text($field_name, $class_name);
    }
    public function show_step_5_title($class_name) {
        $field_name = $this->fields_name->step_5_title;
        $this->show_content_title($field_name, $class_name);
    }
    public function show_step_5_text($class_name) {
        $field_name = $this->fields_name->step_5_text;
        $this->show_content_text($field_name, $class_name);
    }
    public function get_image_PC1xJPG_src() {
        $data = $this->get_img_data($this->fields_name->image_PC1xJPG);
        return print($data);
    }
    public function get_image_Tablet1xJPG_src() {
        $data = $this->get_img_data($this->fields_name->image_Tablet1xJPG);
        return print($data);
    }
    public function get_image_Mobile1xJPG_src() {
        $data = $this->get_img_data($this->fields_name->image_Mobile1xJPG);
        return print($data);
    }
}
?>