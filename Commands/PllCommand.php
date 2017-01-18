<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Request;

class PllCommand extends UserCommand
{
    protected $name = 'pll';
    protected $description = 'Muestra algoritmos PLL para el 3x3x3';
    protected $usage = '/pll, /pll Letra';
    protected $version = '1.0.1';

    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();

        $message_id = $message->getMessageId();
        $command    = trim($message->getText(true));

        if ($command === '') {
            $text = '¿Qué permutación quieres?';
            $data = [
                'chat_id'             => $chat_id,
                'reply_to_message_id' => $message_id,
                'text'                => $text
            ];

            $keyboard = new Keyboard(
                ['/pll U', '/pll H', '/pll Z'],
                ['/pll T', '/pll Y', '/pll A'],
                ['/pll J', '/pll R', '/pll E'],
                ['/pll F', '/pll G', '/pll N', '/pll V']
            );

            $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

            $data['reply_markup'] = $keyboard;

        } else {
            $data = $this->fillData($command, $chat_id, $message_id);
        }

        if (isset($data['caption'])){
            return Request::sendPhoto($data, realpath(__DIR__ . '/images/'.$command.'.png'));
        }else{
            return Request::sendMessage($data);
        }
    }

    private function fillData($command, $chat_id, $message_id){
        $text  = 'Especifica que '.$command.' quieres';
        $data = [
            'chat_id'             => $chat_id,
            'reply_to_message_id' => $message_id,
            'text'                => $text
        ];

        switch ($command){

            case 'U':
                $keyboard = new Keyboard(
                    ['/pll Ua', '/pll Ub']
                );
                $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);

                $data['reply_markup'] = $keyboard;
                break;

            case 'A':
                $keyboard = new Keyboard(
                    ['/pll Aa', '/pll Ab']
                );
                $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);
                $data['reply_markup'] = $keyboard;
                break;

            case 'J':
                $keyboard = new Keyboard(
                    ['/pll Ja', '/pll Jb']
                );
                $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);
                $data['reply_markup'] = $keyboard;
                break;

            case 'R':
                $keyboard = new Keyboard(
                    ['/pll Ra', '/pll Rb']
                );
                $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);
                $data['reply_markup'] = $keyboard;
                break;

            case 'G':
                $keyboard = new Keyboard(
                    ['/pll Ga', '/pll Gb', '/pll Gc', '/pll Gd']
                );
                $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);
                $data['reply_markup'] = $keyboard;
                break;

            case 'N':
                $keyboard = new Keyboard(
                    ['/pll Na', '/pll Nb']
                );
                $keyboard->setOneTimeKeyboard(true)->setResizeKeyboard(true);
                $data['reply_markup'] = $keyboard;
                break;

            case 'Ua':
                $data['caption'] = "Ua: R2 U' R' U' R U R U R U' R";
                break;
            case 'Ub':
                $data['caption'] = "Ub: R' U R' U' R' U' R' U R U R2";
                break;

            case 'H':
                $data['caption'] = "H: M2 U M2 U2 M2 U M2";
                break;

            case 'Z':
                $data['caption'] = "Z: U R' U' R U' R U R U' R' U R U R2 U' R' U";
                break;

            case 'T':
                $data['caption'] = "T: R U R' U' R' F R2 U' R' U' R U R' F'";
                break;

            case 'Y':
                $data['caption'] = "Y: F R U' R' U' R U R' F' R U R' U' R' F R F'";
                break;

            case 'Aa':
                $data['caption'] = "Aa: L' B L' F2 L B' L' F2 L2";
                break;
            case 'Ab':
                $data['caption'] = "Ab: x R2 D2 R U R' D2 R U' R";
                break;

            case 'Ja':
                $data['caption'] = "Ja: L' U R' z R2 U R' U' R2 U D";
                break;
            case 'Jb':
                $data['caption'] = "Jb: R U R' F' R U R' U' R' F R2 U' R' U'";
                break;

            case 'Ra':
                $data['caption'] = "Ra: R U R' F' R U2 R' U2 R' F R U R U2 R' U'";
                break;
            case 'Rb':
                $data['caption'] = "Rb: R' U2 R U2 R' F R U R' U' R' F' R2 U'";
                break;

            case 'E':
                $data['caption'] = "E: x' R U' R' D R U R' D' R U R' D R U' R' D'";
                break;

            case 'F':
                $data['caption'] = "F: R' U' F' R U R' U' R' F R2 U' R' U' R U R' U R";
                break;

            case 'Ga':
                $data['caption'] = "Ga: R2 u R' R R' U' R u' R2 y L' U L";
                break;
            case 'Gb':
                $data['caption'] = "Gb: R' U' R y R2 u R' U R U' R u R2";
                break;
            case 'Gc':
                $data['caption'] = "Gc: R2 u' R U' R U R' u R2 f R f'";
                break;
            case 'Gd':
                $data['caption'] = "Gd: R U R' y' R2 u' R U' R' U R' u R2";
                break;

            case 'Na':
                $data['caption'] = "Na: z R' U R' D R2 U' R U D' R' D R2 U' R D'";
                break;
            case 'Nb':
                $data['caption'] = "Nb: R' U R U' R' F' U' F R U R' F R' F' R U' R";
                break;

            case 'V':
                $data['caption'] = "V: R' U R' U' y R' F' R2 U' R' U R' F R F";
                break;

            default:
                $data['text'] = 'No se encuentra el algoritmo: '.$command;
                break;
        }

        return $data;
    }
}