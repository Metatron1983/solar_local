<?php

require_once get_template_directory() ."/config.php";
require_once dirname(__FILE__, 5) ."/services/DB_adapter.php";
require_once dirname(__FILE__, 5) ."/app/Page_data_getter.php"; 
require_once dirname(__FILE__, 3) ."/common/convertor_to_webp/Convertor_to_webp.php";

class Admin_footer_ctrl {
    private $post_name = 'footer';
    private DB_port $db_adapter;
    private Page_data_getter $page_data_getter;
    private Db_tables_name $db_tables_name; 
    private Db_footer_tbl_field_name $db_tbl_field_name;
    private Convertor_to_webp $webp_convertor;

    public function __construct() {
        $this->db_tables_name = new Db_tables_name(); 
        $this->db_tbl_field_name = new Db_footer_tbl_field_name();
        $this->db_adapter = new DB_adapter();
        $this->page_data_getter = new Page_data_getter($this->db_adapter);
        $this->webp_convertor = new Convertor_to_webp('footer');
        $this->update_content();
    }

    private function update_content(){
        $field_text_content_arr = [
            ['request-title', $this->db_tbl_field_name->request_title],
            ['placeholder-name', $this->db_tbl_field_name->placeholder_name],
            ['placeholder-phone', $this->db_tbl_field_name->placeholder_phone],
            ['btn-value', $this->db_tbl_field_name->btn_value],
            ['contacts-title', $this->db_tbl_field_name->contacts_title],
            ['central-office-address', $this->db_tbl_field_name->central_office_address],
            ['representative-offices-address', $this->db_tbl_field_name->representative_offices_address],
            ['representative-offices-citys', $this->db_tbl_field_name->representative_offices_citys],
            ['phone-number-1', $this->db_tbl_field_name->phone_number_1],
            ['phone-number-2', $this->db_tbl_field_name->phone_number_2],
            ['work-schedule', $this->db_tbl_field_name->work_schedule],
            ['placeholder-private-policy', $this->db_tbl_field_name->placeholder_private_policy],
            ['instagram-src', $this->db_tbl_field_name->instagram_src],
            ['telegram-src', $this->db_tbl_field_name->telegram_src],
            ['whatsapp-src', $this->db_tbl_field_name->whatsapp_src],
            ['facebook-src', $this->db_tbl_field_name->facebook_src],
        ];
        
        foreach($field_text_content_arr as [$field_content, $field_name]) {
            if(isset($_POST[$this->post_name][$field_content])) 
                $this->update_text_content($field_name, $_POST[$this->post_name][$field_content]);
        }

        $field_img_content_arr = [
            [$this->db_tbl_field_name->main_background, 'main-background'],
            [$this->db_tbl_field_name->instagram_img, 'instagram-img'],
            [$this->db_tbl_field_name->telegram_img, 'telegram-img'],
            [$this->db_tbl_field_name->whatsapp_img, 'whatsapp-img'],
            [$this->db_tbl_field_name->facebook_img, 'facebook-img'],
        ];
        
        foreach($field_img_content_arr as [$field_name, $post_name]) {
            if(isset($_FILES[$this->post_name]['name'][$post_name])) {
                if(is_uploaded_file($_FILES[$this->post_name]['tmp_name'][$post_name])) $this->update_img_content($field_name, $post_name);
            };
        }

        $field_file_content_arr = [
            [$this->db_tbl_field_name->file_private_policy, 'file-private-policy'],
        ];
        
        foreach($field_file_content_arr as [$field_name, $post_name]) {
            if(isset($_FILES[$this->post_name]['name'][$post_name])) {
                if(is_uploaded_file($_FILES[$this->post_name]['tmp_name'][$post_name])) $this->update_file_content($field_name, $post_name);
            };
        }
    }
    private function update_text_content(string $field_name, string $field_content){
        $current_db_value = $this->get_data($field_name);
        $table_name = $this->db_tables_name->footer;
        
        if($current_db_value === $field_content) return;
        $this->page_data_getter->set_main_banner_data($table_name, $field_name, $field_content);
    }
    
