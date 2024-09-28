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
?>
<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: none;"
     data-jarallax-original-styles="background-image:url(img/bg-img/x17.jpg.pagespeed.ic.VLlN5b3v5F.webp)">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content text-center">
                    <h2 class="page-title"><?=$local_strings[$lang]['i2'];?></h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href=""><?=$local_strings[$lang]['i1'];?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$local_strings[$lang]['i2'];?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div id="jarallax-container-0"
         style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;">
        <div class="img-for-bg w-100 h-100" style="background: url('./images/img_10.png')no-repeat; background-size: cover;background-position: 0"></div>
    </div>
</div>

<!---->
<section class="roberto-about-us-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="about-thumbnail pr-lg-5 mb-100 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                    <img src="./img/img.png" alt="" data-pagespeed-url-hash="583524166">
                </div>
            </div>
            <div class="col-12 col-lg-6">

                <div class="section-heading wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <h6><?=$local_strings[$lang]['i23'];?></h6>
                    <h2>20 Yillik Tajriba</h2>
                </div>
                <div class="about-content mb-100 wow fadeInUp" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese mollit anim id est laborum. Sed ut perspiciatis unde omnis iste.</p>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese mollit anim id est laborum. Sed ut perspiciatis unde omnis iste.</p>

                </div>
            </div>
        </div>
    </div>
</section>
<!---->
<?php
include_once 'contactArea.php';
require 'footer.php';