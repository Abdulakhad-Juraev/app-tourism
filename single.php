<?

include "admin/config.php";
include "admin/main_funcs.php";
include "admin/pages/Attachment/functions.php";
include "admin/pages/Payment/functions.php";
include "admin/strings.php";

global $uri;
global $lang_count;
global $lang;
global $local_strings;

if (isset($_POST['lang'])) {
    changeLangFront($_POST['lang']);
}

$travel = getOne($_REQUEST['id'], "travel");
$logo = getAttachmentR($travel['logo']);
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


<?
include "navbar.php";
?>


<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="/uploads/<? echo '' . $logo['unique_id'] . '.' . $logo['ext']; ?>" class="img-fluid w-75">
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->


<!-- Privacy Content -->
<div class="ex-basic-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-container">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-center"><? echo $travel['name_' . $lang]; ?></h4>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                <? echo $local_strings[$lang]['buyurtma']; ?>
                            </button>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <p><b><? echo $local_strings[$lang]['district'] ?></b> :
                                <?
                                if ($travel['districts'] !== "") {
                                    foreach (explode(",", $travel['districts']) as $ds) {
                                        $district = getOne($ds, "district");
                                        echo $district['name_' . $lang] . ", ";
                                    }
                                }
                                ?>
                            </p>
                            <hr>
                            <p><b><? echo $local_strings[$lang]['date']; ?></b> : <? echo $travel['date']; ?></p>
                            <hr>
                            <p><b><? echo $local_strings[$lang]['count']; ?></b> : <? echo $travel['count']; ?></p>
                            <hr>
                            <p><b><? echo $local_strings[$lang]['price']; ?></b> : <? echo $travel['price']; ?></p>

                        </div>
                        <div class="col-6">
                            <p><b><? echo $local_strings[$lang]['description']; ?></b></p>
                            <p>
                                <? echo $travel['description_' . $lang]; ?>
                            </p>
                        </div>

                        <?
                        if ($travel['gallery'] !== "" && $travel['gallery'] !== "") {
                            foreach (explode(",", $travel['gallery']) as $ds) {
                                if ($ds !== "" && $ds !== null) {
                                    $d = getAttachmentR($ds);
                                    ?>
                                    <div class="col-3">
                                        <img src="/uploads/<? echo '' . $d['unique_id'] . '.' . $d['ext']; ?>"
                                             class="img-thumbnail">
                                    </div>
                                    <?
                                }
                            }
                        }
                        ?>
                    </div>
                </div> <!-- end of col-->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-2 -->
    <!-- end of privacy content -->

    <? include "footer.php"; ?>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><? echo $local_strings[$lang]['buyurtma']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <input type="text" name="phone" class="form-control my-1" placeholder="<? echo $local_strings[$lang]['phone']; ?>">
                        <input type="text" name="full_name" class="form-control my-1" placeholder="<? echo $local_strings[$lang]['full_name']; ?>">
                        <input type="text" name="card_number" class="form-control my-1" placeholder="<? echo $local_strings[$lang]['card_number']; ?>">
                        <input type="text" name="count" class="form-control my-1" placeholder="<? echo $local_strings[$lang]['count']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal"><? echo $local_strings[$lang]['cancel']; ?></button>
                        <input name="save" type="submit" class="btn btn-primary" value="<? echo $local_strings[$lang]['buyurtma']; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>


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


<?php
    if (isset($_POST['save'])){
        $_POST = str_replace("'","`",$_POST);
        responseFront(savePayment($_REQUEST['id'], $_POST));
    }
?>