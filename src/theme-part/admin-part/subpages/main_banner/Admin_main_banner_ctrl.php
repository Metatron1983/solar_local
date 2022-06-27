<?php

require_once get_template_directory() ."/config.php";
require_once dirname(__FILE__, 5) ."/services/DB_adapter.php";
require_once dirname(__FILE__, 5) ."/app/Page_data_getter.php"; 
require_once dirname(__FILE__, 3) ."/common/convertor_to_webp/Convertor_to_webp.php"; 

class Admin_main_banner_ctrl {
    private string $post_name = 'main_banner';
    private DB_port $db_adapter;
    private Page_data_getter $page_data_getter;
    private Db_tables_name $db_tables_name; 
    private Db_main_banner_tbl_field_name $db_main_banner_tbl_field_name;
    private Convertor_to_webp $webp_convertor;
    
    public function __construct() {
        $this->db_tables_name = new Db_tables_name(); 
        $this->db_main_banner_tbl_field_name = new Db_main_banner_tbl_field_name();
        $this->db_adapter = new DB_adapter();
        $this->page_data_getter = new Page_data_getter($this->db_adapter);
        $this->webp_convertor = new Convertor_to_webp('main-banner');
        $this->update_content();
    }

    private function update_content(){
        $field_text_content_arr = [
            ['top-title', $this->db_main_banner_tbl_field_name->top_title],
            ['middle-title', $this->db_main_banner_tbl_field_name->middle_title],
            ['bottom-title', $this->db_main_banner_tbl_field_name->bottom_title],
            ['btn-title', $this->db_main_banner_tbl_field_name->btn_title],
            ['link-instagram', $this->db_main_banner_tbl_field_name->instagram_link],
            ['link-telegram', $this->db_main_banner_tbl_field_name->telegram_link],
            ['link-whatsapp', $this->db_main_banner_tbl_field_name->whatsapp_link],
            ['link-facebook', $this->db_main_banner_tbl_field_name->facebook_link],
        ];
        
        foreach($field_text_content_arr as [$field_content, $field_name]) {
            if(isset($_POST[$this->post_name][$field_content])) 
                $this->update_text_content($field_name, $_POST[$this->post_name][$field_content]);
        }

        $field_img_content_arr = [
            [$this->db_main_banner_tbl_field_name->logo_src, 'logo'],
            [$this->db_main_banner_tbl_field_name->image_PC1xJPG, 'image-PC1xJPG'],
            [$this->db_main_banner_tbl_field_name->image_Tablet1xJPG, 'image-Tablet1xJPG'],
            [$this->db_main_banner_tbl_field_name->image_Mobile1xJPG, 'image-Mobile1xJPG'],
            [$this->db_main_banner_tbl_field_name->instagram_img, 'image-instagram'],
            [$this->db_main_banner_tbl_field_name->telegram_img, 'image-telegram'],
            [$this->db_main_banner_tbl_field_name->whatsapp_img, 'image-whatsapp'],
            [$this->db_main_banner_tbl_field_name->facebook_img, 'image-facebook'],
        ];
        
        foreach($field_img_content_arr as [$field_name, $post_name]) {
            if(isset($_FILES[$this->post_name]['name'][$post_name])) {
                if(is_uploaded_file($_FILES[$this->post_name]['tmp_name'][$post_name])) $this->update_img_content($field_name, $post_name);
            };
        }
    }
    private function update_text_content(string $field_name, string $field_content){
        $current_db_value = $this->get_data($field_name);
        $table_name = $this->db_tables_name->main_banner;
        
        if($current_db_value === $field_content) return;
        $this->page_data_getter->set_main_banner_data($table_name, $field_name, $field_content);
    }
    private function update_img_content(string $field_name, string $post_name){
        $current_img_name = $this->get_data($field_name);
        $field_content = $_FILES[$this->post_name]['name'][$post_name];
        
        if($current_img_name === $field_content) return; 
        $this->update_text_content($field_name, $field_content);

        $path_upload_to = dirname(__DIR__, 4) . "/asset/img/main-banner/" . $field_content ;
        $path_upload_from = $_FILES[$this->post_name]['tmp_name'][$post_name];
        $path_curr_file = dirname(__DIR__, 4) . "/asset/img/main-banner/" . $current_img_name;

        if(file_exists($path_curr_file)) unlink($path_curr_file);

        move_uploaded_file($path_upload_from, $path_upload_to);
        
        if ($post_name === 'image-PC1xJPG'|| $post_name === 'image-Tablet1xJPG' || $post_name === 'image-Mobile1xJPG') {
            //current webp file
            $current_img_name_webp = $this->file_img_name_webp ($current_img_name);
            $path_curr_file_webp = dirname(__DIR__, 4) . "/asset/img/main-banner/" . $current_img_name_webp; 
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
        $table_name = $this->db_tables_name->main_banner;
        
        $result = $this->page_data_getter->get_main_banner_data($table_name, $field_name);

        if($result === null) return "";
 
        $result = esc_attr($result);
        return $result;
    }
    public function get_logo_src() {
        $field_name = $this->db_main_banner_tbl_field_name->logo_src;
        $result = $this->get_data($field_name);
        return $result;
    } 
    public function get_image_PC1xJPG() {
        $field_name = $this->db_main_banner_tbl_field_name->image_PC1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_image_Tablet1xJPG() {
        $field_name = $this->db_main_banner_tbl_field_name->image_Tablet1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }
    
    public function get_image_Mobile1xJPG() {
        $field_name = $this->db_main_banner_tbl_field_name->image_Mobile1xJPG;
        $result = $this->get_data($field_name);
        return $result;
    }   
    public function get_top_title() {
        $field_name = $this->db_main_banner_tbl_field_name->top_title;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_middle_title() {
        $field_name = $this->db_main_banner_tbl_field_name->middle_title;
        $result = $this->get_data($field_name);
        return $result;
    }
    public function get_bottom_title() {
        $field_name = $this->db_main_banner_tbl_field_name->bottom_title;
        $result = $this->get_data($field_name);
        return $result;
    }
    
    public function get_btn_title() {
        $field_name = $this->db_main_banner_tbl_field_name->btn_title;
        $result = $this->get_data($field_name);
        return $result;
    }
    
    public function get_instagram_img() {
        $field_name = $this->db_main_banner_tbl_field_name->instagram_img;
        $result = $this->get_data($field_name);
        return $result;
        }
   
    public function get_instagram_link() {
        $field_name = $this->db_main_banner_tbl_field_name->instagram_link;
        $result = $this->get_data($field_name);
        return $result;
    }

    public function get_telegram_img() {
        $field_name = $this->db_main_banner_tbl_field_name->telegram_img;
        $result = $this->get_data($field_name);
        return $result;
    }

    public function get_telegram_link() {
        $field_name = $this->db_main_banner_tbl_field_name->telegram_link;
        $result = $this->get_data($field_name);
        return $result;
    }

    public function get_whatsapp_img() {
        $field_name = $this->db_main_banner_tbl_field_name->whatsapp_img;
        $result = $this->get_data($field_name);
        return $result;
    }
    
    public function get_whatsapp_link() {
        $field_name = $this->db_main_banner_tbl_field_name->whatsapp_link;
        $result = $this->get_data($field_name);
        return $result;
    }
    
    public function get_facebook_img() {
        $field_name = $this->db_main_banner_tbl_field_name->facebook_img;
        $result = $this->get_data($field_name);
        return $result;
    }

    public function get_facebook_link() {
        $field_name = $this->db_main_banner_tbl_field_name->facebook_link;
        $result = $this->get_data($field_name);
        return $result;
    }
}
?>