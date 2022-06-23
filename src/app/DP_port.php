<?php

interface DB_port {
    public function get_data_from_tbl(string $table_name, string $field_name);
    public function set_data_to_tbl(string $table_name, string $field_name, string $field_content);
}

?>