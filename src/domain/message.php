<?php

class Message {
    private string $mail_address_to = 'root@localhost.net';
    private string $subject;
    private string $message;
    private array $headers;

    public function __construct(string $user_name, string $user_phone) {
        $this->subject = 'Заявка на звонок клиенту';
        
        $this->message = "Заявка на звонок от: $user_name. Номер телефона: $user_phone";
        $this->headers = array('From' => 'Solar admin <root2@localhost.net>', 'Content-Type' => 'text/plain; charset=UTF-8', 'Content-Transfer-Encoding' => '8bit', 'X-Mailer' => 'PHP/' . phpversion());
    }

    public function get_mail_address_to() {
        return $this->mail_address_to;
    }
    public function get_subject() {
        return $this->subject;
    }
    public function get_message() {
        return $this->message;
    }
    public function get_headers() {
        return $this->headers;
    }
}

?>