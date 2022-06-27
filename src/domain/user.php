<?php

class User {
    private string $name;
    private string $phone;

    public function __construct(string $name, string $phone) {
        $this->name = $name;
        $this->phone = $phone;
    }
    public function get_name() {
        return $this->name;
    }
    public function get_phone() {
        return $this->phone;
    }
}


?>