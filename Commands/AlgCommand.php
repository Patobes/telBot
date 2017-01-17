<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

class PingCommand extends UserCommand
{
    protected $name = 'alg';
    protected $description = 'Muestra algoritmos para el cubo de rubik';
    protected $usage = '/alg, /alg Letra';
    protected $version = '1.0.0';

    public function execute()
    {
        $message = $this->getMessage();           // Get Message object

        $chat_id = $message->getChat()->getId();  // Get the current Chat ID

        $data = [];                               // Set up the new message data
        $data['chat_id'] = $chat_id;              // Set Chat ID to send the message to
        $data['reply_to_message_id'] = $message->getMessageId();

        $data['text'] = 'Pong!';		  // Set message to send

        return Request::sendMessage($data);       // Send message!
    }
}