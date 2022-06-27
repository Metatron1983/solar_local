<?php


add_action( 'wp_ajax_send_form_data', 'form_action_callback' );
add_action( 'wp_ajax_nopriv_send_form_data', 'form_action_callback' );

function form_action_callback() {
    require_once dirname(__FILE__, 3) . '/app/message_sender_use_case.php';
    require_once dirname(__FILE__, 3) . '/services/message_sender_adapter.php';
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
    $sender_adapter = new Message_sender_adapter();

    $response = new Message_sender_use_case($user_name, $user_phone, $sender_adapter);
	
    print $response->send_message();
    
    wp_die();
}

?>