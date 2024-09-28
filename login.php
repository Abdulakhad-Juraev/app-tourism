<?
session_start();
include "admin/config.php";
include "admin/strings.php";
global $local_strings;
global $lang;
?>

<!DOCTYPE html>
<html lang="en">
<?
include "head.php";
?>
<body data-spy="scroll" data-target=".fixed-top">

<!-- Preloader -->
<div class="spinner-wrapper">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- end of preloader -->


<!-- Privacy Content -->
<div class="ex-basic-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="row mt-5">
                    <div class="col-6 offset-3">

                        <!-- Privacy Form -->
                        <div class="form-container">
                            <form data-toggle="validator" method="post">
                                <h1 class="text-center my-5"><?= $local_strings[$lang]['login']; ?></h1>
                                <div class="form-group">
                                    <label class="label-control"
                                           for="pname"><?= $local_strings[$lang]['loginlog']; ?></label>
                                    <input type="text" class="form-control" id="pname" name="phone" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="label-control"
                                           for="pemail"><?= $local_strings[$lang]['loginpass']; ?></label>
                                    <input type="password" class="form-control" id="pemail" name="pass" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group mx-auto d-flex justify-content-center pt-3">
                                    <a type="submit" href="../index.php"
                                       class="btn btn-outline-info w-25 mr-2 ml-2"><?= $local_strings[$lang]['login4']; ?></a>
                                    <input type="submit" name="enter" class="btn btn-primary w-25 mr-2 ml-2"
                                           value="<?= $local_strings[$lang]['login5']; ?>">
                                </div>
                                <div class="form-message">
                                    <div id="pmsgSubmit" class="h3 text-center hidden"></div>
                                </div>

                                <?
                                if (isset($_POST["enter"])) {
                                    global $con;
                                    $phone = $_POST["phone"];
                                    $pass = $_POST['pass'];
                                    $sql = "select * from user where phone='{$phone}' and password='{$pass}'";
                                    $r = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($r) > 0) {
                                        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
                                        $_SESSION["user_id"] = $row["id"];
                                        $_SESSION["phone"] = $row["phone"];
                                        ?>
                                         <script type="text/javascript">window.location.href = "" + window.location.origin + "/admin"</script>
                                        <?

                                    } else {
                                        echo "<label for='phone_number' class='text-danger'>".$local_strings[$lang]['login6']."</label>";
                                    }
                                }
                                ?>
                            </form>
                        </div> <!-- end of form container -->
                        <!-- end of privacy form -->

                    </div> <!-- end of col-->
                </div> <!-- end of row -->
            </div> <!-- end of col-->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-2 -->
<!-- end of privacy content -->


<!-- Scripts -->
<script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
<script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
<script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
<script src="js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
<script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>