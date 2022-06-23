<?php
    add_action('wp_enqueue_scripts', 'add_head_style');

    function add_head_style () {
        $theme_uri = get_template_directory_uri();
        wp_register_style('style', $theme_uri . '/asset/style/main.min.css', false, '0.1');
        wp_register_script('script', $theme_uri . '/asset/script/main.min.js', false, '0.1', true);
        
        
        wp_enqueue_script( 'jquery');
        wp_enqueue_style('style');
        wp_enqueue_script('script');
        

        wp_localize_script( 'script', 'MyAjax',
            array( 'ajaxurl' => admin_url('admin-ajax.php')));

        wp_dequeue_style( 'wp-block-library' ); // отключаем стили
        wp_dequeue_style( 'global-styles' );
    }


    

?>