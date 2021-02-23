<?php
case (preg_match('/image|audio|video/',$typeMessage) ? true : false) :
    $response = $bot->getMessageContent($idMessage);
    if ($response->isSucceeded()) {
        // คำสั่ง getRawBody() ในกรณีนี้ จะได้ข้อมูลส่งกลับมาเป็น binary 
        // เราสามารถเอาข้อมูลไปบันทึกเป็นไฟล์ได้
        $dataBinary = $response->getRawBody(); // return binary
        // ทดสอบดูค่าของ header ด้วยคำสั่ง getHeaders()
        $dataHeader = $response->getHeaders();   
        $replyData = new TextMessageBuilder(json_encode($dataHeader));
        break;
    }
    $failMessage = json_encode($idMessage.' '.$response->getHTTPStatus() . ' ' . $response->getRawBody());
    $replyData = new TextMessageBuilder($failMessage);  
    break; 
