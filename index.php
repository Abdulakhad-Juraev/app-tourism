<?
session_start();
include "admin/strings.php";
include "admin/config.php";
include "admin/main_funcs.php";
global $local_strings;
global $lang;

if (isset($_POST['lang'])) {
    changeLangFront($_POST['lang']);
}
    require 'head.php';
    include_once 'navbar.php';
    include_once 'slider.php';
    include_once 'aboutArea.php';
    include_once 'server.php';
    include_once 'room.php';
    include_once 'contactArea.php';
    include_once 'footer.php';