<?php
require_once dirname(__FILE__) . "/Admin_our_clients_ctrl.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_structure_part/Admin_page_structure_part.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_img_input/Admin_page_img_input.php";
require_once dirname(__FILE__, 3) . "/common/admin_page_text_input/Admin_page_text_input.php";

class Admin_our_clients_view {
    private string $page_slug = 'admin_our_clients_slug'; 
    private string $page_group = 'admin_our_clients_group'; 
    private array $section_slug = ['admin_our_clients_main_section_slug','admin_our_clients_1_section_slug', 'admin_our_clients_2_section_slug', 'admin_our_clients_3_section_slug']; 
    private string $folder_image_name = 'our_clients/';
    private Admin_our_clients_ctrl $ctrl;

    public function __construct() {
        $this->ctrl = new Admin_our_clients_ctrl();
        add_menu_page('Наши клиенты', 'Наши клиенты', 'edit_others_pages', $this->page_slug, array($this, 'show_page'), 'dashicons-cover-image');
        add_action('admin_init', array($this, 'add_setting_section'));
    }
    public function show_page() {
        new Admin_page_structure_part('Cтраница настроек секции "Нащи клиенты', 
                                      "our-clients_title",
                                      "our-clients_form",
                                      $this->page_group,
                                      $this->page_slug );
    }
    public function add_setting_section() {
        add_settings_section( $this->section_slug[0], 'Выполните настройки подсекции "Общие"', '',  $this->page_slug);
        
        $fields_arr = [
            ['admin_our_clients_main_title_id', 'Введите заголовок секции "Наши клиенты"'],
            ['admin_our_clients_button_name_id', 'Введите текст кнопки "Оставить заявку"'],
        ];

        foreach($fields_arr as [$id, $title]) {
            add_settings_field($id, $title, array($this, 'add_main_item'), $this->page_slug, $this->section_slug[0], $id);
            register_setting( $this->page_group, $id);
        }

        $number_of_clients = 3;
        for($i=1; $i <= $number_of_clients; $i++) {
            add_settings_section( $this->section_slug[$i], 'Выполните настройки подсекции "Клиент ' . $i .'"', '',  $this->page_slug);
            
            $fields_arr = [
                    ['admin_our_clients_image_' . $i . '_PC1xJPG_id', 'Выбрать изображение баннера PC 1x jpg (570 x 310)'],
                    ['admin_our_clients_image_' . $i .'_Tablet1xJPG_id', 'Выбрать изображение баннера Tablet 1x jpg'],
                    ['admin_our_clients_image_' . $i .'_Mobile1xJPG_id', 'Выбрать изображение баннера Mobile 1x jpg'],
                    ['admin_our_clients_title_'. $i .'_id', 'Введите название проекта'],
                    ['admin_our_clients_location_'. $i .'_id', 'Укажите расположение проекта'],
                    ['admin_our_clients_income_'. $i .'_id', 'Укажите чистый доход по проекту'],
                    ['admin_our_clients_end_of_works_'. $i .'_id', 'Укажите месяц и год завершения монтажных работ'],
                    ['admin_our_clients_lifetime_'. $i .'_id', 'Укажите срок службы'],
                ];
                
            foreach($fields_arr as [$id, $title]) {
                    add_settings_field($id, $title, array($this, 'add_project_item'), $this->page_slug, $this->section_slug[$i], $id);
                    register_setting( $this->page_group, $id);
                }
            }
    }

    
    public function add_main_item(string $data) {
        $data_arr = [
            'admin_our_clients_main_title_id',
            'admin_our_clients_button_name_id',
        ];
        switch($data) {
            case $data_arr[0]:
               new Admin_page_text_input("our-clients_main-title-img", "our-clients[main-title]", $this->ctrl->get_main_title());
               break; 
            case $data_arr[1]:
                new Admin_page_text_input("our-clients_button-name-img", "our-clients[button-name]", $this->ctrl->get_button_name());
                break;  
        }
    }

