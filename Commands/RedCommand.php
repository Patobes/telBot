<?php

namespace Longman\TelegramBot\Commands\AdminCommands;

use Longman\TelegramBot\Commands\AdminCommand;
use Longman\TelegramBot\Request;

class RedCommand extends AdminCommand{

    protected $name = 'red';
    protected $description = 'Devuelve datos de red del servidor';
    protected $usage = '/red, /red interfaz';
    protected $version = '1.0.0';

    public function execute()
    {
        $message = $this->getMessage();

        $chat_id = $message->getChat()->getId();
        $message_id = $message->getMessageId();
        $interface = trim($message->getText(true));

        $output = shell_exec(dirname(__DIR__)."/scripts/ifconfig.sh " . $interface);

        $data = [
            'chat_id'             => $chat_id,
            'reply_to_message_id' => $message_id,
            'text'                => $output
        ];

        return Request::sendMessage($data);

    }
}