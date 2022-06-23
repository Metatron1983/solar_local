<?php

class Content_title {
    private function print(string $value): string {
        return print($value);
    }

    public function show(
        $content_title_text,
        $class_name = null) {
?>
    <h2 class="<?php $this->print($class_name) ?> content__title animated__fadein-up__1s">
        <?php $this->print($content_title_text)?>
    </h2>
<?php
    }
}

?>