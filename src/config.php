<?php
//управление базой данных

//имена таблиц данных
final class DB_linker {
    public $table_name;
    public $field_names;

    public function __construct(string $table_name) {
        $db_tables_name = new Db_tables_name();

        switch($table_name){
            case ($db_tables_name->main_banner):        
                $this->table_name = $db_tables_name->main_banner;
                $this->field_names = new Db_main_banner_tbl_field_name();
            break;
            case ($db_tables_name->services):        
                $this->table_name = $db_tables_name->services;
                $this->field_names = new Db_services_tbl_field_name();
            break;
            case ($db_tables_name->green_rate):        
                $this->table_name = $db_tables_name->green_rate;
                $this->field_names = new Db_green_rate_tbl_field_name();
            break;
            case ($db_tables_name->second_banner):        
                $this->table_name = $db_tables_name->second_banner;
                $this->field_names = new Db_second_banner_tbl_field_name();
            break;
            case ($db_tables_name->our_clients):        
                $this->table_name = $db_tables_name->our_clients;
                $this->field_names = new Db_our_clients_tbl_field_name();
            break;
            case ($db_tables_name->implementation_plan):        
                $this->table_name = $db_tables_name->implementation_plan;
                $this->field_names = new Db_implementation_plan_tbl_field_name();
            break;
            case ($db_tables_name->footer):        
                $this->table_name = $db_tables_name->footer;
                $this->field_names = new Db_footer_tbl_field_name();
            break;
        }
    }
}

final class Db_tables_name {
    public string $main_banner; 
    public string $services; 
    public string $green_rate;
    public string $second_banner;
    public string $our_clients;
    public string $implementation_plan;
    public string $footer;
    public function __construct() {
        global $wpdb;
        $prefix = $wpdb->prefix;

        $this->main_banner = $prefix . "main_banner"; 
        $this->services = $prefix . "services"; 
        $this->green_rate = $prefix . "green_rate"; 
        $this->second_banner = $prefix . "second_banner"; 
        $this->our_clients = $prefix . "our_clients"; 
        $this->implementation_plan = $prefix . "implementation_plan"; 
        $this->footer = $prefix . "footer"; 
    }
}

final class Db_main_banner_tbl_field_name {
    public $logo_src = "logo_src";
    public $image_PC1xJPG = "image_PC1xJPG";
    public $image_Tablet1xJPG = "image_Tablet1xJPG";
    public $image_Mobile1xJPG = "image_Mobile1xJPG";
    public $top_title = "top_title";
    public $middle_title = "middle_title";
    public $bottom_title = "bottom_title";
    public $btn_title = "btn_title";
    public $instagram_img = "instagram_img";
    public $instagram_link = "instagram_link";
    public $telegram_img = "telegram_img";
    public $telegram_link = "telegram_link";
    public $whatsapp_img = "whatsapp_img";
    public $whatsapp_link = "whatsapp_link";
    public $facebook_img = "facebook_img";
    public $facebook_link = "facebook_link";
}

final class Db_services_tbl_field_name {
    public $main_title = "main_title";
    public $service_1_title = "service_1_title";
    public $service_1_text = "service_1_text";
    public $service_2_title = "service_2_title";
    public $service_2_text = "service_2_text";
    public $service_3_title = "service_3_title";
    public $service_3_text = "service_3_text";
    public $service_4_title = "service_4_title";
    public $service_4_text = "service_4_text";
    public $image_PC1xJPG = "image_PC1xJPG";
    public $image_Tablet1xJPG = "image_Tablet1xJPG";
    public $image_Mobile1xJPG = "image_Mobile1xJPG";
}

