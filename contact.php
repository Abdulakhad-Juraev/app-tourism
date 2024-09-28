<?php
require 'head.php';
include_once 'navbar.php';

include "admin/strings.php";
include "admin/config.php";
include "admin/main_funcs.php";
global $local_strings;
global $lang;

if (isset($_POST['lang'])) {
    changeLangFront($_POST['lang']);
}
include "admin/config.php";
global $con;
?>

    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: none;"
         data-jarallax-original-styles="background-image:url(img/bg-img/x17.jpg.pagespeed.ic.VLlN5b3v5F.webp)">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title"><?=$local_strings[$lang]['c1'];?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php"><?=$local_strings[$lang]['c2'];?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?=$local_strings[$lang]['c3'];?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div id="jarallax-container-0"
             style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;">
            <div class="img-for-bg w-100 h-100"
                 style="background: url('./images/img_13.png')no-repeat; background-size: cover ;background-position: 0"></div>
        </div>
    </div>
    <!--AAA-->
    <section class="google-maps-contact-info">
        <div class="container-fluid">
            <div class="google-maps-contact-content">
                <div class="row">

                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <h4><?=$local_strings[$lang]['c4'];?></h4>
                            <p>+998 93 980-17-77</p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <h4><?=$local_strings[$lang]['c5'];?></h4>
                            <p><?=$local_strings[$lang]['c6'];?></p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <h4><?=$local_strings[$lang]['c7'];?></h4>
                            <p>8:00 - 23:00</p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <h4><?=$local_strings[$lang]['c8'];?></h4>
                            <p>kadrustravel@gmail.com</p>
                        </div>
                    </div>
                </div>

                <div class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.1974867929594!2d71.70290218047364!3d40.4266257362307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bb9d97b05e6cd9%3A0x100b6ede0884c808!2z0J_RgtC40YbQsCDQpdGD0LzQvg!5e0!3m2!1sru!2s!4v1635915782771!5m2!1sru!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!--AAA-->
    <!--BBB-->
    <div class="roberto-contact-form-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms"
                         style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                        <h6><?=$local_strings[$lang]['c1'];?></h6>
                        <h2><?=$local_strings[$lang]['c9'];?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="roberto-contact-form">
                        <form method="post">
                            <div class="row">
                                <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms"
                                     style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                                    <input type="text" name="name" class="form-control mb-30" placeholder="<?=$local_strings[$lang]['c10'];?>...">
                                </div>
                                <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms"
                                     style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                                    <input type="text" name="tel" class="form-control mb-30 phoneAreaMask"
                                           placeholder="<?=$local_strings[$lang]['c11'];?>...">
                                </div>
                                <div class="col-12 wow fadeInUp" data-wow-delay="100ms"
                                     style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                                    <textarea name="content" class="form-control mb-30"
                                              placeholder="<?=$local_strings[$lang]['c12'];?>..."></textarea>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms"
                                     style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                                    <button type="submit" name="s1" class="btn roberto-btn mt-15"><?=$local_strings[$lang]['c13'];?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--BBB-->
<?php
if (isset($_POST['s1'])) {
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $content = $_POST['content'];
    if ($name != null || $tel != null) {
        $sql = "insert into contact (name, tel,content) values ('{$name}','{$tel}','{$content}') ";
        $r = mysqli_query($con, $sql);
        if ($r) {
            ?>
            <script>
                alert("<?=$local_strings[$lang]['sendMessage'];?>");
            </script>
            <?
        } else {
            ?>
            <script>
                alert("<?=$local_strings[$lang]['sendMessageError'];?>");
            </script>
            <?
        }

    } else {
        ?>
        <script>
            alert("<?=$local_strings[$lang]['sendPhoneAndNameError'];?>");
        </script>
        <?
    }
}


include_once 'contactArea.php';
require 'footer.php';