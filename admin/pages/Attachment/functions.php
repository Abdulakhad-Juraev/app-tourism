<?php


function uploadFile($attachment){
    if ($attachment['error'] > 0){
        return null;
    }else {
        $type = explode("/",$attachment['type']);
        if ($type[0] === "image") {
            $unique_key = random_int(100000,999999);
            $extension = pathinfo($attachment['name'], PATHINFO_EXTENSION);

            move_uploaded_file($attachment['tmp_name'], '../uploads/' . $unique_key . "." . $extension);
            return saveAttachment($unique_key,$extension);
        }else {
            return null;
        }

    }
}


function saveAttachment($unique_key,$ext){

    global $con;

    $sql = "INSERT INTO `attachment`(`unique_id`, `ext`) VALUES ('{$unique_key}','{$ext}')";

    $r = mysqli_query($con,$sql);

    if ($r){
        return getAttachmentR($unique_key);
    }else {
        return null;
    }
}

function getAttachmentR($unique_key){
    global $con;

    $sql = "select * from attachment where `unique_id`='{$unique_key}'";

    $r = mysqli_query($con,$sql);

    if (mysqli_num_rows($r) > 0){
        return mysqli_fetch_array($r,MYSQLI_ASSOC);
    }
    return null;
}