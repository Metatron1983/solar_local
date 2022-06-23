<?php
// добавить вызов данных из базы данных
class Admin_page_file_input {
    private string $class_name; 
    private string $input_name; 
    private string $file_name;

    public function __construct(string $class_name,  
                                string $input_name,
                                string $file_name) {
        $this->class_name = $class_name; 
        $this->input_name = $input_name;
        $this->file_name = $file_name;
        $this->show();
    }

    private function print($value) {
        return print($value);
    }
    private function show() {
    ?>
        <p class="<?php $this->print($this->class_name) ?> file-p"><?php $this->print($this->file_name) ?></p>
        <div class="<?php $this->print($this->class_name) ?> file-wrapper">
            <label class="<?php $this->print($this->class_name) ?> file-btn" for="<?php $this->print($this->class_name)?>-file-id">Выбрать изображение</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
            <input class="<?php $this->print($this->class_name) ?> file-input" type="file" name="<?php $this->print($this->input_name) ?>" id="<?php $this->print($this->class_name)?>-file-id" accept=".txt, .docx, .doc" style="display: none;">
        </div>
    <?php
    }
}

?>