<?php

require_once dirname(__FILE__, 5) . "/config.php";
require_once dirname(__FILE__, 5) . "/app/Page_data_getter.php";
require_once dirname(__FILE__, 5) . "/services/DB_adapter.php";
require_once dirname(__FILE__, 3) . "/common/logo/logo.php";
require_once dirname(__FILE__, 3) . "/common/Request_btn/Request_btn.php";
require_once dirname(__FILE__, 3) . "/common/Social_box/Social_box.php";

class Main_banner_ctrl {
    private Page_data_getter $page_data_getter;
    private DB_adapter $db_adapter;
    private string $db_table_name;
    private Db_main_banner_tbl_field_name $fields_name;
    private string $folder_name;
    private Logo $logo_img;
    private Request_btn $request_btn;
    private Social_box $social_box;


    public function __construct() {
        $this->db_adapter = new DB_adapter();
        $this->page_data_getter = new Page_data_getter($this->db_adapter);
        
        $db = new Db_tables_name();
        $this->db_table_name = $db->main_banner;
        $this->fields_name =new Db_main_banner_tbl_field_name();
        $this->folder_name = content_url() . "/themes/solar/asset/img/main-banner/"; 
        $this->logo_img = new Logo;
        $this->request_btn = new Request_btn;
        $this->social_box = new Social_box;
    }

    private function get_text_data($field_name) {
        $data = $this->page_data_getter->get_main_banner_data($this->db_table_name, $field_name);
        return $data;
    }
    private function get_img_data($field_name) {
        $data = $this->folder_name .$this->page_data_getter->get_main_banner_data($this->db_table_name, $field_name);
        return $data;
    }

    private function file_img_name_webp (string $file_img_name): string {
        $finde_chr = ".";
        $webp_name = substr($file_img_name, 0, strrpos($file_img_name, $finde_chr)) . ".webp";
        return $webp_name;
    }

    public function show_logo() {
        $src = $this->get_img_data($this->fields_name->logo_src);
        $this->logo_img->show($src, 'main-banner__logo');
    }
    public function get_image_PC1xJPG_src() {
        $data = $this->get_img_data($this->fields_name->image_PC1xJPG);
        return print($data);
    }
    public function get_image_PC1xWEBP_src() {
        $data = $this->get_img_data($this->fields_name->image_PC1xJPG);
        $data = $this->file_img_name_webp ($data);
        return print($data);
    }
    
    public function get_image_Tablet1xJPG_src() {
        $data = $this->get_img_data($this->fields_name->image_Tablet1xJPG);
        return print($data);
    }
    public function get_image_Tablet1xWEBP_src() {
        $data = $this->get_img_data($this->fields_name->image_Tablet1xJPG);
        $new_file_img_name_webp = $this->file_img_name_webp ($data);
        return print($new_file_img_name_webp);
    }

    public function get_image_Mobile1xJPG_src() {
        $data = $this->get_img_data($this->fields_name->image_Mobile1xJPG);
        return print($data);
    }
    public function get_image_Mobile1xWEBP_src() {
        $data = $this->get_img_data($this->fields_name->image_Mobile1xJPG);
        $new_file_img_name_webp = $this->file_img_name_webp ($data);
        return print($new_file_img_name_webp);
    }

    public function get_top_title_text () {
        $text = $this->get_text_data($this->fields_name->top_title);
        return print($text);
    }
    public function get_middle_title_text() {
        $text = $this->get_text_data($this->fields_name->middle_title);
        return print($text);
    }
    public function get_bottom_title_text() {
        $text = $this->get_text_data($this->fields_name->bottom_title);
        return print($text);
    }
    public function show_request_btn_title() {
        $btn_value = $this->get_text_data($this->fields_name->btn_title);
        $this->request_btn->show($btn_value, 'main-banner__btn animated__fadein__1s');
    }
    public function show_social_box() {
        $instagram_link = $this->get_text_data($this->fields_name->instagram_link);
        $telegram_link = $this->get_text_data($this->fields_name->telegram_link);
        $whatsapp_link = $this->get_text_data($this->fields_name->whatsapp_link);
        $facebook_link = $this->get_text_data($this->fields_name->facebook_link);
        $instagram_img = $this->get_img_data($this->fields_name->instagram_img);
        $telegram_img = $this->get_img_data($this->fields_name->telegram_img);
        $whatsapp_img = $this->get_img_data($this->fields_name->whatsapp_img);
        $facebook_img = $this->get_img_data($this->fields_name->facebook_img);
        $this->social_box->show(
            $instagram_link,
            $telegram_link,
            $whatsapp_link,
            $facebook_link,
            $instagram_img,
            $telegram_img,
            $whatsapp_img,
            $facebook_img,
            null , null, null, null, null, null, null, null, 'main-banner__social-wrapper', 'main-banner__social-item' 
        );
    }

}

?>