<?php

class Request_btn {
    private function print($value) {
        return print($value);
    }
    public function show($btn_value, $class_name = null) {
?>
    <a href="#footer" class="<?php $this->print($class_name) ?> request_btn"><?php $this->print($btn_value) ?></a>
<?php
    }
}
?>