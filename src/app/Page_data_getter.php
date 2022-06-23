<?php

require_once dirname(__FILE__) . '/DP_port.php';

class Page_data_getter {
    private $db;
    public function __construct(DB_port $DB_port) {
        $this->db = $DB_port;
    }
    public function get_main_banner_data(string $table_name, string $field_name) {
        $result = $this->db->get_data_from_tbl($table_name, $field_name);
        $result = wp_unslash($result);
        return $result;
    }
    public function set_main_banner_data(string $table_name, string $field_name, string $field_content): void {
        $this->db->set_data_to_tbl($table_name, $field_name, $field_content);
    }
}

?>