<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Request;

class AlgCommand extends UserCommand
{
    protected $name = 'alg';
    protected $description = 'Muestra algoritmos para el cubo de rubik';
    protected $usage = '/alg, /alg Letra';
    protected $version = '1.0.0';

    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();

        $message_id = $message->getMessageId();
        $command    = trim($message->getText(true));

        $data = [
            'chat_id'             => $chat_id,
            'reply_to_message_id' => $message_id
        ];
        //If no command parameter is passed, show the list
        if ($command === '') {
            $text ='¿Qué permutación quieres?';

            $keyboard = new Keyboard(
                ['/alg U', '/alg H', '/alg Z'],
                ['/alg T', '/alg Y', '/alg A'],
                ['/alg J', '/alg R', '/alg E'],
                ['/alg F', '/alg G', '/alg N', '/alg V']
            );

            $data['reply_markup'] = $keyboard;

        } else {

            switch ($command){
                case 'U':
                    $text = 'U: '.$command;
                    break;
                case 'H':
                    $text = 'H: '.$command;
                    break;
                case 'Z':
                    $text = 'Z: '.$command;
                    break;
                case 'T':
                    $text = 'T: '.$command;
                    break;
                case 'Y':
                    $text = 'Y: '.$command;
                    break;
                case 'A':
                    $text = 'A: '.$command;
                    break;
                case 'J':
                    $text = 'J: '.$command;
                    break;
                case 'R':
                    $text = 'R: '.$command;
                    break;
                case 'E':
                    $text = 'E: '.$command;
                    break;
                case 'F':
                    $text = 'F: '.$command;
                    break;
                case 'G':
                    $text = 'G: '.$command;
                    break;
                case 'N':
                    $text = 'N: '.$command;
                    break;
                case 'V':
                    $text = 'V: '.$command;
                    break;
                default:
                    $text = 'No se encuentra el algoritmo: '.$command;
                    break;
            }
        }

        $data['text'] = $text;

        return Request::sendMessage($data);
    }
}