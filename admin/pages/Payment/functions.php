<?php


function savePayment($id,$items)
{
    global $con;

    $sql = "INSERT INTO `payment`(`travel_id`, `phone`, `full_name`, `card_number`, `count`) VALUES ('{$id}','{$items['phone']}','{$items['full_name']}','{$items['card_number']}','{$items['count']}')";

    $r = mysqli_query($con, $sql);
    if ($r) {
        return true;
    } else {
        return false;
    }
}
