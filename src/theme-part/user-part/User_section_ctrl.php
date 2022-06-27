<?php
    require_once dirname(__FILE__,3) . '/config.php';
    require_once dirname(__FILE__,3) . '/app/Page_data_getter.php';
    require_once dirname(__FILE__,3) . '/services/DB_adapter.php';
    require_once dirname(__FILE__,1) . '/common/section_title/Section_title.php';
    require_once dirname(__FILE__,1) . '/common/content_title/Content_title.php';
    require_once dirname(__FILE__,1) . '/common/content_text/Content_text.php';
    require_once dirname(__FILE__,1) . '/common/Request_btn/Request_btn.php';
    require_once dirname(__FILE__,1) . '/common/logo/logo.php';
    require_once dirname(__FILE__,1) . '/common/Social_box/Social_box.php';
    
class User_section_ctrl {
    private Page_data_getter $page_data_getter;
    private string $db_table_name;
    private string $img_folder_path;
    private Section_title $section_title;
    private Content_title $content_title;
    private Content_text $content_text;
    private Request_btn $request_btn;
    private Logo $logo;
    private Social_box $social_box;

    public function __construct(string $db_table_name, string $folder_img_name){
        $adapter = new DB_adapter;
        $this->page_data_getter = new Page_data_getter($adapter);
        
        $db = new Db_tables_name;
        $this->db_table_name = $db->$db_table_name;

        $this->img_folder_path = content_url() . "/themes/solar/asset/img/" . $folder_img_name;

        $this->section_title = new Section_title;
        $this->content_title = new Content_title;
        $this->content_text = new Content_text;
        $this->request_btn = new Request_btn;
        $this->logo = new Logo;
        $this->social_box = new Social_box;
    }

    protected function get_text_data(string $field_name): string {
        $data = $this->page_data_getter->get_main_banner_data($this->db_table_name, $field_name);
        return $data;
    }
    protected function get_img_data(string $field_name): string {
        $data = $this->img_folder_path .  $this->page_data_getter->get_main_banner_data($this->db_table_name, $field_name);
        return $data;
    }

    protected function file_img_name_webp (string $file_img_name): string {
        $finde_chr = ".";
        $webp_name = substr($file_img_name, 0, strrpos($file_img_name, $finde_chr)) . ".webp";
        return $webp_name;
    }

    protected function show_main_title_common(string $field_name, string $class_name): void {
        $data = $this->get_text_data($field_name);
        $this->section_title->show($data, $class_name);
    }
    protected function show_content_title(
        string $field_name, 
        string $class_name): void {
        $data = $this->get_text_data($field_name);
        $this->content_title->show($data, $class_name);
    }
    protected function show_content_text(
        string $field_name,
        string $class_name): void {
        $data = $this->get_text_data($field_name);
        $this->content_text->show($data, $class_name);
    }
    protected function show_request_btn_common(
        string $field_name,
        string $class_name): void {
        $data = $this->get_text_data($field_name);
        $this->request_btn->show($data, $class_name);
    }
    protected function show_logo_common(
        string $class_name): void {
            $db = new Db_tables_name;
            $db_table_name = $db->main_banner;
            $fields_name = new Db_main_banner_tbl_field_name;
            $field_name = $fields_name->logo_src;
            $img_folder_path = content_url() . "/themes/solar/asset/img/main-banner/";
            $src = $img_folder_path .  $this->page_data_getter->get_main_banner_data($db_table_name, $field_name);
        // $data = $this->get_text_data($field_name);
        $this->logo->show($src, $class_name);
    }
    protected function show_social_box_common(
        $instagram_link_href_field_name,
        $telegram_link_href_field_name,
        $whatsapp_link_href_field_name,
        $facebook_link_href_field_name,

        $instagram_img_src_field_name,
        $telegram_img_src_field_name,
        $whatsapp_img_src_field_name,
        $facebook_img_src_field_name,
        
        $instagram_link_class_name = null,
        $telegram_link_class_name = null,
        $whatsapp_link_class_name = null,
        $facebook_link_class_name = null,

        $instagram_img_class_name = null,
        $telegram_img_class_name = null,
        $whatsapp_img_class_name = null,
        $facebook_img_class_name = null,
        
        $list_class_name = null,
        $list_item_class_name = null):void {
        
        $this->social_box->show(
            $instagram_link_href_field_name,
            $telegram_link_href_field_name,
            $whatsapp_link_href_field_name,
            $facebook_link_href_field_name,

            $instagram_img_src_field_name,
            $telegram_img_src_field_name,
            $whatsapp_img_src_field_name,
            $facebook_img_src_field_name,

            $instagram_link_class_name,
            $telegram_link_class_name,
            $whatsapp_link_class_name,
            $facebook_link_class_name,
            $instagram_img_class_name,
            $telegram_img_class_name,
            $whatsapp_img_class_name,
            $facebook_img_class_name,
            $list_class_name,
            $list_item_class_name);
    }
    
}
?>