<?php
require_once get_template_directory() ."/config.php"; 
require_once dirname(__FILE__, 2) . "/app/DP_port.php";

class DB_adapter implements DB_port {
    private Db_tables_name $db_tables_name;
   
    public function __construct() {
        $this->db_tables_name = new Db_tables_name();
        $this->check_tables_and_create();
    }
    private function check_tables_and_create() {
        foreach($this->db_tables_name as $name => $value) {
            global $wpdb;
            if($value !== $wpdb->get_var("SHOW TABLES LIKE '$value'")){
                $this->create_tables($value);
                $this->create_field_names($value);
                continue;
            }
        }
        return;
    }
    private function create_tables(string $table_name) {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        global $wpdb; 
        $charset_collate = $wpdb->get_charset_collate();

        $request = "CREATE TABLE {$table_name} (
            id bigint(20) unsigned NOT NULL auto_increment,
            field_name varchar(100) NOT NULL default '',
            field_content varchar(1000) NOT NULL default '',
            PRIMARY KEY (id),
            UNIQUE field_name (field_name))
            {$charset_collate};";
        dbDelta($request);
    }
    private function create_field_names(string $table_name) {
        global $wpdb; 
        $field_link = new DB_linker($table_name); 
        $field_names_class = $field_link->field_names; 
        foreach($field_names_class as $name => $value) {
            $wpdb->insert($table_name,['field_name'=>"$value"]);
        }
    }
    public function set_data_to_tbl(string $table_name, string $field_name, string $field_content) {
        global $wpdb;
        $wpdb->update($table_name,['field_content' => "$field_content"], ['field_name' => "$field_name"]);
    }
    public function get_data_from_tbl(string $table_name, string $field_name) {
        global $wpdb; 
        $tbl = $table_name;
        $querry = "SELECT field_content FROM $tbl WHERE field_name = '$field_name'";
        $result = $wpdb->get_var($querry);
        return $result;
    }
}
?>