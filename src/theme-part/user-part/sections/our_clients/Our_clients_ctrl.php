<?php
require_once dirname(__FILE__, 3) . '/User_section_ctrl.php';
require_once dirname(__FILE__, 5) . '/config.php'; 

class Our_clients_ctrl extends User_section_ctrl {
    private Db_our_clients_tbl_field_name $fields_name;
    
    public function __construct(){
        $db_table_name = 'our_clients';
        $folder_img_name = 'our_clients/';
        $this->fields_name = new Db_our_clients_tbl_field_name;

        parent::__construct($db_table_name, $folder_img_name);
    }
    public function show_main_title_text():void {
        $field_name = $this->fields_name->main_title;
        $class_name = 'our-clients__main-title';
        $this->show_main_title_common($field_name, $class_name);
    }
    public function get_image_1_PC1xJPG_src():string {
        $data = $this->get_img_data($this->fields_name->image_1_PC1xJPG);
        return print($data);
    }
    public function get_image_2_PC1xJPG_src():string {
        $data = $this->get_img_data($this->fields_name->image_2_PC1xJPG);
        return print($data);
    }
    public function get_image_3_PC1xJPG_src():string {
        $data = $this->get_img_data($this->fields_name->image_3_PC1xJPG);
        return print($data);
    }
    public function get_image_1_Tablet1xJPG_src():string {
        $data = $this->get_img_data($this->fields_name->image_1_Tablet1xJPG);
        return print($data);
    }
    public function get_image_2_Tablet1xJPG_src():string {
        $data = $this->get_img_data($this->fields_name->image_2_Tablet1xJPG);
        return print($data);
    }
    public function get_image_3_Tablet1xJPG_src():string {
        $data = $this->get_img_data($this->fields_name->image_3_Tablet1xJPG);
        return print($data);
    }
    public function get_image_1_Mobile1xJPG_src():string {
        $data = $this->get_img_data($this->fields_name->image_1_Mobile1xJPG);
        return print($data);
    }
    public function get_image_2_Mobile1xJPG_src():string {
        $data = $this->get_img_data($this->fields_name->image_2_Mobile1xJPG);
        return print($data);
    }
    public function get_image_3_Mobile1xJPG_src():string {
        $data = $this->get_img_data($this->fields_name->image_3_Mobile1xJPG);
        return print($data);
    }

    public function get_image_1_PC1xWEBP_src():string {
        $data = $this->get_img_data($this->fields_name->image_1_PC1xJPG);
        $data = $this->file_img_name_webp ($data);
        return print($data);
    }
    public function get_image_2_PC1xWEBP_src():string {
        $data = $this->get_img_data($this->fields_name->image_2_PC1xJPG);
        $data = $this->file_img_name_webp($data);
        return print($data);
    }
    public function get_image_3_PC1xWEBP_src():string {
        $data = $this->get_img_data($this->fields_name->image_3_PC1xJPG);
        $data = $this->file_img_name_webp($data);
        return print($data);
    }
    public function get_image_1_Tablet1xWEBP_src():string {
        $data = $this->get_img_data($this->fields_name->image_1_Tablet1xJPG);
        $data = $this->file_img_name_webp($data);
        return print($data);
    }
    public function get_image_2_Tablet1xWEBP_src():string {
        $data = $this->get_img_data($this->fields_name->image_2_Tablet1xJPG);
        $data = $this->file_img_name_webp($data);
        return print($data);
    }
    public function get_image_3_Tablet1xWEBP_src():string {
        $data = $this->get_img_data($this->fields_name->image_3_Tablet1xJPG);
        $data = $this->file_img_name_webp($data);
        return print($data);
    }
    public function get_image_1_Mobile1xWEBP_src():string {
        $data = $this->get_img_data($this->fields_name->image_1_Mobile1xJPG);
        $data = $this->file_img_name_webp($data);
        return print($data);
    }
    public function get_image_2_Mobile1xWEBP_src():string {
        $data = $this->get_img_data($this->fields_name->image_2_Mobile1xJPG);
        $data = $this->file_img_name_webp($data);
        return print($data);
    }
    public function get_image_3_Mobile1xWEBP_src():string {
        $data = $this->get_img_data($this->fields_name->image_3_Mobile1xJPG);
        $data = $this->file_img_name_webp($data);
        return print($data);
    }

    public function show_content_title_1_text() {
        $field_name = $this->fields_name->title_1;
        $class_name = 'our-clients__title our-clients__title-1';
        $this->show_content_title($field_name, $class_name);
    }
    public function show_content_title_2_text() {
        $field_name = $this->fields_name->title_2;
        $class_name = 'our-clients__title our-clients__title-2';
        $this->show_content_title($field_name, $class_name);
    }
    public function show_content_title_3_text() {
        $field_name = $this->fields_name->title_3;
        $class_name = 'our-clients__title our-clients__title-3';
        $this->show_content_title($field_name, $class_name);
    }
    public function get_location_1_text():string {
        $data = $this->get_text_data($this->fields_name->location_1);
        return print($data);
    }
    public function get_location_2_text():string {
        $data = $this->get_text_data($this->fields_name->location_2);
        return print($data);
    }
    public function get_location_3_text():string {
        $data = $this->get_text_data($this->fields_name->location_3);
        return print($data);
    }
    public function get_income_1_text():string {
        $data = $this->get_text_data($this->fields_name->income_1);
        return print($data);
    }
    public function get_income_2_text():string {
        $data = $this->get_text_data($this->fields_name->income_2);
        return print($data);
    }
    public function get_income_3_text():string {
        $data = $this->get_text_data($this->fields_name->income_3);
        return print($data);
    }
    public function get_end_of_works_1_text():string {
        $data = $this->get_text_data($this->fields_name->end_of_works_1);
        return print($data);
    }
    public function get_end_of_works_2_text():string {
        $data = $this->get_text_data($this->fields_name->end_of_works_2);
        return print($data);
    }
    public function get_end_of_works_3_text():string {
        $data = $this->get_text_data($this->fields_name->end_of_works_3);
        return print($data);
    }
    public function get_lifetime_1_text():string {
        $data = $this->get_text_data($this->fields_name->lifetime_1);
        return print($data);
    }
    public function get_lifetime_2_text():string {
        $data = $this->get_text_data($this->fields_name->lifetime_2);
        return print($data);
    }
    public function get_lifetime_3_text():string {
        $data = $this->get_text_data($this->fields_name->lifetime_3);
        return print($data);
    }
    public function show_request_btn() {
        $field_name = $this->fields_name->button_name;
        $class_name = 'our-clients__request-btn animated__fadein__1s';
        $this->show_request_btn_common($field_name, $class_name);
    }
    public function get_left_arrow_src() {
        $src = content_url() . "/themes/solar/asset/img/common/Arrow-left.svg";
        return print($src); 
    }
    public function get_right_arrow_src() {
        $src = content_url() . "/themes/solar/asset/img/common/Arrow-right.svg";
        return print($src);
    }
    public function get_left_arrow_hover_src() {
        $src = content_url() . "/themes/solar/asset/img/common/Arrow-left-lime.svg";
        return print($src);
    }
    public function get_right_arrow_hover_src() {
        $src = content_url() . "/themes/solar/asset/img/common/Arrow-right-lime.svg";
        return print($src);
    }
}
?>