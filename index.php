<?php
require_once('./vendor/autoload.php');
//รูป
//Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

$channel_token=
'8OePlDix8JOWu/AFFezoV7G5n2TgAhwy6UC4YYwB+ZgEn4tI5zBsUllBo3RyicuTx5mxknthQOaNgMiDj1Oxvhu9a5tGi5f4dBuZVsKiGAdUNrL53Wc9s5wKrl/Z2S1vhR/XciGUZ0CQysHvkL4Q6wdB04t89/1O/w1cDnyilFU=';
$channel_secret='7892716414d782ce55cb0076ed4d536b';

//Get message frome Line API
$content=file_get_contents('php://input');
$events=json_decode($content, true);

if(!is_null($events['events'])){
	
	//LOOP
	foreach($events['events']as $event){
		
		//Line API
		if($event['type']=='message'){
			
			$replyToken=$event['replyToken'];
			
			switch($event['message']['type']){
					
				case 'image':
					$messageID=$event['message']['id'];
					$respMessage='Hello, your image ID is '.$messageID;
				break;
				default:
					$respMessage='Please send image only';
			
				break;
				}
			$httpClient=new CurlHTTPClient($channel_token);
			$bot=new LINEBot($httpClient, array('channelSecret'=> $channel_secret));
			$textMessageBuilder=new TextMessageBuilder($respMessage);
			$response=$bot->replyMessage($replyToken, $textMessageBuilder);
			}
		}
	}
echo "OK";

