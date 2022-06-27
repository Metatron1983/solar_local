<?php
require_once dirname(__FILE__,3) . '/User_section_ctrl.php';
require_once dirname(__FILE__, 5) . '/config.php';

class Footer_ctrl extends User_section_ctrl {
    private Db_footer_tbl_field_name $fields_name;

    public function __construct() {
        $table_name = 'footer';
        $folder_image_name = 'footer/';
        $this->fields_name = new Db_footer_tbl_field_name;

        parent::__construct($table_name, $folder_image_name);
    }
    public function show_request_title(string $class_name):void {
        $field_name = $this->fields_name->request_title;
        $this->show_main_title_common($field_name, $class_name);
    }
    public function get_placeholder_name():string {
        $data = $this->get_text_data($this->fields_name->placeholder_name);
        return print($data);
    }
    public function get_placeholder_phone():string {
        $data = $this->get_text_data($this->fields_name->placeholder_phone);
        return print($data);
    }
    public function get_btn_value():string {
        $data = $this->get_text_data($this->fields_name->btn_value);
        return print($data);
    }
    public function show_contacts_title(string $class_name):void {
        $field_name = $this->fields_name->contacts_title;
        $this->show_main_title_common($field_name, $class_name);
    }
    public function get_central_office_address():string {
        $data = $this->get_text_data($this->fields_name->central_office_address);
        return print($data);
    }
    public function get_representative_offices_address():string {
        $data = $this->get_text_data($this->fields_name->representative_offices_address);
        return print($data);
    }
    public function get_representative_offices_citys():string {
        $data = $this->get_text_data($this->fields_name->representative_offices_citys);
        return print($data);
    }
    public function get_phone_number_1():string {
        $data = $this->get_text_data($this->fields_name->phone_number_1);
        return print($data);
    }
    public function get_phone_number_2():string {
        $data = $this->get_text_data($this->fields_name->phone_number_2);
        return print($data);
    }
    public function get_work_schedule():string {
        $data = $this->get_text_data($this->fields_name->work_schedule);
        return print($data);
    }
    public function get_main_background_src():string {
        $data = $this->get_img_data($this->fields_name->main_background);
        return print($data);
    }
    public function get_main_background_WEBP_src():string {
        $data = $this->get_img_data($this->fields_name->main_background);
        $data = $this->file_img_name_webp ($data);
        return print($data);
    }
    public function get_placeholder_private_policy():string {
        $data = $this->get_text_data($this->fields_name->placeholder_private_policy);
        return print($data);
    }
    public function get_file_private_policy_src():string {
        $data = $this->get_text_data('file_private_policy');
        $src = content_url('/themes/solar/asset/documents/') . $data;
        return print($src);
    }
    public function show_logo(string $class_name): void {
        $this->show_logo_common($class_name);
    }
    public function show_social_box():void {
        $instagram_img = $this->get_img_data($this->fields_name->instagram_img);
        $telegram_img = $this->get_img_data($this->fields_name->telegram_img);
        $whatsapp_img = $this->get_img_data($this->fields_name->whatsapp_img);
        $facebook_img = $this->get_img_data($this->fields_name->facebook_img);
        $instagram_src = $this->get_text_data($this->fields_name->instagram_src);
        $telegram_src = $this->get_text_data($this->fields_name->telegram_src);
        $whatsapp_src = $this->get_text_data($this->fields_name->whatsapp_src);
        $facebook_src = $this->get_text_data($this->fields_name->facebook_src);

        $instagram_link_class_name = 'footer-instagram__link';
        $telegram_link_class_name = "footer-telegram__link";
        $whatsapp_link_class_name = 'footer-whatsapp__link';
        $facebook_link_class_name = 'footer-facebook__link';

        $instagram_img_class_name = 'footer-instagram__img';
        $telegram_img_class_name = 'footer-telegram__img';
        $whatsapp_img_class_name = 'footer-whatsapp__img';
        $facebook_img_class_name = 'footer-facebook__img';
        
        $list_class_name = 'footer-social__list';
        $list_item_class_name = 'footer-social__list-item';
        $this->show_social_box_common(
            $instagram_src,
            $telegram_src,
            $whatsapp_src,
            $facebook_src,
            $instagram_img,
            $telegram_img,
            $whatsapp_img,
            $facebook_img,
            
            $instagram_link_class_name,
            $telegram_link_class_name,
            $whatsapp_link_class_name,
            $facebook_link_class_name,
    
            $instagram_img_class_name,
            $telegram_img_class_name,
            $whatsapp_img_class_name,
            $facebook_img_class_name,
            
            $list_class_name,
            $list_item_class_name,
        );
    }
}
?>