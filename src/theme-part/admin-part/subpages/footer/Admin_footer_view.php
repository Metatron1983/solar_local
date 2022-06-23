<?php
require_once dirname(__FILE__) . "/Admin_footer_ctrl.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_structure_part/Admin_page_structure_part.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_img_input/Admin_page_img_input.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_text_input/Admin_page_text_input.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_textarea/Admin_page_textarea.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_file_input/Admin_page_file_input.php";

class Admin_footer_view {
    private string $page_slug = 'admin_footer_slug'; 
    private string $page_group = 'admin_footer_group'; 
    private array $section_slug = 
        ['admin_footer_leave_request_slug',
        'admin_footer_contacts_slug', 
        'admin_footer_bottom_slug',]; 
    private string $folder_image_name = 'footer/';
    private Admin_footer_ctrl $ctrl;

    public function __construct() {
        $this->ctrl = new Admin_footer_ctrl();
        add_menu_page('Подвал сайта', 'подвал сайта', 'edit_others_pages', $this->page_slug, array($this, 'show_page'), 'dashicons-cover-image');
        add_action('admin_init', array($this, 'add_setting_section'));
    }
    public function show_page() {
        new Admin_page_structure_part('Cтраница настроек секции "Подвал сайта', 
                                      "footer_title",
                                      "footer_form",
                                      $this->page_group,
                                      $this->page_slug );
    }
    public function add_setting_section() {
        add_settings_section( $this->section_slug[0], 'Выполните настройки подсекции "Оставить заявку"', '',  $this->page_slug);
        $fields_arr = [
            ['admin_footer_request_title_id', 'Укажите заголовок секции "Оставить заявку"'],
            ['admin_footer_placeholder_name_id', 'Укажите заменитель текста поля "Имя"'],
            ['admin_footer_placeholder_phone_id', 'Укажите заменитель текста поля "Телефон"'],
            ['admin_footer_btn_value_id', 'Укажите заменитель текста кнопки "Оставить заявку"'],
        ];

        foreach($fields_arr as [$id, $title]) {
            add_settings_field($id, $title, array($this, 'add_item_request'), $this->page_slug, $this->section_slug[0], $id);
            register_setting( $this->page_group, $id);
        }

        add_settings_section( $this->section_slug[1], 'Выполните настройки подсекции "Контакты"', '',  $this->page_slug);
        $fields_arr = [
            ['admin_footer_contacts_title_id', 'Укажите заголовок секции "Контакты"'],
            ['admin_footer_central_office_address_id', 'Укажите адресс центрального офиса'],
            ['admin_footer_representative_offices_address_id', 'Укажите адресс центрального представительства'],
            ['admin_footer_representative_offices_citys_id', 'Укажите гороода расположения других офисов (в предложном падеже, например: Самаре, Таганроге)'],
            ['admin_footer_phone_number_1_id', 'Укажите телефон организации № 1"'],
            ['admin_footer_phone_number_2_id', 'Укажите телефон организации № 2"'],
            ['admin_footer_work_schedule_id', 'Укажите график работы'],
        ];

        foreach($fields_arr as [$id, $title]) {
            add_settings_field($id, $title, array($this, 'add_item_contacts'), $this->page_slug, $this->section_slug[1], $id);
            register_setting( $this->page_group, $id);
        }

        add_settings_section( $this->section_slug[2], 'Выполните настройки подсекции "Нижний футер"', '',  $this->page_slug);
        $fields_arr = [
            ['admin_footer_main_background_id', 'Выбрать  изображение заднего фона'],
            ['admin_footer_placeholder_private_policy_id', 'Укажите текста поля "Политика конфиденциальности"'],
            ['admin_footer_file_private_policy_id', 'Выберите файл "Политика конфиденциальности"'],
            ['admin_footer_instagram_img_id', 'Выберите пиктограмму для "Instagram"'],
            ['admin_footer_instagram_src_id', 'Укажите адрес страницы для "Instagram"'],
            ['admin_footer_telegram_img_id', 'Выберите пиктограмму для "Telegram"'],
            ['admin_footer_telegram_src_id', 'Укажите адрес канала в "Telegram" (без @)'],
            ['admin_footer_whatsapp_img_id', 'Выберите пиктограмму для "WhatsApp"'],
            ['admin_footer_whatsapp_src_id', 'Укажите телефон для "WhatsApp" в формате "7xxxxxxxxxx"'],
            ['admin_footer_facebook_img_id', 'Выберите пиктограмму для "Facebook"'],
            ['admin_footer_facebook_src_id', 'Укажите адрес страницы для "Facebook"'],
        ];

        foreach($fields_arr as [$id, $title]) {
            add_settings_field($id, $title, array($this, 'add_item_bottom_footer'), $this->page_slug, $this->section_slug[2], $id);
            register_setting( $this->page_group, $id);
        }
    }

    
    public function add_item_request(string $data) {
        $data_arr = [
            'admin_footer_request_title_id',
            'admin_footer_placeholder_name_id',
            'admin_footer_placeholder_phone_id',
            'admin_footer_btn_value_id',
        ];
        switch($data) {
            case $data_arr[0]:
               new Admin_page_text_input("footer_request-title", "footer[request-title]", $this->ctrl->get_request_title());
               break; 
            case $data_arr[1]:
                new Admin_page_text_input("footer_placeholder-name", "footer[placeholder-name]", $this->ctrl->get_placeholder_name());
                break;  
            case $data_arr[2]:
                new Admin_page_text_input("footer_placeholder-phone", "footer[placeholder-phone]", $this->ctrl->get_placeholder_phone());
                break;  
            case $data_arr[3]:
                new Admin_page_text_input("footer_btn-value", "footer[btn-value]", $this->ctrl->get_btn_value());
                break;  
        }
    }

