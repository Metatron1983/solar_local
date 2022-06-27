<?php


require_once dirname(__FILE__, 2) . '/app/Mail_port.php';
require_once dirname(__FILE__, 2) . '/domain/user.php';
require_once dirname(__FILE__, 2) . '/domain/message.php';

class Message_sender_use_case {
    private Mail_port $mail;
    private User $user;
    private Message $message;
    
    public function __construct(string $user_name, string $user_phone, Mail_port $mail) {
        $this->mail = $mail;
        $this->user = new User($user_name, $user_phone);
        $this->message = new Message($this->user->get_name(), $this->user->get_phone());
    }
    public function send_message() {
        $response = $this->mail->send_message($this->message);
        return $response;
    }
}


?>