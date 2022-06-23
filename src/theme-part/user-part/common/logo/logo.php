<?php

class Logo {
    private function print($value) {
        return print($value);
    }
    public function show($img_src, $class_name = null) {
?>

<img class="<?php $this->print($class_name) ?> logo animated__fadein__1s" src="<?php $this->print($img_src) ?>" alt="Logo"> 
<?php
    }
}
?>