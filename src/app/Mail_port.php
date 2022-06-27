<?php

require_once dirname(__FILE__, 2) . "/domain/message.php";

interface Mail_port {
    public function send_message(Message $message);
}

?>