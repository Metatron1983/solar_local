<?php 
require_once dirname(__FILE__, 2) . '/domain/message.php';

class Message_sender_adapter implements Mail_port {
    public function send_message(Message $message) {

        // $response = wp_mail($message->get_mail_address_to(), $message->get_subject(), $message->get_message(), $message->get_headers());
        $response = mail($message->get_mail_address_to(), $message->get_subject(), $message->get_message(), $message->get_headers());


        function mihdan_debug_wp_mail( $wp_error ) {
            return error_log( print_r( $wp_error, true ) );
        }
        add_action( 'wp_mail_failed', 'mihdan_debug_wp_mail', 10, 1 );
        
        // echo $user_name;
        if($response) return 'the message has been sent';
        if(!$response) return 'the message has not been sent';
    }
}

?>