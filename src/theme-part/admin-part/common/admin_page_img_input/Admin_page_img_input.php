<?php
// добавить вызов данных из базы данных
class Admin_page_img_input {
    private string $class_name; 
    private string $img_alt;  
    private string $input_name; 
    private string $img_src;

    public function __construct(string $class_name, 
                                string $img_alt,  
                                string $input_name,
                                string $img_src) {
        $this->class_name = $class_name; 
        $this->img_alt = $img_alt;  
        $this->input_name = $input_name;
        $this->img_src = content_url() . "/themes/solar/asset/img/" . $img_src;
        $this->show();
    }

    private function print($value) {
        return print($value);
    }
    private function show() {
    ?>
        <img class="<?php $this->print($this->class_name) ?> image" src="<?php $this->print($this->img_src)  ?>" alt="<?php $this->print($this->img_alt) ?>">
        <div class="<?php $this->print($this->class_name) ?> image-wrapper">
            <label class="<?php $this->print($this->class_name) ?> image-btn" for="<?php $this->print($this->class_name)?>-image-id">Выбрать изображение</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
            <input class="<?php $this->print($this->class_name) ?> image-input" type="file" name="<?php $this->print($this->input_name) ?>" id="<?php $this->print($this->class_name)?>-image-id" accept=".png, .jpg, .jpeg, .webp, .svg" style="display: none;">
        </div>
    <?php
    }
}

?>