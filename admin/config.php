<?php

//$con = mysqli_connect("localhost:3306", "ziyon_root", "Muhammadaziz1410", "ziyonur-admin_travel");
$con = mysqli_connect("localhost", "root", "root", "turizm");

$lang_count = 3;
$lang = "";

if (isset($_COOKIE['lang'])){
    $lang = $_COOKIE['lang'];
}else {
    $lang = "uz";
}


$uri = explode("/",$_SERVER['REQUEST_URI']);
$count = count($uri);