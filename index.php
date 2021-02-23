<?php
$response = $bot->getMessageContent($event['message']['id']);
if ($response->isSucceeded()) {
$dataBinary = $response->getRawBody();
//chdir('admins');
$fileFullSavePath = 'ชื่อรูปภาพ.jpg';
file_put_contents($fileFullSavePath,$dataBinary);

}
