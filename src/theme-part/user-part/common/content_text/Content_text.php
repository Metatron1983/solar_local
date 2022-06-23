<?php

class Content_text {
    private function print(string $value): string {
        return print($value);
    }

    public function show(
        string $content,
        string $class_name = null): void {
?>
    <p class="<?php $this->print($class_name) ?> content__text animated__fadein-up__1s">
        <?php $this->print($content) ?>
    </p>
<?php
    }

}

?>