    public function add_item_contacts(string $data) {
        $data_arr = [
            'admin_footer_contacts_title_id',
            'admin_footer_central_office_address_id',
            'admin_footer_representative_offices_address_id',
            'admin_footer_representative_offices_citys_id', 
            'admin_footer_phone_number_1_id', 
            'admin_footer_phone_number_2_id',
            'admin_footer_work_schedule_id',
        ];
        switch($data) {
            case $data_arr[0]:
               new Admin_page_text_input("footer_contacts-title", "footer[contacts-title]", $this->ctrl->get_contacts_title());
               break; 
            case $data_arr[1]:
                new Admin_page_text_input("footer_central-office-address", "footer[central-office-address]", $this->ctrl->get_central_office_address());
                break;  
            case $data_arr[2]:
                new Admin_page_text_input("footer_representative-offices-address", "footer[representative-offices-address]", $this->ctrl->get_representative_offices_address());
                break;  
            case $data_arr[3]:
                new Admin_page_text_input("footer_representative-offices-citys", "footer[representative-offices-citys]", $this->ctrl->get_representative_offices_citys());
                break;  
            case $data_arr[4]:
                new Admin_page_text_input("footer_phone-number-1", "footer[phone-number-1]", $this->ctrl->get_phone_number_1());
                break;  
            case $data_arr[5]:
                new Admin_page_text_input("footer_phone-number-2", "footer[phone-number-2]", $this->ctrl->get_phone_number_2());
                break;  
            case $data_arr[6]:
                new Admin_page_text_input("footer_work-schedule", "footer[work-schedule]", $this->ctrl->get_work_schedule());
                break;  
        }
    }
    public function add_item_bottom_footer(string $data) {
        $data_arr = [
            'admin_footer_main_background_id',
            'admin_footer_placeholder_private_policy_id',
            'admin_footer_file_private_policy_id',
            'admin_footer_instagram_img_id',
            'admin_footer_instagram_src_id',
            'admin_footer_telegram_img_id',
            'admin_footer_telegram_src_id',
            'admin_footer_whatsapp_img_id',
            'admin_footer_whatsapp_src_id', 
            'admin_footer_facebook_img_id',
            'admin_footer_facebook_src_id',
        ];
        switch($data) {
            case $data_arr[0]:
                $img_src = $this->folder_image_name . $this->ctrl->get_main_background();
                new Admin_page_img_input("footer_main-background-img", "footer main-background", "footer[main-background]", $img_src);
                break;
            case $data_arr[1]:
                new Admin_page_text_input("footer_placeholder-private-policy", "footer[placeholder-private-policy]", $this->ctrl->get_placeholder_private_policy());
                break;  
            case $data_arr[2]:
                $file_name = $this->ctrl->get_file_private_policy();
                new Admin_page_file_input("footer_file-private-policy-file", "footer[file-private-policy]", $file_name);
                break;
            case $data_arr[3]:
                $img_src = $this->folder_image_name . $this->ctrl->get_instagram_img();
                new Admin_page_img_input("footer_instagram-img", "footer instagram img", "footer[instagram-img]", $img_src);
                break;
            case $data_arr[4]:
                new Admin_page_text_input("footer_instagram-src", "footer[instagram-src]", $this->ctrl->get_instagram_src());
                break;  
            case $data_arr[5]:
                $img_src = $this->folder_image_name . $this->ctrl->get_telegram_img();
                new Admin_page_img_input("footer_telegram-img", "footer telegram img", "footer[telegram-img]", $img_src);
                break;
            case $data_arr[6]:
                new Admin_page_text_input("footer_telegram-src", "footer[telegram-src]", $this->ctrl->get_telegram_src());
                break;
            case $data_arr[7]:
                $img_src = $this->folder_image_name . $this->ctrl->get_whatsapp_img();
                new Admin_page_img_input("footer_whatsapp-img", "footer whatsapp img", "footer[whatsapp-img]", $img_src);
                break;
            case $data_arr[8]:
                new Admin_page_text_input("footer_whatsapp-src", "footer[whatsapp-src]", $this->ctrl->get_whatsapp_src());
                break;
            case $data_arr[9]:
                $img_src = $this->folder_image_name . $this->ctrl->get_facebook_img();
                new Admin_page_img_input("footer_facebook-img", "footer facebook img", "footer[facebook-img]", $img_src);
                break;
            case $data_arr[10]:
                new Admin_page_text_input("footer_facebook-src", "footer[facebook-src]", $this->ctrl->get_facebook_src());
                break;
        }
    }
}
?>