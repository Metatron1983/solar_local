<?php
require_once dirname(__FILE__, 2) . "/theme-part/admin-part/subpages/main_banner/Admin_main_banner_view.php";
require_once dirname(__FILE__, 2) . "/theme-part/admin-part/subpages/services/Admin_services_view.php";
require_once dirname(__FILE__, 2) . "/theme-part/admin-part/subpages/green_rate/Admin_green_rate_view.php";
require_once dirname(__FILE__, 2) . "/theme-part/admin-part/subpages/second_banner/Admin_second_banner_view.php";
require_once dirname(__FILE__, 2) . "/theme-part/admin-part/subpages/our_clients/Admin_our_clients_view.php";
require_once dirname(__FILE__, 2) . "/theme-part/admin-part/subpages/implementation_plan/Admin_implementation_plan_view.php";
require_once dirname(__FILE__, 2) . "/theme-part/admin-part/subpages/footer/Admin_footer_view.php";

class Admin_panel {
    // управление отображения на авдмин панели стандартных разделов (true = скрыть);
    private $remove_index_page = true;      // Консоль
    private $remove_edit_page = true;       // Записи
    private $remove_upload_page = true;     // Медиафайлы
    private $remove_pages_page = true;      // Страницы
    private $remove_comments_page = true;   // Комментарии
    private $remove_themes_page = true;     // Внешний вид
    private $remove_plugins_page = true;    // Плагины
    private $remove_users_page = true;      // Пользователи
    private $remove_tools_page = true;      // Инструменты
    private $remove_options_page = true;    // Параметры

    public function __construct() {
        add_action( 'admin_menu', array($this, '_remove_menu_items'));
        add_action( 'admin_menu', array($this, '_register_customiz_pages'));
        add_action('admin_enqueue_scripts', array($this, '_add_scripts_and_styles'));
    }
    public function _remove_menu_items () {
        if ($this->remove_index_page) remove_menu_page( 'index.php' );
        if ($this->remove_edit_page) remove_menu_page( 'edit.php' );  
        if ($this->remove_upload_page) remove_menu_page( 'upload.php' );
        if ($this->remove_pages_page) remove_menu_page( 'edit.php?post_type=page' );
        if ($this->remove_comments_page) remove_menu_page( 'edit-comments.php' );  
        if ($this->remove_themes_page) remove_menu_page( 'themes.php' ); 
        if ($this->remove_plugins_page) remove_menu_page( 'plugins.php' );
        if ($this->remove_users_page) remove_menu_page( 'users.php' ); 
        if ($this->remove_tools_page) remove_menu_page( 'tools.php' );
        if ($this->remove_options_page) remove_menu_page( 'options-general.php' );
    } 

    public function _register_customiz_pages () {
        new Admin_main_banner_view();
        new Admin_services_view();
        new Admin_green_rate_view();
        new Admin_second_banner_view();
        new Admin_our_clients_view();
        new Admin_implementation_plan_view();
        new Admin_footer_view();
    }
    public function _add_scripts_and_styles() {
        wp_register_style('admin-style', content_url() . '/themes/solar/asset/style/main-admin.min.css');
        wp_enqueue_style('admin-style');
        wp_register_script('admin-script', content_url() . '/themes/solar/asset/script/main-admin.min.js','',false,true);
        wp_enqueue_script( 'admin-script');
    }
}

$admin_panel = new Admin_panel;

?>
