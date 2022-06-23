<?php

class Section_title {
    private function print($value){
        return print($value);
    }
    public function show(
        $section_title_text,
        $class_name = null) {
?>
<h2 class="<?php $this->print($class_name)?> section_title animated__fadein-right__1s">
    <?php $this->print($section_title_text)?>
</h2>
<?php
    }
}

?>