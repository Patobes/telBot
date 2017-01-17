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
                        ['/alg Ua', '/alg Ub']
                    );
                    $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                    $data['reply_markup'] = $keyboard;

                    break;
                case 'Ua':
                    $data['caption'] = "Ua: R2 U' R' U' R U R U R U' R";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;
                case 'Ub':
                    $data['caption'] = "Ub: R' U R' U' R' U' R' U R U R2";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;

                case 'H':
                    $data['caption'] = "H: M2 U M2 U2 M2 U M2";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;

                case 'Z':
                    $data['caption'] = "Z: U R' U' R U' R U R U' R' U R U R2 U' R' U";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;

                case 'T':
                    $data['caption'] = "T: R U R' U' R' F R2 U' R' U' R U R' F'";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;

                case 'Y':
                    $data['caption'] = "Y: F R U' R' U' R U R' F' R U R' U' R' F R F'";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;

                case 'A':
                    $text = 'Especifica que '.$command.' quieres';
                    $keyboard = new Keyboard(
                        ['/alg Aa', '/alg Ab']
                    );
                    $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                    $data['reply_markup'] = $keyboard;
                    break;
                case 'Aa':
                    $data['caption'] = "Aa: L' B L' F2 L B' L' F2 L2";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;
                case 'Ab':
                    $data['caption'] = "Ab: x R2 D2 R U R' D2 R U' R";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;

                case 'J':
                    $text = 'Especifica que '.$command.' quieres';
                    $keyboard = new Keyboard(
                        ['/alg Ja', '/alg Jb']
                    );
                    $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                    $data['reply_markup'] = $keyboard;
                    break;
                case 'Ja':
                    $data['caption'] = "Ja: R U R' F' R U R' U' R' F R2 U' R' U'";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;
                case 'Jb':
                    $data['caption'] = "Jb: L' U R' z R2 U R' U' R2 U D";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;

                case 'R':
                    $text = 'Especifica que '.$command.' quieres';
                    $keyboard = new Keyboard(
                        ['/alg Ra', '/alg Rb']
                    );
                    $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                    $data['reply_markup'] = $keyboard;
                    break;
                case 'Ra':
                    $data['caption'] = "Ra: R' U2 R U2 R' F R U R' U' R' F' R2 U'";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;
                case 'Rb':
                    $data['caption'] = "Rb: R U R' F' R U2 R' U2 R' F R U R U2 R' U'";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;

                case 'E':
                    $data['caption'] = "E: x' R U' R' D R U R' D' R U R' D R U' R' D'";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;

                case 'F':
                    $data['caption'] = "F: R' U' F' R U R' U' R' F R2 U' R' U' R U R' U R";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;

                case 'G':
                    $text = 'Especifica que '.$command.' quieres';
                    $keyboard = new Keyboard(
                        ['/alg Ga', '/alg Gb', '/alg Gc', '/alg Gd']
                    );
                    $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                    $data['reply_markup'] = $keyboard;
                    break;
                case 'Ga':
                    $data['caption'] = "Ga: R2 u R' R R' U' R u' R2 y L' U L";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;
                case 'Gb':
                    $data['caption'] = "Gb: R' U' R y R2 u R' U R U' R u R2";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;
                case 'Gc':
                    $data['caption'] = "Gc: R2 u' R U' R U R' u R2 f R f'";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;
                case 'Gd':
                    $data['caption'] = "Gd: R U R' y' R2 u' R U' R' U R' u R2";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;

                case 'N':
                    $text = 'Especifica que '.$command.' quieres';
                    $keyboard = new Keyboard(
                        ['/alg Na', '/alg Nb']
                    );
                    $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                    $data['reply_markup'] = $keyboard;
                    break;
                case 'Na':
                    $data['caption'] = "Na: z R' U R' D R2 U' R U D' R' D R2 U' R D'";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;
                case 'Nb':
                    $data['caption'] = "Nb: R' U R U' R' F' U' F R U R' F R' F' R U' R";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
                    break;

                case 'V':
                    $data['caption'] = "V: R' U R' U' y R' F' R2 U' R' U R' F R F";
                    return Request::sendPhoto($data, realpath(__DIR__ . '/images/test.jpg'));
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