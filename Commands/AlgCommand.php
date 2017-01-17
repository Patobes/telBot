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

            $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

            $data['reply_markup'] = $keyboard;

        } else {

            switch ($command){
                case 'U':
                    $text = 'Especifica que '.$command.' quieres';
                    $keyboard = new Keyboard(
                        ['/alg U1', '/alg U2']
                    );
                    $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                    $data['reply_markup'] = $keyboard;

                    break;
                case 'U1':
                    $text = 'U: '.$command;
                    break;
                case 'U2':
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
                    $text = 'Especifica que '.$command.' quieres';
                    $keyboard = new Keyboard(
                        ['/alg A1', '/alg A2']
                    );
                    $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                    $data['reply_markup'] = $keyboard;
                    break;
                case 'A1':
                    $text = 'A: '.$command;
                    break;
                case 'A2':
                    $text = 'A: '.$command;
                    break;

                case 'J':
                    $text = 'Especifica que '.$command.' quieres';
                    $keyboard = new Keyboard(
                        ['/alg J1', '/alg J2']
                    );
                    $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                    $data['reply_markup'] = $keyboard;
                    break;
                case 'J1':
                    $text = 'J: '.$command;
                    break;
                case 'J2':
                    $text = 'J: '.$command;
                    break;

                case 'R':
                    $text = 'Especifica que '.$command.' quieres';
                    $keyboard = new Keyboard(
                        ['/alg R1', '/alg R2']
                    );
                    $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                    $data['reply_markup'] = $keyboard;
                    break;
                case 'R1':
                    $text = 'R: '.$command;
                    break;
                case 'R2':
                    $text = 'R: '.$command;
                    break;

                case 'E':
                    $text = 'E: '.$command;
                    break;

                case 'F':
                    $text = 'F: '.$command;
                    break;

                case 'G':
                    $text = 'Especifica que '.$command.' quieres';
                    $keyboard = new Keyboard(
                        ['/alg G1', '/alg G2', '/alg G3', '/alg G4']
                    );
                    $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                    $data['reply_markup'] = $keyboard;
                    break;
                case 'G1':
                    $text = 'G: '.$command;
                    break;
                case 'G2':
                    $text = 'G: '.$command;
                    break;
                case 'G3':
                    $text = 'G: '.$command;
                    break;
                case 'G4':
                    $text = 'G: '.$command;
                    break;

                case 'N':
                    $text = 'Especifica que '.$command.' quieres';
                    $keyboard = new Keyboard(
                        ['/alg N1', '/alg N2']
                    );
                    $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                    $data['reply_markup'] = $keyboard;
                    break;
                case 'N1':
                    $text = 'N: '.$command;
                    break;
                case 'N2':
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