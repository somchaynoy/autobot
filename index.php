<?php
case (preg_match('/image|audio|video/',$typeMessage) ? true : false) :
    $response = $bot->getMessageContent($idMessage);
    if ($response->isSucceeded()) {
        // คำสั่ง getRawBody() ในกรณีนี้ จะได้ข้อมูลส่งกลับมาเป็น binary 
        // เราสามารถเอาข้อมูลไปบันทึกเป็นไฟล์ได้
        $dataBinary = $response->getRawBody(); // return binary
        // ดึงข้อมูลประเภทของไฟล์ จาก header
        $fileType = $response->getHeader('Content-Type');    
        switch ($fileType){
            case (preg_match('/^image/',$fileType) ? true : false):
                list($typeFile,$ext) = explode("/",$fileType);
                $ext = ($ext=='jpeg' || $ext=='jpg')?"jpg":$ext;
                $fileNameSave = time().".".$ext;
                break;
            case (preg_match('/^audio/',$fileType) ? true : false):
                list($typeFile,$ext) = explode("/",$fileType);
                $fileNameSave = time().".".$ext;                        
                break;
            case (preg_match('/^video/',$fileType) ? true : false):
                list($typeFile,$ext) = explode("/",$fileType);
                $fileNameSave = time().".".$ext;                                
                break;                                                      
        }
        $botDataFolder = 'botdata/'; // โฟลเดอร์หลักที่จะบันทึกไฟล์
        $botDataUserFolder = $botDataFolder.$userID; // มีโฟลเดอร์ด้านในเป็น userId อีกขั้น
        if(!file_exists($botDataUserFolder)) { // ตรวจสอบถ้ายังไม่มีให้สร้างโฟลเดอร์ userId
            mkdir($botDataUserFolder, 0777, true);
        }   
        // กำหนด path ของไฟล์ที่จะบันทึก
        $fileFullSavePath = $botDataUserFolder.'/'.$fileNameSave;
        file_put_contents($fileFullSavePath,$dataBinary); // ทำการบันทึกไฟล์
        $textReplyMessage = "บันทึกไฟล์เรียบร้อยแล้ว $fileNameSave";
        $replyData = new TextMessageBuilder($textReplyMessage);
        break;
    }
    $failMessage = json_encode($idMessage.' '.$response->getHTTPStatus() . ' ' . $response->getRawBody());
    $replyData = new TextMessageBuilder($failMessage);  
    break; 
