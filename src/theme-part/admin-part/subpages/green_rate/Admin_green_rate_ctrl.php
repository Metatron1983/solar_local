<?php
require_once get_template_directory() ."/config.php";
require_once dirname(__FILE__, 5) ."/services/DB_adapter.php";
require_once dirname(__FILE__, 5) ."/app/Page_data_getter.php"; 


class Admin_green_rate_ctrl {
    private $post_name = 'green-rate';
    private DB_port $db_adapter;
    private Page_data_getter $page_data_getter;
    private Db_tables_name $db_tables_name; 
    private Db_green_rate_tbl_field_name $db_tbl_field_name;

    public function __construct() {
        $this->db_tables_name = new Db_tables_name(); 
        $this->db_tbl_field_name = new Db_green_rate_tbl_field_name();
        $this->db_adapter = new DB_adapter();
        $this->page_data_getter = new Page_data_getter($this->db_adapter);
        $this->update_content();
    }

    private function update_content(){
        $field_text_content_arr = [
            ['main-title', $this->db_tbl_field_name->main_title],
            ['main-advantage-text', $this->db_tbl_field_name->main_advantage_text],
            ['advantage-1-title', $this->db_tbl_field_name->advantage_1_title],
            ['advantage-1-text', $this->db_tbl_field_name->advantage_1_text],
            ['advantage-2-title', $this->db_tbl_field_name->advantage_2_title],
            ['advantage-2-text', $this->db_tbl_field_name->advantage_2_text],
            ['advantage-3-title', $this->db_tbl_field_name->advantage_3_title],
            ['advantage-3-text', $this->db_tbl_field_name->advantage_3_text],
            ['advantage-4-title', $this->db_tbl_field_name->advantage_4_title],
            ['advantage-4-text', $this->db_tbl_field_name->advantage_4_text],
            ['explanation-text', $this->db_tbl_field_name->explanation_text],
        ];
        
        foreach($field_text_content_arr as [$field_content, $field_name]) {
            if(isset($_POST[$this->post_name][$field_content])) 
                $this->update_text_content($field_name, $_POST[$this->post_name][$field_content]);
        }

        $field_img_content_arr = [
            [$this->db_tbl_field_name->main_advantage_image, 'main-advantage-image'],
            [$this->db_tbl_field_name->explanation_image_PC1xJPG, 'explanation-image-PC1xJPG'],
            [$this->db_tbl_field_name->explanation_image_Tablet1xJPG, 'explanation-image-Tablet1xJPG'],
            [$this->db_tbl_field_name->explanation_image_Mobile1xJPG, 'explanation-image-Mobile1xJPG'],
        ];
        
        foreach($field_img_content_arr as [$field_name, $post_name]) {
            if(isset($_FILES[$this->post_name]['name'][$post_name])) {
                if(is_uploaded_file($_FILES[$this->post_name]['tmp_name'][$post_name])) $this->update_img_content($field_name, $post_name);
            };
        }
    }
    private function update_text_content(string $field_name, string $field_content){
        $current_db_value = $this->get_data($field_name);
        $table_name = $this->db_tables_name->green_rate;
        
        if($current_db_value === $field_content) return;
        $this->page_data_getter->set_main_banner_data($table_name, $field_name, $field_content);
    }
    private function update_img_content(string $field_name, string $post_name){
        $current_img_name = $this->get_data($field_name);
        $field_content = $_FILES[$this->post_name]['name'][$post_name];
        
        if($current_img_name === $field_content) return; 
        $this->update_text_content($field_name, $field_content);

        $path_upload_to = dirname(__DIR__, 4) . "/asset/img/green_rate/" . $field_content ;
        $path_upload_from = $_FILES[$this->post_name]['tmp_name'][$post_name];
        $path_curr_file = dirname(__DIR__, 4) . "/asset/img/green_rate/" . $current_img_name;

        if(file_exists($path_curr_file)) unlink($path_curr_file);

        move_uploaded_file($path_upload_from, $path_upload_to);
    }

    private function get_data(string $field_name){
        $table_name = $this->db_tables_name->green_rate;
        
        $result = $this->page_data_getter->get_main_banner_data($table_name, $field_name);

        if($result === null) return "";
 
        $result = esc_attr($result);
        return $result;
    }
    public function get_main_title() {
        $field_name = $this->db_tbl_field_name->main_title;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_main_advantage_image() {
        $field_name = $this->db_tbl_field_name->main_advantage_image;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_main_advantage_text() {
        $field_name = $this->db_tbl_field_name->main_advantage_text;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_advantage_1_title() {
        $field_name = $this->db_tbl_field_name->advantage_1_title;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_advantage_1_text() {
        $field_name = $this->db_tbl_field_name->advantage_1_text;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_advantage_2_title() {
        $field_name = $this->db_tbl_field_name->advantage_2_title;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_advantage_2_text() {
        $field_name = $this->db_tbl_field_name->advantage_2_text;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_advantage_3_title() {
        $field_name = $this->db_tbl_field_name->advantage_3_title;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_advantage_3_text() {
        $field_name = $this->db_tbl_field_name->advantage_3_text;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_advantage_4_title() {
        $field_name = $this->db_tbl_field_name->advantage_4_title;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_advantage_4_text() {
        $field_name = $this->db_tbl_field_name->advantage_4_text;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_explanation_text() {
        $field_name = $this->db_tbl_field_name->explanation_text;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_explanation_image_PC1xJPG() {
        $field_name = $this->db_tbl_field_name->explanation_image_PC1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_explanation_image_Tablet1xJPG() {
        $field_name = $this->db_tbl_field_name->explanation_image_Tablet1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_explanation_image_Mobile1xJPG() {
        $field_name = $this->db_tbl_field_name->explanation_image_Mobile1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
}
?>