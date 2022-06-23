<?php
class Admin_page_text_input {
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
        <input class="<?php $this->print($this->class_name) ?> text-input" type="text" name="<?php $this->print($this->name) ?>" maxlength="120" value="<?php $this->print($this->value) ?>">
    <?php
    }
}
?>