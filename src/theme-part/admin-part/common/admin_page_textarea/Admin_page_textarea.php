<?php
class Admin_page_textarea {
    private string $class_name;
    private string $name;
    private string $value;
    public function __construct(string $class_name, string $name, string $value) {
        $this->class_name = $class_name;
        $this->name = $name;
        $this->value = $value;
        $this->show();
    }
    private function print($value) {
        return print($value);
    }
    private function show() {
    ?>
        <textarea class="<?php $this->print($this->class_name)?> textarea" name="<?php $this->print($this->name)?>" rows="3"><?php $this->print($this->value)?></textarea>
    <?php
    }
}
?>