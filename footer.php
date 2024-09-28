<?php
include "admin/config.php";
global $con;
?>
<!-- Footer Area Start -->
<footer class="footer-area section-padding-80-0">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row align-items-baseline justify-content-between">
                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Footer Logo -->
                        <h2 style="color: white;">
                            <img src="img/logo_KadRus_VIP_Travel.jpg" class="footer-logo" alt="logo_KadRus_VIP_Travel">
                        </h2>
                        <h4>+998 93 981 57 77</h4>
                        <h4>+998 93 980 17 77</h4>
                        <span>kadrusviptravel@gmail.com</span>
                        <span><?= $local_strings[$lang]['c6']; ?></span>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title"><?= $local_strings[$lang]['b8']; ?></h5>
                        <?
                        $sql7 = "select * from blog order by id desc limit 0,2";
                        $r7 = mysqli_query($con, $sql7);
                        if ($r7) {
                            while ($q = mysqli_fetch_array($r7, MYSQLI_ASSOC)) {
                                ?>
                                <div class="latest-blog-area">
                                    <a href="blog.php" class="post-title"><?= $q['name_'.$lang]; ?></a>
                                    <span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                         <?
                                         $date = date_create($q['vaqt']);
                                         echo date_format($date, "d-m-Y");
                                         ?>
                                    </span>
                                </div>
                                <?
                            }
                        }

                        ?>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-4 col-lg-2">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title"><?=$local_strings[$lang]['i22'];?></h5>

                        <!-- Footer Nav -->
                        <ul class="footer-nav">
                            <li><a href="index.php"><i class="fa fa-caret-right" aria-hidden="true"></i> <?= $local_strings[$lang]['i2']; ?></a>
                            </li>
                            <li><a href="package.php"><i class="fa fa-caret-right" aria-hidden="true"></i> <?= $local_strings[$lang]['i3']; ?></a>
                            </li>
                            <li><a href="discount.php"><i class="fa fa-caret-right" aria-hidden="true"></i> <?= $local_strings[$lang]['i4']; ?></a>
                            </li>
                            <li><a href="blog.php"><i class="fa fa-caret-right" aria-hidden="true"></i> <?= $local_strings[$lang]['i5']; ?></a>
                            </li>
                            <li><a href="contact.php"><i class="fa fa-caret-right" aria-hidden="true"></i> <?= $local_strings[$lang]['i6']; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-8 col-lg-4">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title"><?= $local_strings[$lang]['c1']; ?></h5>
                        <span><?= $local_strings[$lang]['b4'] ?><br><?= $local_strings[$lang]['b5'] ?></span>

                        <!-- Newsletter Form -->
                        <form method="post" class="nl-form">
                            <input type="text" name="phoneNumber" class="form-control phoneAreaMask"
                                   placeholder="<?= $local_strings[$lang]['c11']; ?>...">
                            <button type="submit" name="submit1"><i class="fa fa-phone" aria-hidden="true"></i></button>
                        </form>
                        <?
                        if (isset($_POST['submit1'])) {
                            $phoneNumber = $_POST['phoneNumber'];
                            if (strlen($phoneNumber) >= 9) {
                               $sql6 = "insert into contact(name,tel,content) values ('Bosh sahifa','{$phoneNumber}','Xabar bosh sahifadan sahifasidan yuborildi!')";
                                $r6 = mysqli_query($con, $sql6);
                            if ($r6) {
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->
<!-- **** All JS Files ***** -->
<!-- jQuery 2.2.4 -->
<script src="js/jquery.min.js"></script>
<!-- Popper -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- All Plugins -->
<script src="js/roberto.bundle.js"></script>
<!-- Active -->
<script src="js/default-assets/active.js"></script>
<script src="js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
</body>

</html>