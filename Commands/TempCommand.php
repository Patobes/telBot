<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

class TempCommand extends UserCommand
{
    protected $name = 'temp';               // Your command's name
    protected $description = 'Muestra la temperatura de la Raspberry'; // Your command description
    protected $usage = '/temp';                    // Usage of your command
    protected $version = '1.0.0';                  // Version of your command

    public function execute()
    {
        $message = $this->getMessage();           // Get Message object

        $chat_id = $message->getChat()->getId();  // Get the current Chat ID

	$output = shell_exec(dirname(__DIR__)."/scripts/temp.sh");

        $data = [];                               // Set up the new message data
        $data['chat_id'] = $chat_id;              // Set Chat ID to send the message to
        $data['text'] = $output;		  // Set message to send

        return Request::sendMessage($data);       // Send message!

    }
}
