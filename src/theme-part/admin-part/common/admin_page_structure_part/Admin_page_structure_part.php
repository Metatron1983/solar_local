<?php

class Admin_page_structure_part {
    private string $main_title;
    private string $main_title_class_name;
    private string $form_class_name;
    private string $setting_fields;
    private string $do_setting_section;
    
    public function __construct(string $main_title, 
                                string $main_title_class_name,
                                string $form_class_name,
                                string $setting_fields,
                                string $do_setting_section) {
        $this->main_title = $main_title;
        $this->main_title_class_name = $main_title_class_name;
        $this->form_class_name = $form_class_name;
        $this->setting_fields = $setting_fields;
        $this->do_setting_section = $do_setting_section;
        $this->show();
    }

    private function print_value(string $value){
        return print($value);
    }
    private function show() {
?>
<div class="wrap">
		<h2 class="<?php $this->print_value($this->main_title_class_name) ?> main-title"><?php  $this->print_value($this->main_title) ?></h2>

		<form class="form <?php $this->print_value($this->form_class_name) ?>" method="POST" enctype="multipart/form-data">
			<?php
				settings_fields( "{$this->setting_fields}" );
				do_settings_sections( "{$this->do_setting_section}" ); 
				submit_button();
			?>
		</form>
	</div>
    <?php
    }
}
?>