    public function add_project_item(string $data) {
        $data_arr = [
            'admin_our_clients_image_1_PC1xJPG_id',
            'admin_our_clients_image_2_PC1xJPG_id',
            'admin_our_clients_image_3_PC1xJPG_id',
            'admin_our_clients_image_1_Tablet1xJPG_id',
            'admin_our_clients_image_2_Tablet1xJPG_id',
            'admin_our_clients_image_3_Tablet1xJPG_id',
            'admin_our_clients_image_1_Mobile1xJPG_id',
            'admin_our_clients_image_2_Mobile1xJPG_id',
            'admin_our_clients_image_3_Mobile1xJPG_id',
            'admin_our_clients_title_1_id',
            'admin_our_clients_title_2_id',
            'admin_our_clients_title_3_id',
            'admin_our_clients_location_1_id',
            'admin_our_clients_location_2_id',
            'admin_our_clients_location_3_id',
            'admin_our_clients_income_1_id',
            'admin_our_clients_income_2_id',
            'admin_our_clients_income_3_id',
            'admin_our_clients_end_of_works_1_id',
            'admin_our_clients_end_of_works_2_id',
            'admin_our_clients_end_of_works_3_id',
            'admin_our_clients_lifetime_1_id',
            'admin_our_clients_lifetime_2_id',
            'admin_our_clients_lifetime_3_id',
        ];
        switch($data) {
            case $data_arr[0]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_1_PC1xJPG(); 
                new Admin_page_img_input("our-clients_image-1-PC1xJPG-img", "our clients image-1-PC1xJPG", "our-clients[image-1-PC1xJPG]", $img_src);
                break;
            case $data_arr[1]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_2_PC1xJPG(); 
                new Admin_page_img_input("our-clients_image-2-PC1xJPG-img", "our clients image-2-PC1xJPG", "our-clients[image-2-PC1xJPG]", $img_src);
                break;
            case $data_arr[2]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_3_PC1xJPG(); 
                new Admin_page_img_input("our-clients_image-3-PC1xJPG-img", "our clients image-3-PC1xJPG", "our-clients[image-3-PC1xJPG]", $img_src);
                break;          
            case $data_arr[3]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_1_Tablet1xJPG(); 
                new Admin_page_img_input("our-clients_image-1-Tablet1xJPG-img", "our clients image-1-Tablet1xJPG", "our-clients[image-1-Tablet1xJPG]", $img_src);
                break;
            case $data_arr[4]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_2_Tablet1xJPG(); 
                new Admin_page_img_input("our-clients_image-2-Tablet1xJPG-img", "our clients image-2-Tablet1xJPG", "our-clients[image-2-Tablet1xJPG]", $img_src);
                break;
            case $data_arr[5]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_3_Tablet1xJPG(); 
                new Admin_page_img_input("our-clients_image-3-Tablet1xJPG-img", "our clients image-3-Tablet1xJPG", "our-clients[image-3-Tablet1xJPG]", $img_src);
                break;
            case $data_arr[6]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_1_Mobile1xJPG();
                new Admin_page_img_input("our-clients_image-1-Mobile1xJPG-img", "our clients image-1-Mobile1xJPG", "our-clients[image-1-Mobile1xJPG]", $img_src);
                break;
            case $data_arr[7]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_2_Mobile1xJPG();
                new Admin_page_img_input("our-clients_image-2-Mobile1xJPG-img", "our clients image-2-Mobile1xJPG", "our-clients[image-2-Mobile1xJPG]", $img_src);
                break;
            case $data_arr[8]:
                $img_src = $this->folder_image_name . $this->ctrl->get_image_3_Mobile1xJPG();
                new Admin_page_img_input("our-clients_image-3-Mobile1xJPG-img", "our clients image-3-Mobile1xJPG", "our-clients[image-3-Mobile1xJPG]", $img_src);
                break;
            case $data_arr[9]:
                new Admin_page_text_input("our-clients_title-1", "our-clients[title-1]", $this->ctrl->get_title_1());
                break;         
            case $data_arr[10]:
                new Admin_page_text_input("our-clients_title-2", "our-clients[title-2]", $this->ctrl->get_title_2());
                break;         
            case $data_arr[11]:
                new Admin_page_text_input("our-clients_title-3", "our-clients[title-3]", $this->ctrl->get_title_3());
                break;         
            case $data_arr[12]:
                new Admin_page_text_input("our-clients_location-1", "our-clients[location-1]", $this->ctrl->get_location_1());
                break;         
            case $data_arr[13]:
                new Admin_page_text_input("our-clients_location-2", "our-clients[location-2]", $this->ctrl->get_location_2());
                break;         
            case $data_arr[14]:
                new Admin_page_text_input("our-clients_location-3", "our-clients[location-3]", $this->ctrl->get_location_3());
                break;         
            case $data_arr[15]:
                new Admin_page_text_input("our-clients_income-1", "our-clients[income-1]", $this->ctrl->get_income_1());
                break;         
            case $data_arr[16]:
                new Admin_page_text_input("our-clients_income-2", "our-clients[income-2]", $this->ctrl->get_income_2());
                break;         
            case $data_arr[17]:
                new Admin_page_text_input("our-clients_income-3", "our-clients[income-3]", $this->ctrl->get_income_3());
                break;         
            case $data_arr[18]:
                new Admin_page_text_input("our-clients_end-of-works-1", "our-clients[end-of-works-1]", $this->ctrl->get_end_of_works_1());
                break;         
            case $data_arr[19]:
                new Admin_page_text_input("our-clients_end-of-works-2", "our-clients[end-of-works-2]", $this->ctrl->get_end_of_works_2());
                break;         
            case $data_arr[20]:
                new Admin_page_text_input("our-clients_end-of-works-3", "our-clients[end-of-works-3]", $this->ctrl->get_end_of_works_3());
                break;         
            case $data_arr[21]:
                new Admin_page_text_input("our-clients_lifetime-1", "our-clients[lifetime-1]", $this->ctrl->get_lifetime_1());
                break;         
            case $data_arr[22]:
                new Admin_page_text_input("our-clients_lifetime-2", "our-clients[lifetime-2]", $this->ctrl->get_lifetime_2());
                break;         
            case $data_arr[23]:
                new Admin_page_text_input("our-clients_lifetime-3", "our-clients[lifetime-3]", $this->ctrl->get_lifetime_3());
                break;         
        }
    }
}

?>