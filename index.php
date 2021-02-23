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
	if($event['type']=='message' && $event['message']['type']=='text'){
		
		//Get
		$replyToken=$event['replyToken'];
		
		switch($event['message']['text']){
				
				case 'a' :
					$respMessage='So many of my smile begin with you – รอยยิ้มส่วนใหญ่ของฉันเกิดขึ้นเพราะคุณ';
				break;
				case 'b' :
					$respMessage='It is not an attitude; it is the way I am – ไม่ใช่เพราะวิธีคิดแตกต่าง แต่เพราะตัวตนฉันเป็นแบบนี้';
				break; 
				case 'c' :
					$respMessage='Every story is beautiful, but ours if my favorite – ทุกเรื่องราวล้วนสวยงาม แต่เรื่องราวของเราคือเรื่องโปรดของฉัน';
				break; 
				case 'd' :
					$respMessage='7 Billion Smiles but yours is my No.1 – บนโลกมี 7 พันล้านรอยยิ้ม แต่รอยยิ้มคุณคือที่หนึ่งของฉัน';
				break;
				case 'e' :
					$respMessage='Stay strong the weekend is coming – เข้มแข็งไว้ สุดสัปดาห์กำลังจะมาถึงแล้ว';
				break;
				case 'f' :
					$respMessage='I like my coffee how I like myself: Dark, bitter, and to hot for you. – ฉันชอบดื่มกาแฟ แบบที่เป็นตัวฉัน เข้มข้นและร้อนกรุ่นสำหรับคุณ';
				break;
				case 'g' :
					$respMessage='If you can’t love yourself, how in the hell you gonna love somebody else? – ถ้าไม่รัก ไม่แคร์ตัวเอง แล้วจะไปรักคนอื่นได้ไง';
				break;

				case 'A' :
					$respMessage='Better to be hated for who I am, than loved for who I am not. ถูกเกลียดเพราะเป็นตัวของตัวเอง ยังดีกว่ามีคนรักในสิ่งที่ตัวเองไม่ได้เป็น';
				break;
				case 'B' :
					$respMessage='Believe you can and you’re halfway there. เชื่อว่าคุณทำได้ คุณก็ไปได้ครึ่งทางแล้ว';
				break; 
				case 'C' :
					$respMessage='Be yourself no matter whatever they say. ไม่ว่าใครจะว่ายังไง จงเป็นตัวของตัวเอง';
				break; 
				case 'D' :
					$respMessage='0x100B8';
				break;
				case 'E' :
					$respMessage='0x10054';
				break;
				case 'F' :
					$respMessage='0x10002E';
				break;
				case 'G' :
					$respMessage='0x100078';
				break;
			default:
				break;
		}
		$httpClient=new CurlHTTPClient($channel_token);
		$bot=new LINEBot($httpClient, array('ChannelSecret'=> $channel_secret));
		
		$textMessageBuilder= new TextMessageBuilder($respMessage);
		$response=$bot->replyMessage($replyToken, $textMessageBuilder);
						
					
		}
	}
}
echo"OK";
