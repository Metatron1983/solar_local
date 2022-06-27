<?php
    require_once dirname(__FILE__, 3) . '/User_section_ctrl.php';
    require_once dirname(__FILE__, 5) . '/config.php';

class Second_banner_ctrl extends User_section_ctrl {
    private Db_second_banner_tbl_field_name $fields_name;

    public function __construct() {
        $db_table_name = 'second_banner';
        $folder_image_name = 'second_banner/';
        parent::__construct($db_table_name, $folder_image_name);
        $this->fields_name = new Db_second_banner_tbl_field_name;
    }
    public function get_main_title_text() {
        $data = $this->get_text_data($this->fields_name->main_title);
        return print($data);
    }
    public function get_image_PC1xJPG_src() {
        $data= $this->get_img_data($this->fields_name->image_PC1xJPG);
        return print($data);
    }
    public function get_image_PC1xWEBP_src() {
        $data= $this->get_img_data($this->fields_name->image_PC1xJPG);
        $data = $this->file_img_name_webp ($data);
        return print($data);
    }
    public function get_image_Tablet1xJPG_src() {
        $data = $this->get_img_data($this->fields_name->image_Tablet1xJPG);
        return print($data);
    }
    public function get_image_Tablet1xWEBP_src() {
        $data = $this->get_img_data($this->fields_name->image_Tablet1xJPG);
        $data = $this->file_img_name_webp ($data);
        return print($data);
    }
    public function get_image_Mobile1xJPG_src() {
        $data = $this->get_img_data($this->fields_name->image_Mobile1xJPG);
        return print($data);
    }
    public function get_image_Mobile1xWEBP_src() {
        $data = $this->get_img_data($this->fields_name->image_Mobile1xJPG);
        $data = $this->file_img_name_webp ($data);
        return print($data);
    }
}
?>