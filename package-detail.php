<?

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
include "admin/config.php";
global $con;
?>
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: none;"
         data-jarallax-original-styles="background-image:url(img/bg-img/x17.jpg.pagespeed.ic.VLlN5b3v5F.webp)">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title"><?= $local_strings[$lang]['p1']; ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href=""><?= $local_strings[$lang]['b2']; ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $local_strings[$lang]['p1']; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div id="jarallax-container-0"
             style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;">
            <div class="img-for-bg w-100 h-100"
                 style="background: url('./images/img_10.png')no-repeat; background-size: cover;background-position: 0"></div>
        </div>
    </div>

    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8" style="z-index: 2;">

                    <div class="single-room-details-area mb-50">

                        <?
                        if (isset($_GET['pid'])) {
                            $sql2 = "select * from paket where id =" . $_GET['pid'];
                            $r3 = mysqli_query($con, $sql2);
                            $row2 = mysqli_fetch_array($r3, MYSQLI_ASSOC);
                            ?>
                            <div class="room-thumbnail-slides mb-50">
                                <div id="room-thumbnail--slide" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item">
                                            <img src="./uploads/<?= $row2['photo']; ?>" class="d-block w-100"
                                                 style="height: 350px;"
                                                 alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./uploads/<?= $row2['photo2']; ?>" class="d-block w-100"
                                                 style="height: 350px;"
                                                 alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./uploads/<?= $row2['photo3']; ?>" class="d-block w-100"
                                                 style="height: 350px;"
                                                 alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./uploads/<?= $row2['photo4']; ?>" class="d-block w-100"
                                                 style="height: 350px;"
                                                 alt="">
                                        </div>
                                        <div class="carousel-item active">
                                            <img src="./uploads/<?= $row2['photo5']; ?>" class="d-block w-100"
                                                 style="height: 350px;"
                                                 alt="">
                                        </div>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <li data-target="#room-thumbnail--slide" data-slide-to="0" class="active">
                                            <img src="./uploads/<?= $row2['photo']; ?>" class="d-block w-100 h-auto"
                                                 alt="">
                                        </li>
                                        <li data-target="#room-thumbnail--slide" data-slide-to="1" class="">
                                            <img src="./uploads/<?= $row2['photo2']; ?>" class="d-block w-100 h-auto"
                                                 alt="">
                                        </li>
                                        <li data-target="#room-thumbnail--slide" data-slide-to="2" class="">
                                            <img src="./uploads/<?= $row2['photo3']; ?>" class="d-block w-100 h-auto"
                                                 alt="">
                                        </li>
                                        <li data-target="#room-thumbnail--slide" data-slide-to="3" class="">
                                            <img src="./uploads/<?= $row2['photo4']; ?>" class="d-block w-100 h-auto"
                                                 alt="">
                                        </li>
                                        <li data-target="#room-thumbnail--slide" data-slide-to="4" class="">
                                            <img src="./uploads/<?= $row2['photo5']; ?>" class="d-block w-100 h-auto"
                                                 alt="">
                                        </li>
                                    </ol>
                                </div>
                            </div>

                            <div class="room-features-area d-flex flex-wrap mb-50 justify-content-center">
                                <h6><?= $local_strings[$lang]['p4']; ?>: <span><?= $row2['kun']; ?></span></h6>
                                <h6><?= $local_strings[$lang]['p5']; ?>: <span><?= $row2['soni']; ?></span></h6>
                                <h6><?= $local_strings[$lang]['p6']; ?>: <span><?= $row2['narx']; ?></span></h6>
                            </div>
                            <h5><?= $row2['name_' . $lang]; ?></h5>
                            <h5><span class="mr-3" style="color: #1cc3b2; font-size: 24px; text-decoration: underline"><?=$local_strings[$lang]['orderAddress'];?>:</span> <?= $row2['region']; ?>
                            </h5>
                            <p class="mt-4"><?= $row2['content_' . $lang]; ?></p>
                            <div>
                                <!-- Button trigger modal -->
                                <button id="openOrder" class="roberto-btn">
                                    <?=$local_strings[$lang]['orderText'];?>
                                </button>

                                <div class="modal-containerOrder" style="z-index: 2;" id="modal_containerOrder">
                                    <div class="modalOrder">
                                        <h1> <?=$local_strings[$lang]['orderText'];?> <i class="fa fa-remove float-right pr-1 remove"
                                                               id="closeOrder"></i></h1>
                                        <div class="modal-body">
                                            <form method="post">
                                                <input type="text" class="form-control" name="nameOrder"
                                                       placeholder="<?=$local_strings[$lang]['c10']?>...">
                                                <input type="text" class="form-control phoneAreaMask" name="phoneOrder"
                                                       placeholder="<?=$local_strings[$lang]['c12']?>...">
                                                <input type="number" class="form-control" name="countOrder"
                                                       placeholder="<?=$local_strings[$lang]['countMember']?>...">
                                                <button type="submit" name="sendOrder" class="send roberto-btn w-50">
                                                    <?=$local_strings[$lang]['b7']?>
                                                </button>
                                                <?
                                                if (isset($_POST['sendOrder'])) {
                                                    $nOrder = $_POST['nameOrder'];
                                                    $pOrder = $_POST['phoneOrder'];
                                                    $cOrder = $_POST['countOrder'];
                                                    if (strlen($pOrder) >= 9) {
                                                        $sql5 = "insert into zakaz(name,phone,soni,paket_id) values ('{$nOrder}','{$pOrder}','{$cOrder}','{$row2['id']}')";
                                                        $r5 = mysqli_query($con, $sql5);
                                                        if ($r5) {
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
                                                    }
                                                            else{
                                                            ?>
                                                        <script>
                                                            alert("<?=$local_strings[$lang]['sendPhone'];?>");
                                                        </script>
                                                        <?
                                                    }
                                                }
                                                ?>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?
                        }
                        ?>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="roberto-sidebar-area pl-md-4">

                        <div class="single-widget-area mb-100">
                            <div class="newsletter-form">
                                <h5><?= $local_strings[$lang]['b3']; ?></h5>
                                <p><?= $local_strings[$lang]['b4']; ?><br> <?= $local_strings[$lang]['b5']; ?></p>
                                <form method="post">
                                    <input type="text" name="phoneNumber" id="nlEmail"
                                           class="form-control phoneAreaMask"
                                           placeholder="<?= $local_strings[$lang]['b6']; ?>...">
                                    <button type="submit" name="submit2"
                                            class="btn roberto-btn w-100"><?= $local_strings[$lang]['b7']; ?></button>
                                    <?
                                    if (isset($_POST['submit2'])) {
                                        $phoneNumber = $_POST['phoneNumber'];
                                        if (strlen($phoneNumber) >= 9) {
                                            $sql3 = "insert into contact(name,tel,content) values ('Paket','{$phoneNumber}','Xabar paket sahifasidan yuborildi!')";
                                            $r3 = mysqli_query($con, $sql3);
                                        if ($r3) {
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
                                        }
                                        else{
                                        ?>
                                            <script>
                                                alert("<?=$local_strings[$lang]['sendPhone'];?>");
                                            </script>
                                            <?
                                        }
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>

                        <div class="single-widget-area mb-100">
                            <h4 class="widget-title mb-30"><?= $local_strings[$lang]['p2']; ?></h4>


                            <?
                            $sql4 = "select * from paket where chegirma !=null or chegirma > 0 order by id desc limit 0,4";
                            $r4 = mysqli_query($con, $sql4);
                            while ($q4 = mysqli_fetch_array($r4, MYSQLI_ASSOC)) {
                                ?>
                                <div class="single-recent-post d-flex">

                                    <div class="post-thumb">
                                        <a href="package.php"><img src="uploads/<?= $q4['photo']; ?>" alt=""></a>
                                    </div>

                                    <div class="post-content">

                                        <div class="post-meta">
                                            <a href="#" class="post-author"> <?
                                                $date = date_create($q4['vaqt']);
                                                echo date_format($date, "d/m/Y");
                                                ?>
                                            </a>
                                        </div>
                                        <a href="package.php"
                                           class="post-title"><?= $q4['name_' . $lang]; ?></a>
                                    </div>
                                </div>
                            <? }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include_once 'contactArea.php';
require 'footer.php';