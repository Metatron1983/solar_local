<?php

require_once get_template_directory() ."/config.php";
require_once dirname(__FILE__, 5) ."/services/DB_adapter.php";
require_once dirname(__FILE__, 5) ."/app/Page_data_getter.php"; 
require_once dirname(__FILE__, 3) ."/common/convertor_to_webp/Convertor_to_webp.php"; 

class Admin_our_clients_ctrl {
    private $post_name = 'our-clients';
    private DB_port $db_adapter;
    private Page_data_getter $page_data_getter;
    private Db_tables_name $db_tables_name; 
    private Db_our_clients_tbl_field_name $db_tbl_field_name;
    private Convertor_to_webp $webp_convertor;

    public function __construct() {
        $this->db_tables_name = new Db_tables_name(); 
        $this->db_tbl_field_name = new Db_our_clients_tbl_field_name();
        $this->db_adapter = new DB_adapter();
        $this->page_data_getter = new Page_data_getter($this->db_adapter);
        $this->webp_convertor = new Convertor_to_webp('our_clients');
        $this->update_content();
    }

    private function update_content(){
        $field_text_content_arr = [
            ['main-title', $this->db_tbl_field_name->main_title],
            ['button-name', $this->db_tbl_field_name->button_name],
            ['title-1', $this->db_tbl_field_name->title_1],
            ['title-2', $this->db_tbl_field_name->title_2],
            ['title-3', $this->db_tbl_field_name->title_3],
            ['location-1', $this->db_tbl_field_name->location_1],
            ['location-2', $this->db_tbl_field_name->location_2],
            ['location-3', $this->db_tbl_field_name->location_3],
            ['income-1', $this->db_tbl_field_name->income_1],
            ['income-2', $this->db_tbl_field_name->income_2],
            ['income-3', $this->db_tbl_field_name->income_3],
            ['end-of-works-1', $this->db_tbl_field_name->end_of_works_1],
            ['end-of-works-2', $this->db_tbl_field_name->end_of_works_2],
            ['end-of-works-3', $this->db_tbl_field_name->end_of_works_3],
            ['lifetime-1', $this->db_tbl_field_name->lifetime_1],
            ['lifetime-2', $this->db_tbl_field_name->lifetime_2],
            ['lifetime-3', $this->db_tbl_field_name->lifetime_3],
        ];
        
        foreach($field_text_content_arr as [$field_content, $field_name]) {
            if(isset($_POST[$this->post_name][$field_content])) 
                $this->update_text_content($field_name, $_POST[$this->post_name][$field_content]);
        }

        $field_img_content_arr = [
            [$this->db_tbl_field_name->image_1_PC1xJPG, 'image-1-PC1xJPG'],
            [$this->db_tbl_field_name->image_2_PC1xJPG, 'image-2-PC1xJPG'],
            [$this->db_tbl_field_name->image_3_PC1xJPG, 'image-3-PC1xJPG'],
            [$this->db_tbl_field_name->image_1_Tablet1xJPG, 'image-1-Tablet1xJPG'],
            [$this->db_tbl_field_name->image_2_Tablet1xJPG, 'image-2-Tablet1xJPG'],
            [$this->db_tbl_field_name->image_3_Tablet1xJPG, 'image-3-Tablet1xJPG'],
            [$this->db_tbl_field_name->image_1_Mobile1xJPG, 'image-1-Mobile1xJPG'],
            [$this->db_tbl_field_name->image_2_Mobile1xJPG, 'image-2-Mobile1xJPG'],
            [$this->db_tbl_field_name->image_3_Mobile1xJPG, 'image-3-Mobile1xJPG'],
        ];
        
        foreach($field_img_content_arr as [$field_name, $post_name]) {
            if(isset($_FILES[$this->post_name]['name'][$post_name])) {
                if(is_uploaded_file($_FILES[$this->post_name]['tmp_name'][$post_name])) $this->update_img_content($field_name, $post_name);
            };
        }
    }
    private function update_text_content(string $field_name, string $field_content){
        $current_db_value = $this->get_data($field_name);
        $table_name = $this->db_tables_name->our_clients;
        
        if($current_db_value === $field_content) return;
        $this->page_data_getter->set_main_banner_data($table_name, $field_name, $field_content);
    }
    private function update_img_content(string $field_name, string $post_name){
        $current_img_name = $this->get_data($field_name);
        $field_content = $_FILES[$this->post_name]['name'][$post_name];
        
        if($current_img_name === $field_content) return; 
        $this->update_text_content($field_name, $field_content);

        $path_upload_to = dirname(__DIR__, 4) . "/asset/img/our_clients/" . $field_content ;
        $path_upload_from = $_FILES[$this->post_name]['tmp_name'][$post_name];
        $path_curr_file = dirname(__DIR__, 4) . "/asset/img/our_clients/" . $current_img_name;

        if(file_exists($path_curr_file)) unlink($path_curr_file);

        move_uploaded_file($path_upload_from, $path_upload_to);

        $current_img_name_webp = $this->file_img_name_webp ($current_img_name);
        $path_curr_file_webp = dirname(__DIR__, 4) . "/asset/img/our_clients/" . $current_img_name_webp; 
        if(file_exists($path_curr_file_webp)) unlink($path_curr_file_webp);
        // new webp file
        $new_file_img_name = $field_content; 
        
        $new_file_img_name_webp = $this->file_img_name_webp ($new_file_img_name);
        $new_file_img_format = $this->file_img_name_format($new_file_img_name);
        
        if($new_file_img_format == '.jpg' || $new_file_img_format == '.jpeg') {
            $this->webp_convertor->convert_from_jpg($new_file_img_name, $new_file_img_name_webp);
        }
        if($new_file_img_format == '.png') {
            $this->webp_convertor->convert_from_png($new_file_img_name, $new_file_img_name_webp);
        }
    }

