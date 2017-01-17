<?php

namespace Longman\TelegramBot\Commands\AdminCommands;

use Longman\TelegramBot\Commands\AdminCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Request;

class LicitacionCommand extends AdminCommand
{
    protected $name = 'licitacion';               // Your command's name
    protected $description = 'Busca la licitación indicada'; // Your command description
    protected $usage = '/licitacion expediente';                 // Usage of your command
    protected $version = '1.0.0';                  // Version of your command

    public function execute()
    {
        $message = $this->getMessage();           // Get Message object

        $chat_id = $message->getChat()->getId();  // Get the current Chat ID

        $data = [];
        $expediente = trim($message->getText(true));

        if ($expediente === '') {
            $data['text'] = 'Uso del comando: ' . $this->getUsage();
        }else {

            $url = "http://democorr.com.es/LicitacionesWeb/api/getLicitacion.php?expediente=" . $expediente;
            $licitacion = file_get_contents($url);
            $licitacion = json_decode($licitacion, true);

            if (isset($licitacion['titulo'])) {
                $info = $licitacion['titulo'] . " URL: " . $licitacion['detalle'];
            } else {
                $info = "Expediente no encontrado, ¿quizás es alguno de estos?\r\n";

                $buttons = array();

                foreach ($licitacion as $expediente) {
                    //$info .= $expediente . "\r\n";
                    array_push($buttons,['text' => '/licitacion '.$expediente]);
                }

                $keyboard = new Keyboard($buttons);

                $keyboard
                    ->setResizeKeyboard(true)
                    ->setOneTimeKeyboard(true)
                    ->setSelective(false);

                $data['reply_markup'] = $keyboard;
            }

            $data['text'] = $info;          // Set message to send
        }

        $data['chat_id'] = $chat_id;              // Set Chat ID to send the message to
        return Request::sendMessage($data);       // Send message!

    }
}
