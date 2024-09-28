<?php
session_start();
include "./main_funcs.php";
include "./config.php";
include "./strings.php";

include "./pages/District/functions.php";
include "./pages/Travel/functions.php";
include "./pages/Attachment/functions.php";

global $uri;
global $count;
global $local_strings;
global $lang;
if ($_SESSION["user_id"] == "") {
    ?>
    <script type="application/javascript">
        window.location.href= ""+window.location.origin+"/login.php"
    </script>
    <?php
}

if (isset($_POST['lang'])) {
    changeLang($_POST['lang']);
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Travel Admin</title>

    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="">
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="icon" href="images/logo.png">

    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../../style/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">

</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src">
                <img src="/admin/images/logo.png" alt="alternative" class="w-50">
            </div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                    <span>
                        <button type="button"
                                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
        </div>
        <div class="app-header__content">
            <div class="app-header-left">
                <div class="search-wrapper">
                    <div class="input-holder">
<!--                        <input type="text" class="search-input" placeholder="Type to search">-->
<!--                        <button class="search-icon"><span></span></button>-->
                    </div>
                    <button class="close"></button>
                </div>
                <ul class="header-menu nav">

                </ul>
            </div>
            <div class="app-header-right">
                <form method="post">
                    <input type="submit" name="lang" value="Uz"
                           class="btn mx-1 <? echo $lang === 'uz' ? "btn-primary" : 'btn-outline-primary'; ?>">
                    <input type="submit" name="lang" value="Ru"
                           class="btn mx-1 <? echo $lang === 'ru' ? "btn-primary" : 'btn-outline-primary'; ?>">
                    <input type="submit" name="lang" value="En"
                           class="btn mx-1 <? echo $lang === 'en' ? "btn-primary" : 'btn-outline-primary'; ?>">
                </form>
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    <? echo $_SESSION['phone']; ?>
                                </div>
                            </div>
                            <div class="widget-content-right header-user-info ml-3">
                                <a href="/" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                    <i class="fa text-white fa-angle-double-right pr-1 pl-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                            <span>
                                <button type="button"
                                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                    <span class="btn-icon-wrapper">
                                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                                    </span>
                                </button>
                            </span>
            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading"><? echo $local_strings[$lang]["admin_panel"]; ?></li>
                        <li>
                            <a href="/admin/contact">
                                <i class="fa fa-bell mr-1"></i>
                                <? echo $local_strings[$lang]["sidebar1"]; ?>
                            </a>
                        </li>
                        <li>

                            <a href="/admin/blog">
                                <i class="fa fa-commenting mr-1"></i>
                                <? echo $local_strings[$lang]["sidebar2"]; ?>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/paket"><i class="fa fa-plane mr-2"></i>
                                <? echo $local_strings[$lang]["sidebar3"]; ?>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/order"><i class="fa fa-dollar mr-2"></i>
                                <? echo $local_strings[$lang]["sidebar4"]; ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-main__outer">
            <div class="app-main__inner">
                <?php

                if ($uri[1] === "admin") {
                    primary($uri, $count);
                }

                ?>
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="style/main.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>


