<?php

namespace Longman\TelegramBot\Commands\AdminCommands;

use Longman\TelegramBot\Commands\AdminCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Request;

class WolCommand extends AdminCommand{

    protected $name = 'wol';
    protected $description = 'Enciendo el ordenador de casa';
    protected $usage = '/wol';
    protected $version = '1.0.0';

    public function execute()
    {
        $message = $this->getMessage();

        $chat_id = $message->getChat()->getId();
        $message_id = $message->getMessageId();

        $output = shell_exec(dirname(__DIR__)."/scripts/wol.sh");

        $data = [
            'chat_id'             => $chat_id,
            'reply_to_message_id' => $message_id,
            'text'                => $output
        ];

        return Request::sendMessage($data);

    }
}
