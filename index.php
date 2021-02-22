<?php
require_once('./vendor/autoload.php');
//รูป
//Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

$channel_token=
'dxeiSAPWx/H9gQSlxjnCf2V1h3HJTsQSAEa2ldaJGaChzobAsbnVHa7XSbI8kCVZ84W+AUcSh/zwF3rYjVw2TDIBuW/yRRSkYgi6KuzYqDcm5mq5XJ/KsWDOCjS2eJkuow7c7EBM7AZYgfS3ohbJNAdB04t89/1O/w1cDnyilFU=';
$channel_secret='2d65520b351de78be9667da60616b9fa';

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