    private function file_img_name_format(string $file_img_name): string {
        $finde_chr = ".";
        $format = substr($file_img_name, strrpos($file_img_name, $finde_chr));
        return $format;
    }
    private function file_img_name_webp (string $file_img_name): string {
        $finde_chr = ".";
        $webp_name = substr($file_img_name, 0, strrpos($file_img_name, $finde_chr)) . ".webp";
        return $webp_name;
    }

    private function get_data(string $field_name){
        $table_name = $this->db_tables_name->our_clients;
        
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
    public function get_button_name() {
        $field_name = $this->db_tbl_field_name->button_name;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_image_1_PC1xJPG() {
        $field_name = $this->db_tbl_field_name->image_1_PC1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_image_2_PC1xJPG() {
        $field_name = $this->db_tbl_field_name->image_2_PC1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_image_3_PC1xJPG() {
        $field_name = $this->db_tbl_field_name->image_3_PC1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_image_1_Tablet1xJPG() {
        $field_name = $this->db_tbl_field_name->image_1_Tablet1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_image_2_Tablet1xJPG() {
        $field_name = $this->db_tbl_field_name->image_2_Tablet1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_image_3_Tablet1xJPG() {
        $field_name = $this->db_tbl_field_name->image_3_Tablet1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_image_1_Mobile1xJPG() {
        $field_name = $this->db_tbl_field_name->image_1_Mobile1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_image_2_Mobile1xJPG() {
        $field_name = $this->db_tbl_field_name->image_2_Mobile1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_image_3_Mobile1xJPG() {
        $field_name = $this->db_tbl_field_name->image_3_Mobile1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_title_1() {
        $field_name = $this->db_tbl_field_name->title_1;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_title_2() {
        $field_name = $this->db_tbl_field_name->title_2;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_title_3() {
        $field_name = $this->db_tbl_field_name->title_3;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_location_1() {
        $field_name = $this->db_tbl_field_name->location_1;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_location_2() {
        $field_name = $this->db_tbl_field_name->location_2;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_location_3() {
        $field_name = $this->db_tbl_field_name->location_3;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_income_1() {
        $field_name = $this->db_tbl_field_name->income_1;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_income_2() {
        $field_name = $this->db_tbl_field_name->income_2;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_income_3() {
        $field_name = $this->db_tbl_field_name->income_3;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_end_of_works_1() {
        $field_name = $this->db_tbl_field_name->end_of_works_1;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_end_of_works_2() {
        $field_name = $this->db_tbl_field_name->end_of_works_2;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_end_of_works_3() {
        $field_name = $this->db_tbl_field_name->end_of_works_3;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_lifetime_1() {
        $field_name = $this->db_tbl_field_name->lifetime_1;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_lifetime_2() {
        $field_name = $this->db_tbl_field_name->lifetime_2;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_lifetime_3() {
        $field_name = $this->db_tbl_field_name->lifetime_3;
        $result = $this->get_data($field_name);
        return $result;
    }
}
?>