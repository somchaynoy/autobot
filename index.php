<?php
require_once('./vendor/autoload.php');

use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

$channel_token='8OePlDix8JOWu/AFFezoV7G5n2TgAhwy6UC4YYwB+ZgEn4tI5zBsUllBo3RyicuTx5mxknthQOaNgMiDj1Oxvhu9a5tGi5f4dBuZVsKiGAdUNrL53Wc9s5wKrl/Z2S1vhR/XciGUZ0CQysHvkL4Q6wdB04t89/1O/w1cDnyilFU=';
$channel_secret='7892716414d782ce55cb0076ed4d536b';

//Get message
$content=file_get_contents('php://input');
$events=json_decode($content, true);

if(!is_null($events['events'])){
	//LOOP
	foreach($events['events']as $event){
		
	//Line API send
	if($event['type']=='message' && $event['message']['type']=='test'){
		
		//Get
		$replyToken=$event['replyToken'];
		
		switch($event['message']['test']){
				
			case 'a' :
					$respMessage='aa';
				break;
				case 'b' :
					$respMessage='bb';
				break; 
				case 'c' :
					$respMessage='cc';
				break; 
				case 'd' :
					$respMessage='dd';
				break;
				case 'e' :
					$respMessage='ee';
				break;
				case 'f' :
					$respMessage='ff';
				break;
				case 'g' :
					$respMessage='gg';
				break;
			default:
				break;
		}
		$httpClient=new CurHTTPClient($channel_token);
		$bot=new LINEBot($httpClient, array('ChannelSecret'=> $channel_secret));
		
		$textMessageBuilder= new TextMessageBuilder($respMessage);
		$response=$bot->replyMessage($replyToken, $textMessageBuilder);
						
					
		}
	}
}
echo"OK";
