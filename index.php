$response = $bot->getMessageContent($event['message']['id']);
2.
if ($response->isSucceeded()) {
3.
$dataBinary = $response->getRawBody();
4.
//chdir('admins');
5.
$fileFullSavePath = 'ชื่อรูปภาพ.jpg';
6.
file_put_contents($fileFullSavePath,$dataBinary);
7.
}