    private function update_img_content(string $field_name, string $post_name){
        $current_img_name = $this->get_data($field_name);
        $field_content = $_FILES[$this->post_name]['name'][$post_name];
        
        if($current_img_name === $field_content) return; 
        $this->update_text_content($field_name, $field_content);

        $path_upload_to = dirname(__DIR__, 4) . "/asset/img/footer/" . $field_content ;
        $path_upload_from = $_FILES[$this->post_name]['tmp_name'][$post_name];
        $path_curr_file = dirname(__DIR__, 4) . "/asset/img/footer/" . $current_img_name;

        if(file_exists($path_curr_file)) unlink($path_curr_file);

        move_uploaded_file($path_upload_from, $path_upload_to);

        if ($post_name === 'main-background') {
            //current webp file
            $current_img_name_webp = $this->file_img_name_webp ($current_img_name);
            $path_curr_file_webp = dirname(__DIR__, 4) . "/asset/img/footer/" . $current_img_name_webp; 
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

    private function update_file_content(string $field_name, string $post_name){
        $current_file_name = $this->get_data($field_name);
        $field_content = $_FILES[$this->post_name]['name'][$post_name];
        
        if($current_file_name === $field_content) return; 
        $this->update_text_content($field_name, $field_content);

        $path_upload_to = dirname(__DIR__, 4) . "/asset/documents/" . $field_content ;
        $path_upload_from = $_FILES[$this->post_name]['tmp_name'][$post_name];
        $path_curr_file = dirname(__DIR__, 4) . "/asset/documents/" . $current_file_name;

        if(file_exists($path_curr_file)) unlink($path_curr_file);

        move_uploaded_file($path_upload_from, $path_upload_to);
    }

    private function get_data(string $field_name){
        $table_name = $this->db_tables_name->footer;
        
        $result = $this->page_data_getter->get_main_banner_data($table_name, $field_name);

        if($result === null) return "";
 
        $result = esc_attr($result);
        return $result;
    }

    function get_request_title() {
        $field_name = $this->db_tbl_field_name->request_title;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_placeholder_name() {
        $field_name = $this->db_tbl_field_name->placeholder_name;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_placeholder_phone() {
        $field_name = $this->db_tbl_field_name->placeholder_phone;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_btn_value() {
        $field_name = $this->db_tbl_field_name->btn_value;
        $result = $this->get_data($field_name);
        return $result;
    }  
    function get_contacts_title() {
        $field_name = $this->db_tbl_field_name->contacts_title;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_central_office_address() {
        $field_name = $this->db_tbl_field_name->central_office_address;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_representative_offices_address() {
        $field_name = $this->db_tbl_field_name->representative_offices_address;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_representative_offices_citys() {
        $field_name = $this->db_tbl_field_name->representative_offices_citys;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_phone_number_1() {
        $field_name = $this->db_tbl_field_name->phone_number_1;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_phone_number_2() {
        $field_name = $this->db_tbl_field_name->phone_number_2;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_work_schedule() {
         $field_name = $this->db_tbl_field_name->work_schedule;
        $result = $this->get_data($field_name);
        return $result;
    }
    
    function get_main_background() {
         $field_name = $this->db_tbl_field_name->main_background;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_placeholder_private_policy() {
         $field_name = $this->db_tbl_field_name->placeholder_private_policy;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_file_private_policy() {
         $field_name = $this->db_tbl_field_name->file_private_policy;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_instagram_img() {
         $field_name = $this->db_tbl_field_name->instagram_img;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_instagram_src() {
         $field_name = $this->db_tbl_field_name->instagram_src;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_telegram_img() {
         $field_name = $this->db_tbl_field_name->telegram_img;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_telegram_src() {
         $field_name = $this->db_tbl_field_name->telegram_src;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_whatsapp_img() {
         $field_name = $this->db_tbl_field_name->whatsapp_img;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_whatsapp_src() {
         $field_name = $this->db_tbl_field_name->whatsapp_src;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_facebook_img() {
         $field_name = $this->db_tbl_field_name->facebook_img;
        $result = $this->get_data($field_name);
        return $result;
    }
    function get_facebook_src() {
         $field_name = $this->db_tbl_field_name->facebook_src;
        $result = $this->get_data($field_name);
        return $result;
    }
}

?>