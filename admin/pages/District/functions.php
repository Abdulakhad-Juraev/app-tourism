<?php

function saveDistrict($items){
    global $lang_count;

    $res = false;


    if ($lang_count === 1){
        $res = saveOneDistrict($items['name_uz'],$items['type']);
    } elseif ($lang_count === 3) {
        $res = saveManyDistrict($items['name_uz'],$items['name_ru'],$items['name_en'], $items['type']);
    }

    return $res;
}

function saveOneDistrict($item, $type){
    global $con;

    $sql = "INSERT INTO `district`(`name_uz`, `type`) VALUES ('{$item}', ${$type})";

    $r = mysqli_query($con, $sql);
    if ($r) {
        return true;
    } else {
        return false;
    }
}

function saveManyDistrict($item, $item_2, $item_3, $type){
    global $con;

    $sql = "INSERT INTO `district`(`name_uz`, `name_ru`, `name_en`, `type`) VALUES ('{$item}','{$item_2}','{$item_3}', '{$type}')";

    print_r($sql);
    $r = mysqli_query($con, $sql);
    if ($r) {
        return true;
    } else {
        return false;
    }
}



function editDistrict($items){
    global $lang_count;
    global $uri;
    $res = false;


    if ($lang_count === 1){
        $res = editOneDistrict($uri[4],$items['name_uz'],$items['type']);
    } elseif ($lang_count === 3) {
        $res = editManyDistrict($uri[4],$items['name_uz'],$items['name_ru'],$items['name_en'],$items['type']);
    }

    return $res;
}

function editOneDistrict($id, $item, $type){
    global $con;

    $sql = "UPDATE `district` set `name_uz` = '{$item}', `type` = '{$type}' where id = '{$id}'";

    $r = mysqli_query($con, $sql);
    if ($r) {
        return true;
    } else {
        return false;
    }
}

function editManyDistrict($id, $item, $item_2, $item_3, $type){
    global $con;

    $sql = "UPDATE `district` set `name_uz` = '{$item}',`name_ru` = '{$item_2}',`name_en` = '{$item_3}', `type` = '{$type}' where id = '{$id}'";

    $r = mysqli_query($con, $sql);
    if ($r) {
        return true;
    } else {
        return false;
    }
}
