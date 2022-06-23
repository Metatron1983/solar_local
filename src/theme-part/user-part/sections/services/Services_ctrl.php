<?php
    require_once dirname(__FILE__,5) . '/config.php';
    require_once dirname(__FILE__,5) . '/app/Page_data_getter.php';
    require_once dirname(__FILE__,5) . '/services/DB_adapter.php';
    require_once dirname(__FILE__,3) . '/common/section_title/Section_title.php';
    require_once dirname(__FILE__,3) . '/common/content_title/Content_title.php';
    require_once dirname(__FILE__,3) . '/common/content_text/Content_text.php';

class Services_ctrl {
    private Page_data_getter $page_data_getter;
    private DB_adapter $adapter;
    private string $db_table_name;
    private Db_services_tbl_field_name $fields_name;
    private string $img_folder_path;
    private Section_title $section_title;
    private Content_title $content_title;
    private Content_text $content_text;


    public function __construct(){
        $this->adapter = new DB_adapter;
        $this->page_data_getter = new Page_data_getter($this->adapter);
        
        $db = new Db_tables_name;
        $this->db_table_name = $db->services;

        $this->img_folder_path = content_url() . "/themes/solar/asset/img/services/";

        $this->fields_name = new Db_services_tbl_field_name;
        $this->section_title = new Section_title;
        $this->content_title = new Content_title;
        $this->content_text = new Content_text;
    }

    private function get_text_data(string $field_name): string {
        $data = $this->page_data_getter->get_main_banner_data($this->db_table_name, $field_name);
        return $data;
    }
    private function get_img_data(string $field_name): string {
        $data = $this->img_folder_path .  $this->page_data_getter->get_main_banner_data($this->db_table_name, $field_name);
        return $data;
    }

    public function show_main_title(): void {
        $data = $this->get_text_data($this->fields_name->main_title);
        $this->section_title->show(
            $data,
            'services__main-title'
        );
    }
    public function show_content_title_1(): void {
        $data = $this->get_text_data($this->fields_name->service_1_title);
        $this->content_title->show(
            $data,
            'services__title-1'
        );
    }
    public function show_content_title_2(): void {
        $data = $this->get_text_data($this->fields_name->service_2_title);
        $this->content_title->show(
            $data,
            'services__title-2'
        );
    }
    public function show_content_title_3(): void {
        $data = $this->get_text_data($this->fields_name->service_3_title);
        $this->content_title->show(
            $data,
            'services__title-3'
        );
    }
    public function show_content_title_4(): void {
        $data = $this->get_text_data($this->fields_name->service_4_title);
        $this->content_title->show(
            $data,
            'services__title-4'
        );
    }
    public function show_content_text_1(): void {
        $data = $this->get_text_data($this->fields_name->service_1_text);
        $this->content_text->show(
            $data,
            'services__text-1'
        );
    }
    public function show_content_text_2(): void {
        $data = $this->get_text_data($this->fields_name->service_2_text);
        $this->content_text->show(
            $data,
            'services__text-2'
        );
    }
    public function show_content_text_3(): void {
        $data = $this->get_text_data($this->fields_name->service_3_text);
        $this->content_text->show(
            $data,
            'services__text-3'
        );
    }
    public function show_content_text_4(): void {
        $data = $this->get_text_data($this->fields_name->service_4_text);
        $this->content_text->show(
            $data,
            'services__text-4'
        );
    }
    public function get_image_PC1xJPG_src(): string {
        $data = $this->get_img_data($this->fields_name->image_PC1xJPG);
        return print($data);
    }
    public function get_image_Tablet1xJPG_src(): string {
        $data = $this->get_img_data($this->fields_name->image_Tablet1xJPG);
        return print($data);
    }
    public function get_image_Mobile1xJPG_src(): string {
        $data = $this->get_img_data($this->fields_name->image_Mobile1xJPG);
        return print($data);
    }
    

}
?>