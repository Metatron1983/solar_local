<?php 

add_action( 'wp_ajax_send_form_data', 'form_action_callback' );
add_action( 'wp_ajax_nopriv_send_form_data', 'form_action_callback' );

function form_action_callback(){
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
	
    $headers = 'From: Site admin <root2@localhost.net>' . "\r\n";
    $content = "Заявка на звонок от: $user_name. Номер телефона: $user_phone"; 
    
    $response = wp_mail('root@localhost.net', 'Тема', $content, $headers);
    // $arr = [$user_name, $user_phone]; 
    function mihdan_debug_wp_mail( $wp_error ) {
        return error_log( print_r( $wp_error, true ) );
    }
    add_action( 'wp_mail_failed', 'mihdan_debug_wp_mail', 10, 1 );
    
    // echo $user_name;
    if($response) print 'ok';
    if(!$response) print 'not ok';
	    
	wp_die();
	
}

?>