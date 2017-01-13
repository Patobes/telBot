<?php 

namespace Longman\TelegramBot\Commands\AdminCommands;

use Longman\TelegramBot\Commands\AdminCommand;
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
 
	$expediente    = trim($message->getText(true));
        if ($expediente === '') {
            $expediente = 'Uso del comando: ' . $this->getUsage();
        }

	$url = "http://democorr.com.es/LicitacionesWeb/api/getLicitacion.php?expediente=".$expediente;
	$licitacion = file_get_contents($url);
	$licitacion = json_decode($licitacion, true);

	if(isset($licitacion['titulo'])){
		$info=$licitacion['titulo']." URL: ".$licitacion['detalle'];
	}else{
		$info="Expediente no encontrado, ¿quizás es alguno de estos?\r\n";
		foreach($licitacion as $expediente){
			$info.=$expediente."\r\n";
		}
	}

        $data = [];                               // Set up the new message data
        $data['chat_id'] = $chat_id;              // Set Chat ID to send the message to
        $data['text'] = $info;		  // Set message to send

        return Request::sendMessage($data);       // Send message!

    }
}
