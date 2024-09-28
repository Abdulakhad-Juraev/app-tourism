<?php

function saveTravel($items, $logo){
    global $lang_count;

    $res = false;

    $ds = "";
    foreach ($items['districts'] as $dd){
        if ($ds === ""){
            $ds = $ds.$dd;
        }else {
            $ds = $ds.','.$dd;
        }
    }
    $logo = uploadFile($logo);

    if ($lang_count === 1){
        $res = saveOneTravel($items['name_uz'],$items['description_uz'],$items['date'],$items['price'],$items['count'],$logo['unique_id'], $ds);
    } elseif ($lang_count === 3) {
        $res = saveManyTravel($items['name_uz'],$items['name_ru'],$items['name_en'],$items['description_uz'],$items['description_ru'],$items['description_en'],$items['date'],$items['price'],$items['count'],$logo['unique_id'], $ds);
    }

    return $res;
}

function saveOneTravel($item, $description, $date, $price, $count,  $logo, $districts){
    global $con;


    $sql = "INSERT INTO `travel`(`name_uz`, `description_uz`, `date`, `price`, `count`, `logo`, districts) VALUES ('{$item}', '{$description}', '{$date}', '{$price}', '{$count}', '{$logo}', '{$districts}')";

    $r = mysqli_query($con, $sql);
    if ($r) {
        return true;
    } else {
        return false;
    }
}

function saveManyTravel($item, $item_2, $item_3, $description, $description_2, $description_3, $date, $price, $count,  $logo, $districts){
    global $con;

    $sql = "INSERT INTO `travel`(`name_uz`,`name_ru`,`name_en`, `description_uz`,`description_ru`,`description_en`, `date`, `price`, `count`, `logo`, districts) VALUES ('{$item}','{$item_2}','{$item_3}', '{$description}','{$description_2}','{$description_3}', '{$date}', '{$price}', '{$count}', '{$logo}', '{$districts}')";

    $r = mysqli_query($con, $sql);
    if ($r) {
        return true;
    } else {
        return false;
    }
}



function editTravel($items, $logo){
    global $lang_count;
    global $uri;
    $res = false;


    $ds = "";
    foreach ($items['districts'] as $dd){
        if ($ds === ""){
            $ds = $ds.$dd;
        }else {
            $ds = $ds.','.$dd;
        }
    }

    $logo = uploadFile($logo);

    if ($lang_count === 1){
        $res = editOneTravel($uri[4],$items['name_uz'],$items['description_uz'],$items['date'],$items['price'],$items['count'],$logo['unique_id'], $ds);
    }elseif ($lang_count === 3) {
        $res = editManyTravel($uri[4],$items['name_uz'],$items['name_ru'],$items['name_en'],$items['description_uz'],$items['description_ru'],$items['description_en'],$items['date'],$items['price'],$items['count'],$logo['unique_id'], $ds);
    }

    return $res;
}

function editOneTravel($id, $item, $description, $date, $price, $count,  $logo, $districts){
    global $con;

    $sql = "UPDATE `travel` set `name_uz` = '{$item}', `description_uz` = '{$description}', `date` = '{$date}', `price` = '{$price}', `count` = '{$count}', `logo` = '{$logo}', `districts` = '{$districts}'  where id = '{$id}'";

    $r = mysqli_query($con, $sql);
    if ($r) {
        return true;
    } else {
        return false;
    }
}

function editManyTravel($id, $item, $item_2, $item_3, $description, $description_2, $description_3, $date, $price, $count,  $logo, $districts){
    global $con;

    $sql = "UPDATE `travel` set `name_uz` = '{$item}',`name_ru` = '{$item_2}',`name_en` = '{$item_3}', `description_uz` = '{$description}',`description_ru` = '{$description_2}',`description_en` = '{$description_3}', `date` = '{$date}', `price` = '{$price}', `count` = '{$count}', `logo` = '{$logo}', `districts` = '{$districts}'  where id = '{$id}'";


    $r = mysqli_query($con, $sql);
    if ($r) {
        return true;
    } else {
        return false;
    }
}


function addToGallery($id, $logo){
    global $con;

    $logo = uploadFile($logo);

    $travel = getOne($id, "travel");

    if ($travel['gallery'] === "" && $travel['gallery'] === null){
        $sql = "UPDATE `travel` set `gallery` = '{$logo['unique_id']}'";
    }else {
        $ds = $travel['gallery'].",".$logo['unique_id'];
        $sql = "UPDATE `travel` set `gallery` = '{$ds}'";
    }


    $r = mysqli_query($con, $sql);
    if ($r) {
        return true;
    } else {
        return false;
    }

}

function removeFromGallery($id, $img_id){
    global $con;

    $travel = getOne($id, "travel");

    $ds = "";
    foreach (explode(",",$travel['gallery']) as $img){
        if ($img !== $img_id){
            if ($ds === ""){
                $ds = $img;
            }else {
                $ds = $ds.",".$img;
            }
        }
    }

    $sql = "UPDATE `travel` set `gallery` = '{$ds}'";


    $r = mysqli_query($con, $sql);
    if ($r) {
        return true;
    } else {
        return false;
    }

}