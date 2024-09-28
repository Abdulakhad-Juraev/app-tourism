<?php
include "admin/strings.php";
include "admin/config.php";
global $local_strings;
global $lang;

if (isset($_POST['lang'])) {
changeLangFront($_POST['lang']);
}
?>
<!-- Header Area Start -->
<header class="header-area">
    <!-- Top Header Area Start -->
    <div class="top-header-area" style="z-index: 99;">
        <div class="container">
            <div class="row">

                <div class="col-6">
                    <div class="top-header-content">
                        <a href="tel:+998 93 981 57 77"><i class="icon_phone"></i> <span>+998 93 981 57 77</span></span>
                        </a>
                        <a href="mailto:kadrusviptravel@gmail.com"><i class="icon_mail"></i> <span>kadrusviptravel@gmail.com</span></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="top-header-content">
                        <!-- Top Social Area -->
                        <div class="top-social-area ml-auto" >
                            <a href="https://t.me/kadrus_viptravelw" target="_blank"><i class="fa fa-paper-plane"
                                                                                        aria-hidden="true"></i></a>
                            <a href="https://www.facebook.com/profile.php?id=100074422830661" target="_blank"><i
                                        class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/kadrus_vip_travel_w/" target="_blank"><i
                                        class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a>
                            <form method="post" style="display: flex; flex-direction: row;" class="changeLan">
                                    <input type="submit" name="lang" value="Uz"
                                           class="btn mx-1 <? echo $lang === 'uz' ? "changeLanAct" : ''; ?>">
                                    <input type="submit" name="lang" value="Ru"
                                           class="btn mx-1 <? echo $lang === 'ru' ? "changeLanAct" : ''; ?>">
                                    <input type="submit" name="lang" value="En"
                                           class="btn mx-1 <? echo $lang === 'en' ? "changeLanAct" : ''; ?>">
                            </form>
                            </a>
                            <a href="/admin/index.php"><i class="fa fa-user-circle userLoginArea" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Top Header Area End -->

    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="robertoNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.php">
                        <img src="./img/logo_KadRus_VIP_Travel.png" alt="logo_KadRus_VIP_Travel">
                    </a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li class="active"><a href="index.php"><?= $local_strings[$lang]['i1']; ?></a></li>
                                <li><a href="about.php"><?= $local_strings[$lang]['i2']; ?></a></li>
                                <li><a href="package.php"><?= $local_strings[$lang]['i3']; ?></a></li>
                                <li><a href="discount.php"><?= $local_strings[$lang]['i4']; ?></a></li>
                                <li><a href="blog.php"><?= $local_strings[$lang]['i5']; ?></a></li>
                                <li><a href="contact.php"><?= $local_strings[$lang]['i6']; ?></a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->
