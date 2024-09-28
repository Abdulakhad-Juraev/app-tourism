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
                        <h2 class="page-title"><?= $local_strings[$lang]['p1'] ?></h2>
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
                 style="background: url('./images/img_8.png') no-repeat; background-size: cover;background-position: 50% 50%"></div>
        </div>
    </div>

    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">

                    <?
                   if (isset($_GET["page"])){
                        $p = $_GET['page'];
                        $k1 = $p*5;
                        $sql = "select * from paket where chegirma=null or chegirma=0 order by id desc limit ".$k1.",5";
                    }
                    else{
                        $sql = "select * from paket where chegirma=null or chegirma=0 order by id desc limit 0,5";
                    }

                    $r = mysqli_query($con, $sql);
                    while ($q = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                        ?>
                        <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp"
                             data-wow-delay="100ms"
                             style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">

                            <div class="room-thumbnail">
                                <img src="./uploads/<?= $q['photo']; ?>" alt="">
                            </div>

                            <div class="room-content">
                                <h2><?= $q['name_'.$lang]; ?></h2>
                                <h4><?
                                    if ($q['kun'] != 0){
                                        echo $q['narx'] / $q['kun'];
                                    }
                                     ?><span>/ Day</span></h4>
                                <div class="room-feature">
                                    <h6><?= $local_strings[$lang]['p4']; ?>: <span><?= $q['kun']; ?></span></h6>
                                    <h6><?= $local_strings[$lang]['p5']; ?>: <span><?= $q['soni']; ?></span></h6>
                                    <h6><?= $local_strings[$lang]['p6']; ?>: <span><?= $q['narx']; ?></span></h6>
                                </div>
                                <a href="package-detail.php?pid=<?= $q['id']; ?>"
                                   class="btn view-detail-btn"><?= $local_strings[$lang]['p7']; ?> <i
                                            class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <?
                    }
                    ?>
                    <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="600ms"
                         style="visibility: visible; animation-delay: 600ms; animation-name: fadeInUp;">
                        <ul class="pagination">
                            <?
                           $s = "select count(id) as soni from paket where chegirma=NULL or chegirma=0";
                            $r = mysqli_query($con, $s);
                            $row2 = mysqli_fetch_array($r, MYSQLI_ASSOC);
                            $a = $row2['soni'];
                            if ($a > 5) {
                                for ($i = 0; $i < $a / 5; $i++) {
                                    $k = $i + 1;
                                    echo "<li class='page-item'><a class='page-link' href='?page=" . $i . "'>" . $k . "</a></li>";
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="roberto-sidebar-area pl-md-4">

                        <div class="single-widget-area mb-100">
                            <div class="newsletter-form">
                                <h5><?= $local_strings[$lang]['b3']; ?></h5>
                                <p><?= $local_strings[$lang]['b4']; ?><br> <?= $local_strings[$lang]['b5']; ?></p>
                                <form method="post">
                                    <input type="text" name="phoneNumber" id="nlEmail" class="form-control phoneAreaMask"
                                           placeholder="<?= $local_strings[$lang]['b6']; ?>...">
                                    <button type="submit" name="submit1" class="btn roberto-btn w-100"><?= $local_strings[$lang]['b7']; ?></button>
                                    <?
                                    if (isset($_POST['submit1'])) {
                                        $phoneNumber = $_POST['phoneNumber'];
                                        if (strlen($phoneNumber) >= 9){
                                        $sql2 = "insert into contact(name,tel,content) values ('Paket','{$phoneNumber}','Xabar paket sahifasidan yuborildi!')";
                                        $r2 = mysqli_query($con, $sql2);
                                        if ($r2) {
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
                                        }}
                                        else{?>
                                            <script>
                                                alert("<?=$local_strings[$lang]['sendPhone'];?>");
                                            </script>
                                        <?}
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
                                                $date=date_create($q4['vaqt']);
                                                echo date_format($date,"d/m/Y");
                                                ?>
                                            </a>
                                        </div>
                                        <a href="package.php" class="post-title"><?= $q4['name_'.$lang]; ?></a>
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