final class Db_green_rate_tbl_field_name {
    public $main_title = "main_title";
    public $main_advantage_image = "main_advantage_image";
    public $main_advantage_text = "main_advantage_text";
    public $advantage_1_title = "advantage_1_title";
    public $advantage_1_text = "advantage_1_text";
    public $advantage_2_title = "advantage_2_title";
    public $advantage_2_text = "advantage_2_text";
    public $advantage_3_title = "advantage_3_title";
    public $advantage_3_text = "advantage_3_text";
    public $advantage_4_title = "advantage_4_title";
    public $advantage_4_text = "advantage_4_text";
    public $explanation_text = "explanation_text";
    public $explanation_image_PC1xJPG = "explanation_image_PC1xJPG";
    public $explanation_image_Tablet1xJPG = "explanation_image_Tablet1xJPG";
    public $explanation_image_Mobile1xJPG = "explanation_image_Mobile1xJPG";
}

final class Db_second_banner_tbl_field_name {
    public $image_PC1xJPG = "image_PC1xJPG";
    public $image_Tablet1xJPG = "image_Tablet1xJPG";
    public $image_Mobile1xJPG = "image_Mobile1xJPG";
    public $main_title = "main_title";
}
final class Db_our_clients_tbl_field_name {
    public $main_title = "main_title";
    public $button_name = "button_name";
    public $image_1_PC1xJPG = "image_1_PC1xJPG";
    public $image_1_Tablet1xJPG = "image_1_Tablet1xJPG";
    public $image_1_Mobile1xJPG = "image_1_Mobile1xJPG";
    public $image_2_PC1xJPG = "image_2_PC1xJPG";
    public $image_2_Tablet1xJPG = "image_2_Tablet1xJPG";
    public $image_2_Mobile1xJPG = "image_2_Mobile1xJPG";
    public $image_3_PC1xJPG = "image_3_PC1xJPG";
    public $image_3_Tablet1xJPG = "image_3_Tablet1xJPG";
    public $image_3_Mobile1xJPG = "image_3_Mobile1xJPG";
    public $title_1 = "title_1";
    public $title_2 = "title_2";
    public $title_3 = "title_3";
    public $location_1 = "location_1";
    public $location_2 = "location_2";
    public $location_3 = "location_3";
    public $income_1 = "income_1";
    public $income_2 = "income_2";
    public $income_3 = "income_3";
    public $end_of_works_1 = "end_of_works_1";
    public $end_of_works_2 = "end_of_works_2";
    public $end_of_works_3 = "end_of_works_3";
    public $lifetime_1 = "lifetime_1";
    public $lifetime_2 = "lifetime_2";
    public $lifetime_3 = "lifetime_3";
}
final class Db_implementation_plan_tbl_field_name {
    public $main_title = "main_title";
    public $step_1_title = "step_1_title";
    public $step_1_text = "step_1_text";
    public $step_2_title = "step_2_title";
    public $step_2_text = "step_2_text";
    public $step_3_title = "step_3_title";
    public $step_3_text = "step_3_text";
    public $step_4_title = "step_4_title";
    public $step_4_text = "step_4_text";
    public $step_5_title = "step_5_title";
    public $step_5_text = "step_5_text";
    public $image_PC1xJPG = "image_PC1xJPG";
    public $image_Tablet1xJPG = "image_Tablet1xJPG";
    public $image_Mobile1xJPG = "image_Mobile1xJPG";
}
final class Db_footer_tbl_field_name {
    public $request_title = "request_title";
    public $placeholder_name = "placeholder_name";
    public $placeholder_phone = "placeholder_phone";
    public $btn_value = "btn_value";
    public $contacts_title = "contacts_title";
    public $central_office_address = "central_office_address";
    public $representative_offices_address = "representative_offices_address";
    public $representative_offices_citys = "representative_offices_citys";
    public $phone_number_1 = "phone_number_1";
    public $phone_number_2 = "phone_number_2";
    public $work_schedule = "work_schedule";
    public $main_background = "main_background";
    public $placeholder_private_policy = "placeholder_private_policy";
    public $file_private_policy = "file_private_policy";
    public $instagram_img = "instagram_img";
    public $instagram_src = "instagram_src";
    public $telegram_img = "telegram_img";
    public $telegram_src = "telegram_src";
    public $whatsapp_img = "whatsapp_img";
    public $whatsapp_src = "whatsapp_src";
    public $facebook_img = "facebook_img";
    public $facebook_src = "facebook_src";
}
?>