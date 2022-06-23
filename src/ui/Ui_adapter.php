<?php
        
        
class Ui_adapter {


    function __construct() {
        $this->get_page();
    }

    public function get_page() {
        //Ajax request
        require_once dirname(__FILE__, 2) . '/theme-part/user-part/form_feedback_request.php';

        if (is_admin() === true && current_user_can('manage_options')) {
            require_once get_stylesheet_directory() . '/themes/admin.php';
            return;
        }     
       
        add_filter( 'template_include', array($this,'get_page_sep'));
        
         
    }
    
    function get_page_sep() {
        if(is_page("home")) { 
            return $this->get_user_page();
        }
        return $this->get_404_page();
    }
    
    public function get_admin_page() {
        require_once get_stylesheet_directory() . '/themes/admin.php';
    }
    public function get_user_page() {
        return get_stylesheet_directory() . '/themes/index.php';
    }
    public function get_404_page() {
        return get_stylesheet_directory() . '/404.php';
    }
};

 

?>